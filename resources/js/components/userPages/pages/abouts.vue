<template lang="html">
    
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
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
    <section class="et-about py-[130px] xl:py-[80px] md:py-[60px] overflow-hidden relative">
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
                    <h6 class="et-section-sub-title anim-text">About Eventek</h6>
                    <h2 class="et-section-title mb-[24px] md:mb-[19px] anim-text">Know More About The Eventek </h2>

                    <p class="mb-[30px] text-[16px] font-light text-etGray md:mb-[30px] rev-slide-up">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                    </p>

                    <div class="flex xxs:flex-wrap items-center gap-[20px] pt-[30px] border-t border-[#D9D9D9] mb-[50px] xxs:mb-[30px] rev-slide-up">
                        <div class="shrink-0 h-[80px] w-[80px] rounded-[6px] shadow-[0_4px_50px_10px_rgba(18,96,254,0.10)] flex items-center justify-center">
                            <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_6038_295)">
                                    <path d="M35.4168 33.3346H28.4501C27.7601 33.3346 27.2001 32.7746 27.2001 32.0846C27.2001 31.3946 27.7601 30.8346 28.4501 30.8346H34.5401L36.9651 24.168H3.03343L5.45843 30.8346H11.5501C12.2401 30.8346 12.8001 31.3946 12.8001 32.0846C12.8001 32.7746 12.2401 33.3346 11.5501 33.3346H4.58343C4.05843 33.3346 3.58843 33.0063 3.40843 32.5113L0.0751012 23.3446C-0.0632322 22.9613 -0.00823216 22.5346 0.226768 22.1996C0.460101 21.8663 0.841768 21.668 1.2501 21.668H38.7501C39.1584 21.668 39.5401 21.8663 39.7734 22.2013C40.0084 22.5346 40.0634 22.963 39.9251 23.3463L36.5918 32.513C36.4118 33.0063 35.9418 33.3346 35.4168 33.3346Z" fill="#1260FE"></path>
                                    <path d="M27.0849 40.0013C27.0216 40.0013 26.9583 39.9963 26.8933 39.9863C26.2116 39.8813 25.7433 39.243 25.8483 38.5613L27.2933 29.168H12.7066L14.1516 38.5613C14.2566 39.2446 13.7883 39.8813 13.1066 39.9863C12.4249 40.098 11.7849 39.6246 11.6816 38.9413L10.0149 28.108C9.95994 27.748 10.0633 27.3796 10.3016 27.103C10.5399 26.8263 10.8849 26.668 11.2499 26.668H28.7499C29.1149 26.668 29.4616 26.828 29.6983 27.1046C29.9349 27.3813 30.0399 27.748 29.9849 28.1096L28.3183 38.943C28.2249 39.5596 27.6916 40.0013 27.0849 40.0013Z" fill="#1260FE"></path>
                                    <path d="M37.5 23.7498C36.81 23.7498 36.25 23.1898 36.25 22.4998C36.25 19.2015 34.4866 16.0798 31.6483 14.3515C31.0583 13.9915 30.8716 13.2232 31.2316 12.6332C31.5916 12.0432 32.36 11.8565 32.95 12.2165C36.5266 14.3965 38.7483 18.3365 38.7483 22.4998C38.75 23.1898 38.19 23.7498 37.5 23.7498Z" fill="#1260FE"></path>
                                    <path d="M30.8333 15C32.214 15 33.3333 13.8807 33.3333 12.5C33.3333 11.1193 32.214 10 30.8333 10C29.4525 10 28.3333 11.1193 28.3333 12.5C28.3333 13.8807 29.4525 15 30.8333 15Z" fill="#1260FE"></path>
                                    <path d="M19.9999 13.3333C16.3233 13.3333 13.3333 10.3433 13.3333 6.66667C13.3333 2.99 16.3233 0 19.9999 0C23.6766 0 26.6666 2.99 26.6666 6.66667C26.6666 10.3433 23.6766 13.3333 19.9999 13.3333ZM19.9999 2.5C17.7016 2.5 15.8333 4.37 15.8333 6.66667C15.8333 8.96333 17.7016 10.8333 19.9999 10.8333C22.2983 10.8333 24.1666 8.96333 24.1666 6.66667C24.1666 4.37 22.2983 2.5 19.9999 2.5Z" fill="#1260FE"></path>
                                    <path d="M32.5 24.1667C31.81 24.1667 31.25 23.6067 31.25 22.9167C31.25 19.93 28.82 17.5 25.8333 17.5H14.1667C11.18 17.5 8.75 19.93 8.75 22.9167C8.75 23.6067 8.19 24.1667 7.5 24.1667C6.81 24.1667 6.25 23.6067 6.25 22.9167C6.25 18.5517 9.80167 15 14.1667 15H25.8333C30.1983 15 33.75 18.5517 33.75 22.9167C33.75 23.6067 33.19 24.1667 32.5 24.1667Z" fill="#1260FE"></path>
                                </g>
                                <defs>
                                    <clippath id="clip0_6038_295">
                                        <rect width="40" height="40" fill="white"></rect>
                                    </clippath>
                                </defs>
                            </svg>
                        </div>

                        <!-- txt -->
                        <div>
                            <h6 class="font-medium text-[18px] text-black mb-[8px]">Whence at the Conference</h6>
                            <p class="text-[16px] font-light text-etGray">Embarrassing hidden in the middle All the Lorem Ipsum generators on the Internet repeat predefined chunks</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[16px] rev-slide-up">
                        <a href="contact.html" class="et-btn bg-etBlue inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-white font-normal text-[17px] rounded-full hover:!bg-black hover:!text-white">Register Now</a>

                        <div class="flex items-center gap-[10px]">
                            <div class="flex *:-ml-[20px]">
                                <img src="assets/img/reviewer-1.png" alt="Person" class="w-[60px] h-[60px] rounded-full border-[3px] border-white first:ml-0">
                                <img src="assets/img/reviewer-2.png" alt="Person" class="w-[60px] h-[60px] rounded-full border-[3px] border-white first:ml-0">
                                <img src="assets/img/reviewer-3.png" alt="Person" class="w-[60px] h-[60px] rounded-full border-[3px] border-white first:ml-0">
                                <div class="w-[60px] h-[60px] rounded-full border-[3px] border-white first:ml-0 text-white bg-etBlue font-semibold flex items-center justify-center text-[16px]">25+</div>
                            </div>
                            <span class="uppercase font-semibold text-etBlue text-[16px]">Speakers</span>
                        </div>
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

    <!-- TEAM SECTION START -->
    <section class="et-speakers py-[100px] lg:py-[80px] md:py-[60px] overflow-hidden relative z-[1]">
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
<style>
    
</style>