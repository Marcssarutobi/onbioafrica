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
                        <h2 class="et-section-title mb-[24px] md:mb-[19px] anim-text">Register as a Guest</h2>
                        <p class="mb-[30px] text-[18px] font-light text-etGray md:mb-[30px] rev-slide-up" style="text-align: justify;">
                            Welcome! Please register as a guest to participate in our event. Fill in your personal details carefully. All fields are mandatory. Once submitted, you will receive a confirmation email with further instructions.
                        </p>
                    </header>

                    

                    <ul class="et-info-list">
                        <li>
                            <span class="et-icon"><i class="fa-solid fa-user"></i></span>
                            <div>
                                <strong>Who can register</strong>
                                <span>Researchers, students, professionals</span>
                            </div>
                        </li>

                        <li>
                            <span class="et-icon"><i class="fa-solid fa-envelope"></i></span>
                            <div>
                                <strong>Email</strong>
                                <span>A valid email is required for confirmation</span>
                            </div>
                        </li>

                        <li>
                            <span class="et-icon"><i class="fa-solid fa-phone"></i></span>
                            <div>
                                <strong>Phone</strong>
                                <span>Provide a reachable phone number</span>
                            </div>
                        </li>
                    </ul>

                </div>

                <!-- RIGHT COLUMN : FORM -->
                <aside class="et-form-card">

                    <h3>Guest Registration Form</h3>
                    <p class="et-form-subtitle">
                        Complete all fields carefully to secure your spot.
                    </p>

                    <form class="et-form-grid" @submit.prevent="AddGuestFunction">

                        <div class="et-form-group">
                            <label>First Name</label>
                            <input type="text" required v-model="data.prenom">
                        </div>

                        <div class="et-form-group">
                            <label>Last Name</label>
                            <input type="text" required v-model="data.nom">
                        </div>

                        <div class="et-form-group">
                            <label>Email</label>
                            <input type="email" required v-model="data.email">
                        </div>

                        <div class="et-form-group">
                            <label>Phone</label>
                            <input type="tel" required v-model="data.phone">
                        </div>

                        <div class="et-form-actions full">
                            <button type="submit" :disabled="isLoader">
                                <span v-if="!isLoader">
                                    Register
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
    import { ref } from 'vue'
import { postGuest } from '../../adminPages/api/guest'


    const data = ref({
        nom:'',
        prenom:'',
        phone:'',
        email:'',
    })
    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const alertMsg = ref('')
    const alertType = ref('')

    async function AddGuestFunction(){
        for (const field in data.value) {
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
        }

        const allEmpty = Object.values(isEmpty.value).every(value => value === false)

        if (allEmpty){
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
</style>