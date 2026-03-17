<template lang="html">
    
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Details Committee</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Committee</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->
     

    <!-- TEAM MEMBER DETAILS SECTION START -->
    <section class="team-details">
        <div class="container">
            <div class="member-card">
                <!-- Image avec hauteur fixe -->
                <div class="member-image">
                    <img :src="'/storage/'+getComite.image" :alt="getComite.fullname ">
                </div>

                <!-- Contenu -->
                <div class="member-content">
                    <div class="member-header">
                        <h1 class="member-name">{{ getComite.fullname }}</h1>
                        <span class="member-role"> <strong>Affiliation :</strong> {{ getComite.affiliation }}</span>
                        <span class="member-role"> <strong>Country :</strong> {{ getComite.country }}</span>
                        <span class="member-role"> <strong>Expert Session :</strong> {{ getComite.session }}</span>
                    </div>

                    <div class="divider"></div>

                    <div class="member-bio" v-html="getComite.bio"></div>

                </div>
            </div>
        </div>
    </section>


</template>
<script setup>
    import { onMounted, ref } from 'vue';
    import { useRoute } from 'vue-router';
    import { getSingleData } from '../../plugins/api';


    const getComite = ref({})
    const route = useRoute()

    async function getComiteFunction() {
        await getSingleData('/showcomiter/'+route.params.id).then(res=>{
            if (res.status === 200) {
                getComite.value = res.data.data
            }
        })
    }

    onMounted(()=>{
        getComiteFunction()
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

    background-image: url("/assets/img/banner2.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;

    opacity: 0.3;
    z-index: -1;
}

:root {
    --primary-color: #6366f1;
    --primary-hover: #4f46e5;
    --text-dark: #1e293b;
    --text-gray: #64748b;
    --bg-light: #f8fafc;
    --border-color: #e2e8f0;
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
    --radius: 16px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.team-details {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    min-height: 100vh;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* Carte principale - alignement en haut */
.member-card {
    display: grid;
    grid-template-columns: 380px 1fr;
    gap: 48px;
    background: white;
    border-radius: var(--radius);
    padding: 40px;
    box-shadow: var(--shadow-xl);
    align-items: start; /* IMPORTANT: aligne en haut */
}

/* Image avec hauteur FIXE */
.member-image {
    width: 380px;
    height: 450px; /* Hauteur fixe - ne change jamais */
    border-radius: calc(var(--radius) - 8px);
    overflow: hidden;
    flex-shrink: 0; /* Empêche l'image de rétrécir */
    position: sticky; /* Optionnel: reste visible en scrollant */
    top: 40px;
}

.member-image img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Coupe l'image pour remplir sans déformer */
    object-position: center top; /* Priorité au visage */
    transition: transform 0.5s ease;
}

.member-image:hover img {
    transform: scale(1.05);
}

/* Contenu */
.member-content {
    display: flex;
    flex-direction: column;
}

.member-header {
    margin-bottom: 14px;
    display: flex;
    flex-direction: column;
    align-items: start;
    gap: 10px;
}

.member-name {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0 0 8px 0;
    line-height: 1.2;
}

.member-role {
    display: inline-block;
    font-size: 1.125rem;
    color: var(--primary-color);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 8px 16px;
    background: rgba(99, 102, 241, 0.1);
    border-radius: 9999px;
}

.divider {
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), #8b5cf6);
    border-radius: 2px;
}

.member-bio {
    font-size: 14px;
    line-height: 1.8;
    color: var(--text-gray);
    text-align: justify;
    margin-bottom: 32px;
    font-family: Arial, Helvetica, sans-serif !important;
}

.member-bio :deep(p) {
    margin-bottom: 16px;
}

.btn-contact {
    padding: 14px 32px;
    background: var(--primary-color);
    color: white;
    border: none;
    border-radius: 9999px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 4px 14px 0 rgba(99, 102, 241, 0.39);
    width: fit-content;
}

.btn-contact:hover {
    background: var(--primary-hover);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 1024px) {
    .member-card {
        grid-template-columns: 300px 1fr;
        gap: 32px;
        padding: 32px;
    }
    
    .member-image {
        width: 300px;
        height: 380px;
    }
    
    .member-name {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .team-details {
        padding: 60px 0;
    }
    
    .member-card {
        grid-template-columns: 1fr;
        gap: 24px;
        padding: 24px;
    }
    
    .member-image {
        width: 100%;
        height: 350px; /* Hauteur fixe aussi en mobile */
        position: relative; /* Annule le sticky */
        top: 0;
    }
    
    .member-name {
        font-size: 1.75rem;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 16px;
    }
    
    .member-card {
        padding: 20px;
    }
    
    .member-image {
        height: 300px;
    }
}
</style>