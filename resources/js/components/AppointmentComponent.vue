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
                <select v-model="selectedServices" class="input-field" multiple>
                    <option value="" disabled>Виберіть послуги</option>
                    <option v-for="service in services" :value="service.service.id">{{ service.service.title + ' (' + service.price + 'грн) ' + service.duration + 'хв'  }}</option>
                </select>
                <div class="input-wrapper input-flex">
                    <input v-model="scheduleDate" @change="getAvailableHours(selectedBarber, scheduleDate, selectedServices)" type="date" name="scheduleDate" required class="input-field date">
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

                <textarea name="message" placeholder="Write Message" class="input-field"></textarea>

                <button @click.prevent="appointment" type="submit" class="form-btn">
                    <span class="span">Appointment Now</span>
<!--                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>-->
                </button>
            </form>
<!--            <input v-for="availableDate in availableDates" @click="selectDate()" type="button" :value="availableDate.month" style="background: red; width: 70px; margin-bottom: 3px;">-->

<!--            <div>-->
<!--                <div v-for="hour in selectedDate.hours" :key="hour.id" @click="selectHour(hour)">-->
<!--                    {{ hour }}-->
<!--                </div>-->
<!--            </div>-->


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
            availableHours: [],
            availableDates: [],

            selectMonth: '',
        }
    },
    mounted() {
        this.getBranches()
        // this.getAvailableDate()
    },

    methods: {
        // getAvailableDate() {
        //     this.axios.get('/api//barbers/1/available-date')
        //         .then(res => {
        //             this.availableDates = res.data.data;
        //             console.log(this.availableDates);
        //         })
        // },
        // selectDate() {
        //     this.selectedDate = {
        //         date: date,
        //         hours: ['10:00', '11:00', '12:00'], // Статичний список годин для вибраної дати
        //     };
        // },
        // selectHour(hour) {
        //     // Обробка вибраної години
        //     console.log(hour);
        // },


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
                })
        },
        getServices() {
            this.axios.get(`/api/barbers/${this.selectedBarber}/services`)
                .then(res => {
                    this.services = res.data.data;
                    console.log(this.services);
                    this.selectedServices = ''
                    this.availableHours = ''
                    this.scheduleDate = ''
                })
        },
        getAvailableHours(barberId, date, services) {
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
                })
                .catch(error => {
                    console.error('Помилка при створенні замовлення', error);
                });
        },
    },
}

</script>

<style scoped>
.hr {
    width: 75%;
    margin: 0 auto 20px;
    border-top: 2px dashed  white;
}
.radio-toolbar {
    margin-bottom: 20px;
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
    background-color: red;
}

.radio-toolbar label:hover {
    background-color: #ffe78a;
}

</style>

