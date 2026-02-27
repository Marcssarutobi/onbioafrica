<template>
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30" >
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Organizing Committee</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Organizing Committee</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

     <!-- TEAM SECTION START -->
    <section class="et-speakers py-[100px] lg:py-[80px] md:py-[60px] overflow-hidden relative z-[1]" style="padding: 70px 0;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
            <!-- heading -->
            <div class="et-speakers-heading text-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                <h6 class="et-section-sub-title ">Organizing Committee</h6>
                <h2 class="et-section-title ">Scientific Committee</h2>
                <p class="max-w-[800px] mx-auto mt-[20px] text-etGray text-[16px] font-light leading-[1.6]" style="margin-top: 20px;">
                    The symposium is organised by an interdisciplinary committee of African and international scientists committed to advancing molecular One Health research. The scientific committee brings together experts in genomics, bioinformatics, epidemiology, and biodiversity conservation to ensure high-quality scientific programming and equitable regional representation.
                </p>
            </div>

            <div class="grid grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 justify-center gap-[30px] lg:gap-[20px]">
                <!-- single team member -->
                <div v-for="(comite,index) in allcommitter" :key="index" class="et-member group">
                    <div class="et-member__img rounded-[16px] overflow-hidden">
                        <img :src="'/storage/'+comite.image" alt="Team Member Image" class="w-full duration-[400ms] group-hover:scale-110">
                    </div>

                    <div class="et-member__txt bg-white relative z-[1] mx-[25px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] md:px-[15px] pb-[30px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">
                        
                        <h5 class="font-semibold text-[22px] md:text-[20px] text-etBlack mb-[4px]"><a href="#" class="hover:text-etBlue">{{ comite.fullname }}</a></h5>
                        <span class="text-etGray text-[16px]">{{ comite.post }}</span>
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

    const allcommitter = ref([])

    async function AllCommitteeFunction(params) {
        await getData('/allpubliccomiters').then(res=>{
            allcommitter.value = res.data.data
        })
    }

    onMounted(() => {
        AllCommitteeFunction()
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
</style>