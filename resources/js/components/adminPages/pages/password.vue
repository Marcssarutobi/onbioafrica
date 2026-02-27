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
                            <p class="text-muted w-lg-75 mt-3 mx-auto">Change your password</p>
                        </div>

                        <form @submit.prevent="ChangePasswordFunction">
                            <div class="mb-3" data-password="bar">
                                <label for="userPassword" class="form-label">
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="password" v-model="data.password" class="form-control" id="userPassword" placeholder="••••••••" required />
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="userNewPassword" class="form-label">
                                    Confirm New Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="password" v-model="data.password_confirmation" class="form-control" id="userNewPassword" placeholder="••••••••" required />
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-semibold py-2" :disabled="isLoader">
                                    {{ isLoader ? 'Please Wait ...' : 'Send Request' }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { onMounted, ref } from 'vue';
import { postData } from '../../plugins/api';
import { isAuthenticated } from '../../../router';
import Swal from 'sweetalert2';


    const data = ref({
        password: '',
        password_confirmation:'',
    })
    const currentUser = ref({})
    const isLoader = ref(false)

    async function Userinfo() {
        currentUser.value = await isAuthenticated()
    }

    async function ChangePasswordFunction() {
        isLoader.value = true
        await postData('/user/reset/'+currentUser.value.id,data.value).then(res=>{
            if (res.status === 200) {
                isLoader.value = false
                Swal.fire({
                    icon: 'success',
                    title: 'Password updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
                localStorage.removeItem('token')
                localStorage.removeItem('redirectAfterLogin');
                currentUser.value = {}
                window.location.href = '/admins/login'
            }
        })
    }

    onMounted(()=>{
        Userinfo()
    })

</script>

<style>

</style>