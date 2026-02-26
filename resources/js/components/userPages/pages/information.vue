<template>
  
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30" >
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">General Information</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Information</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- BENIN HERO SECTION START -->
    <section class="benin-hero">
        <div class="container">
            <div class="benin-hero-inner">
                
                <!-- Image Side -->
                <div class="hero-image-side">
                    <div class="hero-image-wrapper">
                        <img src="assets/img/benin-hero.jpg" alt="Bénin paysage">
                        <div class="hero-image-overlay"></div>
                    </div>
                    
                    <!-- Floating Card -->
                    <div class="floating-card">
                        <div class="card-header">
                            <img src="assets/img/benin.png" alt="Drapeau Bénin" class="flag-img">
                            <div>
                                <h4 class="card-title">Bénin</h4>
                                <p class="card-subtitle">Afrique de l'Ouest</p>
                            </div>
                        </div>
                        <div class="stats-grid">
                            <div class="stat-box">
                                <div class="stat-number">12M</div>
                                <div class="stat-label">Habitants</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-number">1975</div>
                                <div class="stat-label">Indépendance</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Side -->
                <div class="hero-content-side">
                    <h6 class="section-label">
                        <span class="line-decoration"></span>
                        Découvrir le Bénin
                        <span class="line-decoration"></span>
                    </h6>
                    <h2 class="hero-title">
                        Terre d'Histoire & de <span class="highlight">Traditions</span>
                    </h2>
                    <p class="hero-description">
                        Situé en Afrique de l'Ouest, le Bénin est un pays reconnu pour sa stabilité, son hospitalité et sa richesse culturelle. Terre d'histoire et de traditions, il offre un cadre idéal pour les échanges scientifiques, culturels et professionnels.
                    </p>
                    <p class="hero-description-secondary">
                        Les visiteurs y découvrent un environnement chaleureux, dynamique et propice à la rencontre.
                    </p>
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="fa-solid fa-check-circle feature-icon"></i>
                            <span>Stabilité politique</span>
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check-circle feature-icon"></i>
                            <span>Hospitalité légendaire</span>
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check-circle feature-icon"></i>
                            <span>Richesse culturelle</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- BENIN HERO SECTION END -->

    <!-- CULTURE & TOURISM SECTION START -->
    <section class="culture-section">
        <div class="bg-pattern bg-pattern-1"></div>
        <div class="bg-pattern bg-pattern-2"></div>

        <div class="container">
            
            <div class="section-header">
                <h6>Patrimoine & Découverte</h6>
                <h2>Culture & Tourisme</h2>
                <p>Le Bénin possède un patrimoine culturel exceptionnel, marqué par des traditions ancestrales et une grande diversité ethnique.</p>
            </div>

            <!-- Cards Grid -->
            <div class="cards-grid">

                <!-- Card 1: Culture -->
                <div class="info-card">
                    <div class="card-image">
                        <img src="assets/img/Culture.jpg" alt="Culture Béninoise">
                        <div class="card-badge">
                            <span>UNESCO</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>Patrimoine Culturel</h3>
                        <p>Berceau du royaume du Dahomey, sites historiques, musées, palais royaux et expressions artistiques variées.</p>
                        <div class="card-link">
                            <span>3 sites classés</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Tourism -->
                <div class="info-card">
                    <div class="card-image">
                        <img src="assets/img/tourisme.webp" alt="Tourisme Bénin">
                        <div class="card-badge">
                            <span>Nature</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>Attractions Touristiques</h3>
                        <p>Plages atlantiques, parcs naturels comme la Pendjari, villes historiques et marchés animés.</p>
                        <div class="card-link">
                            <span>124km de côtes</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Climate -->
                <div class="info-card card-wide">
                    <div class="card-image">
                        <img src="assets/img/climat.avif" alt="Climat Bénin">
                        <div class="card-badge">
                            <span>Tropical</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>Climat & Environnement</h3>
                        <p>Climat tropical chaud et ensoleillé toute l'année. Températures idéales pour découvrir le pays.</p>
                        <div class="card-meta">
                            <div class="meta-item">
                                <i class="fa-solid fa-temperature-high"></i>
                                <span>27-35°C</span>
                            </div>
                            <div class="meta-item">
                                <i class="fa-solid fa-sun"></i>
                                <span>365 jours de soleil</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- CULTURE & TOURISM SECTION END -->

    <!-- PRACTICAL INFO SECTION START -->
    <section class="practical-section">
        <div class="container">
            
            <div class="section-header">
                <h6>Organisation</h6>
                <h2>Informations Pratiques</h2>
            </div>

            <div class="practical-grid">

                <!-- Left: Image Composition -->
                <div class="image-composition">
                    <div class="image-grid">
                        <div class="image-column offset">
                            <div class="image-box image-portrait">
                                <img src="assets/img/rue.jpg" alt="Rue Bénin">
                            </div>
                            <div class="image-box image-landscape">
                                <img src="assets/img/Gastronomie.png" alt="Gastronomie Bénin">
                            </div>
                        </div>
                        <div class="image-column">
                            <div class="image-box image-landscape">
                                <img src="assets/img/hotel.jpg" alt="Hôtel Bénin">
                            </div>
                            <div class="image-box image-portrait">
                                <img src="assets/img/Population.jpg" alt="Population Bénin">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Center Badge -->
                    <div class="center-badge">
                        <i class="fa-solid fa-heart"></i>
                        <span>Bénin<br>Authentique</span>
                    </div>
                </div>

                <!-- Right: Info Cards -->
                <div class="info-list">

                    <!-- Visa -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-passport"></i>
                        </div>
                        <div class="info-body">
                            <h4>Visa & Accès</h4>
                            <p>E-visa disponible en ligne avant le départ. Aéroport international de Cotonou avec liaisons régulières depuis l'Europe et l'Afrique.</p>
                            <div class="info-tag">
                                <i class="fa-solid fa-globe"></i>
                                <a href="http://evisa.gouv.bj" target="_blank" rel="noopener noreferrer"><span>evisa.gouv.bj</span></a>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Currency -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-coins"></i>
                        </div>
                        <div class="info-body">
                            <h4>Monnaie locale</h4>
                            <p>Franc CFA (XOF). Cartes bancaires acceptées dans les hôtels et établissements modernes. Distributeurs disponibles en ville.</p>
                            <div class="info-tag">
                                <span>1 € ≈ 655 XOF</span>
                            </div>
                        </div>
                    </div>

                    <!-- Accommodation -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-hotel"></i>
                        </div>
                        <div class="info-body">
                            <h4>Hébergements</h4>
                            <p>Hôtels de standing international, résidences et maisons d'hôtes confortables. Options adaptées à tous les budgets près des sites du symposium.</p>
                            
                        </div>
                    </div>

                    <!-- Environment -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-shield-heart"></i>
                        </div>
                        <div class="info-body">
                            <h4>Environnement</h4>
                            <p>Pays stable et hospitalier. Environnement chaleureux, dynamique et propice aux échanges scientifiques et culturels.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- PRACTICAL INFO SECTION END -->

    <!-- GALLERY SECTION START -->
    <section class="gallery-section">
        <!-- Background Elements -->
        <div class="gallery-bg">
            <div class="gallery-bg-blob"></div>
            <div class="gallery-bg-blob"></div>
        </div>

        <div class="container">
            
            <div class="section-header">
                <h6 style="color: #062D63;">Galerie</h6>
                <h2 style="color: #000;">Découvrez le Bénin</h2>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-grid">

                <div class="gallery-item">
                    <img src="assets/img/Porte.jpg" alt="Porte Non-Retour">
                    <div class="gallery-overlay">
                        <h4>Porte du Non-Retour</h4>
                        <p>Ouidah - Mémorial historique</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="assets/img/Palais.webp" alt="Palais Abomey">
                    <div class="gallery-overlay">
                        <h4>Palais Royaux</h4>
                        <p>Abomey - UNESCO</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="assets/img/lac.jpg" alt="Lac Nokoué">
                    <div class="gallery-overlay">
                        <h4>Lac Nokoué</h4>
                        <p>Ganvié - Village lacustre</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="#" alt="Parc Pendjari">
                    <div class="gallery-overlay">
                        <h4>Parc de la Pendjari</h4>
                        <p>Nord Bénin - Safari</p>
                    </div>
                </div>

                <div class="gallery-item wide">
                    <img src="#" alt="Marché Dantokpa">
                    <div class="gallery-overlay">
                        <h4>Marché Dantokpa</h4>
                        <p>Cotonou - Plus grand marché de l'Afrique de l'Ouest</p>
                    </div>
                </div>

                <div class="gallery-item wide">
                    <img src="#" alt="Plage">
                    <div class="gallery-overlay">
                        <h4>Plages de Grand-Popo</h4>
                        <p>Côte atlantique</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- GALLERY SECTION END -->

</template>

<script>
export default {

}
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



/* ============================================
    VARIABLES & RESET
============================================ */
:root {
    --et-purple: #550ECA;
    --et-blue: #062d63;
    --et-pink: #F929BB;
    --et-Lpink: #F729BB;
    --et-gray: #707882;
    --et-gray2: #8E8E93;
    --et-black: #181818;
    --white: #ffffff;
    --black: #000000;
    --transition-base: cubic-bezier(0.4, 0, 0.2, 1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
    color: var(--et-black);
}

.container {
    margin-left: auto;
    margin-right: auto;
    max-width: 1200px;
    padding-left: 12px;
    padding-right: 12px;
}

/* ============================================
    BENIN HERO SECTION
    ============================================ */
.benin-hero {
    position: relative;
    background-color: var(--white);
    overflow: hidden;
    margin-top: 50px;
}

.benin-hero-inner {
    display: flex;
    align-items: center;
    gap: 60px;
    padding-top: 100px;
    padding-bottom: 100px;
}

/* Image Side */
.hero-image-side {
    width: 55%;
    position: relative;
}

.hero-image-wrapper {
    position: relative;
    border-radius: 30px;
    overflow: hidden;
    aspect-ratio: 4/3;
    box-shadow: 0 25px 80px -20px rgba(6, 45, 99, 0.25);
}

.hero-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 600ms var(--transition-base);
}

.hero-image-wrapper:hover img {
    transform: scale(1.05);
}

.hero-image-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 13, 131, 0.6), transparent);
    opacity: 0;
    transition: opacity 400ms ease;
}

.hero-image-wrapper:hover .hero-image-overlay {
    opacity: 1;
}

/* Floating Card */
.floating-card {
    position: absolute;
    bottom: -30px;
    right: -30px;
    background-color: var(--white);
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 20px 60px -15px rgba(0, 0, 0, 0.15);
    max-width: 280px;
    z-index: 10;
}

.card-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.flag-img {
    width: 50px;
    height: 35px;
    object-fit: cover;
    border-radius: 6px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.card-title {
    font-size: 18px;
    font-weight: 600;
    color: var(--et-black);
}

.card-subtitle {
    font-size: 13px;
    color: var(--et-gray);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    text-align: center;
}

.stat-box {
    background-color: #F2F6FE;
    border-radius: 12px;
    padding: 12px;
}

.stat-number {
    font-size: 20px;
    font-weight: 700;
    color: var(--et-blue);
}

.stat-label {
    font-size: 11px;
    color: var(--et-gray);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* Content Side */
.hero-content-side {
    width: 45%;
}

.section-label {
    color: var(--et-blue);
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.line-decoration {
    width: 40px;
    height: 1px;
    background-color: var(--et-blue);
}

.hero-title {
    font-size: 48px;
    font-weight: 500;
    color: var(--et-black);
    line-height: 1.15;
    margin-bottom: 25px;
}

.hero-title .highlight {
    color: var(--et-blue);
}

.hero-description {
    font-size: 17px;
    color: var(--et-gray);
    line-height: 1.8;
    margin-bottom: 30px;
}

.hero-description-secondary {
    font-size: 15px;
    color: rgba(112, 120, 130, 0.8);
    line-height: 1.7;
    margin-bottom: 35px;
}

.features-list {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 15px;
    color: var(--et-black);
}

.feature-icon {
    color: var(--et-blue);
    font-size: 20px;
}

/* ============================================
    CULTURE & TOURISM SECTION
    ============================================ */
.culture-section {
    background-color: #F8FAFF;
    padding-top: 100px;
    padding-bottom: 100px;
    position: relative;
    overflow: hidden;
}

.bg-pattern {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.bg-pattern-1 {
    top: 0;
    right: 0;
    width: 400px;
    height: 400px;
    background-color: var(--et-blue);
    opacity: 0.05;
    filter: blur(100px);
}

.bg-pattern-2 {
    bottom: 0;
    left: 0;
    width: 300px;
    height: 300px;
    background-color: var(--et-pink);
    opacity: 0.05;
    filter: blur(80px);
}

.section-header {
    text-align: center;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 60px;
}

.section-header h6 {
    color: var(--et-blue);
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.section-header h2 {
    font-size: 42px;
    font-weight: 500;
    color: var(--et-black);
    line-height: 1.2;
    margin-bottom: 20px;
}

.section-header p {
    font-size: 16px;
    color: var(--et-gray);
    line-height: 1.7;
}

.cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.info-card {
    background-color: var(--white);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
    transition: all 400ms var(--transition-base);
}

.info-card:hover {
    box-shadow: 0 20px 60px -15px rgba(6, 45, 99, 0.2);
}

.card-image {
    aspect-ratio: 16/10;
    overflow: hidden;
    position: relative;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 600ms var(--transition-base);
}

.info-card:hover .card-image img {
    transform: scale(1.1);
}

.card-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(4px);
    border-radius: 10px;
    padding: 8px 15px;
}

.card-badge span {
    font-size: 13px;
    font-weight: 600;
    color: var(--et-blue);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.card-content {
    padding: 30px;
}

.card-content h3 {
    font-size: 22px;
    font-weight: 500;
    color: var(--et-black);
    margin-bottom: 12px;
    transition: color 300ms ease;
}

.info-card:hover .card-content h3 {
    color: var(--et-blue);
}

.card-content p {
    font-size: 15px;
    color: var(--et-gray);
    line-height: 1.7;
    margin-bottom: 20px;
}

.card-link {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--et-blue);
    font-weight: 500;
    font-size: 14px;
}

.card-link i {
    font-size: 12px;
    transition: transform 300ms ease;
}

.info-card:hover .card-link i {
    transform: translateX(5px);
}

.card-meta {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 15px;
    color: var(--et-black);
}

.meta-item i {
    color: var(--et-blue);
}

/* ============================================
    PRACTICAL INFO SECTION
    ============================================ */
.practical-section {
    padding-top: 100px;
    padding-bottom: 100px;
    background-color: var(--white);
    position: relative;
}

.practical-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
}

.image-composition {
    position: relative;
}

.image-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.image-column {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.image-column.offset {
    margin-top: 40px;
}

.image-box {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

.image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 500ms ease;
}

.image-box:hover img {
    transform: scale(1.05);
}

.image-portrait {
    aspect-ratio: 3/4;
}

.image-landscape {
    aspect-ratio: 4/3;
}

.center-badge {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: var(--et-blue);
    color: var(--white);
    border-radius: 50%;
    width: 120px;
    height: 120px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 20px 60px -15px rgba(6, 45, 99, 0.4);
    z-index: 10;
}

.center-badge i {
    font-size: 24px;
    margin-bottom: 5px;
}

.center-badge span {
    font-size: 12px;
    font-weight: 500;
    text-align: center;
    line-height: 1.25;
}

.info-list {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.info-item {
    display: flex;
    gap: 25px;
    padding: 25px;
    border-radius: 20px;
    background-color: #F8FAFF;
    transition: all 400ms var(--transition-base);
}

.info-item:hover {
    background-color: var(--et-blue);
}

.info-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    background-color: var(--et-blue);
    color: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
    box-shadow: 0 10px 30px -10px rgba(6, 45, 99, 0.3);
    transition: all 400ms var(--transition-base);
}

.info-item:hover .info-icon {
    background-color: var(--white);
    color: var(--et-blue);
}

.info-body {
    flex: 1;
}

.info-body h4 {
    font-size: 20px;
    font-weight: 500;
    color: var(--et-black);
    margin-bottom: 8px;
    transition: color 300ms ease;
}

.info-item:hover .info-body h4 {
    color: var(--white);
}

.info-body p {
    font-size: 15px;
    color: var(--et-gray);
    line-height: 1.6;
    transition: color 300ms ease;
}

.info-item:hover .info-body p {
    color: rgba(255, 255, 255, 0.8);
}

.info-tag {
    margin-top: 12px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 600;
    background-color: rgba(6, 45, 99, 0.1);
    padding: 6px 12px;
    border-radius: 8px;
    color: var(--et-blue);
    transition: all 300ms ease;
}

.info-item:hover .info-tag {
    color: var(--white);
    background-color: rgba(255, 255, 255, 0.1);
}

/* ============================================
    GALLERY SECTION
    ============================================ */
.gallery-section {
    padding-top: 100px;
    padding-bottom: 100px;
    /* background-color: #062D63; */
    position: relative;
    overflow: hidden;
}

.gallery-bg {
    position: absolute;
    inset: 0;
    opacity: 0.2;
}

.gallery-bg-blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
}

.gallery-bg-blob:first-child {
    top: 10%;
    left: 10%;
    width: 300px;
    height: 300px;
    background-color: var(--et-blue);
}

.gallery-bg-blob:last-child {
    bottom: 10%;
    right: 10%;
    width: 400px;
    height: 400px;
    background-color: var(--et-pink);
    filter: blur(150px);
}

.gallery-section .section-header h6 {
    color: rgba(255, 255, 255, 0.6);
}

.gallery-section .section-header h2 {
    color: var(--white);
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.gallery-item {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    aspect-ratio: 3/4;
    cursor: pointer;
}

.gallery-item.wide {
    aspect-ratio: 4/3;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 600ms var(--transition-base);
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 13, 131, 0.9), transparent, transparent);
    opacity: 0;
    transition: opacity 400ms ease;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 25px;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-overlay h4 {
    color: var(--white);
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 5px;
}

.gallery-overlay p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
}

/* ============================================
    RESPONSIVE
    ============================================ */
@media screen and (max-width: 1199px) {
    .benin-hero-inner {
        flex-direction: column;
        gap: 40px;
        padding-top: 60px;
        padding-bottom: 60px;
    }

    .hero-image-side,
    .hero-content-side {
        width: 100%;
    }

    .hero-content-side {
        text-align: center;
    }

    .section-label {
        justify-content: center;
    }

    .line-decoration {
        display: none;
    }

    .features-list {
        justify-content: center;
    }

    .floating-card {
        right: 20px;
    }

    .hero-title {
        font-size: 38px;
    }

    .culture-section,
    .practical-section,
    .gallery-section {
        padding-top: 60px;
        padding-bottom: 60px;
    }

    .section-header h2 {
        font-size: 36px;
    }

    .cards-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .card-wide {
        grid-column: span 2;
    }

    .card-wide .card-image {
        aspect-ratio: 21/9;
    }

    .practical-grid {
        grid-template-columns: 1fr;
    }

    .image-composition {
        order: 2;
    }

    .info-list {
        order: 1;
    }
}

@media screen and (max-width: 991px) {
    .hero-title {
        font-size: 32px;
    }

    .section-header h2 {
        font-size: 30px;
    }

    .cards-grid {
        grid-template-columns: 1fr;
    }

    .card-wide {
        grid-column: span 1;
    }

    .card-wide .card-image {
        aspect-ratio: 16/10;
    }

    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .gallery-item.wide {
        grid-column: span 2;
    }
}

@media screen and (max-width: 767px) {
    .gallery-grid {
        grid-template-columns: 1fr;
    }

    .gallery-item.wide {
        grid-column: span 1;
    }
}

</style>