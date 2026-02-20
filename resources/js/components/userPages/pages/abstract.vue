<template>
    
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Abstracts Registration</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Abstracts Registration</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <section class="et-about py-[130px] xl:py-[80px] md:py-[60px] overflow-hidden">
        <div class="et-1-container rev-slide-up">

            <!-- heading -->
            <div class="text-center mb-[52px]">
                <h6 class="et-section-sub-title anim-text">Abstracts Registration</h6>
                <h2 class="et-section-title anim-text">Abstract submission</h2>
                <p class="text-[18px] mt-[30px]">We invite authors to submit original abstracts for evaluation for
                oral or poster presentation at the conference. The process is intended for
                scientific and clinical contributions that are relevant to the conference themes.</p>
            </div>

            <!-- cards -->
            <div class="mx-auto max-w-[1200px] grid grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">

                <!-- Card 1 -->
                <div class="rounded-[20px] bg-white overflow-hidden group">
                    <!-- icon -->
                    <div class="w-[146px] aspect-square border-[20px] bg-etBlue border-[#EDF3FE] rounded-full rounded-tr-none ml-auto flex items-center justify-center">
                        <i class="fa-solid fa-file-pdf text-white text-[35px] transition duration-[0.4s] group-hover:scale-110"></i>
                    </div>

                    <!-- text -->
                    <div class="px-[30px] xxl:px-[20px] py-[23px] xxl:py-[18px]">
                        <h5 class="font-medium text-[22px] text-etBlack mb-[8px]">
                            Submission Format
                        </h5>
                        <p class="font-light text-etGray text-[16px] leading-relaxed">
                            Abstracts must be submitted in <strong class="font-medium">PDF format</strong>,
                            with a maximum file size of 10&nbsp;MB.
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="rounded-[20px] bg-white overflow-hidden group">
                    <!-- icon -->
                    <div class="w-[146px] aspect-square border-[20px] bg-etBlue border-[#EDF3FE] rounded-full rounded-tr-none ml-auto flex items-center justify-center">
                        <i class="fa-solid fa-language text-white text-[35px] transition duration-[0.4s] group-hover:scale-110"></i>
                    </div>

                    <!-- text -->
                    <div class="px-[30px] xxl:px-[20px] py-[23px] xxl:py-[18px]">
                        <h5 class="font-medium text-[22px] text-etBlack mb-[8px]">
                            Language
                        </h5>
                        <p class="font-light text-etGray text-[16px] leading-relaxed">
                            Abstracts may be written in <strong class="font-medium">English or French</strong>.
                            Please specify the language in the title if applicable.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="rounded-[20px] bg-white overflow-hidden group">
                    <!-- icon -->
                    <div class="w-[146px] aspect-square border-[20px] bg-etBlue border-[#EDF3FE] rounded-full rounded-tr-none ml-auto flex items-center justify-center">
                        <i class="fa-solid fa-user-check text-white text-[35px] transition duration-[0.4s] group-hover:scale-110"></i>
                    </div>

                    <!-- text -->
                    <div class="px-[30px] xxl:px-[20px] py-[23px] xxl:py-[18px]">
                        <h5 class="font-medium text-[22px] text-etBlack mb-[8px]">
                            Review Process
                        </h5>
                        <p class="font-light text-etGray text-[16px] leading-relaxed">
                            All abstracts will be reviewed by the
                            <strong class="font-medium">Scientific Committee</strong>.
                            Authors will be notified by email.
                        </p>
                    </div>
                </div>

            </div>

            <div>
                <h2 class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-medium text-etBlack mb-[7px]">
                    Abstract Submission
                </h2>
                <p class="text-etGray font-light text-[16px] mb-[38px]">
                    Please complete the form below to submit your abstract for scientific review.
                </p>

                <form action="#" method="post" enctype="multipart/form-data"
                    class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]">

                    <!-- First name -->
                    <div>
                        <label class="font-lato font-semibold text-etBlack block mb-[12px]">
                            First Name*
                        </label>
                        <input type="text" name="first_name" required
                            class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                    </div>

                    <!-- Last name -->
                    <div>
                        <label class="font-lato font-semibold text-etBlack block mb-[12px]">
                            Last Name*
                        </label>
                        <input type="text" name="last_name" required
                            class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                    </div>

                    <!-- Email -->
                    <div class="col-span-2 xxs:col-span-1">
                        <label class="font-lato font-semibold text-etBlack block mb-[12px]">
                            Email Address*
                        </label>
                        <input type="email" name="email" required
                            class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                    </div>

                    <!-- Country -->
                    <div>
                        <label class="font-lato font-semibold text-etBlack block mb-[12px]">
                            Phone*
                        </label>
                        <input type="text" name="country" required
                            class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                    </div>

                    <!-- Affiliation -->
                    <div>
                        <label class="font-lato font-semibold text-etBlack block mb-[12px]">
                            Affiliation*
                        </label>
                        <input type="text" name="affiliation" required
                            class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                    </div>

                    <!-- Abstract title -->
                    <div class="col-span-2 xxs:col-span-1">
                        <label class="font-lato font-semibold text-etBlack block mb-[12px]">
                            Abstract Title*
                        </label>
                        <input type="text" name="title" required
                            class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                    </div>

                    <!-- Abstract text -->
                    <div class="col-span-2 xxs:col-span-1">
                        <label class="font-lato font-semibold text-etBlack block mb-[12px]">
                            Abstract Text*
                        </label>
                        <textarea name="abstract_text" rows="6" maxlength="300" required
                                class="border border-[#ECECEC] p-[20px] rounded-[4px] w-full focus:outline-none"></textarea>
                        <div class="flex justify-end mt-[6px] text-[14px] text-etGray">
                            <span id="charCount">0</span>/300
                        </div>
                    </div>

                    

                    <!-- Submit -->
                    <div class=" flex justify-end col-span-2 xxs:col-span-1">
                        <button type="submit"
                                class="bg-etBlue h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-etBlack inline-flex items-center gap-[10px]">
                            Submit Abstract
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </button>
                    </div>

                </form>
            </div>

        
        </div>
    </section>

</template>
<script setup>

</script>
<style scoped>
    
</style>