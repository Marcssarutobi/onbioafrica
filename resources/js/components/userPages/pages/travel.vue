<template>
    
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Travel Grant Registration</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Travel Grant Registration</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <section class="grant-section">
        <div class="grant-container">

            <!-- INTRO -->
            <div class="grant-header">
                <span class="et-section-sub-title anim-text">Travel Grant Registration</span>
                <h2 class="et-section-title anim-text">Travel Grant Application</h2>
                <p class="rev-slide-up">
                    Ten travel grants are available for African students and early-career
                    researchers from under-resourced institutions. Selected applicants will
                    receive support covering travel and accommodation costs.
                </p>
            </div>

            <div class="grant-layout">

                <!-- INFO - 40% -->
                <div class="grant-info">

                    <div class="grant-card">
                        <h4>Eligibility</h4>
                        <p>
                            African students, post-doctoral researchers from under-resourced
                            institutions, and SMBE members.
                        </p>
                    </div>

                    <div class="grant-card">
                        <h4>Required Documents</h4>
                        <p>
                            Curriculum Vitae (maximum 3 pages) and a motivation letter.
                        </p>
                    </div>

                    <div class="grant-card">
                        <h4>Selection Criteria</h4>
                        <p>
                            Applications are evaluated based on scientific merit, financial
                            need, and regional representation.
                        </p>
                    </div>

                    <div class="grant-card highlight">
                        <h4>Grant Coverage</h4>
                        <p>
                            Travel and accommodation expenses for selected candidates.
                        </p>
                    </div>

                </div>

                <!-- FORM - 60% -->
                <div class="grant-form">

                    <h3>Submit Your Application</h3>
                    <p class="form-note">
                        Please ensure all information and documents are accurate.
                    </p>

                    <form @submit.prevent="SubmitTravelGrant">

                        <div class="form-row">
                            <input type="text" placeholder="First name" v-model="data.prenom" required>
                            <input type="text" placeholder="Last name" v-model="data.nom" required>
                        </div>

                        <div class="form-row">
                            <input type="email" placeholder="Email address" v-model="data.email" required>
                            <input type="text" placeholder="Phone number" v-model="data.phone" required>
                        </div>

                        <div class="form-row">
                            <input type="text" placeholder="Country" v-model="data.country" required>
                            <input type="text" placeholder="Institution" v-model="data.institution" required>
                        </div>

                        <label class="file-input">
                            <span>
                                <i class="fa-solid fa-cloud-arrow-up mr-2"></i>
                                Upload CV (PDF – max 3 pages)
                            </span>
                            <input type="file" accept=".pdf" @change="handleFilescv" required>
                        </label>

                        <label class="file-input">
                            <span>
                                <i class="fa-solid fa-cloud-arrow-up mr-2"></i>
                                Upload Motivation Letter (PDF)
                            </span>
                            <input type="file" accept=".pdf" @change="handleFilesMotivation" required>
                        </label>

                        <div v-if="Object.keys(data.documents).length" class="file-list">
                            <div
                                v-for="(item, key) in data.documents"
                                :key="key"
                                class="file-item"
                            >
                                <div class="file-info">
                                    <strong class="file-name">{{ item.file.name }}</strong>
                                    <span class="file-size">{{ formatSize(item.file.size) }}</span>

                                    <div v-if="item.progress < 100" class="progress">
                                        <div class="progress-bar" :style="{ width: item.progress + '%' }"></div>
                                    </div>
                                </div>

                                <button
                                    type="button"
                                    class="file-remove"
                                    @click="removeFile(key)"
                                    aria-label="Remove file"
                                >
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" :disabled="isLoader">
                            <span v-if="!isLoader">
                                <i class="fa-solid fa-paper-plane mr-2"></i>
                                Submit Application
                            </span>
                            <span v-else>
                                <i class="fa-solid fa-circle-notch fa-spin mr-2"></i>
                                Submitting…
                            </span>
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </section>

</template>
<script setup>
import { ref } from 'vue';
import { postTravelGrant } from '../../adminPages/api/travelGrant';


    const data = ref({
        nom:'',
        prenom:'',
        email:'',
        phone:'',
        institution:'',
        country:'',
        documents:{},
    })
    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const alertMsg = ref('')
    const alertType = ref('')

    // Simulation d'un upload pour le progress
    const uploadFile = (fileObj, key) => {
        return new Promise((resolve) => {
            let progress = 0
            const interval = setInterval(() => {
                progress += Math.random() * 20  // simulation
                if (progress >= 100) progress = 100
                fileObj.progress = progress
                if (progress === 100) {
                    clearInterval(interval)
                    fileObj.url = URL.createObjectURL(fileObj.file) // fichier accessible
                    resolve()
                }
            }, 300)
        })
    }

    const handleFilescv = async (e)=>{
        const file = e.target.files[0]
        if (file) {
            const fileObj = { file, progress: 0, url: null }
            data.value.documents.cv = fileObj
            await uploadFile(fileObj, 'cv')
        }
    }

    const handleFilesMotivation = async (e)=>{
        const file = e.target.files[0]
        if (file) {
            const fileObj = { file, progress: 0, url: null }
            data.value.documents.motivation = fileObj
            await uploadFile(fileObj, 'motivation')
        }
    }

    // Supprimer un fichier
    const removeFile = (key) => {
        if (data.value.documents[key]) {
            delete data.value.documents[key]
        }
    }

    // Formater la taille en KB / MB
    const formatSize = (size) => {
        if (size < 1024) return size + ' B'
        else if (size < 1024*1024) return (size/1024).toFixed(1) + ' KB'
        else return (size/(1024*1024)).toFixed(1) + ' MB'
    }

    async function SubmitTravelGrant() {
        isLoader.value = true

        const formData = new FormData()

        for(const key in data.value){
            if (key === 'documents') continue;
            formData.append(key, data.value[key])
        }

        for(const key in data.value.documents){
            const fileObj = data.value.documents[key]
            formData.append('documents[]', fileObj.file)
        }

        await postTravelGrant(formData).then(res =>{
            isLoader.value = false
            for (const key in data.value) {
                if (key === 'documents') {
                    data.value.documents = {}
                } else {
                    data.value[key] = ''
                }
            }

            alertMsg.value = 'Application submitted successfully'
            alertType.value = 'success'
        }).catch(err => {
            isLoader.value = false
            alertMsg.value = 'Error submitting application'
            alertType.value = 'error'
        }).finally(() => {
            isLoader.value = false
        })
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

/* ============================================
    GRANT SECTION - BASED ON output.css
============================================ */

.grant-section {
    position: relative;
    padding-top: clamp(80px, 8.3vw, 100px);
    padding-bottom: clamp(80px, 8.2vw, 108px);
    background-color: #F8FAFF;
}

.grant-container {
    margin-left: auto;
    margin-right: auto;
    max-width: clamp(1150px, 79.35vw, 1510px);
    padding-left: 12px;
    padding-right: 12px;
}

@media screen and (max-width: 1399px) {
    .grant-container {
        max-width: 100%;
    }
}

/* ============================================
    HEADER
    ============================================ */

.grant-header {
    text-align: center;
    max-width: 848px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: clamp(40px, 3.15vw, 60px);
}

.grant-header .et-section-sub-title {
    color: var(--color-etBlue);
    font-weight: 600;
    font-size: clamp(12px, 0.79vw, 15px);
    letter-spacing: 0.2em;
    text-transform: uppercase;
    display: inline-flex;
    align-items: center;
    gap: clamp(10px, 0.79vw, 15px);
    margin-bottom: clamp(12px, 1.05vw, 20px);
}

.grant-header .et-section-sub-title::before,
.grant-header .et-section-sub-title::after {
    content: '';
    width: 50px;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--color-etBlue));
}

.grant-header .et-section-sub-title::after {
    background: linear-gradient(90deg, var(--color-etBlue), transparent);
}

.grant-header .et-section-title {
    font-size: clamp(38px, 2.52vw, 48px);
    font-weight: 500;
    color: var(--color-etBlack);
    line-height: 1.2;
    margin-bottom: clamp(16px, 2.21vw, 42px);
}

.grant-header p {
    font-size: clamp(16px, 1.05vw, 20px);
    font-weight: 300;
    color: var(--color-etGray);
    line-height: 1.8;
    text-align: center;
}

@media screen and (max-width: 991px) {
    .grant-header p {
        margin-bottom: 30px;
    }
}

/* ============================================
    LAYOUT - 40% INFO / 60% FORM
    ============================================ */

.grant-layout {
    display: grid;
    grid-template-columns: 2fr 3fr;
    gap: clamp(30px, 3.15vw, 60px);
    align-items: start;
}

@media screen and (max-width: 1199px) {
    .grant-layout {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}

/* ============================================
    INFO CARDS - COMPACT
    ============================================ */

.grant-info {
    display: flex;
    flex-direction: column;
    gap: clamp(15px, 1.58vw, 30px);
}

.grant-card {
    background-color: var(--color-white);
    border-radius: clamp(15px, 1.58vw, 30px);
    padding: clamp(20px, 2.10vw, 40px);
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
    border-left: 4px solid var(--color-etBlue);
    transition: all 400ms cubic-bezier(0.4, 0, 0.2, 1);
}

.grant-card:hover {
    box-shadow: 0 20px 60px -15px rgba(6, 45, 99, 0.15);
    transform: translateY(-3px);
}

.grant-card.highlight {
    background: linear-gradient(135deg, var(--color-etBlue) 0%, #001B52 100%);
    border-left: none;
    color: var(--color-white);
}

.grant-card.highlight h4 {
    color: var(--color-white);
}

.grant-card.highlight p {
    color: rgba(255, 255, 255, 0.9);
}

.grant-card h4 {
    font-size: clamp(18px, 1.26vw, 24px);
    font-weight: 600;
    color: var(--color-etBlack);
    margin-bottom: clamp(8px, 0.79vw, 15px);
    display: flex;
    align-items: center;
    gap: 10px;
}

.grant-card h4::before {
    content: '';
    width: 8px;
    height: 8px;
    background-color: var(--color-etBlue);
    border-radius: 50%;
}

.grant-card.highlight h4::before {
    background-color: var(--color-etLpink);
}

.grant-card p {
    font-size: clamp(14px, 0.89vw, 17px);
    color: var(--color-etGray);
    line-height: 1.7;
}

/* ============================================
    FORM - EXPANDED
    ============================================ */

.grant-form {
    background-color: var(--color-white);
    border-radius: clamp(20px, 1.58vw, 30px);
    padding: clamp(30px, 3.15vw, 60px);
    box-shadow: 0 4px 60px rgba(18, 96, 254, 0.12);
}

.grant-form h3 {
    font-size: clamp(24px, 1.58vw, 30px);
    font-weight: 600;
    color: var(--color-etBlack);
    margin-bottom: clamp(8px, 0.79vw, 15px);
}

.form-note {
    font-size: clamp(14px, 0.89vw, 17px);
    color: var(--color-etGray);
    margin-bottom: clamp(25px, 2.63vw, 50px);
    padding-bottom: clamp(20px, 2.10vw, 40px);
    border-bottom: 1px solid #ECECEC;
}

/* Form Rows */
.form-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: clamp(15px, 1.58vw, 30px);
    margin-bottom: clamp(15px, 1.58vw, 30px);
}

@media screen and (max-width: 767px) {
    .form-row {
        grid-template-columns: 1fr;
    }
}

/* Inputs */
.grant-form input[type="text"],
.grant-form input[type="email"] {
    width: 100%;
    height: clamp(45px, 2.94vw, 56px);
    padding-left: clamp(15px, 1.58vw, 30px);
    padding-right: clamp(15px, 1.58vw, 30px);
    border: 1px solid #ECECEC;
    border-radius: clamp(15px, 1.58vw, 30px);
    font-size: clamp(14px, 0.89vw, 17px);
    color: var(--color-etBlack);
    background-color: #F8FAFF;
    transition: all 300ms ease;
}

.grant-form input::placeholder {
    color: var(--color-etGray2);
}

.grant-form input:focus {
    outline: none;
    border-color: var(--color-etBlue);
    background-color: var(--color-white);
    box-shadow: 0 4px 25px rgba(56, 75, 255, 0.15);
}

/* File Inputs */
.file-input {
    display: block;
    margin-bottom: clamp(15px, 1.58vw, 30px);
    cursor: pointer;
}

.file-input span {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    height: clamp(45px, 2.94vw, 56px);
    padding-left: clamp(15px, 1.58vw, 30px);
    padding-right: clamp(15px, 1.58vw, 30px);
    border: 2px dashed #D7D7D7;
    border-radius: clamp(15px, 1.58vw, 30px);
    font-size: clamp(14px, 0.89vw, 17px);
    color: var(--color-etGray);
    background-color: #F8FAFF;
    transition: all 300ms ease;
}

.file-input:hover span {
    border-color: var(--color-etBlue);
    color: var(--color-etBlue);
    background-color: #EDF3FE;
}

.file-input input {
    display: none;
}

/* Submit Button */
.grant-form button[type="submit"] {
    width: 100%;
    height: clamp(45px, 2.94vw, 56px);
    background-color: var(--color-etBlue);
    color: var(--color-white);
    font-size: clamp(14px, 0.89vw, 17px);
    font-weight: 600;
    border: none;
    border-radius: clamp(15px, 1.58vw, 30px);
    cursor: pointer;
    transition: all 400ms ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.grant-form button[type="submit"]:hover:not(:disabled) {
    background-color: #000D83;
    box-shadow: 0 4px 25px rgba(56, 75, 255, 0.25);
}

.grant-form button[type="submit"]:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

/* ============================================
    FILE LIST - INTEGRATED
    ============================================ */

.file-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: clamp(20px, 2.10vw, 40px);
}

.file-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    border: 1px solid #ECECEC;
    border-radius: 12px;
    background-color: var(--color-white);
    transition: all 300ms ease;
}

.file-item:hover {
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
    border-color: var(--color-etBlue);
}

.file-info {
    flex: 1;
    min-width: 0;
}

.file-name {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: var(--color-etBlack);
    word-break: break-word;
}

.file-size {
    font-size: 12px;
    color: var(--color-etGray);
    margin-left: 8px;
}

.progress {
    width: 100%;
    height: 4px;
    background-color: #ECECEC;
    border-radius: 999px;
    overflow: hidden;
    margin-top: 8px;
}

.progress-bar {
    height: 100%;
    width: 0;
    background: linear-gradient(90deg, var(--color-etBlue), var(--color-etLpink));
    border-radius: inherit;
    transition: width 0.3s ease;
}

.file-remove {
    margin-left: 12px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: none;
    background-color: #EF0157;
    color: var(--color-white);
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 200ms ease;
    flex-shrink: 0;
}

.file-remove:hover {
    background-color: #dc2626;
    transform: scale(1.1);
}

/* ============================================
    ANIMATIONS
    ============================================ */

.anim-text {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s ease forwards;
}

.rev-slide-up {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s ease 0.2s forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ============================================
    RESPONSIVE
    ============================================ */

@media screen and (max-width: 1199px) {
    .grant-layout {
        grid-template-columns: 1fr;
    }

    .grant-info {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .grant-card {
        padding: 20px;
    }
}

@media screen and (max-width: 767px) {
    .grant-info {
        grid-template-columns: 1fr;
    }

    .grant-form {
        padding: 25px;
    }
}

</style>