<template lang="html">
    
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Details Speaker</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Speaker</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- TEAM MEMBER DETAILS SECTION START -->
    <div class="py-[130px] xl:py-[80px] md:py-[60px]">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
            <div class="flex md:flex-col items-center md:items-start gap-x-[30px] gap-y-[15px] border border-[#E5E5E5] rounded-[12px] p-[30px] xxs:p-[15px]">
                <div class="img shrink-0">
                    <img :src="'/storage/'+getSpeaker.photo" alt="team member image" class="w-[370px] xxs:max-w-full aspect-[74/75] rounded-[12px]">
                </div>

                <!-- txt -->
                <div class="txt">
                    <h3 class="text-[30px] xxs:text-[25px] font-medium mb-[1px]">{{ getSpeaker.firstname }} {{ getSpeaker.lastname }}</h3>
                    <h6 class="text-etGray text-[16px]">{{ getSpeaker.affiliation }}</h6>
                    <p class="font-light text-[16px] text-etGray mt-[22px]" style="text-align: justify;" v-html="getSpeaker.bio"></p>

                </div>
            </div>

        </div>
    </div>
    <!-- TEAM MEMBER DETAILS SECTION START -->

</template>
<script setup>
    import { onMounted, ref } from 'vue';
    import { useRoute } from 'vue-router';
    import { getSingleData } from '../../plugins/api';


    const getSpeaker = ref({})
    const route = useRoute()

    async function GetSpeakerFunction() {
        await getSingleData('/showpublicspeaker/'+route.params.id).then(res=>{
            if (res.status === 200) {
                getSpeaker.value = res.data.data
            }
        })
    }

    onMounted(()=>{
        GetSpeakerFunction()
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

    background-image: url("/assets/img/breadcrumb.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;

    opacity: 0.3;
    z-index: -1;
}
</style>