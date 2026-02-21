<template >
    <div class="container-fluid">
        
        <div class="page-title-head d-flex align-items-center">
            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">List of Abstracts</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                    <li class="breadcrumb-item active">Abstracts</li>
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
                            <DataTable :data="allabstracts" :columns="columns" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <Modal :id="'detailsModal'"  :title="modalTitle" ref="addmodal">
            <div class="p-3">
                <div class="row">

                    <div v-if="!isLoader">
                        <div class="col-lg-12 pb-3 text-end" v-if="data.status === 'pending'">
                            <button class="btn btn-primary btn-sm me-2" @click="ApprovedAbstractFunction(data.id)" >Approved <i class="fas fa-check ms-2"></i></button>
                            <button class="btn btn-danger btn-sm" @click="RejectedAbstractFunction(data.id)">Rejected <i class="fas fa-times ms-2"></i></button>
                        </div>
                    </div>

                    <div class="col-lg-12 pb-3 text-end" v-else>
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <small class="text-muted">Full Name</small>
                        <div class="fw-bold">{{ data.nom }} {{ data.prenom }}</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <small class="text-muted">Email</small>
                        <div><a :href="'mailto:'+data.email">{{ data.email }}</a></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <small class="text-muted">Phone</small>
                        <div><a :href="'tel:'+data.phone">{{ data.phone }}</a></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <small class="text-muted">Affiliation</small>
                        <div class="fw-bold">{{ data.affiliation }}</div>
                    </div>

                    <div class="col-12 mb-3">
                        <small class="text-muted">Title</small>
                        <div class="fw-bold h4">{{ data.title_resume }}</div>
                    </div>

                    <div class="col-12 mb-3">
                        <small class="text-muted">Abstract</small>
                        <div class="border rounded p-3 bg-white fs-4" style="white-space:pre-wrap">{{ data.content_resume }}</div>
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
    import { acceptAbstractData, allAbstractData, rejectAbstractData, singleAbstractData } from '../api/abstract';

    const data = ref({
        id:'',
        nom: '',
        prenom: '',
        email: '',
        phone: '',
        affiliation: '',
        title_resume: '',
        content_resume: '',
    })
    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const isEdite = ref(false)
    const modalTitle = ref('')
    const modalBtn = ref('')
    const addmodal = ref(null)
    const allabstracts = ref([])

    function showModal(){
        data.value = {
            id:'',
            nom: '',
            prenom: '',
            email: '',
            phone: '',
            affiliation: '',
            title_resume: '',
            content_resume: '',
        }
        isEdite.value = false
        modalTitle.value = 'Add Program'
        modalBtn.value = 'Save'
        isEmpty.value = {}
        msgInput.value = {}
        addmodal.value.show()
    }

    async function AllAbstractFunction(){
        allabstracts.value = await allAbstractData()
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
            title: 'Is Paid', 
            data: 'ispaid',
            render: (data, type, row) => {
                return `<span class='badge bg-${row.ispaid === 'pending' ? 'warning' : row.ispaid ==='paid' ? 'success' : 'danger'}'>${row.ispaid === 'pending' ? 'Pending' : row.ispaid ==='paid' ? 'Paid' : 'Unknown'}</span>`;
            }
        },
        {
            title: 'Is Invite Sent', 
            data: 'isinvite',
            render: (data, type, row) => {
                return `<span class='badge bg-${row.isinvite === 'nosent' ? 'warning' : row.isinvite ==='sent' ? 'success' : 'danger'}'>${row.isinvite === 'nosent' ? 'Not Sent' : row.isinvite ==='sent' ? 'Sent' : 'Unknown'}</span>`;
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
                                <a class="dropdown-item" href="#" onClick="getAbstractFunction(${row.id})" data-bs-toggle="modal" data-bs-target="#addprogram">
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

    window.getAbstractFunction = async (id)=>{
        data.value = await singleAbstractData(id)
        modalTitle.value = 'Abstract Details'
        modalBtn.value = 'Approved'
        addmodal.value.show()
    }

    async function ApprovedAbstractFunction(id){
        
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        });

        if (result.isConfirmed){
            isLoader.value = true
            await acceptAbstractData(id).then(res =>{
                isLoader.value = false
                Swal.fire(
                    'Approved!',
                    'The abstract has been approved.',
                    'success'
                )
                AllAbstractFunction()
                addmodal.value.hide()
            }).catch(err =>{
                Swal.fire(
                    'Error!',
                    'An error occurred while approving the abstract.',
                    'error'
                )
            })
        }
    }

    async function RejectedAbstractFunction(id) {
        
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
            await rejectAbstractData(id).then(res =>{
                isLoader.value = false
                Swal.fire(
                    'Rejected!',
                    'The abstract has been rejected.',
                    'success'
                )
                AllAbstractFunction()
                addmodal.value.hide()
            }).catch(err =>{
                Swal.fire(
                    'Error!',
                    'An error occurred while rejecting the abstract.',
                    'error'
                )
            })
        }
    }


    onMounted(()=>{
        AllAbstractFunction()
    })

</script>
<style scoped>
    
</style>