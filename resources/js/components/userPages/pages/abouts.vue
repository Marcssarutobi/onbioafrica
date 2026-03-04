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
                    <img src="assets/img/aboutR.jpeg" alt="image" width="423" height="526" class="shrink-0 rounded-[10px]">
                    <img src="assets/img/aboutH.JPG.jpeg" alt="image" width="201" height="241" class="et-about-floating-img absolute top-[45px] -right-[70px] shrink-0 rounded-[20px] border-white border-[10px] xs:hidden">

                    <!-- vectors -->
                    <div class="et-about-vectors xs:hidden">
                        <img src="assets/img/about-img-vector-1.png" alt="vector" class="et-about-vector-1 absolute -left-[47px] top-[20px] -z-[1]">
                        <img src="assets/img/about-img-vector-2.png" alt="vector" class="et-about-vector-2 absolute -left-[27px] top-[41px] -z-[1]">
                        <img src="assets/img/about-img-vector-3.png" alt="vector" class="et-about-vector absolute -right-[24px] bottom-[34px] -z-[1]">
                    </div>

                </div>

                <!-- right -->
                <div class="et-about__txt">
                    <h6 class="et-section-sub-title ">Welcome to OneBioAfrica</h6>
                    <h2 class="et-section-title mb-[24px] md:mb-[19px] ">OneBioAfrica: Connecting Science, Health, and Nature</h2>

                    <p class="mb-[30px] text-[16px] font-light text-etGray md:mb-[30px] rev-slide-up" style="text-align: justify;">
                        Africa stands at a decisive moment. The challenges we face, emerging diseases, biodiversity loss, antimicrobial resistance, and ecosystem degradation are interconnected and require integrated, molecular-driven solutions within the One Health framework. <br>
                        OneBioAfrica was initiated to strengthen Africa’s capacity in molecular biology, bioinformatics, and evolutionary science, and to build a collaborative continental network capable of transforming genomic data into real-world health and conservation impact. <br>
                        We bring together researchers, students, early-career scientists, and policymakers to share knowledge, exchange ideas, and shape the future of molecular science in Africa. <br>
                        Together, we are building resilient scientific networks that serve both people and the planet. <br> <br>

                        <strong style="font-weight: 800;">Dr. Boris Armel OLOU</strong><br>
                        Chair, OneBioAfrica Symposium
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
                <span class="et-section-sub-title ">Our Purpose</span>
                <h2 class="et-section-title ">
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


    <section class="et-scientific-sessions">
    <div class="et-container">
        
        <!-- Section Header -->
        <div class="et-section-header">
        
        <h6 class="et-section-sub-title ">Scientific Program</h6>
        <h2 class="et-title">Scientific Sessions</h2>
        <p class="et-desc">Explore our four thematic areas covering biodiversity, molecular health, the environment, and One Health solutions.</p>
        </div>

        <!-- Sessions Grid -->
        <div class="et-sessions-grid">
        
        <!-- Session 1 -->
        <article class="et-session-card">
            <div class="et-card-number">01</div>
            <div class="et-card-icon et-icon-blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
            </svg>
            </div>
            <span class="et-badge et-badge-blue">Theme 01</span>
            <h3 class="et-card-title">Molecular Biology and Biodiversity Conservation</h3>
            <p class="et-card-text">Exploring genomic tools, environmental DNA, and phylogenomics to monitor and conserve African biodiversity.</p>
            <div class="et-tags">
            <span class="et-tag">Genomic Tools</span>
            <span class="et-tag">eDNA</span>
            <span class="et-tag">Phylogenomics</span>
            </div>
        </article>

        <!-- Session 2 -->
        <article class="et-session-card">
            <div class="et-card-number">02</div>
            <div class="et-card-icon et-icon-pink">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            </div>
            <span class="et-badge et-badge-pink">Theme 02</span>
            <h3 class="et-card-title">Molecular Approaches in Human and Animal Health</h3>
            <p class="et-card-text">Advances in pathogen genomics, antimicrobial resistance, and molecular surveillance of zoonotic diseases.</p>
            <div class="et-tags">
            <span class="et-tag">Pathogen Genomics</span>
            <span class="et-tag">AMR</span>
            <span class="et-tag">Zoonotic Surveillance</span>
            </div>
        </article>

        <!-- Session 3 -->
        <article class="et-session-card">
            <div class="et-card-number">03</div>
            <div class="et-card-icon et-icon-green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            </div>
            <span class="et-badge et-badge-green">Theme 03</span>
            <h3 class="et-card-title">Environment and Society within the One Health Framework</h3>
            <p class="et-card-text">Intersections between ecosystems, climate change, public health, and community resilience.</p>
            <div class="et-tags">
            <span class="et-tag">Ecosystems</span>
            <span class="et-tag">Climate Change</span>
            <span class="et-tag">Community</span>
            </div>
        </article>

        <!-- Session 4 -->
        <article class="et-session-card">
            <div class="et-card-number">04</div>
            <div class="et-card-icon et-icon-orange">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            </div>
            <span class="et-badge et-badge-orange">Theme 04</span>
            <h3 class="et-card-title">One Health Solutions in the Era of Molecular Biology: Success Stories</h3>
            <p class="et-card-text">Case studies demonstrating how molecular science informs policy, surveillance, and health interventions.</p>
            <div class="et-tags">
            <span class="et-tag">Case Studies</span>
            <span class="et-tag">Policy</span>
            <span class="et-tag">Interventions</span>
            </div>
        </article>

        </div>

    </div>
    </section>


    <!-- TEAM SECTION START -->
    <section class="et-speakers py-[100px] lg:py-[80px] md:py-[60px] overflow-hidden relative z-[1]" style="padding: 70px 0;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
            <!-- heading -->
            <div class="et-speakers-heading text-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                <h6 class="et-section-sub-title ">Event Speakers</h6>
                <h2 class="et-section-title ">Meet Our Creative Speakers</h2>
            </div>

            <div class="grid grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 justify-center gap-[30px] lg:gap-[20px]">
                <!-- single team member -->
                <div v-for="(speaker,index) in allspeaker" :key="index" class="et-member group">
                    <div class="et-member__img rounded-[16px] overflow-hidden">
                        <img :src="'/storage/'+speaker.photo" alt="Team Member Image" class="w-full duration-[400ms] group-hover:scale-110">
                    </div>

                    <div class="et-member__txt bg-white relative z-[1] mx-[25px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] md:px-[15px] pb-[30px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">
                        <h5 class="font-semibold text-[22px] md:text-[20px] text-etBlack mb-[4px]"><RouterLink :to="'/singleSpeaker/'+speaker.id" class="hover:text-etBlue">{{ speaker.firstname }} {{ speaker.lastname }}</RouterLink></h5>
                        <span class="text-etGray text-[16px]">{{ speaker.affiliation }}</span>
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
    import { Main } from '../../plugins/main';

    const allspeaker = ref([])

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

    onMounted(()=>{
        AllSpeakerFunction()
    })

</script>
<style scoped>

.et-member__img{
    width: 366px;
    height: 366px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.et-member__img img{
    width: 100%;
    height: 100%;
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
}

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

/* ============================================
   SCIENTIFIC SESSIONS SECTION
   Design Pro - Style Event/Conference
   ============================================ */

.et-scientific-sessions {
  position: relative;
  z-index: 1;
  overflow: hidden;
  background-color: #F8FAFF;
  padding-top: clamp(60px, 6.31vw, 70px);
  padding-bottom: clamp(60px, 6.31vw, 70px);
}

/* Container */
.et-scientific-sessions .et-container {
  width: 100%;
  max-width: calc(clamp(1150px, 61.48vw, 1170px) + 30px);
  margin-left: auto;
  margin-right: auto;
  padding-left: 15px;
  padding-right: 15px;
}

/* ============================================
   SECTION HEADER
   ============================================ */
.et-scientific-sessions .et-section-header {
  max-width: 848px;
  margin-left: auto;
  margin-right: auto;
  text-align: center;
  margin-bottom: clamp(40px, 3.15vw, 60px);
}

.et-scientific-sessions .et-sub-title {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  color: #384BFF;
  font-weight: 500;
  font-size: clamp(12px, 0.79vw, 15px);
  letter-spacing: 0.25em;
  text-transform: uppercase;
  margin-bottom: 16px;
}

.et-scientific-sessions .et-line {
  width: 30px;
  height: 1px;
  background-color: #384BFF;
}

.et-scientific-sessions .et-title {
  font-size: clamp(32px, 4.2vw, 56px);
  font-weight: 700;
  color: #181818;
  line-height: 1.1;
  margin-bottom: 20px;
}

.et-scientific-sessions .et-desc {
  color: #666666;
  font-size: clamp(16px, 1.05vw, 20px);
  line-height: 1.6;
}

/* ============================================
   SESSIONS GRID
   ============================================ */
.et-scientific-sessions .et-sessions-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 30px;
}

/* ============================================
   SESSION CARDS
   ============================================ */
.et-scientific-sessions .et-session-card {
  position: relative;
  background-color: #ffffff;
  border-radius: clamp(20px, 1.58vw, 30px);
  padding: clamp(30px, 2.63vw, 50px);
  box-shadow: 0 4px 50px rgba(0, 0, 0, 0.06);
  border: 1px solid #E5E5E5;
  transition: all 400ms ease;
  overflow: hidden;
}

.et-scientific-sessions .et-session-card:hover {
  box-shadow: 0 4px 60px rgba(18, 96, 254, 0.15);
  border-color: rgba(56, 75, 255, 0.2);
  transform: translateY(-5px);
}

/* Number Badge */
.et-scientific-sessions .et-card-number {
  position: absolute;
  top: -20px;
  right: -20px;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  display: flex;
  align-items: flex-end;
  justify-content: flex-start;
  padding: 20px;
  font-size: 48px;
  font-weight: 700;
  color: #ffffff;
  opacity: 0.1;
  transition: opacity 500ms ease;
}

.et-scientific-sessions .et-session-card:nth-child(1) .et-card-number {
  background: linear-gradient(135deg, #550ECA, #F929BB);
}

.et-scientific-sessions .et-session-card:nth-child(2) .et-card-number {
  background: linear-gradient(135deg, #550ECA, #F929BB);
}

.et-scientific-sessions .et-session-card:nth-child(3) .et-card-number {
  background: linear-gradient(135deg, #256E56, #2E8B57);
}

.et-scientific-sessions .et-session-card:nth-child(4) .et-card-number {
  background: linear-gradient(135deg, #FE8F0E, #FFC532);
}

.et-scientific-sessions .et-session-card:hover .et-card-number {
  opacity: 0.2;
}

/* Icon */
.et-scientific-sessions .et-card-icon {
  width: clamp(60px, 5.25vw, 80px);
  height: clamp(60px, 5.25vw, 80px);
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 24px;
  transition: transform 400ms ease;
}

.et-scientific-sessions .et-session-card:hover .et-card-icon {
  transform: scale(1.1);
}

.et-scientific-sessions .et-card-icon svg {
  width: 32px;
  height: 32px;
}

/* Icon Colors */
.et-scientific-sessions .et-icon-blue {
  background: linear-gradient(135deg, #E7EFFF, #F2F6FE);
  color: #384BFF;
}

.et-scientific-sessions .et-icon-pink {
  background: linear-gradient(135deg, #FCE7F3, #FDF2F8);
  color: #F929BB;
}

.et-scientific-sessions .et-icon-green {
  background: linear-gradient(135deg, #E6F4EA, #F0FDF4);
  color: #256E56;
}

.et-scientific-sessions .et-icon-orange {
  background: linear-gradient(135deg, #FFF7ED, #FFFBEB);
  color: #FE8F0E;
}

/* Badges */
.et-scientific-sessions .et-badge {
  display: inline-block;
  padding: 6px 16px;
  font-size: 14px;
  font-weight: 500;
  border-radius: 50px;
  margin-bottom: 16px;
}

.et-scientific-sessions .et-badge-blue {
  background-color: rgba(56, 75, 255, 0.1);
  color: #384BFF;
}

.et-scientific-sessions .et-badge-pink {
  background-color: #FCE7F3;
  color: #F929BB;
}

.et-scientific-sessions .et-badge-green {
  background-color: #E6F4EA;
  color: #256E56;
}

.et-scientific-sessions .et-badge-orange {
  background-color: #FFF7ED;
  color: #FE8F0E;
}

/* Card Title */
.et-scientific-sessions .et-card-title {
  font-size: clamp(20px, 1.58vw, 28px);
  font-weight: 700;
  color: #181818;
  line-height: 1.3;
  margin-bottom: 16px;
  transition: color 300ms ease;
}

.et-scientific-sessions .et-session-card:hover .et-card-title {
  color: #384BFF;
}

/* Card Text */
.et-scientific-sessions .et-card-text {
  color: #666666;
  font-size: clamp(15px, 0.95vw, 18px);
  line-height: 1.6;
  margin-bottom: 24px;
}

/* Tags */
.et-scientific-sessions .et-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.et-scientific-sessions .et-tag {
  padding: 6px 14px;
  background-color: #F8FAFF;
  color: #757277;
  font-size: 13px;
  border-radius: 50px;
  border: 1px solid #E5E5E5;
  transition: all 300ms ease;
}

.et-scientific-sessions .et-session-card:hover .et-tag {
  background-color: #ffffff;
  border-color: #D4DCED;
}

/* ============================================
   CTA BUTTON
   ============================================ */
.et-scientific-sessions .et-section-cta {
  text-align: center;
  margin-top: clamp(40px, 3.15vw, 60px);
}

.et-scientific-sessions .et-btn-primary {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  padding: 16px 40px;
  background-color: #384BFF;
  color: #ffffff;
  font-weight: 500;
  font-size: 16px;
  text-decoration: none;
  border-radius: 50px;
  box-shadow: 0 4px 25px rgba(56, 75, 255, 0.25);
  transition: all 300ms ease;
}

.et-scientific-sessions .et-btn-primary:hover {
  background-color: #181818;
  box-shadow: 0 4px 25px rgba(0, 0, 0, 0.15);
  transform: translateY(-2px);
}

.et-scientific-sessions .et-btn-primary svg {
  width: 20px;
  height: 20px;
  transition: transform 300ms ease;
}

.et-scientific-sessions .et-btn-primary:hover svg {
  transform: translateX(4px);
}

/* ============================================
   RESPONSIVE
   ============================================ */
@media screen and (max-width: 1199px) {
  .et-scientific-sessions .et-sessions-grid {
    grid-template-columns: 1fr;
    gap: 25px;
  }
}

@media screen and (max-width: 991px) {
  .et-scientific-sessions .et-session-card {
    padding: 30px;
  }
  
  .et-scientific-sessions .et-card-icon {
    width: 60px;
    height: 60px;
  }
}

@media screen and (max-width: 767px) {
  .et-scientific-sessions .et-title {
    font-size: 28px;
  }
  
  .et-scientific-sessions .et-card-title {
    font-size: 20px;
  }
  
  .et-scientific-sessions .et-card-number {
    width: 80px;
    height: 80px;
    font-size: 36px;
    padding: 15px;
  }
}

@media screen and (max-width: 575px) {
  .et-scientific-sessions .et-container {
    padding-left: 12px;
    padding-right: 12px;
  }
  
  .et-scientific-sessions .et-sub-title .et-line {
    width: 20px;
  }
  
  .et-scientific-sessions .et-session-card {
    padding: 25px;
  }
  
  .et-scientific-sessions .et-btn-primary {
    padding: 14px 30px;
    font-size: 15px;
  }
}

    
</style>