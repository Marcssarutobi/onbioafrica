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
                        <img src="assets/img/et-3-team-member-3.jpg" alt="Coordinator">
                    </div>

                    <h4 class="et-card-name">Jakob Sandager</h4>

                    <ul class="et-card-contact">
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <a href="mailto:jj@cap-partner.eu">jj@cap-partner.eu</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:+4538429597">+45 38 42 95 97</a>
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
                    <div class="et-sponsors-logos rev-slide-up">
                        <!-- <img src="" alt="Sponsor 1">
                        <img src="" alt="Sponsor 2">
                        <img src="" alt="Sponsor 3">
                        <img src="" alt="Sponsor 4"> -->

                        <svg width="73" height="60" viewbox="0 0 73 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="xxs:mx-auto">
                            <path d="M40.2451 23.1693L37.7232 25.6913L42.032 30L23.5379 48.4937L5.04384 30L23.5379 11.5059L27.4781 15.4461L19.3866 23.5376L24.588 28.7389L27.1099 26.2169L24.4305 23.5376L30 17.968L32.6794 20.6474L35.2013 18.1255L32.5219 15.4461L42.9242 5.04383L45.6036 7.72323L48.1255 5.20131L42.9242 0L30 12.9242L23.5379 6.4621L0 30L23.5379 53.5376L47.0758 30L40.2451 23.1693Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M72.9242 30.0008L49.3867 6.46289L25.8488 30.0008L32.6794 36.8311L35.2013 34.3092L30.8926 30.0008L49.3867 11.5067L67.8804 30.0008L49.3867 48.4945L45.4465 44.5547L53.5379 36.4632L48.3366 31.2616L45.8147 33.7835L48.4944 36.4632L42.9246 42.0328L40.2452 39.353L37.7232 41.875L40.4026 44.5547L30.0004 54.957L27.3206 52.2776L24.7987 54.7995L30.0004 60.0008L42.9246 47.0766L49.3867 53.5383L72.9242 30.0008Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                        </svg>

                        <svg width="59" height="60" viewbox="0 0 59 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="xxs:mx-auto">
                            <path d="M39.9089 31.8303H34.6058L53.1743 50.3985C48.7682 54.1842 43.2151 56.2491 37.3454 56.2491C30.8464 56.2491 24.7361 53.7181 20.1403 49.1229C15.3749 44.3568 13.006 38.09 13.0285 31.8303C13.0376 29.2954 13.4415 26.7628 14.236 24.3305C15.2011 21.3748 16.7409 18.5671 18.8654 16.0902L27.1056 24.3305H32.4088L18.8146 10.7363L17.4889 12.0624C13.96 15.5912 11.5755 19.8349 10.3214 24.3308C9.63792 26.7807 9.28737 29.3045 9.27956 31.8306C9.2571 39.0508 11.9921 46.2782 17.4886 51.775C22.7927 57.0784 29.8446 59.9993 37.345 59.9993C44.8455 59.9993 51.8974 57.0784 57.2009 51.7746L58.5265 50.4489L39.9089 31.8303Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M28.0808 3.75022C40.8664 3.75022 51.3802 13.6622 52.3404 26.206H15.6366C15.3143 27.4389 15.0976 28.6933 14.9875 29.9559H56.1616V28.0808C56.1616 12.5969 43.5647 0 28.0808 0C12.5969 0 0 12.5969 0 28.0808V29.9559H7.47571C7.55741 28.6992 7.71038 27.4461 7.94929 26.206H3.82118C4.78135 13.6622 15.2951 3.75022 28.0808 3.75022Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                        </svg>

                        <svg width="72" height="60" viewbox="0 0 72 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="xxs:mx-auto">
                            <path d="M35.9032 38.8125C24.2204 38.8125 14.7151 48.3175 14.7151 60.0006H18.7796C18.7796 50.5585 26.4615 42.877 35.9032 42.877C45.3449 42.877 53.0268 50.5585 53.0268 60.0006H57.0913C57.0913 48.3175 47.586 38.8125 35.9032 38.8125Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M35.9032 45.9531C28.1577 45.9531 21.8567 52.2542 21.8567 59.9997H25.9212C25.9212 54.4956 30.3992 50.0176 35.9032 50.0176C41.4073 50.0176 45.8852 54.4956 45.8852 59.9997H49.9498C49.9498 52.2546 43.6487 45.9531 35.9032 45.9531Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M35.9032 21.1881C47.586 21.1881 57.0913 11.6832 57.0913 0H53.0268C53.0268 9.4421 45.3449 17.1236 35.9032 17.1236C26.4615 17.1236 18.7796 9.4421 18.7796 0H14.7151C14.7155 11.6835 24.2204 21.1881 35.9032 21.1881Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M14.4248 28.7546C15.6383 27.9178 16.9025 27.1515 18.2118 26.4582C9.68746 20.7391 4.06451 11.0157 4.06451 0.00195312H0C0 11.7514 5.67329 22.2006 14.4248 28.7546Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M42.9528 31.0425C40.6834 31.5578 38.3264 31.8388 35.9032 31.8388C33.4801 31.8388 31.1231 31.5578 28.8537 31.0425C26.6649 31.5756 24.5711 32.3503 22.6003 33.3378C26.7175 34.9867 31.2042 35.9033 35.9032 35.9033C40.6023 35.9033 45.089 34.9867 49.2062 33.3378C52.1397 32.1629 54.8882 30.6208 57.3818 28.753C66.1329 22.199 71.8066 11.7498 71.8066 0H67.742C67.742 11.0138 62.1191 20.7376 53.5948 26.4563C50.4068 28.5951 46.811 30.1668 42.9528 31.0425Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M35.9032 14.0469C43.6487 14.0469 49.9498 7.74549 49.9498 0H45.8852C45.8852 5.50442 41.4073 9.98239 35.9032 9.98239C30.3992 9.98239 25.9212 5.50442 25.9212 0H21.8567C21.8567 7.74549 28.1577 14.0469 35.9032 14.0469Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M57.3822 31.2461C56.1687 32.0829 54.9045 32.8492 53.5952 33.5428C62.1195 39.2619 67.7425 48.9853 67.7425 59.9991H71.807C71.8066 48.2493 66.1333 37.8001 57.3822 31.2461Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M28.8537 28.9565C31.1232 28.4412 33.4801 28.1602 35.9033 28.1602C38.3265 28.1602 40.6834 28.4412 42.9529 28.9565C45.1417 28.4234 47.2355 27.6487 49.2062 26.6613C45.0891 25.0123 40.6024 24.0957 35.9033 24.0957C31.2042 24.0957 26.7175 25.0123 22.6004 26.6613C19.6668 27.8361 16.9184 29.3783 14.4248 31.246C5.67367 37.8 0 48.2492 0 59.999H4.06451C4.06451 48.9852 9.68746 39.2614 18.2118 33.5427C21.3998 31.4039 24.9959 29.8326 28.8537 28.9565Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                        </svg>

                        <svg width="48" height="60" viewbox="0 0 48 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="xxs:mx-auto">
                            <path d="M19.26 28.4096C17.0083 30.6617 13.3453 30.6599 11.0932 28.4093L3.91973 21.2383V9.46172L19.6787 25.22L22.4506 22.4503L0 0V40.1812L16.9788 57.16C18.8103 58.9915 21.2446 60 23.8346 60C26.4246 60 28.8589 58.9915 30.6897 57.16L47.4327 40.417V0.254956L19.26 28.4096ZM27.9189 54.3885C26.8281 55.4792 25.3775 56.0803 23.835 56.0803C22.2918 56.0803 20.8418 55.4792 19.7504 54.3885L3.91973 38.5579V26.7813L25.6392 48.5001L25.6399 48.5008C25.6406 48.5015 25.6413 48.5022 25.6423 48.5029C25.8583 48.7188 26.0849 48.9195 26.3168 49.1121C26.3796 49.1642 26.4444 49.2124 26.5083 49.2628C26.6891 49.4053 26.8735 49.5415 27.0625 49.6699C27.1249 49.7124 27.1877 49.7543 27.2508 49.795C27.4714 49.9376 27.6969 50.0709 27.9274 50.1943C27.954 50.2085 27.9799 50.2245 28.0068 50.2383C28.8242 50.6666 29.6993 50.972 30.6106 51.1507C30.6337 51.1553 30.6571 51.1592 30.6801 51.1638C30.8106 51.1883 30.9393 51.2177 31.0712 51.2372L27.9189 54.3885ZM43.5137 27.0175V38.794C43.5137 38.794 36.2909 45.9998 36.1409 46.1221C36.1232 46.1367 36.104 46.1487 36.0863 46.1629C34.1346 47.7171 31.4038 47.8253 29.3454 46.4856C29.3351 46.4789 29.3238 46.4735 29.3138 46.4664C29.1812 46.3789 29.0536 46.282 28.927 46.1824C28.9004 46.1615 28.8717 46.1434 28.8451 46.1218C28.7011 46.0044 28.5621 45.8778 28.4274 45.7445C28.422 45.7392 28.416 45.7345 28.4103 45.7292L25.259 42.5772C25.3576 42.5627 25.4537 42.54 25.5516 42.5226C25.6555 42.5042 25.7594 42.4861 25.8622 42.4645C26.0679 42.4208 26.2707 42.3687 26.4725 42.312C26.5505 42.29 26.6299 42.2723 26.7072 42.2481C26.9817 42.1634 27.2519 42.0673 27.5175 41.9584C27.5774 41.934 27.6348 41.9042 27.694 41.8783C27.9004 41.7886 28.104 41.6936 28.3036 41.5897C28.393 41.5432 28.4802 41.4925 28.5681 41.4432C28.7366 41.3485 28.9022 41.2496 29.0653 41.1446C29.1539 41.0875 29.2419 41.0298 29.3287 40.9698C29.4947 40.8553 29.656 40.7337 29.8152 40.6081C29.8879 40.551 29.962 40.4961 30.0333 40.4365C30.2592 40.2479 30.4794 40.0511 30.6901 39.8408L43.5137 27.0175ZM27.9189 37.0693C26.8281 38.16 25.3775 38.761 23.835 38.761C22.2918 38.761 20.8418 38.16 19.7504 37.0693L16.5941 33.9123C18.5852 33.6208 20.5021 32.7105 22.0311 31.1819L43.5137 9.71278V21.4744L27.9189 37.0693Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                        </svg>

                        <svg width="73" height="60" viewbox="0 0 73 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="xxs:mx-auto">
                            <path d="M40.2451 23.1693L37.7232 25.6913L42.032 30L23.5379 48.4937L5.04384 30L23.5379 11.5059L27.4781 15.4461L19.3866 23.5376L24.588 28.7389L27.1099 26.2169L24.4305 23.5376L30 17.968L32.6794 20.6474L35.2013 18.1255L32.5219 15.4461L42.9242 5.04383L45.6036 7.72323L48.1255 5.20131L42.9242 0L30 12.9242L23.5379 6.4621L0 30L23.5379 53.5376L47.0758 30L40.2451 23.1693Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M72.9243 30.0008L49.3868 6.46289L25.8489 30.0008L32.6795 36.8311L35.2014 34.3092L30.8927 30.0008L49.3868 11.5067L67.8805 30.0008L49.3868 48.4945L45.4466 44.5547L53.538 36.4632L48.3367 31.2616L45.8148 33.7835L48.4945 36.4632L42.9247 42.0328L40.2453 39.353L37.7234 41.875L40.4028 44.5547L30.0005 54.957L27.3207 52.2776L24.7988 54.7995L30.0005 60.0008L42.9247 47.0766L49.3868 53.5383L72.9243 30.0008Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                        </svg>

                        <svg width="60" height="60" viewbox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="xxs:mx-auto">
                            <path d="M27.2821 23.8021C28.7403 24.629 30.1313 25.6177 31.4222 26.7784C29.858 16.1461 20.6767 7.95703 9.6167 7.95703V11.2759C17.7696 11.2762 24.7178 16.5154 27.2821 23.8021Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M32.7228 36.21C31.2516 35.373 29.8613 34.3771 28.5789 33.2227C30.1431 43.8549 39.324 52.0434 50.3838 52.0434V48.7245C42.2356 48.7242 35.2902 43.4907 32.7228 36.21Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M33.2227 31.4224C43.8546 29.8578 52.0431 20.6772 52.0431 9.61719H48.7242C48.7242 17.7698 43.4853 24.718 36.199 27.2822C35.372 28.7408 34.3834 30.1315 33.2227 31.4224Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M26.7784 28.5781C16.1455 30.1424 7.95703 39.323 7.95703 50.383H11.2759C11.2759 42.2307 16.5151 35.2825 23.8018 32.7183C24.629 31.26 25.6177 29.8691 26.7784 28.5781Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M32.4612 23.6948C32.9079 25.3106 33.1919 26.9932 33.2844 28.7264C39.6956 20.1019 38.9935 7.82014 31.1737 0L28.8271 2.34658C34.5914 8.11142 35.7999 16.7289 32.4612 23.6948Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M27.5395 36.3053C27.0929 34.6895 26.8088 33.0069 26.7163 31.2734C20.3048 39.8976 21.0066 52.179 28.827 59.9995L31.1736 57.6529C25.4094 51.8881 24.2009 43.2708 27.5395 36.3053Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M36.2908 32.4646C34.6775 32.9094 32.9978 33.1925 31.2671 33.284C35.0461 36.104 39.6122 37.6293 44.4133 37.6293C50.3014 37.6293 55.8366 35.3362 60.0001 31.1728L57.6535 28.8262C54.117 32.3627 49.415 34.3101 44.4133 34.3101C41.5536 34.3104 38.7931 33.6713 36.2908 32.4646Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                            <path d="M23.6944 27.5398C25.3106 27.0931 26.9932 26.8088 28.7267 26.7166C20.1022 20.305 7.82045 21.0068 0 28.8272L2.34657 31.1738C8.1111 25.4093 16.7283 24.2011 23.6944 27.5398Z" class="fill-etGray2 transition duration-[400ms] group-hover:fill-etBlue"></path>
                        </svg>

                    </div>

                </div>

            </div>

           

        </div>
    </section>

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
    margin-top: 80px;
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