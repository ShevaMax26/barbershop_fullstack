<template>
    <main>
        <article>

            <!--
              - #HERO
            -->

            <section class="section hero has-before has-bg-image" id="home" aria-label="home"
                     style="background-image: url('/assets/images/hero-banner.jpg')">
                <div class="container">

                    <h1 class="h1 hero-title">Barbers & Hair Cutting</h1>

                    <p class="hero-text">
                        Sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua
                        suspendisse
                        ultrices gravida
                    </p>

                    <a href="#" class="btn has-before">
                        <span class="span">Explore Our Services</span>

                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>

                </div>
            </section>


            <!--
              - #SERVICE
            -->

            <section class="section service" id="services" aria-label="services">
                <div class="container">

                    <h2 class="h2 section-title text-center">Service We Provide</h2>

                    <p class="section-text text-center">
                        Sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt labore dolore magna aliqua
                        suspendisse
                    </p>

                    <ul class="grid-list">

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <i class="flaticon-salon"></i>
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Hair Cutting Style</a>
                                </h3>

                                <p class="card-text">
                                    Sit amet consectetur adipisci elit sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua.
                                </p>

                                <a href="#" class="card-btn" aria-label="more">
                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <i class="flaticon-shampoo"></i>
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Hair Washing</a>
                                </h3>

                                <p class="card-text">
                                    Sit amet consectetur adipisci elit sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua.
                                </p>

                                <a href="#" class="card-btn" aria-label="more">
                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <i class="flaticon-hot-stone"></i>
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Body Treatments</a>
                                </h3>

                                <p class="card-text">
                                    Sit amet consectetur adipisci elit sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua.
                                </p>

                                <a href="#" class="card-btn" aria-label="more">
                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <i class="flaticon-treatment"></i>
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Beauty & Spa</a>
                                </h3>

                                <p class="card-text">
                                    Sit amet consectetur adipisci elit sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua.
                                </p>

                                <a href="#" class="card-btn" aria-label="more">
                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <i class="flaticon-shaving-razor"></i>
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Stylist Shaving</a>
                                </h3>

                                <p class="card-text">
                                    Sit amet consectetur adipisci elit sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua.
                                </p>

                                <a href="#" class="card-btn" aria-label="more">
                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <i class="flaticon-hair-dye"></i>
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Multi Hair Colors</a>
                                </h3>

                                <p class="card-text">
                                    Sit amet consectetur adipisci elit sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua.
                                </p>

                                <a href="#" class="card-btn" aria-label="more">
                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>


            <!--
              - #PRICING
            -->

            <section class="section pricing has-bg-image has-before" id="pricing" aria-label="pricing"
                     style="background-image: url('/assets/images/pricing-bg.jpg')">
                <div class="container">

                    <h2 class="h2 section-title text-center">Awesome Pricing Plan</h2>

                    <p class="section-text text-center">
                        Sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt labore dolore magna aliqua
                        suspendisse
                    </p>

                    <div class="pricing-tab-container">
                        <ul class="tab-filter">
                            <li v-for="serviceDetail in serviceDetails" :key="serviceDetail.id" @click="selectRank(serviceDetail.id)">
                                <button :class="{'filter-btn': true, 'active': serviceDetail.id === selectedRankId}">
                                    <div class="btn-icon">
                                        <i class="flaticon-beauty-salon" aria-hidden="true"></i>
                                    </div>
                                    <p class="btn-text">{{ serviceDetail.title }}</p>
                                </button>
                            </li>
                        </ul>

                        <ul class="grid-list">
                            <li data-filter="meditations" v-for="service in selectedRankServices" :key="service.id">
                                <div class="pricing-card">
                                    <div class="wrapper">
                                        <h3 class="h3 card-title">{{ service.service.title }}</h3>
                                        <p class="card-text">{{ service.service.description }}</p>
                                    </div>
                                    <div>
                                        <data class="card-price" :value="service.price" style="line-height: 1">{{ service.price }}₴</data>
                                        <span style="font-size: 13px; margin-top: 5px">{{ formatDuration(service.duration) }}</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>


            <!--
              - #GALLERY
            -->

            <section class="section gallery" id="gallery" aria-label="photo gallery">
                <div class="container">

                    <div class="title-wrapper">

                        <div>
                            <h2 class="h2 section-title">Latest Photo Gallery</h2>

                            <p class="section-text">
                                Sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt labore dolore
                                magna aliqua
                                suspendisse
                            </p>
                        </div>

                        <a href="#" class="btn has-before">
                            <span class="span">Explore More Gallery</span>

                            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                        </a>

                    </div>

                    <ul class="grid-list">

                        <li>
                            <div class="gallery-card">

                                <figure class="card-banner img-holder" style="--width: 422; --height: 550;">
                                    <img src="/assets/images/gallery-1.jpg" width="422" height="550" loading="lazy"
                                         alt="Hair Cutting"
                                         class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <h3 class="h3 card-title">Hair Cutting</h3>

                                    <p class="card-text">Barbers & Salon Services</p>

                                    <a href="#" class="card-btn" aria-label="Read more">
                                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                    </a>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="gallery-card">

                                <figure class="card-banner img-holder" style="--width: 422; --height: 550;">
                                    <img src="/assets/images/gallery-2.jpg" width="422" height="550" loading="lazy"
                                         alt="Hair Cutting"
                                         class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <h3 class="h3 card-title">Hair Cutting</h3>

                                    <p class="card-text">Barbers & Salon Services</p>

                                    <a href="#" class="card-btn" aria-label="Read more">
                                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                    </a>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="gallery-card">

                                <figure class="card-banner img-holder" style="--width: 422; --height: 550;">
                                    <img src="/assets/images/gallery-3.jpg" width="422" height="550" loading="lazy"
                                         alt="Hair Cutting"
                                         class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <h3 class="h3 card-title">Hair Cutting</h3>

                                    <p class="card-text">Barbers & Salon Services</p>

                                    <a href="#" class="card-btn" aria-label="Read more">
                                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                    </a>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="gallery-card">

                                <figure class="card-banner img-holder" style="--width: 422; --height: 550;">
                                    <img src="/assets/images/gallery-4.jpg" width="422" height="550" loading="lazy"
                                         alt="Hair Cutting"
                                         class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <h3 class="h3 card-title">Hair Cutting</h3>

                                    <p class="card-text">Barbers & Salon Services</p>

                                    <a href="#" class="card-btn" aria-label="Read more">
                                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                    </a>

                                </div>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>


            <!--
              - #APPOINTMENT
            -->

            <section class="section appoin" id="appointment" aria-label="appointment">
                <div class="container">

                    <div class="appoin-card">

                        <figure class="card-banner img-holder" style="--width: 250; --height: 774;">
                            <img src="/assets/images/appoin-banner-1.jpg" width="250" height="774" loading="lazy"
                                 alt=""
                                 class="img-cover">
                        </figure>

                        <div class="card-content">

                            <h2 class="h2 section-title">Make Appointment</h2>

                            <p class="section-text">
                                Sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt labore dolore
                                magna aliqua
                                suspendisse
                            </p>

                            <form action="" class="appoin-form">

                                <div class="input-wrapper">
                                    <input type="text" name="name" placeholder="Your Full Name" required
                                           class="input-field">

                                    <input type="email" name="email_address" placeholder="Email Address" required
                                           class="input-field">
                                </div>

                                <div class="input-wrapper">
                                    <input type="text" name="phone" placeholder="Phone Number" required
                                           class="input-field">

                                    <select name="category" class="input-field">

                                        <option value="Select category">Select category</option>
                                        <option value="Beauty & spa">Beauty & spa</option>
                                        <option value="Body massage">Body massage</option>
                                        <option value="Shaving & Facial">Shaving & Facial</option>
                                        <option value="Hair Color">Hair Color</option>

                                    </select>
                                </div>

                                <input type="date" name="date" required class="input-field date">

                                <textarea name="message" placeholder="Write Message" required
                                          class="input-field"></textarea>

                                <button type="submit" class="form-btn">
                                    <span class="span">Appointment Now</span>

                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </button>

                            </form>

                        </div>

                        <figure class="card-banner img-holder" style="--width: 250; --height: 774;">
                            <img src="/assets/images/appoin-banner-2.jpg" width="250" height="774" loading="lazy" alt=""
                                 class="img-cover">
                        </figure>

                    </div>

                </div>
            </section>

        </article>
    </main>
</template>

<script>
export default {
    name: "Index",

    data() {
        return {
            serviceDetails: [],
            selectedRankId: null,
        };
    },

    computed: {
        selectedRankServices() {
            if (this.selectedRankId === null) {
                return [];
            }
            const selectedRank = this.serviceDetails.find(serviceDetail => serviceDetail.id === this.selectedRankId);
            return selectedRank ? selectedRank.serviceDetails : [];
        },
    },

    mounted() {
        this.getServices();
    },

    methods: {
        getServices() {
            this.axios.get('/api/')
                .then((res) => {
                    this.serviceDetails = res.data.data;
                    console.log(this.serviceDetails);
                    if (this.serviceDetails.length > 0) {
                        this.selectedRankId = this.serviceDetails[0].id;
                    }
                });
        },

        selectRank(rankId) {
            this.selectedRankId = rankId;
        },

        formatDuration(duration) {
            if (duration < 60) {
                return `${duration}хв.`;
            } else {
                const hours = Math.floor(duration / 60);
                const minutes = duration % 60;
                if (minutes === 0) {
                    return `${hours}год.`;
                } else {
                    return `${hours}год. ${minutes}хв.`;
                }
            }
        }
    },
}

</script>

<style scoped>
    .pricing-card {
        align-items: flex-start;
    }
    .card-text {
        font-size: 15px;
        line-height: 18px;
    }
</style>
