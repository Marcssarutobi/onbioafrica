<template>
    <div class="container-fluid">
        
        <div class="page-title-head d-flex align-items-center">
            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">List of Travel Grants</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                    <li class="breadcrumb-item active">Travel Grants</li>
                </ol>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div></div>
                            <!-- <button class="btn btn-primary" @click="showModal"><i class="fas fa-plus me-1"></i> Add Program</button> -->
                        </div>

                        <div class="table-responsive">
                            <DataTable :data="alltravel" :columns="columns" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <Modal :id="'detailsModal'"  :title="modalTitle" ref="addmodal">
            <div class="p-3">
                <div class="row">

                    <div v-if="!isLoader">
                        <div class="col-lg-12 pb-3 text-end" v-if="getTravel.status === 'pending'">
                            <button class="btn btn-primary btn-sm me-2" @click="ApprovedTravelFunction(getTravel.id)" >Approved <i class="fas fa-check ms-2"></i></button>
                            <button class="btn btn-danger btn-sm" @click="RejectedTravelFunction(getTravel.id)">Rejected <i class="fas fa-times ms-2"></i></button>
                        </div>
                    </div>

                    <div class="col-lg-12 pb-3 text-end" v-else>
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <small class="text-muted">Full Name</small>
                        <div class="fw-bold">{{ getTravel.nom }} {{ getTravel.prenom }}</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <small class="text-muted">Email</small>
                        <div><a :href="'mailto:'+getTravel.email">{{ getTravel.email }}</a></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <small class="text-muted">Phone</small>
                        <div><a :href="'tel:'+getTravel.phone">{{ getTravel.phone }}</a></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <small class="text-muted">Institution</small>
                        <div class="fw-bold">{{ getTravel.institution }}</div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <small class="text-muted d-block mb-2">Documents</small>

                        <div class="row g-3">
                            <div
                                v-for="(doc, index) in getTravel.doc_path"
                                :key="index"
                                class="col-6 col-sm-4 col-lg-3"
                            >
                                <a
                                    :href="'/storage/' + doc"
                                    target="_blank"
                                    class="text-decoration-none"
                                >
                                    <div class="border rounded-3 p-3 text-center h-100 doc-card">
                                        <i class="fa-solid fa-file-pdf fa-3x text-danger mb-2"></i>

                                        <div class="small fw-semibold text-truncate">
                                            {{ doc.split('/').pop() }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

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
    import { acceptTravelGrant, allTravelGrants, rejectTravelGrant, singleTravelGrant } from '../api/travelGrant';

    const isLoader = ref(false)
    const modalTitle = ref('')
    const modalBtn = ref('')
    const addmodal = ref(null)
    const alltravel = ref([])
    const getTravel = ref({})

    async function AllTravelGrantFunction() {
        alltravel.value = await allTravelGrants()
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
                return `<span class='fw-bold'>${row.nom} ${row.prenom}</span>`
            }
        },
        { 
            title: 'Email', 
            data: 'email',
            render: (data, type, row)=>{
                return `<a href="mailto:${row.email}">${row.email}</a>`
            }
        },
        { 
            title: 'Phone', 
            data: 'phone',
            render: (data, type, row) => {
                return `<a href="tel:${row.phone}">${row.phone}</a>`;
            }
        },
        { 
            title: 'Status', 
            data: 'status',
            render: (data, type, row) => {
                return `<span class='badge bg-${row.status === 'pending' ? 'warning' : row.status ==='approved' ? 'success' : 'danger'}'>${row.status === 'pending' ? 'Pending' : row.status ==='approved' ? 'Approved' : 'Rejected'}</span>`;
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
                    <div class="dropdown">
                        <button class="btn btn-white border " type="button" id="dropdownMenuButton${row.id}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-light fa-ellipsis-stroke-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${row.id}">
                            <li>
                                <a class="dropdown-item" href="#" onClick="getTravelGrantFunction(${row.id})" data-bs-toggle="modal" data-bs-target="#addprogram">
                                    <i class="fa fa-eye me-1"></i> View
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onClick="DeleteProgramFunction(${row.id})">
                                    <i class="fa fa-trash me-1"></i> Delete
                                </a>
                            </li>
                        </ul>
                    </div>`;
            }
        }
    ]

    window.getTravelGrantFunction = async function(id){
        getTravel.value = await singleTravelGrant(id)
        modalTitle.value = 'Travel Grant Details'
        addmodal.value.show()
        console.log(getTravel.value)
    }

    async function ApprovedTravelFunction(id){

        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approved it!'
        });

        if (result.isConfirmed){
            isLoader.value = true
            await acceptTravelGrant(id).then(res =>{
                isLoader.value = false
                Swal.fire(
                    'Approved!',
                    'The travel grant has been approved.',
                    'success'
                )
                AllTravelGrantFunction()
                addmodal.value.hide()
            }).catch(err =>{
                Swal.fire(
                    'Error!',
                    'An error occurred while approving the travel grant.',
                    'error'
                )
            })
        }

    }

    async function RejectedTravelFunction(id){

        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, rejected it!'
        });

        if (result.isConfirmed){
            isLoader.value = true
            await rejectTravelGrant(id).then(res =>{
                isLoader.value = false
                Swal.fire(
                    'Rejected!',
                    'The travel grant has been rejected.',
                    'success'
                )
                AllTravelGrantFunction()
                addmodal.value.hide()
            }).catch(err =>{
                Swal.fire(
                    'Error!',
                    'An error occurred while rejecting the travel grant.',
                    'error'
                )
            })
        }

    }

    onMounted(() => {
        AllTravelGrantFunction()
    })

</script>
<style scoped>
    
</style>