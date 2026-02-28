<template lang="html">
    
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Contact Us</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Contact Us</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <section class="et-contact-section">
        <div class="et-contact-wrapper">

            <!-- LEFT -->
            <div class="et-contact-info">
                <span class="et-contact-label">CONTACT</span>
                <h2 class="et-contact-title">Conference Secretariat</h2>

                <div class="et-contact-item">
                    <span class="et-contact-icon"><i class="fa-regular fa-building"></i></span>
                    <p style="font-size:15px;">
                        Society for Molecular Biology and Evolution Conference 2026<br>
                        C/O CAP Partner<br>
                        Nordre Fasanvej 113<br>
                        2000 Frederiksberg, Denmark
                    </p>
                </div>

                <div class="et-contact-item">
                    <span class="et-contact-icon"><i class="fa-regular fa-envelope"></i></span>
                    <a href="mailto:info@onebioafrica.com">info@onebioafrica.com</a>
                </div>

                <div class="et-contact-item">
                    <span class="et-contact-icon"><i class="fa-regular fa-phone"></i></span>
                    <a href="tel:+2290196975772">+229 019 697 5772</a>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="et-contact-map">
                <iframe
                    src="https://www.google.com/maps?q=Nordre%20Fasanvej%20113%2C%202000%20Frederiksberg&output=embed"
                    loading="lazy">
                </iframe>
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

    background-image: url("/assets/img/carou2.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;

    opacity: 0.3;
    z-index: -1;
}

.et-contact-section {
    padding: 80px 40px;
}

.et-contact-wrapper {
    background: #062d63;
    border-radius: 16px;
    padding: 60px;
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 60px;
    color: white;
}

/* LEFT */
.et-contact-label {
    font-size: 13px;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.6);
}

.et-contact-title {
    font-size: 44px;
    font-weight: 600;
    margin: 14px 0 40px;
    line-height: 1.2;
}

.et-contact-item {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 22px;
    max-width: 480px;
}

.et-contact-icon {
    color: #fff;
    font-size: 25px;
    margin-top: 3px;
}

.et-contact-item a {
    color: white;
    text-decoration: none;
    font-size: 15px;
}

.et-contact-item a:hover {
    color: #fff;
}

/* MAP */
.et-contact-map {
    border-radius: 14px;
    overflow: hidden;
    height: 360px;
    border: 1px solid rgba(255,255,255,0.08);
}

.et-contact-map iframe {
    width: 100%;
    height: 100%;
    border: none;
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .et-contact-wrapper {
        grid-template-columns: 1fr;
        padding: 40px;
    }
}
</style>