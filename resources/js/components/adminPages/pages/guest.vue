<template>
  <div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">List of guests</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                <li class="breadcrumb-item active">Guests</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <label for="presenceSelect">Filter by presence :</label>
                            <select class="form-select" name="presenceSelect" id="presenceSelect" @change="handlePresenceChange($event)">
                                <option value="all">All Guests</option>
                                <option value="true">Present Guests</option>
                                <option value="false">Absent Guests</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" @click="showModal"><i class="fas fa-plus me-1"></i> Add Guest</button>
                    </div>

                    <div class="table-responsive">
                        <DataTable :data="allguests" :columns="columns" />
                    </div>

                </div>
            </div>
        </div>
    </div>

    <Modal :id="'addprogram'" :title="modalTitle" :btn-text="modalBtn" :isLoading="isLoader" ref="addmodal" @submit="!isEdite ? AddGuestFunction() : UpdateGuestFunction()">
        
        <div class="row">

            <div class="col-lg-6 mb-3">
                <label for="nom" class="form-label">First Name</label>
                <input type="text" class="form-control" id="nom" v-model="data.nom">
                <div class="text-danger mt-1" v-if="msgInput.nom">{{ msgInput.nom }}</div>
            </div>

            <div class="col-lg-6 mb-3">
                <label for="prenom" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="prenom" v-model="data.prenom">
                <div class="text-danger mt-1" v-if="msgInput.prenom">{{ msgInput.prenom }}</div>
            </div>

            <div class="col-lg-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" v-model="data.phone">
                <div class="text-danger mt-1" v-if="msgInput.phone">{{ msgInput.phone }}</div>
            </div>

            <div class="col-lg-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" v-model="data.email">
                <div class="text-danger mt-1" v-if="msgInput.email">{{ msgInput.email }}</div>
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
    import { allGuests, deleteGuest, postGuest, singleGuest, updateGuest, guestsByPresence, toggleGuestPresence } from '../api/guest';

    const data = ref({
        id:'',
        nom:'',
        prenom:'',
        phone:'',
        email:'',
    })

    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const isEdite = ref(false)
    const modalTitle = ref('')
    const modalBtn = ref('')
    const allguests = ref([])
    const addmodal = ref(null)

    function showModal(){
        data.value = {
            id:'',
            nom:'',
            prenom:'',
            phone:'',
            email:'',
        }
        isEdite.value = false
        modalTitle.value = 'Add Guest'
        modalBtn.value = 'Save'
        isEmpty.value = {}
        msgInput.value = {}
        addmodal.value.show()
    }

    async function AllGuestFunction() {
        allguests.value = await allGuests()
    }

    async function GuestsByPresenceFunction(status) {
        if (status === null) {
            await AllGuestFunction();
        } else {
            allguests.value = await guestsByPresence(status);
        }
    }

    // 🔹 Gestion du select
    function handlePresenceChange(event) {
        const value = event.target.value;
        if (value === 'all') {
            GuestsByPresenceFunction(null); // afficher tous
        } else {
            GuestsByPresenceFunction(value === 'true'); // true ou false
        }
    }

    const columns = [
        {
            title: 'Reference', 
            data: 'reference',
            render: (data, type, row)=>{
                return `<span class='fw-bold'>${row.reference}</span>`
            }
        },
        { 
            title: 'Full Name', 
            data: null,
            render: (data, type, row)=>{
                return `<span class='fw-bold'>${row.nom} ${row.prenom}</span>`
            }
        },
        {
            title: 'Phone', data: 'phone'
        },
        {
            title: 'Email', data: 'email'
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

                const PresenceBtn = !row.prensence
                    ? `
                        <a onClick="togglePrensenceFunction(${row.id})"
                        class="btn btn-success text-white me-2"
                        title="Dépublier">
                            <i class="fa fa-check"></i>
                        </a>
                    `
                    : `
                        <a onClick="togglePrensenceFunction(${row.id})"
                        class="btn btn-warning text-white me-2"
                        title="Publier">
                            <i class="fa fa-x"></i>
                        </a>
                    `;

                return `
                    <div class="d-flex align-items-center">
                        ${PresenceBtn}
                        <a onClick="getGuestFunction(${row.id})" class="btn btn-secondary text-white  me-2" data-bs-toggle="modal" data-bs-target="#addprogram">
                            <i class="fa fa-edit "></i> 
                        </a> 
                        <a onClick="DeleteGuestFunction(${row.id})" class="btn btn-danger text-white me-2">
                            <i class="fa fa-trash "></i> 
                        </a> 
                    </div>`;
            }
        }
    ]

    async function AddGuestFunction() {
        

        const ignoredFields = ['id']
        for (const field in data.value) {
            if (ignoredFields.includes(field)) continue
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
        }

        const allEmpty = Object.values(isEmpty.value).every(value => value === false)

        if (allEmpty) {
            isLoader.value = true
            await postGuest(data.value).then(res => {
                isLoader.value = false
                for (const field in data.value) {
                    data.value[field] = ''
                }
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Guest created successfully',
                })
                addmodal.value.hide()
                AllGuestFunction()
                
            }).catch(err => {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.response.data.message || 'An error occurred',
                })
            }).finally(() => {
                isLoader.value = false
            })
        }
    }

    window.getGuestFunction = async (id)=>{
        data.value = await singleGuest(id)
        isEdite.value = true
        modalTitle.value = 'Edit Guest'
        modalBtn.value = 'Update'
        addmodal.value.show()
    }

    async function UpdateGuestFunction() {
        isLoader.value = true
        await updateGuest(data.value.id, data.value).then(res => {
            isLoader.value = false
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Guest updated successfully',
            })
            addmodal.value.hide()
            AllGuestFunction()
        }).catch(err => {
            console.log(err);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: err.response.data.message || 'An error occurred',
            })
        }).finally(() => {
            isLoader.value = false
        })
    }

    window.DeleteGuestFunction = async (id)=>{
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })

        if(result.isConfirmed){
            await deleteGuest(id)
            Swal.fire(
                'Deleted!',
                'Guest has been deleted.',
                'success'
            )
            AllGuestFunction()
        }
    }

    window.togglePrensenceFunction = async (id)=>{
        await toggleGuestPresence(id).then(res=>{
            Swal.fire({
                icon: 'success',
                title: 'Guest presence status updated successfully',
                showConfirmButton: false,
                timer: 1500
            });
            AllGuestFunction()
        }).catch(err=>{
            console.error(err)
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while toggling presence status.',
            })
        })
    }

    onMounted(() => {
        AllGuestFunction()
    })

</script>

<style>

</style>