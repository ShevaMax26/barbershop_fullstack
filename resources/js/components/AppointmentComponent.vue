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
                    <select v-model="selectedBarber" class="input-field">
                        <option value="" disabled>Виберіть барбера</option>
                        <option v-for="barber in barbers" :value="barber.id">{{ barber.name }}</option>
                    </select>
                </div>

                <div class="input-wrapper input-flex">
                    <input type="date" name="date" required class="input-field date">
                    <input type="time" name="time" required class="input-field date">
                </div>
                <div class="hr"></div>
                <div class="input-wrapper">
                    <input type="text" name="name" placeholder="Your Full Name" required class="input-field">
                    <input type="text" name="phone" placeholder="Phone Number" required class="input-field">
                </div>

                <textarea name="message" placeholder="Write Message" class="input-field"></textarea>

                <button type="submit" class="form-btn">
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
            selectedBranch: '',
            selectedBarber: '',
            branches: [],
            barbers: [],
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
                })
        },
        updateBarbers() {
            this.axios.get(`/api/branches/${this.selectedBranch}/barbers`)
                .then(res => {
                    this.barbers = res.data.data;
                })
        }
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

