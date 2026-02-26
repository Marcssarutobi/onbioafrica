<template>
    
    <!-- BANNER SECTION START -->
    <section class="et-banner relative bg-etBlue">
        <div class="et-banner-slider swiper">
            <div class="swiper-wrapper">
                <!-- single slide -->
                <div class="swiper-slide">
                    <div class="bg-no-repeat bg-cover bg-center pt-[clamp(150px,17.3vw,333px)] pb-[clamp(120px,22vw,422px)] text-white relative overflow-hidden z-[1] before:content-normal before:absolute before:inset-0 before:bg-etBlue/40 before:-z-[1]">

                        <!-- 🎥 VIDEO BACKGROUND -->
                        <video autoplay muted loop playsinline
                            class="absolute inset-0 w-full h-full object-cover -z-[2]">
                            <source src="assets/video/video.mp4" type="video/mp4">
                        </video>

                        <div class="mx-[15.5em] xxxl:mx-[10em] xxl:mx-[40px] xs:mx-[12px]">
                            <div class="flex md:flex-col items-center justify-between gap-x-[30px] gap-y-[30px] md:grid-cols-1">
                                <div class="left relative z-[20] w-[65%] md:w-full">
                                    <h6 class="font-kalam font-bold text-[2.4rem] mb-[3px] anim-text">OneBioAfrica Symposium</h6>

                                    <h1 class="text-[clamp(42px,6.25vw,12rem)] font-semibold leading-[1.1] mb-[36px] md:mb-[36px] anim-text">Strengthening One Health <span class="font-normal tracking-tighter"> Networks Through <br> Molecular Data</span></h1>

                                    <div class="et-banner-btns flex flex-wrap items-center gap-[20px]">
                                        <RouterLink to="/abouts" class="et-btn bg-etBlue inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-white font-normal text-[17px] rounded-full hover:!bg-white hover:!text-etBlue">Abouts us</RouterLink>

                                        <RouterLink to="/contact" class="et-btn bg-white inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-etBlue font-normal text-[17px] rounded-full">Contact us</RouterLink>
                                    </div>

                                    <!-- vectors -->
                                    <div class="et-banner-vectors">
                                        <div class="absolute left-[457px] bottom-[calc(100%+40px)]"><img src="assets/img/banner-vector.png" alt="vector" class="w-[45px] h-[45px]"></div>
                                        <div class="absolute bottom-0 right-[6px]"><img src="assets/img/banner-vector.png" alt="vector" class="w-[21px] h-[21px]"></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- bottom title -->
                        <span class="et-banner-bottom-title text-[clamp(30px,13vw,250px)] font-bold text-white/10 text-center block absolute bottom-[40px] left-0 w-full">OneBioAfrica </span>
                    </div>
                </div>
            </div>

            <div class="et-banner-slider-dots absolute flex flex-col right-[40px] xxs:right-[15px] !left-auto z-[1] !top-[50%] -translate-y-[50%] !w-auto"></div>
        </div>
    </section>
    <!-- BANNER SECTION END -->

    <!-- ABOUT SECTION START -->
    <section class="et-about pt-[40px] pb-[130px] xl:pb-[80px] md:pb-[60px] overflow-hidden relative" style="padding: 80px 0;">
        <div class="et-1-container">
            <div class="flex items-center md:flex-wrap gap-x-[60px] xxl:gap-x-[40px] lg:gap-x-[30px] gap-y-[40px] sm:gap-y-[40px] lg:justify-center">
                <!-- left -->
                <div class="et-about-img relative z-[1] md:w-auto shrink-0 max-w-full mr-[70px] md:mr-0 ml-[28px] xxxl:ml-[47px] md:ml-0 xs:w-[70%] xxs:w-[90%] xxs:ml-[47px]">
                    <img src="assets/img/about7.jpeg" alt="image" width="423" height="526" class="shrink-0 rounded-[10px]">
                    <img src="assets/img/aboutH.JPG.jpeg" width="201" height="241" alt="image" class="et-about-floating-img absolute top-[45px] -right-[70px] shrink-0 rounded-[20px] border-white border-[10px] xs:hidden">

                    <!-- vectors -->
                    <div class="et-about-vectors xs:hidden">
                        <img src="assets/img/about-img-vector-1.png" alt="vector" class="et-about-vector-1 absolute -left-[47px] top-[20px] -z-[1]">
                        <img src="assets/img/about-img-vector-2.png" alt="vector" class="et-about-vector-2 absolute -left-[27px] top-[41px] -z-[1]">
                        <img src="assets/img/about-img-vector-3.png" alt="vector" class="et-about-vector absolute -right-[24px] bottom-[34px] -z-[1]">
                    </div>

                    
                </div>

                <!-- right -->
                <div class="et-about__txt" >
                    <h6 class="et-section-sub-title anim-text">About The Symposium</h6>
                    <h2 class="et-section-title mb-[24px] md:mb-[19px] anim-text">Advancing One Health Through Molecular Science in Africa</h2>

                    <p class="mb-[30px] text-[16px] font-light text-etGray md:mb-[30px] rev-slide-up" style='text-align:justify;'>
                        OneBioAfrica is a regional scientific symposium dedicated to strengthening One Health networks across Africa through molecular biology, genomics, and bioinformatics. As emerging infectious diseases, antimicrobial resistance, biodiversity loss, and ecosystem disruptions continue to rise, the need for integrated, data-driven approaches has never been greater. This symposium brings together molecular biologists, medical and veterinary researchers, ecologists, bioinformaticians, and policymakers to foster interdisciplinary collaboration and data sharing.
                    </p>

                    <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[16px] rev-slide-up">
                        <RouterLink to="/abouts" class="et-btn bg-white inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-etBlue font-normal text-[17px] rounded-full">View More</RouterLink>
                        <RouterLink to="/guest" class="et-btn bg-etBlue inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-white font-normal text-[17px] rounded-full hover:!bg-black hover:!text-white">Guest Registration</RouterLink>
                    </div>
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

    <!-- COUNTDOWN SECTION START -->
    <div class="et-1-container rev-slide-up relative z-[2]">
        <div class="bg-etBlue relative z-[1] p-[60px] sm:p-[40px] xs:px-[20px] rounded-[20px] overflow-hidden -mb-[114px] shadow-[0_4px_50px_rgba(18,96,254,0.2)] after:absolute after:inset-0 after:-z-[1] after:bg-[url(../assets/img/et-counter-bg.jpg)] after:bg-cover after:bg-no-repeat after:mix-blend-screen flex items-center md:flex-wrap gap-y-[20px]">
            <div class="pr-[54px] border-r md:border-r-0 border-white/20 md:text-center md:pr-0 md:w-full">
                <h2 class="et-section-title !text-white mb-[28px] anim-text">Advancing One Health Through Molecular Science</h2>
                <RouterLink to="/abstract" class="et-btn bg-etBlue inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-white font-normal text-[17px] rounded-full border-white border hover:!bg-white hover:!text-etBlue">Submit Abstract</RouterLink>
            </div>

            <!-- counter -->
            <div class="et-countdown flex sm:flex-wrap justify-center gap-y-[10px] md:w-full *:border-r *:sm:border-r-0 *:border-white/20 *:px-[46px] *:sm:px-[26px] *:xs:px-[16px] font-medium text-white text-[16px] text-center">
                <div class="last:pr-0 last:md:pr-[30px] last:xs:pr-[20px] last:border-r-0">
                    <span class="days number block"></span>
                    <span>Days</span>
                </div>

                <div class="last:pr-0 last:md:pr-[30px] last:xs:pr-[20px] last:border-r-0">
                    <span class="hours number block"></span>
                    <span>Hours</span>
                </div>

                <div class="last:pr-0 last:md:pr-[30px] last:xs:pr-[20px] last:border-r-0">
                    <span class="minutes number block"></span>
                    <span>Minutes</span>
                </div>

                <div class="last:pr-0 last:md:pr-[30px] last:xs:pr-[20px] last:border-r-0">
                    <span class="seconds number block"></span>
                    <span>Seconds</span>
                </div>
            </div>

            <!-- vectors -->
            <div class="sm:hidden">
                <img src="assets/img/counter-vector.png" alt="vector" class="pointer-events-none absolute top-[26px] left-[53%]">
                <img src="assets/img/counter-vector.png" alt="vector" class="pointer-events-none absolute bottom-[33px] right-[90px]">
            </div>
        </div>
    </div>
    <!-- COUNTDOWN SECTION END -->

    <!-- FEATURES SECTION STAR -->
    <div class="bg-[#EEF4FF] relative z-[1] after:absolute after:inset-0 after:bg-[url(../assets/img/features-bg.png)] after:bg-no-repeat after:bg-cover after:-z-[2] after:mix-blend-multiply after:pointer-events-none pb-[130px] xl:pb-[80px] md:pb-[60px] pt-[244px] xl:pt-[194px] md:pt-[174px]">
        <div class="et-1-container rev-slide-up">
            <!-- heading -->
            <div class="text-center mb-[52px]">
                <h6 class="et-section-sub-title anim-text">Why Attend</h6>
                <h2 class="et-section-title anim-text">Unifying For A Better Africa</h2>
            </div>

            <!-- cards -->
            <div class="grid grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">
                <!-- single card -->
                <div class="rounded-[20px] bg-white overflow-hidden group">
                    <!-- icon -->
                    <div class="w-[146px] aspect-square border-[20px] bg-etBlue border-[#EDF3FE] rounded-full rounded-tr-none ml-auto flex items-center justify-center">
                        <i class="fa-light fa-user-group transition duration-[0.4s] group-hover:-scale-x-100" style="font-size:40px; color:#fff;"></i>
                    </div>

                    <!-- text -->
                    <div class="px-[30px] xxl:px-[20px] py-[23px] xxl:py-[18px]">
                        <h5 class="font-medium text-[22px] text-etBlack mb-[8px]"><a href="#" class="hover:text-etBlue">Expert Network</a></h5>
                        <p class="font-light text-etGray text-[16px]">Engage with leading African and international experts across One Health discipline</p>
                    </div>
                </div>

                <!-- single card -->
                <div class="rounded-[20px] bg-white overflow-hidden group">
                    <!-- icon -->
                    <div class="w-[146px] aspect-square border-[20px] bg-etBlue border-[#EDF3FE] rounded-full rounded-tr-none ml-auto flex items-center justify-center">
                        <i class="fa-light fa-atom transition duration-[0.4s] group-hover:-scale-x-100" style="font-size:40px; color:#fff;"></i>
                    </div>

                    <!-- text -->
                    <div class="px-[30px] xxl:px-[20px] py-[23px] xxl:py-[18px]">
                        <h5 class="font-medium text-[22px] text-etBlack mb-[8px]"><a href="#" class="hover:text-etBlue">Scientific advances</a></h5>
                        <p class="font-light text-etGray text-[16px]">Discover advances in molecular biology, genomics, and bioinformatics</p>
                    </div>
                </div>

                <!-- single card -->
                <div class="rounded-[20px] bg-white overflow-hidden group">
                    <!-- icon -->
                    <div class="w-[146px] aspect-square border-[20px] bg-etBlue border-[#EDF3FE] rounded-full rounded-tr-none ml-auto flex items-center justify-center">
                        <i class="fa-light fa-database transition duration-[0.4s] group-hover:-scale-x-100" style="font-size:40px; color:#fff;"></i>
                    </div>

                    <!-- text -->
                    <div class="px-[30px] xxl:px-[20px] py-[23px] xxl:py-[18px]">
                        <h5 class="font-medium text-[22px] text-etBlack mb-[8px]"><a href="#" class="hover:text-etBlue">Innovative Tools</a></h5>
                        <p class="font-light text-etGray text-[16px]">Explore tools for pathogen surveillance, biodiversity monitoring, and data sharing</p>
                    </div>
                </div>

                <!-- single card -->
                <div class="rounded-[20px] bg-white overflow-hidden group">
                    <!-- icon -->
                    <div class="w-[146px] aspect-square border-[20px] bg-etBlue border-[#EDF3FE] rounded-full rounded-tr-none ml-auto flex items-center justify-center">
                        <i class="fa-light fa-comments transition duration-[0.4s] group-hover:-scale-x-100" style="font-size:40px; color:#fff;"></i>
                    </div>

                    <!-- text -->
                    <div class="px-[30px] xxl:px-[20px] py-[23px] xxl:py-[18px]">
                        <h5 class="font-medium text-[22px] text-etBlack mb-[8px]"><a href="#" class="hover:text-etBlue">Partnerships</a></h5>
                        <p class="font-light text-etGray text-[16px]">Build partnerships with scientists, policymakers, and global health leaders</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- vectors -->
        <div class="md:hidden">
            <img src="assets/img/features-vector-1.png" alt="vector" class="pointer-events-none absolute bottom-[130px] left-[40px] -z-[1]">
            <img src="assets/img/features-vector-2.png" alt="vector" class="pointer-events-none absolute top-[222px] right-[180px] -z-[1]">
            <img src="assets/img/features-vector-3.png" alt="vector" class="pointer-events-none absolute bottom-[138px] right-[106px] -z-[1]">
        </div>
    </div>
    <!-- FEATURES SECTION end -->

    <!-- STATS SECTION START -->
    <section class="text-center py-[130px] xl:py-[80px] md:py-[60px] bg-[url(../assets/img/stats-bg.jpg)] bg-no-repeat bg-cover relative z-[1] before:absolute before:inset-0 before:bg-etBlue/85 before:-z-[1]">
        <div class="et-1-container rev-slide-up">
            <div class="flex xs:flex-col gap-x-[77px] sm:gap-x-[57px] gap-y-[15px] justify-center border-b border-white/20 pb-[35px]">
                <!-- single stat -->
                <div class="et-single-stat text-white">
                    <h5 class="number font-semibold text-[55px]">80-100</h5>
                    <h6 class="font-medium text-[16px]">Expected Participants</h6>
                </div>
                <!-- single stat -->
                <div class="et-single-stat text-white">
                    <h5 class="number font-semibold text-[55px]">15+</h5>
                    <h6 class="font-medium text-[16px]">Countries Represented</h6>
                </div>
                <!-- single stat -->
                <div class="et-single-stat text-white">
                    <h5 class="number font-semibold text-[55px]">60+</h5>
                    <h6 class="font-medium text-[16px]">Oral Presentations</h6>
                </div>

                <div class="et-single-stat text-white">
                    <h5 class="number font-semibold text-[55px]">4</h5>
                    <h6 class="font-medium text-[16px]">Day Symposium</h6>
                </div>
            </div>

            <h2 class="et-section-title anim-text !text-white text-center max-w-[55%] md:max-w-[65%] sm:max-w-full mx-auto mt-[30px] mb-[40px]">Share your research with the OneBioAfrica community</h2>

            <RouterLink to="/abstract" class="bg-white inline-flex items-center gap-[12px] rounded-full text-etBlue h-[54px] px-[15px] text-[17px] group hover:bg-etBlue hover:text-white">
                <span class="icon">
                    <svg width="18" height="20" viewbox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1023 17.6473C13.0496 17.6473 12.9979 17.6511 12.9471 17.6578C12.4966 16.1361 11.1883 14.9794 9.5848 14.7503V13.6641H8.41524V14.7503C6.81011 14.9796 5.50077 16.1384 5.05156 17.6624C4.99031 17.6526 4.92753 17.6473 4.86351 17.6473C4.21347 17.6473 3.68652 18.1742 3.68652 18.8242C3.68652 19.4742 4.21347 20.0012 4.86351 20.0012C5.4544 20.0012 5.94345 19.5657 6.0276 18.9982C6.04471 18.9433 6.05393 18.8848 6.05393 18.8242C6.05393 17.3999 7.06993 16.2086 8.41524 15.9366V17.791C8.04998 17.9908 7.80223 18.3786 7.80223 18.8242C7.80223 19.4742 8.32918 20.0012 8.97918 20.0012C9.62922 20.0012 10.1562 19.4742 10.1562 18.8242C10.1562 18.3957 9.92708 18.0208 9.5848 17.815V15.9366C10.8716 16.1968 11.8565 17.2982 11.9398 18.6401C11.9303 18.7001 11.9253 18.7616 11.9253 18.8243C11.9253 19.4743 12.4523 20.0012 13.1023 20.0012C13.7523 20.0012 14.2793 19.4743 14.2793 18.8243C14.2793 18.1743 13.7523 17.6473 13.1023 17.6473Z" class="fill-etBlue group-hover:fill-white transition duration-[0.4s]"></path>
                        <path d="M17.2036 6.2168H15.6151C15.2921 6.2168 15.0303 6.47861 15.0303 6.8016V8.5676C15.0303 9.11044 14.5882 9.55211 14.0447 9.55211H13.9074C13.9062 9.55211 13.9051 9.55227 13.904 9.55227V9.55211H4.09592V9.55227C4.09478 9.55227 4.09365 9.55211 4.09252 9.55211H4.07443C3.53096 9.55211 3.08883 9.11044 3.08883 8.5676V6.8016C3.08883 6.47861 2.82701 6.2168 2.50403 6.2168H0.796348C0.47336 6.2168 0.211548 6.47861 0.211548 6.8016C0.211548 7.12458 0.47336 7.3864 0.796348 7.3864H1.91927V8.5676C1.91927 9.75536 2.88608 10.7217 4.07443 10.7217H4.09252C4.09369 10.7217 4.09478 10.7216 4.09592 10.7216V10.9282C4.09592 11.7911 4.79553 12.4908 5.65851 12.4908H12.3414C13.2044 12.4908 13.904 11.7911 13.904 10.9282V10.7216C13.9051 10.7216 13.9063 10.7217 13.9074 10.7217H14.0447C15.2331 10.7217 16.1999 9.7554 16.1999 8.5676V7.3864H17.2036C17.5265 7.3864 17.7884 7.12458 17.7884 6.8016C17.7884 6.47865 17.5265 6.2168 17.2036 6.2168Z" class="fill-etBlue group-hover:fill-white transition duration-[0.4s]"></path>
                        <path d="M13.1157 2.14739C13.1157 0.963338 12.1524 0 10.9683 0H7.03167C5.84758 0 4.88428 0.963299 4.88428 2.14739V8.38037H13.1157V2.14739Z" class="fill-etBlue group-hover:fill-white transition duration-[0.4s]"></path>
                    </svg>
                </span>
                <span>Submit Abstract</span>
            </RouterLink>
        </div>

        <!-- vectors -->
        <div>
            <img src="assets/img/stats-vector-1.png" alt="vector" class="pointer-events-none absolute top-[150px] left-[105px] -z-[1] md:hidden">
            <img src="assets/img/stats-vector-2.png" alt="vector" class="pointer-events-none absolute bottom-[63px] left-[63px] -z-[1] w-[80px] aspect-square opacity-10">
            <img src="assets/img/stats-vector-2.png" alt="vector" class="pointer-events-none absolute top-[80px] right-[70px] -z-[1] opacity-10">
            <img src="assets/img/stats-vector-3.png" alt="vector" class="pointer-events-none absolute bottom-[112px] right-[80px] -z-[1]">
        </div>
    </section>
    <!-- STATS SECTION END -->

    <!-- EVENT SCHEDULE SECTION START -->
    <section class="et-schedules py-[130px] xl:py-[80px] md:py-[60px]" v-if="allprograms.length > 0">
        <div class="et-1-container rev-slide-up">
            <!-- heading -->
            <div class="et-schedule-heading flex sm:flex-col justify-between items-center pb-[31px] mb-[40px] gap-[15px] border-b border-[#D9D9D9]">
                <div class="left xs:text-center max-w-[50%] sm:max-w-full">
                    <h6 class="et-section-sub-title anim-text">Event Timetable</h6>
                    <h2 class="et-section-title anim-text">Information Of Event Schedule</h2>
                </div>

                <div class="right">
                    <div class="et-schedules-tab-navs bg-[#EDF3FE] px-[12px] py-[14px] flex flex-w gap-[16px] sm:gap-[12px] rounded-full">
                        <button v-for="(program,index) in allprograms" :key="index" :data-tab="`tab${index+1}`" class="tab-nav bg-etBlack rounded-full px-[20px] py-[3px] text-[16px] font-medium text-white hover:bg-etBlue " :class="index === 0 ? 'active' : ''">{{ program.day }}</button>
                    </div>
                </div>
            </div>

            <!-- events -->
            <div class="et-schedules-tab-container">
                <div v-for="(program,index) in allprograms" :key="index" :id="`tab${index+1}`" :class="['et-tab', index === 0 ? 'active' : '']">
                    <div class="all-scheduled-events space-y-[30px]">
                        <!-- single schedule -->
                        <div v-for="(data,index) in program.programs" :key="index" class="et-schedule flex md:flex-wrap gap-x-[30px] gap-y-[20px] justify-between rev-slide-up" style="margin-bottom: 15px;">
                            <!-- img -->
                            <div class="w-[270px] h-[226px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] shrink-0 rounded-[20px] overflow-hidden images"><img :src="`/storage/${data.photo}`" alt="scehduled-event-cover"></div>

                            <!-- text -->
                            <div class="px-[37px] sm:px-[22px] py-[30px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] w-full rounded-[20px] flex gap-y-[15px] xs:flex-col items-center xs:items-start">
                                <div class="et-schedule__heading pr-[40px] sm:pr-[25px] xs:pr-0 mr-[40px] sm:mr-[25px] xs:mr-0 border-r xs:border-r-0 border-[#d9d9d9]">
                                    <!-- date & time -->
                                    <div class="et-schedule-date-time border border-[rgba(217,217,217,0.89)] py-[7px] px-[15px] rounded-full inline-flex xxs:w-full items-center justify-center gap-x-[24px] gap-y-[10px] mb-[10px] xxs:border-0 xxs:p-0 xxs:justify-start">
                                        <div class="date flex items-center gap-[10px]">
                                            <span class="icon">
                                                <svg width="16" height="17" viewbox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2043_1443)">
                                                        <path d="M14.125 1.75H13.375V0.5H12.125V1.75H3.875V0.5H2.625V1.75H1.875C0.841125 1.75 0 2.59113 0 3.625V14.625C0 15.6589 0.841125 16.5 1.875 16.5H14.125C15.1589 16.5 16 15.6589 16 14.625V3.625C16 2.59113 15.1589 1.75 14.125 1.75ZM14.75 14.625C14.75 14.9696 14.4696 15.25 14.125 15.25H1.875C1.53038 15.25 1.25 14.9696 1.25 14.625V6.375H14.75V14.625ZM14.75 5.125H1.25V3.625C1.25 3.28038 1.53038 3 1.875 3H2.625V4.25H3.875V3H12.125V4.25H13.375V3H14.125C14.4696 3 14.75 3.28038 14.75 3.625V5.125Z" fill="var(--et-blue)"></path>
                                                        <path d="M3.625 7.6875H2.375V8.9375H3.625V7.6875Z" fill="var(--et-blue)"></path>
                                                        <path d="M6.125 7.6875H4.875V8.9375H6.125V7.6875Z" fill="var(--et-blue)"></path>
                                                        <path d="M8.625 7.6875H7.375V8.9375H8.625V7.6875Z" fill="var(--et-blue)"></path>
                                                        <path d="M11.125 7.6875H9.875V8.9375H11.125V7.6875Z" fill="var(--et-blue)"></path>
                                                        <path d="M13.625 7.6875H12.375V8.9375H13.625V7.6875Z" fill="var(--et-blue)"></path>
                                                        <path d="M3.625 10.1875H2.375V11.4375H3.625V10.1875Z" fill="var(--et-blue)"></path>
                                                        <path d="M6.125 10.1875H4.875V11.4375H6.125V10.1875Z" fill="var(--et-blue)"></path>
                                                        <path d="M8.625 10.1875H7.375V11.4375H8.625V10.1875Z" fill="var(--et-blue)"></path>
                                                        <path d="M11.125 10.1875H9.875V11.4375H11.125V10.1875Z" fill="var(--et-blue)"></path>
                                                        <path d="M3.625 12.6875H2.375V13.9375H3.625V12.6875Z" fill="var(--et-blue)"></path>
                                                        <path d="M6.125 12.6875H4.875V13.9375H6.125V12.6875Z" fill="var(--et-blue)"></path>
                                                        <path d="M8.625 12.6875H7.375V13.9375H8.625V12.6875Z" fill="var(--et-blue)"></path>
                                                        <path d="M11.125 12.6875H9.875V13.9375H11.125V12.6875Z" fill="var(--et-blue)"></path>
                                                        <path d="M13.625 10.1875H12.375V11.4375H13.625V10.1875Z" fill="var(--et-blue)"></path>
                                                    </g>
                                                </svg>
                                            </span>

                                            <span class="text-etGray font-normal text-[16px]">{{ formatDate(data.date) }}</span>
                                        </div>

                                        <div class="time flex items-center gap-[10px] xxs:hidden">
                                            <span class="icon">
                                                <svg width="16" height="17" viewbox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.8505 9.91291L8.61967 8.23979V4.8316C8.61967 4.48891 8.34266 4.21191 7.99998 4.21191C7.65729 4.21191 7.38029 4.48891 7.38029 4.8316V8.54966C7.38029 8.74485 7.47201 8.92892 7.62817 9.04541L10.1069 10.9044C10.2138 10.985 10.3441 11.0285 10.478 11.0284C10.667 11.0284 10.8529 10.9435 10.9744 10.7799C11.1802 10.5066 11.1244 10.118 10.8505 9.91291Z" fill="var(--et-blue)"></path>
                                                    <path d="M8 0.5C3.58853 0.5 0 4.08853 0 8.5C0 12.9115 3.58853 16.5 8 16.5C12.4115 16.5 16 12.9115 16 8.5C16 4.08853 12.4115 0.5 8 0.5ZM8 15.2607C4.27266 15.2607 1.23934 12.2273 1.23934 8.5C1.23934 4.77266 4.27266 1.73934 8 1.73934C11.728 1.73934 14.7607 4.77266 14.7607 8.5C14.7607 12.2273 11.7273 15.2607 8 15.2607Z" fill="var(--et-blue)"></path>
                                                </svg>
                                            </span>

                                            <span class="text-etGray font-normal text-[16px]">{{ data.start_time }} – {{ data.end_time }}</span>
                                        </div>
                                    </div>

                                    <!-- title -->
                                    <h3 class="et-schedule-title text-[24px] sm:text-[22px] font-regular text-etBlack leading-[1.25] mb-[16px] anim-text"><a href="#" class="hover:text-etBlue">{{ data.session_title }}</a></h3>

                                    <!-- location -->
                                    <div class="et-schedule-loaction flex items-center gap-[12px]">
                                        <span class="icon">
                                            <svg width="12" height="16" viewbox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.99998 0C2.80482 0 0.205383 2.59944 0.205383 5.79456C0.205383 9.75981 5.39098 15.581 5.61176 15.8269C5.81913 16.0579 6.1812 16.0575 6.3882 15.8269C6.60898 15.581 11.7946 9.75981 11.7946 5.79456C11.7945 2.59944 9.1951 0 5.99998 0ZM5.99998 8.70997C4.39241 8.70997 3.0846 7.40212 3.0846 5.79456C3.0846 4.187 4.39245 2.87919 5.99998 2.87919C7.60751 2.87919 8.91532 4.18703 8.91532 5.79459C8.91532 7.40216 7.60751 8.70997 5.99998 8.70997Z" fill="var(--et-blue)"></path>
                                            </svg>
                                        </span>
                                        <h6 class="text-[16px] text-etGray">{{ data.location }}</h6>
                                    </div>
                                </div>

                                <div class="flex shrink-0 xxl:flex-col flex-wrap items-center xxl:items-start gap-x-[30px] gap-y-[16px]">
                                    <RouterLink to="/guest" class="et-btn border border-etBlue text-etBlue inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] font-normal text-[17px] rounded-full hover:!bg-etBlue hover:!text-white">Getting to the event</RouterLink>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- EVENT SCHEDULE SECTION END -->

    

    <!-- SPEAKERS SECTION START -->
    <section class="et-speakers py-[130px] lg:py-[80px] md:py-[60px] relative overflow-hidden" style="padding: 70px 0 !important;" v-if="allspeaker.length > 0">
        <div class="et-1-container relative z-[1] rev-slide-up">
            <!-- heading -->
            <div class="et-speakers-heading flex xs:flex-col justify-between items-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                <div class="left xs:text-center">
                    <h6 class="et-section-sub-title anim-text">Event Speakers</h6>
                    <h2 class="et-section-title anim-text">Meet Our Speakers</h2>
                </div>

                <div class="right">
                    <div class="et-speakers-slider-nav flex gap-[16px] sm:gap-[12px]">
                        <button class="prev border border-[#D9D9D9] rounded-full w-[60px] sm:w-[50px] h-[60px] sm:h-[50px] text-[18px] text-etBlack hover:bg-etBlue hover:border-etbg-etBlue hover:text-white">
                            <i class="fa-solid fa-arrow-left-long"></i>
                        </button>
                        <button class="next border border-[#D9D9D9] rounded-full w-[60px] sm:w-[50px] h-[60px] sm:h-[50px] text-[18px] text-etBlack hover:bg-etBlue hover:border-etbg-etBlue hover:text-white">
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- slider -->
            <div class="et-speakers-slider swiper">
                <div class="swiper-wrapper">
                    <!-- single speaker -->
                    <div class="swiper-slide" v-for="(speaker,index) in allspeaker" :key="index">
                        <div class="et-member group">
                            <div class="et-member__img rounded-[16px] overflow-hidden">
                                <img :src="`/storage/${speaker.photo}`" alt="Team Member Image" class="w-full duration-[400ms] group-hover:scale-110">
                            </div>

                            <div class="et-member__txt bg-white relative z-[1] mx-[25px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] md:px-[15px] pb-[30px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">
                                
                                <h5 class="font-semibold text-[22px] md:text-[20px] text-etBlack mb-[4px]"><RouterLink :to="'/singleSpeaker/'+speaker.id" class="hover:text-etBlue">{{ speaker.firstname }} {{ speaker.lastname }}</RouterLink></h5>
                                <span class="text-etGray text-[16px]">{{ speaker.affiliation }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SPEAKERS SECTION END -->

    <!-- SPONSORS & CTA SECTION START -->
    <section class="et-cta py-[130px] lg:py-[80px] md:py-[60px] relative z-[1]" style="padding: 50px 0 !important;" >
        <div class="et-1-container">
            <!-- sponsors -->
            <div class="flex items-center md:flex-col gap-x-[42px] gap-y-[25px] border border-[#D9D9D9] rounded-[20px] py-[30px] xxs:py-[20px] px-[34px] xxs:px-[16px] mb-[130px] lg:mb-[80px] md:mb-[60px]">
                <!-- left -->
                <div class="flex xxs:flex-wrap items-end gap-[40px] xxs:gap-x-[10px] gap-y-[10px] pr-[42px] md:pr-0 border-r md:border-r-0 border-[#D9D9D9] max-w-[230px] md:max-w-full shrink-0" v-if="allsponsors.length > 0">
                    <h5 class="font-medium text-[20px] text-etBlack anim-text">Our Sponsors</h5>
                    <a href="#" class="inline-block mb-[8px] group">
                        <svg width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 13.4121L11.1668 2.24543H3.87542V0H15V11.1246H12.7546V3.8332L1.58789 15L0 13.4121Z" class="fill-etBlue group-hover:fill-etBlack transition duration-[400ms]"></path>
                        </svg>
                    </a>
                </div>

                <!-- right -->
                <div class="flex flex-wrap items-center justify-between md:justify-center gap-[30px] md:gap-[50px] w-full xxs:*:w-[40%]">
                    <!-- single sponsor -->
                    <a v-for="(sps,index) in allsponsors" :key="index" href="#" class="group">
                        <img :src="'/storage/'+sps.logo" width="80" height="60" alt="sponsor image">
                    </a>
                </div>
            </div>

            <!-- cta -->
            <div class="grid grid-cols-2 sm:grid-cols-1 gap-[30px]">
                <!-- venue map -->
                <div class="bg-[#EEF4FF] p-[40px] lg:p-[30px] xs:px-[20px] xs:pb-0 pb-0 lg:pb-0 rounded-[20px] overflow-hidden relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/cta-bg-1.jpg')] before:bg-cover before:bg-no-repeat before:bg-center before:-z-[1] before:mix-blend-multiply">
                    <div class="mb-[22px]">
                        <h6 class="et-section-sub-title anim-text">Venue Location</h6>
                        <h2 class="et-section-title anim-text">Find Your Way to the Event Venue</h2>
                    </div>

                    <div class="relative">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7299.7865598218705!2d90.41595849268677!3d23.822393686713387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7305eea2015%3A0x8805755fb04e861c!2sKuril%20Flyover!5e0!3m2!1sen!2sbd!4v1713418656214!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-[303px] rounded-tl-[20px] rounded-tr-[20px]"></iframe>

                        <div class="absolute inset-[40px] top-auto flex rounded-[20px] overflow-hidden bg-white xxs:flex-col">
                            <img src="assets/img/cta-venue-img.jpg" alt="venue image" class="shrink-0 w-[50%] xxs:w-full">
                            <div class="flex items-center justify-center w-full">
                                <a href="#" class="bg-etBlue rounded-full text-white h-[45px] px-[15px] text-[17px] my-[10px] flex items-center justify-center hover:bg-white hover:text-etBlue">Get Direction</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- join card -->
                <div class="bg-etBlue p-[40px] lg:p-[30px] xs:px-[20px] xs:pb-0 pb-0 lg:pb-0 rounded-[20px] overflow-hidden relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/cta-bg-2.jpg')] before:bg-cover before:bg-no-repeat before:bg-center before:-z-[1] before:opacity-30 before:mix-blend-overlay">
                    <div class="mb-[34px]">
                        <h6 class="et-section-sub-title !text-white before:!bg-white anim-text">Travel Grant Application</h6>
                        <h2 class="et-section-title !text-white mb-[18px] anim-text">Apply for Travel Support</h2>
                        <p class="text-[16px] text-white font-light mb-[25px]"> The Travel Grant program is designed to support participants who require financial assistance to attend the event. Eligible applicants are encouraged to submit their request by completing the application form. Grants are awarded based on eligibility criteria and availability of funds.</p>
                        <RouterLink to="/travel-grant" class="bg-etBlue border border-white rounded-full h-[45px] px-[15px] text-[17px] text-white inline-flex items-center justify-center hover:bg-white hover:text-etBlue">Apply for Travel Grant</RouterLink>
                    </div>

                    <div class="rounded-tl-[20px] rounded-tr-[20px] overflow-hidden">
                        <img src="assets/img/cta-img.jpg" alt="Image">
                    </div>
                </div>
            </div>
        </div>

        <!-- vectors -->
        <div class="xs:hidden">
            <img src="assets/img/features-vector-1.png" alt="vector" class="pointer-events-none absolute top-[372px] left-[40px] -z-[1]">
            <img src="assets/img/features-vector-3.png" alt="vector" class="pointer-events-none absolute bottom-[207px] right-[106px] -z-[1]">
        </div>
    </section>
    <!-- SPONSORS & CTA SECTION END -->

    

</template>
<script setup>

    import { useRoute } from 'vue-router';
    import Swal from 'sweetalert2';
    import { postData } from '../../plugins/api';
    import { onMounted, ref } from 'vue';
    import { getData } from '../../plugins/api';
    import { Main } from '../../plugins/main';
    import { markAbstractDataAsInvited, markAbstractDataAsPaid, singleAbstractData } from '../../adminPages/api/abstract';

    const route = useRoute()

    const id = route.query.id
    const action = route.query.action

    const allprograms = ref([])
    const allspeaker = ref([])
    const activeIndex = ref(0)
    const allsponsors = ref([])

    async function PaiementRequestService(){
        if (route.query.id && route.query.action === 'paiement') {

            Swal.fire({
                title: 'Check is in progress...',
                text: 'Please wait',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })

            const data = await singleAbstractData(id)

            if(data.ispaid === 'pending'){
                FedaPay.init({
                    public_key: 'pk_sandbox_5OnNHVYU_bEh8gKO4RpLXF2F',
                    transaction: {
                        amount: 100000,
                        description: "Abstract Payment",
                    },
                    customer: {
                        email: data.email,
                        lastname: data.nom,
                        firstname: data.prenom,
                    },
                    onComplete: (response)=>{
                        if (response.transaction.id) {
                            Swal.fire({
                                title: 'Check is in progress...',
                                text: 'Please wait',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                didOpen: () => {
                                    Swal.showLoading()
                                }
                            })
                            verifierPaiement(response.transaction.id)
                        }
                    }
                }).open()
            }else{
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: 'info',
                    title: 'Payment already processed',
                    showConfirmButton: false,
                    timer: 4000
                });
                window.location.href = '/'
            }

            
        }
    }

    async function verifierPaiement(transactionId){
        try {
            await postData('/verifier-paiement',{
                transaction_id: transactionId
            }).then(async(res)=>{
                if (res.data.status === 'approved') {
                    await markAbstractDataAsPaid(route.query.id)
                    await markAbstractDataAsInvited(route.query.id)
                    Swal.fire({
                        icon: 'success',
                        text: 'Payment confirmed',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.location.href = '/'
                }else{
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: 'error',
                        title: 'Payment not confirmed',
                        showConfirmButton: false,
                        timer: 4000
                    });
                }
            })
        } catch (e) {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: 'error',
                title: 'Erreur de vérification du paiement',
                showConfirmButton: false,
                timer: 4000
            });
        }
    }

    const countdown = () => {
        const eventDate = new Date("2026-06-13T09:00:00").getTime();
        const now = new Date().getTime();
        const distance = eventDate - now;

        if (distance < 0) {
            document.querySelector(".et-countdown").innerHTML =
                "<span class='text-white text-lg'>The event has started</span>";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.querySelector(".days").textContent = days;
        document.querySelector(".hours").textContent = hours;
        document.querySelector(".minutes").textContent = minutes;
        document.querySelector(".seconds").textContent = seconds;
    };

    async function AllProgramFunction() {
        await getData('/programbyday').then(res=>{
            allprograms.value = res.data.data
            setTimeout(()=>{
                Main()
            },0)
        })
    }

    const formatDate = (dateStr) => {
        return new Date(dateStr).toLocaleDateString('en-GB', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        })
    }

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

    async function AllSponsorsFunction(){
        await getData('/allsponsor').then(res=>{
            if (res.status === 200) {
                allsponsors.value = res.data.data
                setTimeout(()=>{
                    Main()
                },0)
            }
        })
    }



    onMounted(() => {
        PaiementRequestService()
        countdown();
        setInterval(countdown, 1000);
        AllProgramFunction()
        AllSpeakerFunction()
        AllSponsorsFunction()
    })

</script>
<style scoped>

.images{
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.images img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
    
</style>