<template>
    <section class="section hero has-before has-bg-image" id="home" aria-label="home"
             style="background-image: url('/assets/images/hero-banner.jpg')">
        <div class="container">
            <form action="" class="appoin-form " style="width: 600px; margin: 0 auto 0 auto">

                <select v-model="selectedBranch" @change="getBarbers" class="input-field">
                    <option value="">Вибрати філію</option>
                    <option v-for="branch in branches" :value="branch.id">{{ branch.title }}</option>
                </select>
                <select v-model="selectedBarber" @change="getServices" class="input-field">
                    <option value="" disabled>Виберіть барбера</option>
                    <option v-for="barber in barbers" :value="barber.id">{{ barber.name + ' (' + barber.rank_title + ')' }}</option>
                </select>
                <select v-model="selectedServices" @change="updateAvailableHours" class="input-field" multiple>
                    <option value="" disabled>Виберіть послуги</option>
                    <option v-for="service in services" :value="service.service.id">{{ service.service.title + ' (' + service.price + 'грн) ' + service.duration + 'хв'  }}</option>
                </select>
                <div class="input-wrapper input-flex">
                    <div class="form-date">
                        <div class="form-date__month">
                            <button class="form-date__btn" type="button" v-for="availableDate in availableMonth" @click="selectDate(availableDate.month)">
                                {{ availableDate.month }}
                            </button>
                        </div>
                        <ul class="form-date__days date-days">
                            <li class="date-days__wrapper" v-for="day in days" :key="day.date" @click="updateAvailableDays()">
                                <button type="button" @click="getAvailableHours(selectedBarber, day.date, selectedServices)">{{ day.day }}</button>
                            </li>
                        </ul>
                    </div>
<!--                    <input v-model="scheduleDate" @change="getAvailableHours(selectedBarber, scheduleDate, selectedServices)" type="date" name="scheduleDate" required class="input-field date">-->
                    <div class="radio-toolbar">
                        <template v-for="hour in availableHours">
                            <input type="radio" :id="hour" :value="hour" v-model="scheduleStart">
                            <label :for="hour" :class="{ 'selected': scheduleStart === hour }">{{ hour }}</label>
                        </template>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="input-wrapper">
                    <input v-model="name"  type="text" name="name" placeholder="Your Full Name" required class="input-field">
                    <input v-model="phone" type="tel" name="phone" placeholder="Phone Number" required class="input-field" maxlength="9">
                </div>

                <textarea v-model="description" name="message" placeholder="Write Message" class="input-field"></textarea>

                <button @click.prevent="appointment" type="submit" class="form-btn">
                    <span class="span">Appointment Now</span>
<!--                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>-->
                </button>
            </form>
        </div>
    </section>
</template>

<script>

export default {
    name: 'AppointmentComponent',

    data() {
        return {
            branches: [],
            barbers: [],
            services: [],
            selectedBranch: '',
            selectedBarber: '',
            selectedServices: [],
            scheduleDate: '',
            scheduleStart: '',
            name: '',
            phone: '',
            description: '',
            availableHours: [],
            availableMonth: [],

            selectedMonth: '',
            days: [],
        }
    },
    mounted() {
        this.getBranches()
    },

    methods: {
        updateAvailableDays() {
            this.scheduleStart = '';
        },
        getAvailableDate() {
            this.axios.get('/api//barbers/1/available-date')
                .then(res => {
                    this.availableMonth = res.data.data;
                    console.log(this.availableMonth);
                })
        },
        selectDate(month) {
            this.updateAvailableDays()
            const selectedMonth = this.availableMonth.find(date => date.month === month);
            if (selectedMonth) {
                this.days = selectedMonth.days;
            }
        },

        getBranches() {
            this.axios.get('/api/branches')
                .then(res => {
                    this.branches = res.data.data;
                    this.selectedServices = ''
                })
        },
        getBarbers() {
            this.axios.get(`/api/branches/${this.selectedBranch}/barbers`)
                .then(res => {
                    this.barbers = res.data.data
                    console.log(this.barbers);
                    this.selectedBarber = ''
                    this.selectedServices = ''
                    this.scheduleStart = ''
                    this.scheduleDate = ''
                    this.availableMonth = ''
                    this.days = []
                    this.getServices()
                })
        },
        getServices() {
            this.axios.get(`/api/barbers/${this.selectedBarber}/services`)
                .then(res => {
                    this.services = res.data.data;
                    console.log(this.services);
                    this.availableHours = ''
                    this.scheduleDate = ''
                })
        },
        getAvailableHours(barberId, date, services) {
            this.scheduleDate = date;

            this.axios.get(`/api/barbers/${barberId}/available-hours`, {
                params: {
                    'date': date,
                    'services': services
                }
            })
                .then(res => {
                    this.availableHours = res.data.data;
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                })
        },
        updateAvailableHours() {
            this.getAvailableDate()

            if (this.scheduleDate && this.selectedBarber) {
                this.getAvailableHours(this.selectedBarber, this.scheduleDate, this.selectedServices);
            } else {
                // Очистити доступні години, якщо дата або барбер не вибрані
                this.availableHours = [];
            }
        },
        appointment() {
            console.log(this.selectedServices);
            this.axios.post('/api/orders', {
                'barber_id': this.selectedBarber,
                'services': this.selectedServices,
                'customer_name': this.name,
                'customer_phone': this.phone,
                'date': this.scheduleDate,
                'start': this.scheduleStart,
            })
                .then(res => {
                    alert(res.data.data.customer_name + ', Замовлення успішно створено');
                    this.selectedBranch = ''
                    this.selectedBarber = ''
                    this.selectedServices = []
                    this.scheduleDate = ''
                    this.scheduleStart = ''
                    this.name = ''
                    this.phone = ''
                    this.description = ''
                    this.getServices()
                    this.updateAvailableHours()
                })
                .catch(error => {
                    console.error('Помилка при створенні замовлення', error);
                });
        },
    },
}

</script>

<style scoped>
.form-date__days::-webkit-scrollbar {
    height: 6px;
}
.form-date__days::-webkit-scrollbar-track {
    background-color: hsla(0,0%,75%,.5);
    border-radius: 10px;
}
.form-date__days::-webkit-scrollbar-thumb {
    outline: 1px solid;
    background: #ffc958;
    border-radius: 10px;
}
.form-date__days::-webkit-scrollbar-thumb:hover {
    background: #ffbe28;
}
.form-date__month {
    display: flex;
    gap: 20px;
}

.form-date__days {
    display: flex;
    width: 100%;
    overflow-y: auto;
    gap: 15px;
    padding: 15px 0;
}

.date-days__wrapper {
    background: white;
    border-radius: 50px;
    padding: 0 7px;
}

.form-date__btn {
    background: white;
    border-radius: 5px;
    padding: 2px 10px;
}

.hr {
    width: 75%;
    margin: 0 auto 20px;
    border-top: 2px dashed  white;
}
.radio-toolbar {
    margin: 20px 0;
}

.radio-toolbar input[type="radio"] {
    display: none;
}

.radio-toolbar label {
    display: inline-block;
    padding: 2px 9px;
    width: 83.71px;
    text-align: center;
    font-size: 18px;
    margin: 0 2px 2px 0;
    cursor: pointer;
    border: 1px solid #808080;
    border-radius: 5px;
    background: white;
}

.radio-toolbar label.selected {
    background-color: #ffc958;
}
.radio-toolbar label.selected:hover {
    background-color: #ffc958;
}

.radio-toolbar label:hover {
    background-color: #ffe78a;
}
</style>

