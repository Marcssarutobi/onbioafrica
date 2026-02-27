<template>
  <div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">Profils Settings</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                <li class="breadcrumb-item active">Profils</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <article class="card overflow-hidden mb-0">
                <div class="position-relative card-side-img overflow-hidden" style="min-height: 300px; background-image: url(/admin/assets/images/profile-bg.jpg)">
                    <div class="p-4 card-img-overlay rounded-start-0 auth-overlay d-flex align-items-center flex-column justify-content-center">
                        <h3 class="text-white mb-0 fst-italic">
                            "Changing your personal information"
                        </h3>
                    </div>
                </div>
            </article>
        </div>
        <!-- end col-->
    </div>

    <!-- end row-->
    <div class="px-3 mt-n4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="UpdateUserFunction">
                            <!-- Personal Info -->
                            <h5 class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light d-flex justify-content-center align-items-center gap-1">
                                <i class="ti ti-user-circle fs-lg"></i>
                                Personal Info
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">Full Name</label>
                                        <input type="text" v-model="currentUser.fullname" class="form-control" id="firstname" placeholder="Enter first name" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jobtitle" class="form-label">Email</label>
                                        <input type="email" v-model="currentUser.email" class="form-control" id="jobtitle" placeholder="e.g. jonh@example.com" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jobtitle" class="form-label">Role</label>
                                        <input v-model="currentUser.role" type="text" disabled class="form-control" id="jobtitle" placeholder="e.g. Admin" />
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- Submit -->
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-success" :disabled="isLoader">
                                    {{ isLoader ? 'please wait ...' : 'Save Changes' }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
        </div>
        <!-- end row-->
    </div>


    <!-- end row-->
    <div class="px-3 mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="UpdatepasswordFunction">
                            <!-- Personal Info -->
                            <h5 class="mb-3 text-uppercase bg-light-subtle p-1 border-dashed border rounded border-light d-flex justify-content-center align-items-center gap-1">
                                <i class="ti ti-lock fs-lg"></i>
                                Update Password
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Old Password</label>
                                        <input type="password" v-model="data.current_password" required class="form-control" id="userpassword" placeholder="Enter old password" />
                                        <span class="form-text fs-xs fst-italic text-muted">
                                            <a href="#" class="link-reset">Click here to change your password</a>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">New Password</label>
                                        <input type="password" class="form-control" v-model="data.new_password" required id="userpassword" placeholder="Enter new password" />
                                        <span class="form-text fs-xs fst-italic text-muted">
                                            <a href="#" class="link-reset">Click here to change your password</a>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" v-model="data.new_password_confirmation" required id="userpassword" placeholder="Confirm new password" />
                                        <span class="form-text fs-xs fst-italic text-muted">
                                            <a href="#" class="link-reset">Click here to change your password</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- Submit -->
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-success" :disabled="isLoader">
                                    {{ isLoader ? 'please wait ...' : 'Save Changes' }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
        </div>
        <!-- end row-->
    </div>

  </div>
</template>

<script setup>
    import { onMounted, ref } from 'vue';
    import { isAuthenticated } from '../../../router';
    import { postData } from '../../plugins/api';
    import { updateUser } from '../api/user';
    import Swal from 'sweetalert2';

    const currentUser = ref({})
    const isLoader = ref(false)

    const data = ref({
        current_password:'',
        new_password:'',
        new_password_confirmation:''
    })
    const isEmpty = ref({})
    const msgInput = ref({})

    async function Userinfo() {
        currentUser.value = await isAuthenticated()
    }

    async function UpdateUserFunction() {
        isLoader.value = true
        await updateUser(currentUser.value.id,currentUser.value).then(()=>{
            isLoader.value = false
            Swal.fire({
                icon: 'success',
                title: 'User updated successfully',
                showConfirmButton: false,
                timer: 1500
            });
            Userinfo()
        })
    }

    async function UpdatepasswordFunction() {
        try {
            
            for (const field in data.value) {
                isEmpty.value[field] = !data.value[field]
                msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
            }

            const allEmpty = Object.values(isEmpty.value).every(value => value === false)

            if (allEmpty) {
                isLoader.value = true
                await postData('/user/profile/change-password/'+currentUser.value.id,data.value).then(res=>{
                    if (res.status === 200) {
                        isLoader.value = false
                        for (const field in data.value) {
                            data.value[field] = ''
                        }
                        Swal.fire({
                            icon: 'success',
                            title: 'Password updated successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
            }

        } catch (error) {
            console.log(error)
            isLoader.value = false
            Swal.fire({
                icon: 'error',
                title: 'An error occurred with these products. Please check your password.',
                showConfirmButton: false,
                timer: 1500
            });
        }
    }

    onMounted(()=>{
        Userinfo()
    })

</script>

<style>

</style>