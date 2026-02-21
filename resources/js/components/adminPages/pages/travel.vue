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

    </div>
</template>
<script setup>

    import { onMounted, ref, render } from 'vue';
    import DataTable from '../Datatable/Datatable.vue'
    import Swal from 'sweetalert2';
    import Modal from '../Modal/modal.vue';
import { allTravelGrants } from '../api/travelGrant';

    const isLoader = ref(false)
    const modalTitle = ref('')
    const modalBtn = ref('')
    const addmodal = ref(null)
    const alltravel = ref([])

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

    onMounted(() => {
        AllTravelGrantFunction()
    })

</script>
<style scoped>
    
</style>