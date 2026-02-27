<template>
  
    <!-- BREADCRUMB SECTION START -->
    <section class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('../assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Guest Registration</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><RouterLink to="/" class="hover:text-etBlue">Home</RouterLink></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">Guest Registration</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <section class="et-about">
        <div class="et-container">

            <div class="et-grid">

                <!-- LEFT COLUMN : INFO -->
                <div class="et-left">

                    <header class="et-heading">
                        <span class="et-section-sub-title anim-text">Guest Registration</span>
                        <h2 class="et-section-title anim-text">Register as a Guest</h2>
                        <p class="rev-slide-up">
                            Welcome! Please register as a guest to participate in our event. Whether you represent an organization or are a researcher wishing to attend, please fill in your personal information carefully. All fields are mandatory.
                        </p>
                    </header>

                    <!-- Info Cards -->
                    <div class="et-info-cards">
                        <div class="info-card-small">
                            <h4>Who Can Register</h4>
                            <p>Researchers, students, professionals and organization representatives</p>
                        </div>
                        <div class="info-card-small highlight">
                            <h4>Participation Fee</h4>
                            <p>Fees vary by profile. Secure online payment required</p>
                        </div>
                        <div class="info-card-small">
                            <h4>Confirmation</h4>
                            <p>Email confirmation sent after payment verification</p>
                        </div>
                        <div class="info-card-small">
                            <h4>Support</h4>
                            <p>Contact us for any registration issues or questions</p>
                        </div>
                    </div>

                    <!-- Trust Badges -->
                    <div class="trust-badges">
                        <div class="trust-badge">
                            <i class="fa-solid fa-lock"></i>
                            <span>Secure Payment</span>
                        </div>
                        <div class="trust-badge">
                            <i class="fa-solid fa-envelope-open-text"></i>
                            <span>Instant Confirmation</span>
                        </div>
                        <div class="trust-badge">
                            <i class="fa-solid fa-headset"></i>
                            <span>24/7 Support</span>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN : FORM -->
                <aside class="et-form-card">

                    <h3>Guest Registration Form</h3>
                    <p class="et-form-subtitle">
                        Complete all fields carefully to secure your spot at the symposium.
                    </p>

                    <form class="et-form-grid" @submit.prevent="PaiementRequestService">

                        <div class="et-form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter your first name" required v-model="data.prenom">
                        </div>

                        <div class="et-form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter your last name" required v-model="data.nom">
                        </div>

                        <div class="et-form-group full">
                            <label>Profile</label>
                            <select name="" id="" v-model="data.type">
                                <option value="" disabled selected>Select your profile</option>
                                <option value="etudiant/doctorants">Students/Doctoral students</option>
                                <option value="postdoctorant/chercheurs/enseignant">Postdoctoral Fellow/Researchers/Teacher</option>
                                <option value="institution/ongs">Institution/NGOs</option>
                            </select>
                        </div>

                        <div class="et-form-group">
                            <label>Email Address</label>
                            <input type="email" placeholder="your@email.com" required v-model="data.email">
                        </div>

                        <div class="et-form-group">
                            <label>Phone Number</label>
                            <input type="tel" placeholder="+229 XX XX XX XX" required @input="onlyNumbers" v-model="data.phone">
                        </div>

                        <!-- Fee Notice -->
                        <div class="fee-notice">
                            <div class="fee-icon">
                                <i class="fa-solid fa-credit-card"></i>
                            </div>
                            <div class="fee-text">
                                <h5>Registration Fee</h5>
                                <p>One-time payment for full event access</p>
                            </div>
                            <div class="fee-amount" v-if="montant > 0">{{ new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'XOF' }).format(montant)  }}</div>
                        </div>

                        <div class="et-form-actions">
                            <button type="submit" :disabled="isLoader">
                                <span v-if="!isLoader">
                                    Complete Registration
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </span>
                                <span v-else>
                                    Processing Payment...
                                    <i class="fa-solid fa-spinner fa-spin"></i>
                                </span>
                            </button>
                        </div>

                        <!-- Alert Messages -->
                        <div v-if="alertMsg" :class="['alert', alertType]">
                            <i v-if="alertType === 'success'" class="fa-solid fa-circle-check"></i>
                            <i v-else class="fa-solid fa-circle-exclamation"></i>
                            {{ alertMsg }}
                        </div>

                    </form>

                </aside>

            </div>
        </div>
    </section>


</template>

<script setup>
    import { computed, ref } from 'vue'
import { postGuest } from '../../adminPages/api/guest'
import { postData } from '../../plugins/api'
import Swal from 'sweetalert2'


    const data = ref({
        nom:'',
        prenom:'',
        phone:'',
        type:'',
        email:'',
    })
    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const alertMsg = ref('')
    const alertType = ref('')

    const tarif = {
        "etudiant/doctorants":10000,
        "postdoctorant/chercheurs/enseignant": 15000,
        "institution/ongs":30000
    }

    function onlyNumbers(e) {
        e.target.value = e.target.value.replace(/\D+/g, '')
        data.value.phone = e.target.value
    }

    const montant = computed(()=>{
        return tarif[data.value.type] || 0
    })

    async function PaiementRequestService(){

        for (const field in data.value) {
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
        }
        const allEmpty = Object.values(isEmpty.value).every(value => value === false)
        if(allEmpty){
            isLoader.value = true
            FedaPay.init({
                public_key: 'pk_sandbox_5OnNHVYU_bEh8gKO4RpLXF2F',
                transaction: {
                    amount: montant.value,
                    description: `Registration fee - ${data.value.type}`,
                },
                customer: {
                    email: data.value.email,
                    lastname: data.value.nom,
                    firstname: data.value.prenom,
                },
                onComplete: (response)=>{
                    if (response.transaction.id) {
                        // Swal.fire({
                        //     title: 'Check is in progress...',
                        //     text: 'Please wait',
                        //     allowOutsideClick: false,
                        //     allowEscapeKey: false,
                        //     didOpen: () => {
                        //         Swal.showLoading()
                        //     }
                        // })
                        verifierPaiement(response.transaction.id)
                    }
                }
            }).open()
        }
    }

    async function verifierPaiement(transactionId){
        try {
            await postData('/verifier-paiement',{
                transaction_id: transactionId
            }).then(async(res)=>{
                if (res.data.status === 'approved') {
                    AddGuestFunction()
                }else{
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: 'error',
                        title: 'Payment not confirmed',
                        showConfirmButton: false,
                        timer: 4000
                    });
                }
            })
        } catch (e) {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: 'error',
                title: 'Erreur de vérification du paiement',
                showConfirmButton: false,
                timer: 4000
            });
        }
    }


    async function AddGuestFunction(){
        isLoader.value = true
        await postGuest(data.value).then(res=>{
            isLoader.value = false
            alertMsg.value = 'Registration successful! Please check your email for confirmation.'
            alertType.value = 'success'
            data.value = {
                nom:'',
                prenom:'',
                phone:'',
                email:'',
            }
        }).catch(err=>{
            isLoader.value = false
            alertMsg.value = 'An error occurred during registration. Please try again later.'
            alertType.value = 'error'
        }).finally(()=>{
            setTimeout(() => {
                alertMsg.value = ''
            }, 5000)
        })
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

 /* ============================================
    GUEST REGISTRATION - BASED ON output.css
============================================ */

.et-about {
    position: relative;
    padding-top: clamp(80px, 8.3vw, 160px);
    padding-bottom: clamp(80px, 8.2vw, 158px);
    background-color: #F8FAFF;
    overflow: hidden;
}

/* Background decoration */
.et-about::before {
    content: '';
    position: absolute;
    top: -200px;
    right: -200px;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(6, 45, 99, 0.03) 0%, transparent 70%);
    border-radius: 50%;
    pointer-events: none;
}

.et-container {
    margin-left: auto;
    margin-right: auto;
    max-width: clamp(1150px, 79.35vw, 1510px);
    padding-left: 12px;
    padding-right: 12px;
    position: relative;
    z-index: 1;
}

@media screen and (max-width: 1399px) {
    .et-container {
        max-width: 100%;
    }
}

/* ============================================
    GRID LAYOUT - 45% INFO / 55% FORM
    ============================================ */

.et-grid {
    display: grid;
    grid-template-columns: 2.5fr 3fr;
    gap: clamp(40px, 4.20vw, 80px);
    align-items: start;
}

@media screen and (max-width: 1199px) {
    .et-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}

/* ============================================
    LEFT COLUMN - INFO
    ============================================ */

.et-left {
    position: relative;
}

.et-heading {
    margin-bottom: clamp(30px, 3.15vw, 60px);
}

.et-section-sub-title {
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

.et-section-sub-title::before {
    content: '';
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, var(--color-etBlue), var(--color-etLpink));
}

.et-section-title {
    font-size: clamp(38px, 2.52vw, 48px);
    font-weight: 500;
    color: var(--color-etBlack);
    line-height: 1.2;
    margin-bottom: clamp(20px, 2.21vw, 42px);
}

.et-heading > p {
    font-size: clamp(16px, 1.05vw, 20px);
    font-weight: 300;
    color: var(--color-etGray);
    line-height: 1.9;
    text-align: left;
}

/* Info Cards Grid */
.et-info-cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: clamp(15px, 1.58vw, 30px);
}

@media screen and (max-width: 767px) {
    .et-info-cards {
        grid-template-columns: 1fr;
    }
}

.info-card-small {
    background-color: var(--color-white);
    border-radius: clamp(15px, 1.58vw, 30px);
    padding: clamp(20px, 2.10vw, 40px);
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
    border-left: 3px solid var(--color-etBlue);
    transition: all 400ms cubic-bezier(0.4, 0, 0.2, 1);
}

.info-card-small:hover {
    box-shadow: 0 20px 60px -15px rgba(6, 45, 99, 0.15);
    transform: translateY(-5px);
}

.info-card-small.highlight {
    background: linear-gradient(135deg, var(--color-etBlue) 0%, #001B52 100%);
    border-left: none;
    color: var(--color-white);
}

.info-card-small.highlight h4 {
    color: var(--color-white);
}

.info-card-small.highlight p {
    color: rgba(255, 255, 255, 0.9);
}

.info-card-small h4 {
    font-size: clamp(16px, 1.05vw, 20px);
    font-weight: 600;
    color: var(--color-etBlack);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.info-card-small h4::before {
    content: '';
    width: 6px;
    height: 6px;
    background-color: var(--color-etBlue);
    border-radius: 50%;
}

.info-card-small.highlight h4::before {
    background-color: var(--color-etLpink);
}

.info-card-small p {
    font-size: clamp(13px, 0.84vw, 16px);
    color: var(--color-etGray);
    line-height: 1.6;
}

/* ============================================
    RIGHT COLUMN - FORM CARD
    ============================================ */

.et-form-card {
    background-color: var(--color-white);
    border-radius: clamp(20px, 1.58vw, 30px);
    padding: clamp(30px, 3.15vw, 60px);
    box-shadow: 0 4px 60px rgba(18, 96, 254, 0.12);
    position: relative;
    overflow: hidden;
}

.et-form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--color-etBlue), var(--color-etLpink));
}

.et-form-card h3 {
    font-size: clamp(24px, 1.58vw, 30px);
    font-weight: 600;
    color: var(--color-etBlack);
    margin-bottom: clamp(8px, 0.79vw, 15px);
}

.et-form-subtitle {
    font-size: clamp(14px, 0.89vw, 17px);
    color: var(--color-etGray);
    margin-bottom: clamp(25px, 2.63vw, 50px);
    padding-bottom: clamp(20px, 2.10vw, 40px);
    border-bottom: 1px solid #ECECEC;
}

/* Form Grid */
.et-form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: clamp(15px, 1.58vw, 30px);
}

@media screen and (max-width: 767px) {
    .et-form-grid {
        grid-template-columns: 1fr;
    }
}

.et-form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.et-form-group.full {
    grid-column: span 2;
}

@media screen and (max-width: 767px) {
    .et-form-group.full {
        grid-column: span 1;
    }
}

.et-form-group label {
    font-size: clamp(13px, 0.84vw, 16px);
    font-weight: 500;
    color: var(--color-etBlack);
    display: flex;
    align-items: center;
    gap: 6px;
}

.et-form-group label::after {
    content: '*';
    color: #EF0157;
    font-size: 12px;
}

.et-form-group input {
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

.et-form-group input::placeholder {
    color: var(--color-etGray2);
}

.et-form-group input:focus {
    outline: none;
    border-color: var(--color-etBlue);
    background-color: var(--color-white);
    box-shadow: 0 4px 25px rgba(56, 75, 255, 0.15);
}


.et-form-group select {
    width: 100%;
    height: clamp(45px, 2.94vw, 56px);
    padding-left: clamp(15px, 1.58vw, 30px);
    padding-right: clamp(40px, 3.15vw, 60px); /* Espace pour la flèche */
    border: 1px solid #ECECEC;
    border-radius: clamp(15px, 1.58vw, 30px);
    font-size: clamp(14px, 0.89vw, 17px);
    color: var(--color-etBlack);
    background-color: #F8FAFF;
    cursor: pointer;
    appearance: none; /* Supprime le style natif */
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23062d63' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right clamp(15px, 1.58vw, 30px) center;
    background-size: 16px;
    transition: all 300ms ease;
}

.et-form-group select:hover {
    border-color: var(--color-etBlue);
    background-color: #EDF3FE;
}

.et-form-group select:focus {
    outline: none;
    border-color: var(--color-etBlue);
    background-color: var(--color-white);
    box-shadow: 0 4px 25px rgba(56, 75, 255, 0.15);
}

/* Style pour l'option par défaut (placeholder) */
.et-form-group select:required:invalid {
    color: var(--color-etGray2);
}

.et-form-group select option {
    color: var(--color-etBlack);
    font-size: clamp(14px, 0.89vw, 17px);
    padding: 10px;
}

.et-form-group select option:first-child {
    color: var(--color-etGray2);
}

/* État disabled */
.et-form-group select:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    background-color: #E5E5E5;
}

/* Fee Notice */
.fee-notice {
    grid-column: span 2;
    background: linear-gradient(135deg, #F2F6FE 0%, #E7EFFF 100%);
    border-radius: clamp(15px, 1.58vw, 30px);
    padding: clamp(15px, 1.58vw, 30px);
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: clamp(10px, 1.05vw, 20px);
}

@media screen and (max-width: 767px) {
    .fee-notice {
        grid-column: span 1;
        flex-direction: column;
        text-align: center;
    }
}

.fee-icon {
    width: 50px;
    height: 50px;
    background: var(--color-etBlue);
    color: var(--color-white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.fee-text h5 {
    font-size: clamp(15px, 0.95vw, 18px);
    font-weight: 600;
    color: var(--color-etBlack);
    margin-bottom: 4px;
}

.fee-text p {
    font-size: clamp(13px, 0.84vw, 16px);
    color: var(--color-etGray);
}

.fee-amount {
    margin-left: auto;
    font-size: clamp(24px, 1.58vw, 30px);
    font-weight: 700;
    color: var(--color-etBlue);
}

@media screen and (max-width: 767px) {
    .fee-amount {
        margin-left: 0;
    }
}

/* Submit Button */
.et-form-actions {
    grid-column: span 2;
}

@media screen and (max-width: 767px) {
    .et-form-actions {
        grid-column: span 1;
    }
}

.et-form-actions button {
    width: 100%;
    height: clamp(50px, 3.15vw, 60px);
    background: linear-gradient(135deg, var(--color-etBlue) 0%, #001B52 100%);
    color: var(--color-white);
    font-size: clamp(15px, 0.95vw, 18px);
    font-weight: 600;
    border: none;
    border-radius: clamp(15px, 1.58vw, 30px);
    cursor: pointer;
    transition: all 400ms ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
}

.et-form-actions button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 500ms ease;
}

.et-form-actions button:hover:not(:disabled)::before {
    left: 100%;
}

.et-form-actions button:hover:not(:disabled) {
    box-shadow: 0 10px 40px -10px rgba(6, 45, 99, 0.4);
    transform: translateY(-2px);
}

.et-form-actions button:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

/* Alert Messages */
.alert {
    grid-column: span 2;
    padding: 15px 20px;
    border-radius: 12px;
    font-size: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

@media screen and (max-width: 767px) {
    .alert {
        grid-column: span 1;
    }
}

.alert.success {
    background-color: #d1fae5;
    color: #065f46;
    border: 1px solid #a7f3d0;
}

.alert.error {
    background-color: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
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
    TRUST BADGES
    ============================================ */

.trust-badges {
    display: flex;
    gap: 20px;
    margin-top: 30px;
    flex-wrap: wrap;
}

@media screen and (max-width: 1199px) {
    .trust-badges {
        justify-content: center;
    }
}

.trust-badge {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: var(--color-etGray);
}

.trust-badge i {
    color: var(--color-etBlue);
    font-size: 16px;
}
</style>