<template >
    <div class="container-fluid">
        
        <div class="page-title-head d-flex align-items-center">
            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">List of sponsors</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                    <li class="breadcrumb-item active">Sponsors</li>
                </ol>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div></div>
                            <button class="btn btn-primary" @click="showModal"><i class="fas fa-plus me-1"></i> Add Sponsor</button>
                        </div>

                        <div class="table-responsive">
                            <DataTable :data="allsponsors" :columns="columns" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <Modal :id="'addsponsor'" :title="modalTitle" :btn-text="modalBtn" :isLoading="isLoader" ref="addmodal" @submit="!isEdite ? AddSponsorFunction() : UpdateSponsorFunction()">

            <div class="row">

                <div class="col-lg-12">
                    <label v-if="!preview" for="upload" class="cadre">
                        <i class="fas fa-upload"></i>
                        <span>Upload Logo</span>
                        <input type="file" accept="image/*" name="logo" id="upload" class="form-control" hidden @change="handleImageUpload">
                    </label>
                    <div v-if="preview" class="imagePreview">
                        <button class="btn btn-danger btn-delete" @click="removeImage"><i class="fas fa-trash"></i></button>
                        <img :src="preview" alt="">
                    </div>
                    <div v-if="isEmpty.logo" class="invalid-feedback">
                        {{ msgInput.logo }}
                    </div>
                </div>

                <div class="col-lg-12 mb-3">
                    <label for="name" class="form-label">Name Sponsor</label>
                    <input type="text" class="form-control" id="name" v-model="data.name">
                    <div class="text-danger mt-1" v-if="msgInput.name">{{ msgInput.name }}</div>
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
import { allSponsors, deleteSponsor, postSponsor, singleSponsor, updateSponsor } from '../api/sponsor';

    const data = ref({
        id:'',
        name:'',
        logo:'',
    })

    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const isEdite = ref(false)
    const modalTitle = ref('')
    const modalBtn = ref('')
    const allsponsors = ref([])
    const addmodal = ref(null)
    const preview = ref('')

    function showModal(){
        data.value = {
            id:'',
            name:'',
            logo:'',
        }
        isEdite.value = false
        modalTitle.value = 'Add Sponsor'
        modalBtn.value = 'Save'
        isEmpty.value = {}
        msgInput.value = {}
        preview.value = ''
        addmodal.value.show()
    }

    async function AllSponsorFunction() {
        allsponsors.value = await allSponsors()
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
            title: 'Name Sponsor', 
            data: null,
            render: (data, type, row)=>{
                return `<span class='fw-bold'>${row.name}</span>`
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
                        <a onClick="getSponsorFunction(${row.id})" class="btn btn-secondary text-white  me-2" data-bs-toggle="modal" data-bs-target="#addprogram">
                            <i class="fa fa-edit "></i> 
                        </a> 
                        <a onClick="DeleteSponsorFunction(${row.id})" class="btn btn-danger text-white me-2">
                            <i class="fa fa-trash "></i> 
                        </a> 
                    </div>`;
            }
        }
    ]

    const handleImageUpload = (event) => {
        const file = event.target.files[0]
        if (!file) return

        data.value.logo = file
        preview.value = URL.createObjectURL(file)
    }

    const removeImage  = ()=>{
        preview.value = ''
        data.value.logo = ''
        // Reset input file
        const input = document.getElementById('upload')
        if (input) input.value = ''
    }

    async function AddSponsorFunction() {
        isLoader.value = true
        try {

            const ignoredFields = ['id']
            for (const field in data.value) {
                if (ignoredFields.includes(field)) continue
                isEmpty.value[field] = !data.value[field]
                msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
            }

            const allEmpty = Object.values(isEmpty.value).every(value => value === false)

            if (allEmpty){
                const formData = new FormData()
                for (const field in data.value) {
                    if (field === 'logo') continue
                    formData.append(field, data.value[field])
                }

                if (data.value.logo) {
                    formData.append('logo', data.value.logo)
                }

                await postSponsor(formData).then(res=>{
                    isLoader.value = false
                    for (const field in data.value) {
                        data.value[field] = ''
                    }
                    Swal.fire({
                        icon: 'success',
                        title: 'Sponsors created successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    addmodal.value.hide();
                    AllSponsorFunction()
                }).catch(error => {
                    console.error('There was an error!', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'An error occurred while adding the portfolio.',
                        text: error.message || 'Please try again later.'
                    });
                }).finally(() => {
                    isLoader.value = false;
                });
            }

        } catch (error) {
            
        }
    }

    window.getSponsorFunction = async(id)=>{
        data.value = await singleSponsor(id)
        isEdite.value = true
        modalTitle.value = 'Edit Sponsor'
        modalBtn.value = 'Update'
        preview.value = `/storage/${data.value.logo}`
        addmodal.value.show()
    }

    async function UpdateSponsorFunction() {
        isLoader.value = true

        const formData = new FormData()

        for (const field in data.value) {
            if (field === 'logo') continue
            formData.append(field, data.value[field])
        }

        // ✅ UNIQUEMENT si c'est un nouveau fichier
        if (data.value.logo instanceof File) {
            formData.append('logo', data.value.logo)
        }

        try {
            await updateSponsor(data.value.id, formData)

            Swal.fire({
                icon: 'success',
                title: 'Sponsor updated successfully',
                showConfirmButton: false,
                timer: 1500
            })

            addmodal.value.hide()
            AllSponsorFunction()

            for (const field in data.value) {
                data.value[field] = ''
            }

        } catch (error) {
            console.error(error)

            Swal.fire({
                icon: 'error',
                title: 'Update failed',
                text: error.response?.data?.message || 'Please try again'
            })
        } finally {
            isLoader.value = false
        }
    }

    window.DeleteSponsorFunction = async (id)=>{
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
                try {
                    await deleteSponsor(id)
                    Swal.fire(
                        'Deleted!',
                        'The sponsor has been deleted.',
                        'success'
                    )
                    AllSponsorFunction()
                } catch (error) {
                    console.error(error)
                    Swal.fire(
                        'Error!',
                        'An error occurred while deleting the sponsor.',
                        'error'
                    )
                }
            }
        })
    }

    onMounted(()=>{
        AllSponsorFunction()
    })

</script>
<style scoped>
    .cadre{
        height: 150px;
        width: 100%;
        border: 3px dashed #b9b9b9;
        margin-bottom: 25px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
    }
    .cadre i{
        font-size: 30px;
        color: #b9b9b9;
    }
    .cadre span{
        font-size: 15px;
    }
    .imagePreview{
        position: relative;
        width: 250px;
        height: 200px;
        border: 2px dashed #b9b9b9;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 10px;
    }
    .imagePreview img{
        max-width: 100%;
        max-height: 100%;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Bouton caché par défaut */
    .imagePreview .btn-delete {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 2;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.3s ease;
    }

    /* Affiché au hover */
    .imagePreview:hover .btn-delete {
        opacity: 1;
        transform: scale(1);
    }

    /* Option : léger effet sombre */
    .imagePreview::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.15);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .imagePreview:hover::after {
        opacity: 1;
    }
</style>