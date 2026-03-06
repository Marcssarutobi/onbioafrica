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

    <section class="et-about">
        <div class="et-container">

            <div class="et-grid">

                <!-- LEFT COLUMN -->
                <div class="et-left">

                    <header class="et-heading">
                        <span class="et-section-sub-title ">Abstracts Registration</span>
                        <h2 class="et-section-title mb-[24px] md:mb-[19px] ">Abstract Submission</h2>
                        <p class="mb-[30px] text-[18px] font-light text-etGray md:mb-[30px] rev-slide-up" style="text-align: justify;">
                            Abstract submission is open to researchers, students, and professionals working in molecular biology and One Health-related fields. Submissions will be evaluated based on scientific quality, originality, and relevance to the symposium themes. Accepted abstracts will be presented as oral or poster communications. Detailed submission guidelines, templates, and deadlines are available on the submission portal.
                        </p>
                        <div class="important-dates mb-[40px]">
                            <h3>Important Dates</h3>
                            <ul>
                                <li>
                                    <div class="date">12 March 2026</div>
                                    <div class="label">Call for Abstracts</div>
                                </li>

                                <li>
                                    <div class="date">12 April 2026</div>
                                    <div class="label">
                                        Abstract submission deadline for oral presentations,
                                        short talks, and poster presentations
                                    </div>
                                </li>

                                <li>
                                    <div class="date">30 April 2026</div>
                                    <div class="label">Notification of review outcome</div>
                                </li>
                            </ul>
                        </div>
                    </header>

                    <div class="image">
                        <img src="assets/img/abstracts1.jpg" alt="Abstract Submission" class="w-full rounded-lg">
                    </div>

                    <ul class="et-info-list">
                        <li>
                            <span class="et-icon"><i class="fa-solid fa-pencil"></i></span>
                            <div>
                                <strong>Submission format</strong>
                                <span>Text only, maximum 1000 characters</span>
                            </div>
                        </li>

                        <li>
                            <span class="et-icon"><i class="fa-solid fa-language"></i></span>
                            <div>
                            <strong>Language</strong>
                            <span>English or French</span>
                            </div>
                        </li>

                        <li>
                            <span class="et-icon"><i class="fa-solid fa-user-check"></i></span>
                            <div>
                            <strong>Review process</strong>
                            <span>Evaluation by the Scientific Committee</span>
                            </div>
                        </li>

                        <li>
                            <span class="et-icon"><i class="fa-solid fa-money-bill"></i></span>
                            <div>
                                <strong>Payment fees</strong>
                                <span>
                                    Students/Doctoral students: 10,000 FCFA<br>
                                    Postdoctoral/Researchers/Teachers: 15,000 FCFA<br>
                                    Institutions/NGOs: 30,000 FCFA
                                </span>
                            </div>
                        </li>
                    </ul>

                </div>

                <!-- RIGHT : FORM -->
                <aside class="et-form-card">

                    <h3>Submit your abstract</h3>
                    <p class="et-form-subtitle">
                        Complete the form carefully. All fields are required.
                    </p>

                    <form class="et-form-grid" @submit.prevent="AddAbstractFunction">

                        <div class="et-form-group">
                            <label>First Name</label>
                            <input type="text" :class="isEmpty.nom ? 'is-invalid' : ''" v-model="data.nom" placeholder="ex: Jane">
                        </div>

                        <div class="et-form-group">
                            <label>Last Name</label>
                            <input type="text" :class="isEmpty.prenom ? 'is-invalid' : ''" v-model="data.prenom" placeholder="ex: Smith">
                        </div>

                        <div class="et-form-group">
                            <label>Email</label>
                            <input type="email" :class="isEmpty.email ? 'is-invalid' : ''" v-model="data.email" placeholder="ex: jane@example.com">
                        </div>

                        <div class="et-form-group">
                            <label>Phone</label>
                            <input type="tel" :class="isEmpty.phone ? 'is-invalid' : ''" v-model="data.phone" placeholder="ex: 0161000000">
                        </div>

                        <div class="et-form-group ">
                            <label>Profile</label>
                            <select name="" id="" v-model="data.type" :class="isEmpty.type ? 'is-invalid' : ''">
                                <option value="" disabled selected>Select your profile</option>
                                <option value="etudiant/doctorants">Students/Doctoral students</option>
                                <option value="postdoctorant/chercheurs/enseignant">Postdoctoral Fellow/Researchers/Teacher</option>
                                <option value="institution/ongs">Institution/NGOs</option>
                            </select>
                        </div>

                        <div class="et-form-group">
                            <label>Affiliation</label>
                            <input type="text" :class="isEmpty.affiliation ? 'is-invalid' : ''" v-model="data.affiliation" placeholder="ex: University A">
                        </div>

                        <div class="et-form-group ">
                            <label>Session</label>
                            <select name="" id="" v-model="data.session" :class="isEmpty.session ? 'is-invalid' : ''">
                                <option value="" disabled selected>Select your session</option>
                                <option value="Molecular Biology and Biodiversity Conservation">Molecular Biology and Biodiversity Conservation</option>
                                <option value="Molecular Approaches in Human and Animal Health">Molecular Approaches in Human and Animal Health</option>
                                <option value="Environment and Society within the One Health Framework">Environment and Society within the One Health Framework</option>
                                <option value="One Health Solutions in the Era of Molecular Biology: Success Stories">One Health Solutions in the Era of Molecular Biology: Success Stories</option>
                            </select>
                        </div>

                        <div class="et-form-group ">
                            <label>Presentation</label>
                            <select name="" id="" v-model="data.type_presentation" :class="isEmpty.type_presentation ? 'is-invalid' : ''">
                                <option value="" disabled selected>Select your presentation</option>
                                <option value="Talk">Talk</option>
                                <option value="Posters">Posters</option>
                            </select>
                        </div>

                        <div class="et-form-group full">
                            <label>Authors</label>

                            <div
                                v-for="(author, index) in data.authors"
                                :key="index"
                                class="author-row"
                                style="display:flex; gap:10px; margin-bottom:10px;"
                            >
                                <input
                                    type="text"
                                    placeholder="Full name"
                                    v-model="author.fullname"
                                    required
                                >

                                <input
                                    type="text"
                                    placeholder="Affiliation"
                                    v-model="author.affiliation"
                                    required
                                >

                                <button
                                    type="button"
                                    @click="removeAuthor(index)"
                                    v-if="data.authors.length > 1"
                                    class="btn-remove"
                                >
                                    ❌
                                </button>
                            </div>

                            <button
                                type="button"
                                class="btn-add"
                                @click="addAuthor"
                                style="margin-top:8px;"
                            >
                                ➕ Add author
                            </button>
                        </div>

                        <div class="et-form-group full">
                            <label>Abstract Title</label>
                            <input type="text" :class="isEmpty.title_resume ? 'is-invalid' : ''" v-model="data.title_resume" placeholder="Your Title">
                        </div>

                        <div class="et-form-group full">
                            <label>Abstract Text</label>
                            <textarea rows="18" maxlength="1000" :class="isEmpty.content_resume ? 'is-invalid' : ''" v-model="data.content_resume" placeholder="Your Abstract (max: 1000 characters)"></textarea>
                            <div class="et-counter">{{ data.content_resume.length }}/1000</div>
                        </div>

                        <div class="et-form-actions full">
                            <button type="submit" :disabled="isLoader">
                                <span v-if="!isLoader">
                                    Submit Abstract
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </span>
                                <span v-else>
                                    Submitting...
                                    <i class="fa-solid fa-spinner fa-spin"></i>
                                </span>
                            </button>
                        </div>

                        <!-- Messages d'alerte -->
                        <div v-if="alertMsg" :class="['alert', alertType]" style="margin-top:10px; font-size: 15px;">
                            {{ alertMsg }}
                        </div>

                    </form>
                </aside>

            </div>
        </div>
    </section>

</template>
<script setup>

    import { ref } from 'vue';
    import { postAbstractData } from '../../adminPages/api/abstract';
    import Swal from 'sweetalert2';

    const data = ref({
        nom: '',
        prenom: '',
        email: '',
        phone: '',
        type: '',
        session: '',
        type_presentation: '',
        affiliation: '',
        authors: [],
        title_resume: '',
        content_resume: '',
    })
    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const alertMsg = ref('')
    const alertType = ref('')

    const addAuthor = () => {
        data.value.authors.push({
            fullname: '',
            affiliation: ''
        })
    }

    const removeAuthor = (index) => {
        data.value.authors.splice(index, 1)
    }

    async function AddAbstractFunction() {

        for (const field in data.value) {
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
        }

        const allEmpty = Object.values(isEmpty.value).every(value => value === false)

        if (allEmpty) {
            isLoader.value = true
            await postAbstractData(data.value).then(res =>{
                isLoader.value = false
                for (const field in data.value) {
                    data.value[field] = ''
                }

                alertMsg.value = 'Abstract submitted successfully'
                alertType.value = 'success'
                Swal.fire({
                    icon: 'success',
                    title: '<span style="font-size: 20px; font-weight: 700;">Abstract submitted successfully</span>',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        title: 'swal-title-large'
                    }
                });
            }).catch(err => {
                isLoader.value = false
                alertMsg.value = 'The email has already been taken. Please use a different email address.'
                alertType.value = 'danger'
            }).finally(() => {
                isLoader.value = false
            })
        }
    }

</script>
<style scoped>
.alert.success {
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    padding: 10px;
    border-radius: 4px;
}

.alert.danger {
    color: #721c24;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    padding: 10px;
    border-radius: 4px;
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

    background-image: url("/assets/img/banner4.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;

    opacity: 0.3;
    z-index: -1;
}
.btn-add{
    background: #062d63;
    color: #fff;
    padding: 10px;
    font-size: 14px;
    border-radius: 15px;
}
.is-invalid{
    border: 2px solid #e90017;
}

/* ================================
   IMPORTANT DATES – UX PRO
================================ */

.important-dates {
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    border-left: 5px solid #062d63;
    border-radius: 12px;
    padding: 28px 30px;
}

.important-dates h3 {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 22px;
    font-weight: 600;
    color: #062d63;
    margin-bottom: 22px;
}

.important-dates h3::before {
    content: "";
    font-size: 22px;
}

.important-dates ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.important-dates li {
    position: relative;
    padding-left: 48px;
    padding-bottom: 20px;
    margin-bottom: 20px;
    border-bottom: 1px dashed #d1d5db;
}

.important-dates li:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.important-dates li::before {
    content: "";
    position: absolute;
    left: 0;
    top: 4px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #062d63;
    display: flex;
    align-items: center;
    justify-content: center;
}

.important-dates li::after {
    content: "✓";
    position: absolute;
    left: 10px;
    top: 7px;
    color: #ffffff;
    font-size: 14px;
    font-weight: bold;
}

.important-dates .date {
    font-size: 15px;
    font-weight: 700;
    color: #062d63;
    margin-bottom: 4px;
}

.important-dates .label {
    font-size: 16px;
    color: #4b5563;
    line-height: 1.5;
}

/* Responsive */
@media (max-width: 768px) {
    .important-dates {
        padding: 22px;
    }

    .important-dates li {
        padding-left: 42px;
    }
}
</style>