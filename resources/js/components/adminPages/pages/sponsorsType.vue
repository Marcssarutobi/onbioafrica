<template>
    <div class="container-fluid">
        
        <div class="page-title-head d-flex align-items-center">
            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">List of Sponsors type</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                    <li class="breadcrumb-item active">Sponsor Type</li>
                </ol>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div></div>
                            <button class="btn btn-primary" @click="showModal"><i class="fas fa-plus me-1"></i> Add Sponsor Type</button>
                        </div>

                        <div class="table-responsive">
                            <DataTable :data="allsponsortype" :columns="columns" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <Modal :id="'addsponsortype'" :title="modalTitle" :btn-text="modalBtn" :isLoading="isLoader" ref="addmodal" @submit="!isEdite ? AddSponsorTypeFunction() : UpdateSponsorTypeFunction()">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="data.name" :class="['form-control', isEmpty.name ? 'is-invalid' : '', msgInput.name ? 'is-valid' : '']" id="name" placeholder="Enter sponsor type name">
                    <div class="invalid-feedback" v-if="isEmpty.name">{{ msgInput.name }}</div>
                </div>
        </Modal>

    </div>
</template>

<script setup>

    import { onMounted, ref, render } from 'vue';
    import DataTable from '../Datatable/Datatable.vue'
    import {initTinyMCE,destroyTinyMCE} from '../../plugins/tinymce';
    import Swal from 'sweetalert2';
    import Modal from '../Modal/modal.vue';
    import { allTypeSponsor, deleteTypeSponsor, postTypeSponsor, singleTypeSponsor, updateTypeSponsor } from '../api/typesponsor';

    const data = ref({
        id:'',
        name:'',
    })

    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const isEdite = ref(false)
    const modalTitle = ref('')
    const modalBtn = ref('')
    const preview = ref('')
    const allsponsortype = ref([])
    const addmodal = ref(null)

    function showModal(){
        data.value = {
            id:'',
            name:''
        }
        isEdite.value = false
        modalTitle.value = 'Add Sponsor Type'
        modalBtn.value = 'Save'
        isEmpty.value = {}
        msgInput.value = {}
        preview.value = ''
        addmodal.value.show()
    }

    async function AllSponsorTypeFunction() {
        allsponsortype.value = await allTypeSponsor()
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
            title: 'Name', 
            data: null,
            render: (data, type, row)=>{
                return `<span class='fw-bold'> ${row.name}</span>`
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
                        <a onClick="GetsponsorTypeFunction(${row.id})" class="btn btn-secondary text-white  me-2" data-bs-toggle="modal" data-bs-target="#addsponsortype">
                            <i class="fa fa-edit "></i> 
                        </a> 
                        <a onClick="DeleteTypeSponsorFunction(${row.id})" class="btn btn-danger text-white me-2">
                            <i class="fa fa-trash "></i> 
                        </a> 
                    </div>`;
            }
        }
    ];

    async function AddSponsorTypeFunction() {
        const ignoredFields = ['id']
        for (const field in data.value) {
            if (ignoredFields.includes(field)) continue
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
        }
        const allEmpty = Object.values(isEmpty.value).every(value => value === false)
        if (allEmpty) {
            isLoader.value = true
            await postTypeSponsor(data.value).then(res=>{
                isLoader.value = false
                for (const field in data.value) {
                    data.value[field] = ''
                }
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Sponsor type created successfully',
                })
                addmodal.value.hide()
                AllSponsorTypeFunction()
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

    window.GetsponsorTypeFunction = async (id)=>{
       data.value =  await singleTypeSponsor(id)
       isEdite.value = true
        modalTitle.value = 'Edit Sponsor Type'
        modalBtn.value = 'Update'
        addmodal.value.show()
    }

    async function UpdateSponsorTypeFunction() {
        await updateTypeSponsor(data.value.id,data.value).then(res=>{
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Sponsor type updated successfully',
            })
            for (const field in data.value) {
                data.value[field] = ''
            }
            addmodal.value.hide()
            AllSponsorTypeFunction()
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

    window.DeleteTypeSponsorFunction = async (id)=>{
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
                await deleteTypeSponsor(id).then(res=>{
                    Swal.fire(
                        'Deleted!',
                        'Sponsor type has been deleted.',
                        'success'
                    )
                    AllSponsorTypeFunction()
                }).catch(err => {
                    console.log(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: err.response.data.message || 'An error occurred',
                    })
                })
            }
        })
    }

    onMounted(()=>{
        AllSponsorTypeFunction()
    })

</script>

<style>

</style>