<template>
    <section class="section hero has-before has-bg-image" id="home" aria-label="home"
             style="background-image: url('/assets/images/hero-banner.jpg')">
        <div class="container">
            <form action="" class="appoin-form " style="width: 600px; margin: 0 auto 0 auto">
                <div class="input-wrapper">
                    <select v-model="selectedBranch" @change="updateBarbers" class="input-field">
                        <option value="">Вибрати філію</option>
                        <option v-for="branch in branches" :value="branch.id">{{ branch.title }}</option>
                    </select>
                    <select v-model="selectedBarberRank" @change="getServices" class="input-field">
                        <option value="" disabled>Виберіть барбера</option>
                        <option v-for="barber in barbers" :value="barber.rank_id">{{ barber.name + ' (' + barber.rank_title + ')' }}</option>
                    </select>
                    <select v-model="selectedServices" multiple class="input-field">
                        <option value="" disabled>Виберіть послуги</option>
                        <option v-for="service in services" :value="service.service.id">{{ service.service.title + ' (' + service.price + 'грн)' }}</option>
                    </select>
                </div>

                <div class="input-wrapper input-flex">
                    <input v-model="date" type="date" name="date" required class="input-field date">
                    <input v-model="time" type="time" name="time" required class="input-field date">
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
            selectedBarberRank: '',
            selectedServices: [],
            date: '',
            time: '',
            name: '',
            phone: '',
        }
    },

    mounted() {
        this.getBranches()
    },

    methods: {
        getBranches() {
            this.axios.get('/api/branches')
                .then(res => {
                    this.branches = res.data.data;
                    this.selectedServices = ''
                })
        },
        updateBarbers() {
            this.axios.get(`/api/branches/${this.selectedBranch}/barbers`)
                .then(res => {
                    this.barbers = res.data.data
                    this.selectedBarberRank = ''
                    this.getServices()
                })
        },
        getServices() {
            this.axios.get(`/api/ranks/${this.selectedBarberRank}/services`)
                .then(res => {
                    this.services = res.data.data;
                    console.log(this.services);
                    this.selectedServices = ''
                })

        },
        appointment() {
            console.log(this.selectedServices);
            this.axios.post('/api/orders', {
                'branch_id': this.selectedBranch,
                'services': this.selectedServices,
                'customer_name': this.name,
                'customer_phone': this.phone,
                'scheduled_date': this.date,
                'start_time': this.time,
            })
                .then(res => {
                    console.log(res);
                    console.log('Замовлення успішно створено');
                })
                .catch(error => {
                    console.error('Помилка при створенні замовлення', error);
                });
        },
    },
}

</script>

<style scoped>
.input-flex {
    display: flex;
    gap: 20px;
}
.hr {
    width: 75%;
    margin: 0 auto 20px;
    border-top: 2px dashed  white;
}
</style>

