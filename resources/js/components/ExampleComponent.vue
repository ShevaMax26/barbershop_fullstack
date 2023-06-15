<template>
    <div class="pricing-tab-container">

        <ul class="tab-filter">

            <li>
                <button class="filter-btn active" data-filter-btn="all">
                    <div class="btn-icon">
                        <i class="flaticon-beauty-salon" aria-hidden="true"></i>
                    </div>

                    <p class="btn-text">All Pricing</p>
                </button>
            </li>

            <li>
                <button class="filter-btn" data-filter-btn="beauty-spa">
                    <div class="btn-icon">
                        <i class="flaticon-relax" aria-hidden="true"></i>
                    </div>

                    <p class="btn-text">Beauty & Spa</p>
                </button>
            </li>

            <li>
                <button class="filter-btn" data-filter-btn="body-treatments">
                    <div class="btn-icon">
                        <i class="flaticon-massage" aria-hidden="true"></i>
                    </div>

                    <p class="btn-text">Body Treatments</p>
                </button>
            </li>

            <li>
                <button class="filter-btn" data-filter-btn="face-washing">
                    <div class="btn-icon">
                        <i class="flaticon-spa" aria-hidden="true"></i>
                    </div>

                    <p class="btn-text">Face Washing</p>
                </button>
            </li>

            <li>
                <button class="filter-btn" data-filter-btn="meditations">
                    <div class="btn-icon">
                        <i class="flaticon-yoga" aria-hidden="true"></i>
                    </div>

                    <p class="btn-text">Meditations</p>
                </button>
            </li>

            <li>
                <button class="filter-btn" data-filter-btn="shaving">
                    <div class="btn-icon">
                        <i class="flaticon-razor-blade" aria-hidden="true"></i>
                    </div>

                    <p class="btn-text">Shaving</p>
                </button>
            </li>

        </ul>

        <ul class="grid-list">

            <li data-filter="shaving">
                <div class="pricing-card">

                    <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                        <img src="/assets/images/pricing-1.jpg" width="90" height="90"
                             alt="Hair Cutting & Fitting"
                             class="img-cover">

                    </figure>

                    <div class="wrapper">
                        <h3 class="h3 card-title">Hair Cutting & Fitting</h3>

                        <p class="card-text">Clean & simple 30-40 minutes</p>
                    </div>

                    <data class="card-price" value="89">$89</data>

                </div>
            </li>

            <li data-filter="shaving">
                <div class="pricing-card">

                    <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                        <img src="/assets/images/pricing-2.jpg" width="90" height="90"
                             alt="Shaving & Facial"
                             class="img-cover">
                    </figure>

                    <div class="wrapper">
                        <h3 class="h3 card-title">Shaving & Facial</h3>

                        <p class="card-text">Clean & simple 30-40 minutes</p>
                    </div>

                    <data class="card-price" value="45">$45</data>

                </div>
            </li>

            <li data-filter="face-washing">
                <div class="pricing-card">

                    <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                        <img src="/assets/images/pricing-3.jpg" width="90" height="90"
                             alt="Hair Color & Wash"
                             class="img-cover">
                    </figure>

                    <div class="wrapper">
                        <h3 class="h3 card-title">Hair Color & Wash</h3>

                        <p class="card-text">Clean & simple 30-40 minutes</p>
                    </div>

                    <data class="card-price" value="35">$35</data>

                </div>
            </li>

            <li data-filter="body-treatments">
                <div class="pricing-card">

                    <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                        <img src="/assets/images/pricing-4.jpg" width="90" height="90"
                             alt="Body Massage"
                             class="img-cover">
                    </figure>

                    <div class="wrapper">
                        <h3 class="h3 card-title">Body Massage</h3>

                        <p class="card-text">Clean & simple 30-40 minutes</p>
                    </div>

                    <data class="card-price" value="56">$56</data>

                </div>
            </li>

            <li data-filter="beauty-spa">
                <div class="pricing-card">

                    <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                        <img src="/assets/images/pricing-5.jpg" width="90" height="90"
                             alt="Beauty & Spa"
                             class="img-cover">
                    </figure>

                    <div class="wrapper">
                        <h3 class="h3 card-title">Beauty & Spa</h3>

                        <p class="card-text">Clean & simple 30-40 minutes</p>
                    </div>

                    <data class="card-price" value="27">$27</data>

                </div>
            </li>

            <li data-filter="face-washing">
                <div class="pricing-card">

                    <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                        <img src="/assets/images/pricing-6.jpg" width="90" height="90"
                             alt="Facial & Face Wash"
                             class="img-cover">
                    </figure>

                    <div class="wrapper">
                        <h3 class="h3 card-title">Facial & Face Wash</h3>

                        <p class="card-text">Clean & simple 30-40 minutes</p>
                    </div>

                    <data class="card-price" value="63">$63</data>

                </div>
            </li>

            <li data-filter="body-treatments">
                <div class="pricing-card">

                    <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                        <img src="/assets/images/pricing-7.jpg" width="90" height="90"
                             alt="Backbone Massage"
                             class="img-cover">
                    </figure>

                    <div class="wrapper">
                        <h3 class="h3 card-title">Backbone Massage</h3>

                        <p class="card-text">Clean & simple 30-40 minutes</p>
                    </div>

                    <data class="card-price" value="43">$43</data>

                </div>
            </li>

            <li data-filter="meditations">
                <div class="pricing-card">

                    <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                        <img src="/assets/images/pricing-8.jpg" width="90" height="90"
                             alt="Meditation & Massage"
                             class="img-cover">
                    </figure>

                    <div class="wrapper">
                        <h3 class="h3 card-title">Meditation & Massage</h3>

                        <p class="card-text">Clean & simple 30-40 minutes</p>
                    </div>

                    <data class="card-price" value="74">$74</data>

                </div>
            </li>

        </ul>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.initializeTabFunctionality();
        },
        methods: {
            initializeTabFunctionality() {
                const filterBtns = document.querySelectorAll("[data-filter-btn]");
                const filterItems = document.querySelectorAll("[data-filter]");
                let lastClickedFilterBtn = filterBtns[0];

                const filter = function () {
                    lastClickedFilterBtn.classList.remove("active");
                    this.classList.add("active");
                    lastClickedFilterBtn = this;

                    for (let i = 0; i < filterItems.length; i++) {
                        if (
                            this.dataset.filterBtn === filterItems[i].dataset.filter ||
                            this.dataset.filterBtn === "all"
                        ) {
                            filterItems[i].style.display = "block";
                            filterItems[i].classList.add("active");
                        } else {
                            filterItems[i].style.display = "none";
                            filterItems[i].classList.remove("active");
                        }
                    }
                };

                filterBtns.forEach((btn) => btn.addEventListener("click", filter));
            },
        },
    }
</script>
