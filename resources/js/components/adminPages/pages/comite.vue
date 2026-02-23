<template lang="html">
    <div class="container-fluid">
        
        <div class="page-title-head d-flex align-items-center">
            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">List of Committees</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                    <li class="breadcrumb-item active">Committees</li>
                </ol>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div></div>
                            <button class="btn btn-primary" @click="showModal"><i class="fas fa-plus me-1"></i> Add Committee</button>
                        </div>

                        <div class="table-responsive">
                            <DataTable :data="allcommittees" :columns="columns" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <Modal :id="'addcommittee'" :title="modalTitle" :btn-text="modalBtn" :isLoading="isLoader" ref="addmodal" @submit="!isEdite ? AddCommitteeFunction() : UpdateCommitteeFunction()">

            <div class="row">

                <div class="col-lg-12">
                    <label v-if="!preview" for="upload" class="cadre">
                        <i class="fas fa-upload"></i>
                        <span>Upload Image</span>
                        <input type="file" accept="image/*" name="logo" id="upload" class="form-control" hidden @change="handleImageUpload">
                    </label>
                    <div v-if="preview" class="imagePreview">
                        <button class="btn btn-danger btn-delete" @click="removeImage"><i class="fas fa-trash"></i></button>
                        <img :src="preview" alt="">
                    </div>
                    <div v-if="isEmpty.image" class="invalid-feedback">
                        {{ msgInput.image }}
                    </div>
                </div>

                <div class="col-lg-12 mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" v-model="data.fullname">
                    <div class="text-danger mt-1" v-if="isEmpty.fullname">{{ msgInput.fullname }}</div>
                </div>

                <div class="col-lg-12 mb-3">
                    <label for="post" class="form-label">Post</label>
                    <input type="text" class="form-control" id="post" v-model="data.post">
                    <div class="text-danger mt-1" v-if="isEmpty.post">{{ msgInput.post }}</div>
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
    import { allComiters, deleteComiter, postComiter, singleComiter, updateComiter } from '../api/commiter';


    const data = ref({
        id:'',
        fullname:'',
        post:'',
        image:''
    })

    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const isEdite = ref(false)
    const modalTitle = ref('')
    const modalBtn = ref('')
    const allcommittees = ref([])
    const addmodal = ref(null)
    const preview = ref('')

    function showModal(){
        data.value = {
            id:'',
            fullname:'',
            post:'',
            image:''
        }
        isEdite.value = false
        modalTitle.value = 'Add Committee'
        modalBtn.value = 'Save'
        isEmpty.value = {}
        msgInput.value = {}
        preview.value = ''
        addmodal.value.show()
    }

    async function AllCommitteeFunction() {
        allcommittees.value = await allComiters()
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
            title: 'Post', 
            data: null,
            render: (data, type, row)=>{
                return `<span class=''>${row.post}</span>`
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
                        <a onClick="getCommitteeFunction(${row.id})" class="btn btn-secondary text-white  me-2" data-bs-toggle="modal" data-bs-target="#addprogram">
                            <i class="fa fa-edit "></i> 
                        </a> 
                        <a onClick="deleteCommitteeFunction(${row.id})" class="btn btn-danger text-white me-2">
                            <i class="fa fa-trash "></i> 
                        </a> 
                    </div>`;
            }
        }
    ]

    const handleImageUpload = (event) => {
        const file = event.target.files[0]
        if (!file) return

        data.value.image = file
        preview.value = URL.createObjectURL(file)
    }

    const removeImage  = ()=>{
        preview.value = ''
        data.value.image = ''
        // Reset input file
        const input = document.getElementById('upload')
        if (input) input.value = ''
    }

    async function AddCommitteeFunction() {
        
        try {
            
            const ignoredFields = ['id']
            for (const field in data.value) {
                if (ignoredFields.includes(field)) continue
                isEmpty.value[field] = !data.value[field]
                msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
            }

            const allEmpty = Object.values(isEmpty.value).every(value => value === false)

            if (allEmpty){
                isLoader.value = true
                const formData = new FormData()
                for (const field in data.value) {
                    if (field === 'image') continue
                    formData.append(field, data.value[field])
                }

                if (data.value.image) {
                    formData.append('image', data.value.image)
                }

                await postComiter(formData).then(res=>{
                    isLoader.value = false
                    for (const field in data.value) {
                        data.value[field] = ''
                    }
                    Swal.fire({
                        icon: 'success',
                        title: 'Committee created successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    addmodal.value.hide();
                    AllCommitteeFunction()
                }).catch(error => {
                    console.error('There was an error!', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'An error occurred while adding the committee.',
                        text: error.message || 'Please try again later.'
                    });
                }).finally(() => {
                    isLoader.value = false;
                });

            }

        } catch (error) {
            console.error('There was an error!', error);
        }
    }

    window.getCommitteeFunction = async (id)=>{
        data.value = await singleComiter(id)
        isEdite.value = true
        modalTitle.value = 'Edit Committee'
        modalBtn.value = 'Update'
        preview.value = `/storage/${data.value.image}`
        addmodal.value.show()
    }

    async function UpdateCommitteeFunction() {
        isLoader.value = true

        const formData = new FormData()

        for (const field in data.value) {
            if (field === 'image') continue
            formData.append(field, data.value[field])
        }

        // ✅ UNIQUEMENT si c'est un nouveau fichier
        if (data.value.image instanceof File) {
            formData.append('image', data.value.image)
        }

        try {
            await updateComiter(data.value.id, formData).then(res=>{
                isLoader.value = false
                Swal.fire({
                    icon: 'success',
                    title: 'Committee updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
                addmodal.value.hide();
                AllCommitteeFunction()
            }).catch(error => {
                console.error('There was an error!', error);
                Swal.fire({
                    icon: 'error',
                    title: 'An error occurred while updating the committee.',
                    text: error.message || 'Please try again later.'
                });
            }).finally(() => {
                isLoader.value = false;
            });
        } catch (error) {
            console.error('There was an error!', error);
        }
    }

    window.deleteCommitteeFunction = async (id)=>{
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })

        if (result.isConfirmed) {
            // Call API to delete
            await deleteComiter(id)
            Swal.fire(
                'Deleted!',
                'The committee has been deleted.',
                'success'
            )
            AllCommitteeFunction()
        }
    }

    onMounted(()=>{
        AllCommitteeFunction()
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