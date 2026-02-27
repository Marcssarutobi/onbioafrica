<template>
  
    <div class="position-absolute top-0 end-0">
        <img src="/admin/assets/images/auth-card-bg.svg" class="auth-card-bg-img" alt="auth-card-bg" />
    </div>
    <div class="position-absolute bottom-0 start-0" style="transform: rotate(180deg)">
        <img src="/admin/assets/images/auth-card-bg.svg" class="auth-card-bg-img" alt="auth-card-bg" />
    </div>
    <div class="auth-box overflow-hidden align-items-center d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-md-6 col-sm-8">
                    <div class="card p-4">
                        <div class="auth-brand text-center mb-4">
                            <a href="#" class="logo-dark" style="height: 80px !important;">
                                <img src="/admin/assets/images/logos/logoA.png" alt="dark logo" style="height: 80px !important;" />
                            </a>
                            <a href="#" class="logo-light">
                                <img src="/admin/assets/images/logos/logoA.png" alt="logo" />
                            </a>
                            <p v-if="!codeSend" class="text-muted w-lg-75 mt-3 mx-auto">Enter your email address and we'll send you a link to reset your password.</p>
                            <p v-else class="text-muted w-lg-75 mt-3 mx-auto">Verify the code received</p>
                        </div>

                        <form @submit.prevent="SendResetCodeFunction" v-if="!codeSend">
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">
                                    Email address
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="email" v-model="data.email" class="form-control" id="userEmail" placeholder="you&#64;example.com" required />
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-semibold py-2" :disabled="isLoader">
                                    {{ isLoader ? 'Please Wait ...' : 'Send Request' }}
                                </button>
                            </div>
                        </form>

                        <form v-else @submit.prevent="VerifyCodSendFunction">
                            

                            <div class="mb-3">
                                <label class="form-label">
                                    Enter your 6-digit code
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="d-flex gap-2 two-factor">
                                    <input
                                        v-for="(digit, index) in codeInputs"
                                        :key="index"
                                        ref="inputs"
                                        v-model="codeInputs[index]"
                                        type="text"
                                        class="form-control text-center"
                                        maxlength="1"
                                        inputmode="numeric"
                                        @input="onInput($event, index)"
                                        @keydown="onKeydown($event, index)"
                                    />
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-semibold py-2" :disabled="isLoader">
                                    {{ isLoader ? 'Please Wait ...' : 'Update Password' }}
                                </button>
                            </div>
                        </form>

                        <p class="text-muted text-center mt-4 mb-0">
                            Return to
                            <RouterLink to="/admins/login" class="text-decoration-underline link-offset-3 fw-semibold">Sign in</RouterLink>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
    import { ref, watch, nextTick, computed } from 'vue';
    import { postData } from '../../plugins/api';
    import { useRouter } from 'vue-router';


    const data = ref({
        email:'',
        reset_code:''
    })
    const isLoader = ref(false)
    const codeSend = ref(false)
    const isEmpty = ref({})
    const msgInput = ref({})
    const router =useRouter()

    async function SendResetCodeFunction() {

        const ignoredFields = ['reset_code']
        for (const field in data.value) {
            if (ignoredFields.includes(field)) continue
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
        }

        const allEmpty = Object.values(isEmpty.value).every(value => value === false)

        if (allEmpty){
            isLoader.value = true
            await postData('/user/sendCode',data.value).then(res=>{
                if (res.status === 200) {
                    isLoader.value = false
                    codeSend.value = true
                }
            })
        }
    }

    // tableau des 6 chiffres
    const codeInputs = ref(Array(6).fill(''))

    // références vers les inputs
    const inputs = ref([])

    // gestion de la saisie
    const onInput = (event, index) => {
        let value = event.target.value.replace(/\D/g, '')

        if (value.length > 1) {
            value = value.charAt(0)
        }

        event.target.value = value
        codeInputs.value[index] = value

        // focus automatique
        if (value && index < inputs.value.length - 1) {
            inputs.value[index + 1].focus()
        }
    }

    // gestion du retour arrière
    const onKeydown = (event, index) => {
        if (event.key === 'Backspace' && !event.target.value && index > 0) {
            inputs.value[index - 1].focus()
        }
    }

    const resetCode = computed(() => codeInputs.value.join(''))

    // synchro automatique
    watch(resetCode, (val) => {
        data.value.reset_code = val
    })

    // focus sur le premier champ au chargement
    nextTick(() => {
        inputs.value[0]?.focus()
    })

    async function VerifyCodSendFunction() {

        if (data.value.reset_code.length !== 6) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid code',
                text: 'Please enter the 6-digit verification code.'
            })
            return
        }

        isLoader.value = true
        await postData('/user/verify',data.value).then(res=>{
            if (res.status === 200) {
                isLoader.value = false
                localStorage.setItem('token', res.data.token)
                router.push('/admins/changepassword')
            }
        })
    }

</script>

<style>

</style>