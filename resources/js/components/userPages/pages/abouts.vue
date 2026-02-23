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
                    <img src="assets/img/about-img.jpg" alt="image" class="shrink-0 rounded-[10px]">
                    <img src="assets/img/about-img-3.jpg" alt="image" class="et-about-floating-img absolute top-[45px] -right-[70px] shrink-0 rounded-[20px] border-white border-[10px] xs:hidden">

                    <!-- vectors -->
                    <div class="et-about-vectors xs:hidden">
                        <img src="assets/img/about-img-vector-1.png" alt="vector" class="et-about-vector-1 absolute -left-[47px] top-[20px] -z-[1]">
                        <img src="assets/img/about-img-vector-2.png" alt="vector" class="et-about-vector-2 absolute -left-[27px] top-[41px] -z-[1]">
                        <img src="assets/img/about-img-vector-3.png" alt="vector" class="et-about-vector absolute -right-[24px] bottom-[34px] -z-[1]">
                    </div>

                    <!-- video btn -->
                    <div class="absolute bottom-[50px] -left-[47px] lg:-left-[27px] md:-left-[47px] w-[180px] lg:w-[160px] aspect-square bg-[url('../assets/img/about-video-btn-bg.jpg')] text-center text-[22px] text-white z-[1] flex items-center justify-center before:absolute before:bg-etBlue/80 before:-z-[1] before:inset-0 after:bg-etBlack after:w-[47px] after:h-[30px] after:absolute after:top-[100%] after:left-0 after:-z-[2] after:skew-y-[30deg] after:-translate-y-[17px]">
                        <a href="https://www.youtube.com/watch?v=AQleI8oFqZo&t=1s" data-fslightbox="about-video" class="w-[107px] aspect-square rounded-full border border-white/20 flex justify-center items-center text-etBlue relative z-[1] text-[18px] before:absolute before:w-[56px] before:h-[56px] before:bg-white before:rounded-full before:-z-[1] hover:text-black"><i class="fa-solid fa-play"></i></a>
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
                <div class="et-member group">
                    <div class="et-member__img rounded-[16px] overflow-hidden">
                        <img src="assets/img/team-member-1.jpg" alt="Team Member Image" class="w-full duration-[400ms] group-hover:scale-110">
                    </div>

                    <div class="et-member__txt bg-white relative z-[1] mx-[25px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] md:px-[15px] pb-[30px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">
                        <div class="et-member-socials absolute right-[20px] -top-[43px]">
                            <div class="et-speaker__socials flex flex-col gap-[8px] absolute -z-[2] text-[14px] opacity-0 transition duration-[400ms] bottom-[calc(100%+8px)] translate-y-[100%] group-hover:translate-y-0 group-hover:opacity-100">
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                            <div class="et-member-socials__icon w-[36px] aspect-square rounded-full bg-etBlue flex items-center justify-center">
                                <svg width="13" height="14" viewbox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.89361 9.41703C9.22284 9.41703 8.61849 9.70668 8.19906 10.1675L4.42637 7.83088C4.52995 7.56611 4.58305 7.28429 4.58294 6.99999C4.58307 6.71568 4.52997 6.43386 4.42637 6.16909L8.19906 3.83238C8.61851 4.29318 9.22284 4.58297 9.89361 4.58297C11.1572 4.58297 12.1851 3.55501 12.1851 2.29143C12.1851 1.02785 11.1572 0 9.89361 0C8.63005 0 7.60209 1.02796 7.60209 2.29154C7.60204 2.57583 7.65514 2.85763 7.75866 3.1224L3.98608 5.45903C3.56663 4.99824 2.96231 4.70845 2.29154 4.70845C1.02796 4.70845 0 5.73652 0 6.99999C0 8.26354 1.02796 9.29152 2.29154 9.29152C2.96228 9.29152 3.56666 9.00185 3.98608 8.54094L7.75869 10.8776C7.65515 11.1424 7.60204 11.4242 7.60209 11.7085C7.60209 12.972 8.63003 14 9.89361 14C11.1572 14 12.1851 12.972 12.1851 11.7086C12.1851 10.445 11.1572 9.41703 9.89361 9.41703ZM8.43766 2.29154C8.43766 1.48873 9.09082 0.835596 9.89361 0.835596C10.6964 0.835596 11.3495 1.48873 11.3495 2.29154C11.3495 3.09435 10.6964 3.74748 9.89361 3.74748C9.09079 3.74748 8.43766 3.09432 8.43766 2.29154ZM2.29154 8.45593C1.48862 8.45593 0.835487 7.80277 0.835487 6.99999C0.835487 6.1972 1.48862 5.54404 2.29154 5.54404C3.09435 5.54404 3.74737 6.1972 3.74737 6.99999C3.74737 7.80277 3.09432 8.45593 2.29154 8.45593ZM8.43766 11.7085C8.43766 10.9057 9.09082 10.2525 9.89361 10.2525C10.6964 10.2525 11.3495 10.9057 11.3495 11.7084C11.3495 12.5112 10.6964 13.1644 9.89361 13.1644C9.09079 13.1644 8.43766 12.5112 8.43766 11.7084V11.7085Z" fill="white"></path>
                                </svg>
                            </div>
                        </div>
                        <h5 class="font-semibold text-[22px] md:text-[20px] text-etBlack mb-[4px]"><a href="team-member-details.html" class="hover:text-etBlue">Darlene Robertson</a></h5>
                        <span class="text-etGray text-[16px]">Web Designer</span>
                    </div>
                </div>

                <!-- single team member -->
                <div class="et-member group">
                    <div class="et-member__img rounded-[16px] overflow-hidden">
                        <img src="assets/img/team-member-2.jpg" alt="Team Member Image" class="w-full duration-[400ms] group-hover:scale-110">
                    </div>

                    <div class="et-member__txt bg-white relative z-[1] mx-[25px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] md:px-[15px] pb-[30px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">
                        <div class="et-member-socials absolute right-[20px] -top-[43px]">
                            <div class="et-speaker__socials flex flex-col gap-[8px] absolute -z-[2] text-[14px] opacity-0 transition duration-[400ms] bottom-[calc(100%+8px)] translate-y-[100%] group-hover:translate-y-0 group-hover:opacity-100">
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                            <div class="et-member-socials__icon w-[36px] aspect-square rounded-full bg-etBlue flex items-center justify-center">
                                <svg width="13" height="14" viewbox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.89361 9.41703C9.22284 9.41703 8.61849 9.70668 8.19906 10.1675L4.42637 7.83088C4.52995 7.56611 4.58305 7.28429 4.58294 6.99999C4.58307 6.71568 4.52997 6.43386 4.42637 6.16909L8.19906 3.83238C8.61851 4.29318 9.22284 4.58297 9.89361 4.58297C11.1572 4.58297 12.1851 3.55501 12.1851 2.29143C12.1851 1.02785 11.1572 0 9.89361 0C8.63005 0 7.60209 1.02796 7.60209 2.29154C7.60204 2.57583 7.65514 2.85763 7.75866 3.1224L3.98608 5.45903C3.56663 4.99824 2.96231 4.70845 2.29154 4.70845C1.02796 4.70845 0 5.73652 0 6.99999C0 8.26354 1.02796 9.29152 2.29154 9.29152C2.96228 9.29152 3.56666 9.00185 3.98608 8.54094L7.75869 10.8776C7.65515 11.1424 7.60204 11.4242 7.60209 11.7085C7.60209 12.972 8.63003 14 9.89361 14C11.1572 14 12.1851 12.972 12.1851 11.7086C12.1851 10.445 11.1572 9.41703 9.89361 9.41703ZM8.43766 2.29154C8.43766 1.48873 9.09082 0.835596 9.89361 0.835596C10.6964 0.835596 11.3495 1.48873 11.3495 2.29154C11.3495 3.09435 10.6964 3.74748 9.89361 3.74748C9.09079 3.74748 8.43766 3.09432 8.43766 2.29154ZM2.29154 8.45593C1.48862 8.45593 0.835487 7.80277 0.835487 6.99999C0.835487 6.1972 1.48862 5.54404 2.29154 5.54404C3.09435 5.54404 3.74737 6.1972 3.74737 6.99999C3.74737 7.80277 3.09432 8.45593 2.29154 8.45593ZM8.43766 11.7085C8.43766 10.9057 9.09082 10.2525 9.89361 10.2525C10.6964 10.2525 11.3495 10.9057 11.3495 11.7084C11.3495 12.5112 10.6964 13.1644 9.89361 13.1644C9.09079 13.1644 8.43766 12.5112 8.43766 11.7084V11.7085Z" fill="white"></path>
                                </svg>
                            </div>
                        </div>
                        <h5 class="font-semibold text-[22px] md:text-[20px] text-etBlack mb-[4px]"><a href="team-member-details.html" class="hover:text-etBlue">Leslie Alexander</a></h5>
                        <span class="text-etGray text-[16px]">Nursing Assistant</span>
                    </div>
                </div>

                <!-- single team member -->
                <div class="et-member group">
                    <div class="et-member__img rounded-[16px] overflow-hidden">
                        <img src="assets/img/team-member-3.jpg" alt="Team Member Image" class="w-full duration-[400ms] group-hover:scale-110">
                    </div>

                    <div class="et-member__txt bg-white relative z-[1] mx-[25px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] md:px-[15px] pb-[30px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">
                        <div class="et-member-socials absolute right-[20px] -top-[43px]">
                            <div class="et-speaker__socials flex flex-col gap-[8px] absolute -z-[2] text-[14px] opacity-0 transition duration-[400ms] bottom-[calc(100%+8px)] translate-y-[100%] group-hover:translate-y-0 group-hover:opacity-100">
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#" class="border border-white text-white w-[36px] h-[36px] flex items-center justify-center rounded-full hover:border-etBlue hover:bg-etBlue"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                            <div class="et-member-socials__icon w-[36px] aspect-square rounded-full bg-etBlue flex items-center justify-center">
                                <svg width="13" height="14" viewbox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.89361 9.41703C9.22284 9.41703 8.61849 9.70668 8.19906 10.1675L4.42637 7.83088C4.52995 7.56611 4.58305 7.28429 4.58294 6.99999C4.58307 6.71568 4.52997 6.43386 4.42637 6.16909L8.19906 3.83238C8.61851 4.29318 9.22284 4.58297 9.89361 4.58297C11.1572 4.58297 12.1851 3.55501 12.1851 2.29143C12.1851 1.02785 11.1572 0 9.89361 0C8.63005 0 7.60209 1.02796 7.60209 2.29154C7.60204 2.57583 7.65514 2.85763 7.75866 3.1224L3.98608 5.45903C3.56663 4.99824 2.96231 4.70845 2.29154 4.70845C1.02796 4.70845 0 5.73652 0 6.99999C0 8.26354 1.02796 9.29152 2.29154 9.29152C2.96228 9.29152 3.56666 9.00185 3.98608 8.54094L7.75869 10.8776C7.65515 11.1424 7.60204 11.4242 7.60209 11.7085C7.60209 12.972 8.63003 14 9.89361 14C11.1572 14 12.1851 12.972 12.1851 11.7086C12.1851 10.445 11.1572 9.41703 9.89361 9.41703ZM8.43766 2.29154C8.43766 1.48873 9.09082 0.835596 9.89361 0.835596C10.6964 0.835596 11.3495 1.48873 11.3495 2.29154C11.3495 3.09435 10.6964 3.74748 9.89361 3.74748C9.09079 3.74748 8.43766 3.09432 8.43766 2.29154ZM2.29154 8.45593C1.48862 8.45593 0.835487 7.80277 0.835487 6.99999C0.835487 6.1972 1.48862 5.54404 2.29154 5.54404C3.09435 5.54404 3.74737 6.1972 3.74737 6.99999C3.74737 7.80277 3.09432 8.45593 2.29154 8.45593ZM8.43766 11.7085C8.43766 10.9057 9.09082 10.2525 9.89361 10.2525C10.6964 10.2525 11.3495 10.9057 11.3495 11.7084C11.3495 12.5112 10.6964 13.1644 9.89361 13.1644C9.09079 13.1644 8.43766 12.5112 8.43766 11.7084V11.7085Z" fill="white"></path>
                                </svg>
                            </div>
                        </div>
                        <h5 class="font-semibold text-[22px] md:text-[20px] text-etBlack mb-[4px]"><a href="team-member-details.html" class="hover:text-etBlue">Cameron Williamson</a></h5>
                        <span class="text-etGray text-[16px]">President of Sales</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TEAM SECTION END -->

</template>
<script setup>

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