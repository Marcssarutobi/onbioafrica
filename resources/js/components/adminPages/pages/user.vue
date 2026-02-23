<template >
    <div class="container-fluid">
        
        <div class="page-title-head d-flex align-items-center">
            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">List of Users</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div></div>
                            <button class="btn btn-primary" @click="showModal"><i class="fas fa-plus me-1"></i> Add User</button>
                        </div>

                        <div class="table-responsive">
                            <DataTable :data="allusers" :columns="columns" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <Modal :id="'adduser'" :title="modalTitle" :btn-text="modalBtn" :isLoading="isLoader" ref="addmodal" @submit="!isEdite ? AddUserFunction() : UpdateUserFunction()">

            <div class="row">

                <div class="col-lg-6 mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" v-model="data.fullname">
                    <div class="text-danger mt-1" v-if="isEmpty.fullname">{{ msgInput.fullname }}</div>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" v-model="data.email">
                    <div class="text-danger mt-1" v-if="isEmpty.email">{{ msgInput.email }}</div>
                </div>  

                <div class="col-lg-12 mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" v-model="data.role" class="form-select">
                        <option value="">Select Role</option>
                        <option value="superadmin">Super Admin</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <div class="text-danger mt-1" v-if="isEmpty.role">{{ msgInput.role }}</div>
                </div>

                <div class="col-lg-6 mb-3" v-if="!isEdite">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" v-model="data.password">
                    <div class="text-danger mt-1" v-if="isEmpty.password">{{ msgInput.password }}</div>
                </div>

                <div class="col-lg-6 mb-3" v-if="!isEdite">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" v-model="data.password_confirmation">
                    <div class="text-danger mt-1" v-if="isEmpty.password_confirmation">{{ msgInput.password_confirmation }}</div>
                </div>

            </div>

        </Modal>

    </div>
</template>
<script setup>

    import { onMounted, ref, render } from 'vue';
    import DataTable from '../Datatable/Datatable.vue'
    import Swal from 'sweetalert2';
    import Modal from '../Modal/modal.vue';
    import { allUsers, deleteUser, postUser, singleUser, updateUser } from '../api/user';

    const data = ref({
        id:'',
        fullname:'',
        email:'',
        password:'',
        password_confirmation:'',
        role:''
    })

    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const isEdite = ref(false)
    const modalTitle = ref('')
    const modalBtn = ref('')
    const allusers = ref([])
    const addmodal = ref(null)

    function showModal(){
        data.value = {
            id:'',
            fullname:'',
            email:'',
            password:'',
            password_confirmation:'',
            role:''
        }
        isEdite.value = false
        modalTitle.value = 'Add Committee'
        modalBtn.value = 'Save'
        isEmpty.value = {}
        msgInput.value = {}
        addmodal.value.show()
    }

    async function AllUserFunction() {
        allusers.value = await allUsers()
    }

    const columns = [
        {
            title: '#',
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + 1; // Index (1-based)
            }
        },
        { 
            title: 'Full Name', 
            data: null,
            render: (data, type, row)=>{
                return `<span class='fw-bold'>${row.fullname}</span>`
            }
        },
        {
            title: 'Email', 
            data: null,
            render: (data, type, row)=>{
                return `<span class=''>${row.email}</span>`
            }
        },
        {
            title: 'Role', 
            data: null,
            render: (data, type, row)=>{
                return `<span class=' text-capitalize'>${row.role}</span>`
            }
        },
        {
            title: 'Created At', data: 'created_at', render: (data, type, row) => {
                // Formater la date
                const date = new Date(row.created_at); // Assure-toi que `created_at` est au format ISO ou timestamp
                return new Intl.DateTimeFormat('en-EN', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                }).format(date); // Formater la date à la française
            }
        },
        {
            title: 'Actions',
            data: null,
            render: function (data, type, row) {

                return `
                    <div class="d-flex align-items-center">
                        <a onClick="getUserFunction(${row.id})" class="btn btn-secondary text-white  me-2" data-bs-toggle="modal" data-bs-target="#addprogram">
                            <i class="fa fa-edit "></i> 
                        </a> 
                        <a onClick="deleteUserFunction(${row.id})" class="btn btn-danger text-white me-2">
                            <i class="fa fa-trash "></i> 
                        </a> 
                    </div>`;
            }
        }
    ]

    async function AddUserFunction() {
        const ignoredFields = ['id']
        for (const field in data.value) {
            if (ignoredFields.includes(field)) continue
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
        }

        const allEmpty = Object.values(isEmpty.value).every(value => value === false)

        if (allEmpty){
            isLoader.value = true
            await postUser(data.value).then(res=>{
                 isLoader.value = false
                for (const field in data.value) {
                    data.value[field] = ''
                }
                Swal.fire({
                    icon: 'success',
                    title: 'User created successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
                addmodal.value.hide();
                AllUserFunction()
            }).catch(err=>{
                isLoader.value = false
                if (err.response.status === 422) {
                    const errors = err.response.data.errors;
                    for (const field in errors) {
                        isEmpty.value[field] = true;
                        msgInput.value[field] = errors[field][0];
                    }
                } else {
                    Swal.fire('Error', 'An error occurred while adding the user.', 'error');
                }
            }).finally(()=>{
                isLoader.value = false
            })
        }
    }

    window.getUserFunction = async function(id){
        data.value = await singleUser(id)
        isEdite.value = true
        modalTitle.value = 'Edit User'
        modalBtn.value = 'Update'
        addmodal.value.show()
    }

    async function UpdateUserFunction() {
        isLoader.value = true
        await updateUser(data.value.id, data.value).then(res=>{
            isLoader.value = false
            for (const field in data.value) {
                data.value[field] = ''
            }
            Swal.fire({
                icon: 'success',
                title: 'User updated successfully',
                showConfirmButton: false,
                timer: 1500
            });
            addmodal.value.hide();
            AllUserFunction()
        }).catch(err=>{
            isLoader.value = false
            if (err.response.status === 422) {
                const errors = err.response.data.errors;
                for (const field in errors) {
                    isEmpty.value[field] = true;
                    msgInput.value[field] = errors[field][0];
                }
            } else {
                Swal.fire('Error', 'An error occurred while updating the user.', 'error');
            }
        }).finally(()=>{
            isLoader.value = false
        })
    }

    window.deleteUserFunction = async function(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                // Call your delete API here with the id
                 await deleteUser(id);
                Swal.fire(
                    'Deleted!',
                    'The user has been deleted.',
                    'success'
                )
                AllUserFunction()
            }
        })
    }

    onMounted(() => {
        AllUserFunction()
    })

</script>
<style scoped>
    
</style>