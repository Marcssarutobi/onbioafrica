<template>

    <!-- overlay -->
    <div class="et-overlay group">
        <div class="opacity-0 pointer-events-none group-[.active]:opacity-100 group-[.active]:pointer-events-auto transition ease-linear duration-300  bg-etBlack/80 fixed inset-0 z-[60]"></div>
    </div>
    <!-- overlay -->

    <!-- sidebar -->
    <div class="et-sidebar group">
        <div class=" group-[.active]:translate-x-0 translate-x-[100%] transition-transform ease-linear duration-300 fixed right-0 w-full max-w-[25%] xl:max-w-[30%] lg:max-w-[40%] md:max-w-[50%] sm:max-w-[60%] xxs:max-w-full bg-[#18377e] h-full z-[100] overflow-auto p-[50px] lg:p-[30px] space-y-[40px]">
            <!-- heading -->
            <div class="et-sidebar-heading">
                <div class="logo flex justify-between items-center">
                    <RouterLink to="/"><img src="assets/img/LogoW.png" alt="logo"></RouterLink>

                    <button type="button" class="et-sidebar-close-btn border border-white/50 w-[45px] aspect-square shrink-0 text-white text-[22px] rounded-full hover:text-etBlue hover:bg-white"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <!-- mobile menu -->
            <div class="et-header-nav-in-mobile"></div>
        </div>
    </div>
    
    <!-- HEADER SECTION START -->
    <header class="et-header to-be-fixed py-[30px] xxs:py-[20px] fixed top-0 w-full px-[155px] xxxl:px-[100px] xxl:px-[40px] xs:px-[20px] z-50">
        <div class="flex justify-between items-center">
            <!-- logo -->
            <div class="logo shrink-0">
                <RouterLink to="/">
                    <img src="assets/img/LogoW.png" width="90"  alt="logo">
                </RouterLink>
            </div>

            <div class="et-header-right flex items-center gap-[60px] xl:gap-[30px]">
                <div class="to-go-to-sidebar-in-mobile flex md:flex-col md:items-start items-center gap-[100px] xl:gap-[30px] md:gap-y-[15px]">
                    <!-- nav -->
                    <ul class="et-header-nav flex md:flex-col gap-x-[43px] xl:gap-x-[33px] font-kanit text-[17px] font-normal">
                        <!-- <li>
                            <RouterLink to="/">Home</RouterLink>
                        </li> -->
                        <!-- <li>
                            <RouterLink to="/abouts">About us</RouterLink>
                        </li> -->
                        <li class="has-sub-menu relative">
                            <a role="button" style="cursor: pointer;">Abouts</a>

                            <ul class="et-header-submenu">
                                <li><RouterLink to="/abouts">Abouts</RouterLink></li>
                                <li><RouterLink to="/comitee">Local Organizing Committee</RouterLink></li>
                                <li><RouterLink to="/speaker">Speaker</RouterLink></li>
                            </ul>
                        </li>
                        <li>
                            <RouterLink to="/general-information">General Information</RouterLink>
                        </li>
                        <li class="has-sub-menu relative">
                            <a role="button" style="cursor: pointer;">Registration</a>

                            <ul class="et-header-submenu">
                                <li><RouterLink to="/abstract">Abstracts</RouterLink></li>
                                <li><RouterLink to="/travel-grant">Travel Grant</RouterLink></li>
                                <li><RouterLink to="/guest">Guest Registration</RouterLink></li>
                            </ul>
                        </li>
                        <li>
                            <RouterLink to="/events">Programm</RouterLink>
                        </li>
                        <li>
                            <RouterLink to="/sponsor">Partners/Sponsors</RouterLink>
                        </li>
                        
                        <li><RouterLink to="/contact">Contact</RouterLink></li>
                    </ul>

                    <!-- button -->
                    <!-- <a href="#" class="et-btn bg-white flex items-center justify-center gap-x-[15px] h-[50px] px-[15px] text-etBlue font-medium text-[17px] rounded-full group">
                        <span class="icon">
                            <svg width="27" height="16" viewbox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.02101 0H0.844661C0.378197 0 0 0.378144 0 0.844662V5.12625C0 5.59277 0.378197 5.97091 0.844661 5.97091C1.96347 5.97091 2.8737 6.88114 2.8737 8C2.8737 9.11886 1.96347 10.029 0.844661 10.029C0.378197 10.029 0 10.4071 0 10.8736V15.1553C0 15.6218 0.378197 15.9999 0.844661 15.9999H8.02101V0Z" class="fill-etBlue group-hover:fill-white transition"></path>
                                <path d="M26.0001 5.97091C26.4665 5.97091 26.8447 5.59277 26.8447 5.12625V0.844662C26.8447 0.378144 26.4665 0 26.0001 0H9.71094V16H26.0001C26.4665 16 26.8447 15.6219 26.8447 15.1553V10.8737C26.8447 10.4072 26.4665 10.029 26.0001 10.029C24.8813 10.029 23.971 9.11886 23.971 8C23.971 6.88114 24.8813 5.97091 26.0001 5.97091Z" class="fill-etBlue group-hover:fill-white transition"></path>
                            </svg>
                        </span>
                        Register Guest</a> -->
                    <div class="gtranslate_wrapper " ></div>
                </div>

                <!-- mobile menu button -->
                <button type="button" class="et-mobile-menu-open-btn hidden md:inline-block bg-etBlue rounded-full w-[50px] aspect-square text-white text-[18px] hover:bg-etBlue"><i class="fa-solid fa-bars"></i></button>
            </div>
        </div>
    </header>
    <!-- HEADER SECTION END -->

</template>
<script setup>
import { onMounted } from 'vue'


onMounted(()=>{
    // Forcer English
    document.cookie = "googtrans=/en/en; path=/; domain=" + window.location.hostname;

    // 1️⃣ Définir la configuration globale
    window.gtranslateSettings = {
        default_language: "en",
        languages: ["en", "fr"],
        wrapper_selector: ".gtranslate_wrapper"
    }

    // 2️⃣ Créer et injecter le script
    const script = document.createElement('script')
    script.src = "https://cdn.gtranslate.net/widgets/latest/dropdown.js"
    script.defer = true

    // Optionnel : quand le script est chargé
    script.onload = () => {
        console.log("GTranslate widget loaded")
    }

    document.body.appendChild(script)
})

</script>
<style>
    .gt_selector {
        background: #fff;
        color: #000;
        padding: 10px;
        font-size: 12px;
        border-radius: 10px;
    }
</style>