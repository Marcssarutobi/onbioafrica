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

    </div>
</template>
<script setup>

    import { onMounted, ref, render } from 'vue';
    import DataTable from '../Datatable/Datatable.vue'
    import Swal from 'sweetalert2';
    import Modal from '../Modal/modal.vue';
    import { allAbstractData, singleAbstractData } from '../api/abstract';

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
                return `<span class='badge bg-${row.status === 'pending' ? 'warning' : row.status ==='accepted' ? 'success' : 'danger'}'>${row.status === 'pending' ? 'Pending' : row.status ==='accepted' ? 'Accepted' : 'Rejected'}</span>`;
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

                const publishBtn = row.isPublished
                    ? `
                        <a onClick="toggleisPublishedFunction(${row.id})"
                        class="btn btn-warning text-white me-2"
                        title="Dépublier">
                            <i class="fa fa-eye-slash"></i>
                        </a>
                    `
                    : `
                        <a onClick="toggleisPublishedFunction(${row.id})"
                        class="btn btn-success text-white me-2"
                        title="Publier">
                            <i class="fa fa-eye"></i>
                        </a>
                    `;

                return `
                    <div class="d-flex align-items-center">
                        <a onClick="getProgramFunction(${row.id})" class="btn btn-secondary text-white  me-2" data-bs-toggle="modal" data-bs-target="#addprogram">
                            <i class="fa fa-edit "></i> 
                        </a> 
                        <a onClick="DeleteProgramFunction(${row.id})" class="btn btn-danger text-white me-2">
                            <i class="fa fa-trash "></i> 
                        </a> 
                    </div>`;
            }
        }
    ]

    


    onMounted(()=>{
        AllAbstractFunction()
    })

</script>
<style scoped>
    
</style>