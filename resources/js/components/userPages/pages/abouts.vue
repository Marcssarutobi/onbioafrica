<template lang="html">
    
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30" >
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">About us</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">About us</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- ABOUT SECTION START -->
    <section class="et-about py-[130px] xl:py-[80px] md:py-[60px] overflow-hidden relative" style="padding: 70px 0 ;">
        <div class="et-1-container">
            <div class="flex items-center md:flex-wrap gap-x-[60px] xxl:gap-x-[40px] lg:gap-x-[30px] gap-y-[40px] sm:gap-y-[40px] lg:justify-center">
                <!-- left -->
                <div class="et-about-img relative z-[1] md:w-auto shrink-0 max-w-full mr-[70px] md:mr-0 ml-[28px] xxxl:ml-[47px] md:ml-0 xs:w-[70%] xxs:w-[90%] xxs:ml-[47px]">
                    <img src="assets/img/about7.jpeg" alt="image" width="423" height="526" class="shrink-0 rounded-[10px]">
                    <img src="assets/img/aboutH.JPG.jpeg" alt="image" width="201" height="241" class="et-about-floating-img absolute top-[45px] -right-[70px] shrink-0 rounded-[20px] border-white border-[10px] xs:hidden">

                    <!-- vectors -->
                    <div class="et-about-vectors xs:hidden">
                        <img src="assets/img/about-img-vector-1.png" alt="vector" class="et-about-vector-1 absolute -left-[47px] top-[20px] -z-[1]">
                        <img src="assets/img/about-img-vector-2.png" alt="vector" class="et-about-vector-2 absolute -left-[27px] top-[41px] -z-[1]">
                        <img src="assets/img/about-img-vector-3.png" alt="vector" class="et-about-vector absolute -right-[24px] bottom-[34px] -z-[1]">
                    </div>

                </div>

                <!-- right -->
                <div class="et-about__txt">
                    <h6 class="et-section-sub-title anim-text">About The Symposium</h6>
                    <h2 class="et-section-title mb-[24px] md:mb-[19px] anim-text">Advancing One Health Through Molecular Science in Africa</h2>

                    <p class="mb-[30px] text-[16px] font-light text-etGray md:mb-[30px] rev-slide-up" style="text-align: justify;">
                        Africa faces interconnected challenges linking human, animal, plant, and environmental health. Yet molecular data generation, analysis, and sharing capacities remain uneven across the continent. OneBioAfrica was created to address this gap by building collaborative networks, strengthening bioinformatics expertise, and fostering genomic data exchange to support health surveillance, biodiversity conservation, and sustainable development.
                    </p>

                    
                </div>
            </div>
        </div>

        <!-- vectors -->
        <div class="xs:hidden">
            <img src="assets/img/about-vector-1.png" alt="vector" class="pointer-events-none absolute top-[340px] left-[90px] -z-[1]">
            <img src="assets/img/about-vector-2.png" alt="vector" class="pointer-events-none absolute top-[153px] right-0 -z-[1]">
        </div>
    </section>
    <!-- ABOUT SECTION END -->


    <section class="et-mission">
        <div class="et-container">

            <!-- HEADER -->
            <header class="et-heading-center">
                <span class="et-section-sub-title anim-text">Our Purpose</span>
                <h2 class="et-section-title anim-text">
                    Mission & Scientific Objectives
                </h2>
                <p class="et-section-desc">
                    OneBioAfrica is committed to strengthening One Health research networks across Africa
                    through integrated, data-driven scientific collaboration.
                </p>
            </header>

            <div class="et-mission-grid">

                <!-- OBJECTIVES -->
                <div class="et-objectives-card">
                    <h3>Scientific Objectives</h3>

                    <ul class="et-objectives-list">
                        <li>
                            <span class="et-bullet"></span>
                            Promote molecular data sharing across African research institutions
                        </li>
                        <li>
                            <span class="et-bullet"></span>
                            Strengthen bioinformatics and genomics capacities
                        </li>
                        <li>
                            <span class="et-bullet"></span>
                            Advance pathogen surveillance and antimicrobial resistance research
                        </li>
                        <li>
                            <span class="et-bullet"></span>
                            Support biodiversity monitoring using environmental DNA
                        </li>
                        <li>
                            <span class="et-bullet"></span>
                            Foster interdisciplinary One Health collaborations
                        </li>
                        <li>
                            <span class="et-bullet"></span>
                            Encourage early-career training and mentorship
                        </li>
                    </ul>
                </div>

                <!-- MISSION -->
                <div class="et-mission-card">
                    <h3>Our Mission</h3>

                    <p>
                        One Bio Africa promotes integrated scientific approaches linking molecular biology,
                        ecosystem health, and public health.
                    </p>

                    <p>
                        Its mission is to foster collaboration, capacity building, and knowledge exchange
                        to address Africa’s One Health challenges through innovation, inclusivity,
                        and sustainable research networks.
                    </p>

                    <div class="et-mission-values">
                        <span>Collaboration</span>
                        <span>Innovation</span>
                        <span>Inclusivity</span>
                        <span>Sustainability</span>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- TEAM SECTION START -->
    <section class="et-speakers py-[100px] lg:py-[80px] md:py-[60px] overflow-hidden relative z-[1]" style="padding: 70px 0;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
            <!-- heading -->
            <div class="et-speakers-heading text-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                <h6 class="et-section-sub-title anim-text">Event Speakers</h6>
                <h2 class="et-section-title anim-text">Meet Our Creative Speakers</h2>
            </div>

            <div class="grid grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 justify-center gap-[30px] lg:gap-[20px]">
                <!-- single team member -->
                <div v-for="(speaker,index) in allspeaker" :key="index" class="et-member group">
                    <div class="et-member__img rounded-[16px] overflow-hidden">
                        <img :src="'/storage/'+speaker.photo" alt="Team Member Image" class="w-full duration-[400ms] group-hover:scale-110">
                    </div>

                    <div class="et-member__txt bg-white relative z-[1] mx-[25px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] md:px-[15px] pb-[30px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">
                        <h5 class="font-semibold text-[22px] md:text-[20px] text-etBlack mb-[4px]"><RouterLink :to="'/singleSpeaker/'+speaker.id" class="hover:text-etBlue">{{ speaker.firstname }} {{ speaker.lastname }}</RouterLink></h5>
                        <span class="text-etGray text-[16px]">{{ speaker.affiliation }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TEAM SECTION END -->

</template>
<script setup>

    import { onMounted, ref } from 'vue';
    import { getData } from '../../plugins/api';

    const allspeaker = ref([])

    async function AllSpeakerFunction() {
        await getData('/allpublicspeakers').then(res=>{
            if (res.status === 200) {
                allspeaker.value = res.data.data
                setTimeout(()=>{
                    Main()
                },0)
            }
        })
    }

    onMounted(()=>{
        AllSpeakerFunction()
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


/* =========================
   MISSION & OBJECTIVES
========================= */

.et-mission {
    padding: 50px 0;
    background-color: #f7f9fc;
}

.et-heading-center {
    max-width: 720px;
    margin: 0 auto 60px;
    text-align: center;
}

.et-section-desc {
    font-size: 18px;
    color: #6b7280;
    margin-top: 18px;
    line-height: 1.6;
}

/* GRID */
.et-mission-grid {
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 50px;
}

/* OBJECTIVES CARD */
.et-objectives-card,
.et-mission-card {
    background: #ffffff;
    padding: 40px;
    border-radius: 18px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
}

.et-objectives-card h3,
.et-mission-card h3 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 25px;
    color: #0f172a;
}

/* OBJECTIVES LIST */
.et-objectives-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.et-objectives-list li {
    display: flex;
    gap: 14px;
    font-size: 16.5px;
    line-height: 1.6;
    color: #374151;
    margin-bottom: 14px;
}

.et-bullet {
    width: 10px;
    height: 10px;
    margin-top: 8px;
    border-radius: 50%;
    background-color: #054072;
    flex-shrink: 0;
}

/* MISSION TEXT */
.et-mission-card p {
    font-size: 16.5px;
    line-height: 1.7;
    color: #4b5563;
    margin-bottom: 18px;
}

/* VALUES TAGS */
.et-mission-values {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 25px;
}

.et-mission-values span {
    padding: 8px 16px;
    font-size: 14px;
    background-color: rgba(5, 64, 114, 0.08);
    color: #054072;
    border-radius: 999px;
    font-weight: 500;
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .et-mission-grid {
        grid-template-columns: 1fr;
    }

    .et-mission {
        padding: 80px 0;
    }
}
    
</style>