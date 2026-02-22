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
            <h2 class="et-section-title mb-[24px] md:mb-[19px] anim-text">Travel Grant Application</h2>
            <p class="mb-[30px] text-[18px] font-light text-etGray md:mb-[30px] rev-slide-up" style="text-align: justify;">
                Ten travel grants are available for African students and early-career
                researchers from under-resourced institutions. Selected applicants will
                receive support covering travel and accommodation costs.
            </p>
        </div>

        <div class="grant-layout">

            <!-- INFO -->
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

            <!-- FORM -->
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
                        <span>Upload CV (PDF – max 3 pages)</span>
                        <input type="file" accept=".pdf" @change="handleFilescv" required>
                    </label>

                    <label class="file-input">
                        <span>Upload Motivation Letter (PDF)</span>
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
                                ✕
                            </button>
                        </div>
                    </div>

                    <button type="submit" :disabled="isLoader">
                        <span v-if="!isLoader">Submit Application</span>
                        <span v-else>Submitting…</span>
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

/* ==============================
   FILE LIST
================================ */

.file-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 20px;
}

/* ==============================
   FILE ITEM
================================ */

.file-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 14px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    background: #fff;
    transition: box-shadow 0.2s ease, transform 0.2s ease;
}

.file-item:hover {
    box-shadow: 0 6px 16px rgba(0,0,0,0.06);
    transform: translateY(-1px);
}

/* ==============================
   FILE INFO
================================ */

.file-info {
    flex: 1;
    min-width: 0;
}

.file-name {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #111827;
    word-break: break-word;
}

.file-size {
    font-size: 13px;
    color: #6b7280;
    margin-left: 6px;
}

/* ==============================
   PROGRESS BAR
================================ */

.progress {
    width: 100%;
    height: 6px;
    background: #e5e7eb;
    border-radius: 999px;
    overflow: hidden;
    margin-top: 6px;
}

.progress-bar {
    height: 100%;
    width: 0;
    background: linear-gradient(90deg, #3b82f6, #2563eb);
    border-radius: inherit;
    transition: width 0.3s ease;
}

/* ==============================
   REMOVE BUTTON
================================ */

.file-remove {
    margin-left: 12px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: none;
    background: #ef4444;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s ease, transform 0.15s ease;
}

.file-remove:hover {
    background: #dc2626;
    transform: scale(1.05);
}

.file-remove:active {
    transform: scale(0.95);
}

</style>