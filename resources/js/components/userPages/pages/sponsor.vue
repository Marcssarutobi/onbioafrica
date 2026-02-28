<template lang="html">
    
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30" >
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Industry/Sponsors</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Industry/Sponsors</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <section class="et-sponsorship-section">
        <div class="et-container">

            <div class="et-sponsorship-grid">

                <!-- LEFT COLUMN : CONTACT CARD -->
                <div class="et-sponsor-card rev-slide-up">
                    <h3 class="et-card-title">Sponsorship &amp;<br>Exhibition Coordinator</h3>

                    <p class="et-card-text">
                        Contact me if you are interested in becoming a sponsor or an exhibitor or if you have any questions about OneBioAfrica 2026.
                    </p>

                    <div class="et-card-profile">
                        <img src="assets/img/user123.jpg" alt="Coordinator">
                    </div>

                    <h4 class="et-card-name">Basile Gbètondji HOUNWANOU</h4>

                    <ul class="et-card-contact">
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <a href="mailto:hounwanou.basile@gmail.com">hounwanou.basile@gmail.com</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:+2290167267768">+229 016 726 7768</a>
                        </li>
                    </ul>

                    <div class="et-card-actions">
                        <a href="#" class="et-btn-primary">Book an online meeting</a>
                        <a href="#" class="et-btn-secondary">Sponsorship Booking Form</a>
                    </div>
                </div>

                <!-- RIGHT COLUMN : SPONSOR TEXT -->
                <div class="et-sponsor-content rev-slide-up">
                    <span class="et-section-sub-title">Become a Partner</span>
                    <h2 class="et-section-title">Why Support OneBioAfrica?</h2>

                    <p>
                        Supporting OneBioAfrica offers partners a unique opportunity to contribute to strengthening molecular science and One Health capacity across Africa.
                    </p>

                    <p>
                        Sponsors gain visibility among leading scientists, policymakers, and international institutions while demonstrating a strong commitment to health innovation, biodiversity conservation, and sustainable development.
                    </p>

                    <p>
                        Partnership packages are designed to provide meaningful engagement, strategic exposure, and long-term impact across the African scientific ecosystem.
                    </p>

                     <!-- SPONSORS LOGOS -->
                    <div v-for="(sponsors, type) in allsponsors" :key="type" class="mb-[70px]">

                        <!-- Type title -->
                        <h3 class="text-start text-[24px] md:text-[20px] font-semibold text-etBlack mb-[30px]">
                            {{ type }}
                        </h3>

                        <!-- Sponsors logos -->
                        <div class="et-sponsors-logos ">
                             <div class="et-sponsors-logos">
                                <img
                                    v-for="sponsor in sponsors"
                                    :key="sponsor.id"
                                    :src="'/storage/' + sponsor.logo"
                                    :alt="sponsor.name"
                                >
                            </div>
                        </div>

                    </div>


                </div>

            </div>

           

        </div>
    </section>

</template>
<script setup>
    import { onMounted, ref } from 'vue';
    import { getData } from '../../plugins/api';

    const allsponsors = ref([])

    async function AllSponsorsFunction(){
        await getData('/allsponsor').then(res=>{
            if (res.status === 200) {
                allsponsors.value = res.data.by_type
                setTimeout(()=>{
                    Main()
                },0)
            }
        })
    }

    onMounted(()=>{
        AllSponsorsFunction()
    })

</script>
<style scoped>

.et-breadcrumb {
    position: relative;
    z-index: 1;

    /* Background color */
    background-color: #062d63;

    /* Padding desktop */
    padding-top: 210px;
    padding-bottom: 130px;
}

/* Image de fond en overlay */
.et-breadcrumb::before {
    content: "";
    position: absolute;
    inset: 0;

    background-image: url("/assets/img/carou2.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;

    opacity: 0.3;
    z-index: -1;
}

/* Responsive – Large screens */
@media (max-width: 1024px) {
    .et-breadcrumb {
        padding-top: 190px;
        padding-bottom: 110px;
    }
}

/* Responsive – Small screens */
@media (max-width: 640px) {
    .et-breadcrumb {
        padding-top: 160px;
        padding-bottom: 80px;
    }
}
    
.et-sponsorship-section {
    padding: 120px 0;
    background: #f9fafc;
}

.et-sponsorship-grid {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 60px;
    align-items: flex-start;
}

@media (max-width: 992px) {
    .et-sponsorship-grid {
        grid-template-columns: 1fr;
    }
}

/* LEFT CARD */
.et-sponsor-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
}

.et-card-title {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 16px;
}

.et-card-text {
    color: #555;
    margin-bottom: 30px;
    font-size: 17px;
}

.et-card-profile{
    width: 60%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.et-card-profile img {
    width: 100%;
    border-radius: 16px;
    margin-bottom: 20px;
}

.et-card-name {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 12px;
}

.et-card-contact {
    list-style: none;
    padding: 0;
    margin-bottom: 30px;
}

.et-card-contact li {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
}

.et-card-contact a {
    color: #e83e8c;
    text-decoration: none;
    font-weight: 500;
    font-size: 15px;
}

/* BUTTONS */
.et-card-actions {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.et-btn-primary,
.et-btn-secondary {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    height: 46px;
    border-radius: 30px;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
}

.et-btn-primary {
    background: #183a37;
    color: #ffffff;
}

.et-btn-secondary {
    background: #0b3c5d;
    color: #ffffff;
}

/* RIGHT CONTENT */
.et-sponsor-content p {
    font-size: 17px;
    line-height: 1.7;
    color: #444;
    margin-bottom: 18px;
    text-align: justify;
}

/* SPONSORS LOGOS */
.et-sponsors-logos {
    margin-top: 10px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 40px;
}

.et-sponsors-logos img {
    max-height: 60px;
    opacity: 0.8;
    transition: opacity 0.3s ease;
}

.et-sponsors-logos img:hover {
    opacity: 1;
}
</style>