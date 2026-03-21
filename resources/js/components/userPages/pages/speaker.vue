<template>

    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30" >
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Speakers</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Speakers</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <section class="et-speakers py-[100px] lg:py-[80px] md:py-[60px] overflow-hidden relative z-[1]" style="padding: 70px 0;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">

            <!-- heading -->
            <div class="et-speakers-heading text-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                <h6 class="et-section-sub-title ">Our Speakers</h6>
                <h2 class="et-section-title ">Plenary and keynote speakers will be announced soon</h2>
                <p class="max-w-[800px] mx-auto mt-[20px] text-etGray text-[16px] font-light leading-[1.6]" style="margin-top: 20px; max-width: 800px;">
                    Meet our speakers: African and international researchers and experts specializing in <strong style="font-weight: bold;">genomics, bioinformatics, epidemiology, and biodiversity conservation</strong>.  
                    Each speaker brings their unique experience to share the latest scientific advances, inspire participants, and enrich discussions throughout the symposium.
                </p>
            </div>

            <div v-if="isLoader" id="loader">
                <div class="spinner"></div>
            </div>

            <!-- Speakers by type -->
            <div v-for="(speakers, type) in allspeaker" :key="type" class="mb-[80px]" style="margin-bottom: 25px;">

                <!-- Type title -->
                <h3 class="text-center text-[28px] md:text-[24px] font-semibold text-etBlack mb-[40px]" style="font-size: 25px; text-align: start;">
                    {{ type }}
                </h3>

                <!-- Grid -->
                <div class="grid grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 justify-center gap-[30px] lg:gap-[20px]">

                    <!-- Single speaker -->
                    <div 
                        v-for="(speaker, index) in speakers" 
                        :key="index" 
                        class="et-member group"
                    >
                        <div class="et-member__img rounded-[16px] overflow-hidden">
                            <img 
                                :src="'/storage/' + speaker.photo" 
                                alt="Speaker Image"
                                class="w-full duration-[400ms] group-hover:scale-110"
                            >
                        </div>

                        <div class="et-member__txt bg-white relative z-[1] mx-[25px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] md:px-[15px] pb-[30px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[0deg]">
                            
                            <h5 class="font-semibold text-[22px] md:text-[20px] text-etBlack mb-[4px]">
                                <RouterLink :to="'/singleSpeaker/'+speaker.id" class="hover:text-etBlue">
                                    {{ speaker.firstname }} {{ speaker.lastname }} 
                                </RouterLink>
                            </h5>

                            <span class="text-etGray text-[16px] block">
                                {{ speaker.affiliation }} ({{ speaker.country }})
                            </span>
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

const allspeaker = ref([])
const isLoader = ref(false)

async function AllSpeakerFunction() {
     isLoader.value = true
    await getData('/allpublicspeakers').then(res=>{
        if (res.status === 200) {
             isLoader.value = false
            allspeaker.value = res.data.byType
        }
    })
}

onMounted(()=>{
    AllSpeakerFunction()
})

</script>

<style scoped>

#loader {
    
    width: 100%;
    height: 150px;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Spinner */
.spinner {
    width: 60px;
    height: 60px;
    border: 6px solid #e5e7eb;
    border-top: 6px solid #1260FE;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Animation */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.et-member__img{
    width: 366px;
    height: 366px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.et-member__img img{
    width: 100%;
    height: 100%;
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
}

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

    background-image: url("/assets/img/banner2.jpeg");
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

</style>