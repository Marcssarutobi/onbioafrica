<template lang="html">
    <div class="container-fluid">
        
        <div class="page-title-head d-flex align-items-center">
            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">Speaker List</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                    <li class="breadcrumb-item active">Speaker List</li>
                </ol>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div></div>
                            <button class="btn btn-primary" @click="showModal"><i class="fas fa-plus me-1"></i> Add Speaker</button>
                        </div>

                        <div class="table-responsive">
                            <DataTable :data="allspeaker" :columns="columns" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addspeaker" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form @submit.prevent="!isEdite ? AddSpeakerFunction() : UpdatecategoryFunction()" class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ modalTitle }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">

                            <div class="col-lg-12">
                                <label v-if="!preview" for="upload" class="cadre">
                                    <i class="fas fa-upload"></i>
                                    <span>Upload Photo</span>
                                    <input type="file" accept="image/*" name="photo" id="upload" class="form-control" hidden @change="handleImageUpload">
                                </label>
                                <div v-if="preview" class="imagePreview">
                                    <button class="btn btn-danger btn-delete" @click="removeImage"><i class="fas fa-trash"></i></button>
                                    <img :src="preview" alt="">
                                </div>
                                <div v-if="isEmpty.photo" class="invalid-feedback">
                                    {{ msgInput.photo }}
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" :class="isEmpty.firstname ? 'is-invalid border border-danger' : ''" id="firstname" placeholder="ex: Jonh" v-model="data.firstname">
                                    <div v-if="isEmpty.firstname" class="invalid-feedback">
                                    {{ msgInput.firstname }}
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" :class="isEmpty.lastname ? 'is-invalid border border-danger' : ''" class="form-control" id="lastname" placeholder="ex: DOE" v-model="data.lastname">
                                    <div v-if="isEmpty.lastname" class="invalid-feedback">
                                        {{ msgInput.lastname }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" :class="isEmpty.email ? 'is-invalid border border-danger' : ''" id="email" placeholder="ex: jonhdoe@example.com" v-model="data.email">
                                    <div v-if="isEmpty.email" class="invalid-feedback">
                                        {{ msgInput.email }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" :class="isEmpty.country ? 'is-invalid border border-danger' : ''" id="country" placeholder="ex: Bénin" v-model="data.country">
                                    <div v-if="isEmpty.country" class="invalid-feedback">
                                        {{ msgInput.country }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="affiliation">Affiliation</label>
                                    <input type="text" class="form-control" :class="isEmpty.affiliation ? 'is-invalid border border-danger' : ''" id="affiliation" placeholder="ex: Community Manager" v-model="data.affiliation">
                                    <div v-if="isEmpty.affiliation" class="invalid-feedback">
                                        {{ msgInput.affiliation }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" class="form-control" :class="isEmpty.type ? 'is-invalid border border-danger' : ''" id="type" placeholder="ex: keynote, panelist,..." v-model="data.type">
                                    <div v-if="isEmpty.type" class="invalid-feedback">
                                        {{ msgInput.type }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="bio">Biography</label>
                                    <textarea class="form-control" id="my-editor" :class="isEmpty.bio ? 'is-invalid border border-danger' : ''" rows="5" v-model="data.bio"></textarea>
                                    <div v-if="isEmpty.bio" class="invalid-feedback">
                                        {{ msgInput.bio }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button v-if="isLoader" disabled class="btn btn-primary" type="submit">
                            <div class="spinner-border text-light" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                        <button v-else type="submit" class="btn btn-primary">{{ modalBtn }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>
<script setup>

import { onMounted, ref, render } from 'vue';
import DataTable from '../Datatable/Datatable.vue'
import {initTinyMCE,destroyTinyMCE} from '../../plugins/tinymce';
import { allSpeakers, postSpeaker } from '../api/speaker';
import Swal from 'sweetalert2';

const data = ref({
    id:'',
    firstname:'',
    lastname:'',
    email:'',
    country:'',
    affiliation:'',
    bio:'',
    photo:'',
    type:'',
})

const isEmpty = ref({})
const msgInput = ref({})
const isLoader = ref(false)
const isEdite = ref(false)
const modalTitle = ref('')
const modalBtn = ref('')
const preview = ref('')
const allspeaker = ref([])
let addmodal

function showModal(){
    data.value = {
        id:'',
        firstname:'',
        lastname:'',
        email:'',
        country:'',
        affiliation:'',
        bio:'',
        photo:'',
        type:'',
    }
    isEdite.value = false
    modalTitle.value = 'Add Speaker'
    modalBtn.value = 'Save'
    isEmpty.value = {}
    msgInput.value = {}
    addmodal.show()
}

const handleImageUpload = (event) => {
  const file = event.target.files[0]
  if (!file) return

  data.valuephoto = file
  preview.value = URL.createObjectURL(file)
}

const removeImage  = ()=>{
    preview.value = ''
    data.value.photo = ''
    // Reset input file
    const input = document.getElementById('upload')
    if (input) input.value = ''
}

async function AllSpeakerFunction() {
    allspeaker.value = await allSpeakers()
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
            return `<span class='fw-bold'>${row.firstname} ${row.lastname}</span>`
        }
    },
    { 
        title: 'Email', 
        data: 'email',
    },
    { 
        title: 'Type', 
        data: 'type',
    },
    { 
        title: 'Affiliation', 
        data: 'affiliation',
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
                    <a onClick="getCategoryFunction(${row.id})" class="btn btn-secondary text-white  me-2" data-bs-toggle="modal" data-bs-target="#edit_role">
                        <i class="fa fa-edit "></i> 
                    </a> 
                    <a onClick="DeletePorfolioFunction(${row.id})" class="btn btn-danger text-white me-2">
                        <i class="fa fa-trash "></i> 
                    </a> 
                </div>`;
        }
    }
]

async function AddSpeakerFunction(){
    isLoader.value = true
    try {

        const ignoredFields = ['id','photo']
        for (const field in data.value) {
            if (ignoredFields.includes(field)) continue
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
        }
        
        const formData = new FormData()

        for (const field in data.value) {
            if (field === 'photo') continue
            formData.append(field, data.value[field])
        }

        if (data.value.photo) {
            formData.append('photo', data.value.photo)
        }

        await postSpeaker(formData).then(res=>{
            isLoader.value = false
            for (const field in data.value) {
                data.value[field] = ''
            }
            Swal.fire({
                icon: 'success',
                title: 'Speaker created successfully',
                showConfirmButton: false,
                timer: 1500
            });
            addmodal.hide();
            AllSpeakerFunction()
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



    } catch (error) {
        
    }
}


onMounted(()=>{
    addmodal = new bootstrap.Modal(document.getElementById('addspeaker'))

    // Lorsque le modal est affiché, init TinyMCE
    document.getElementById('addspeaker').addEventListener('shown.bs.modal', () => {
        const editor = document.getElementById('my-editor');
        if (editor) {
            initTinyMCE('my-editor',{
                height: 500,
                setup: (editor) => {
                    editor.on('init', () => {
                        editor.setContent(data.value.bio);
                    });
                    editor.on('change', () => {
                        data.value.bio = editor.getContent();
                    });
                }
            })
        }
    });

    document.getElementById('addspeaker').addEventListener('hidden.bs.modal', () => {
        destroyTinyMCE('my-editor');
    });

    AllSpeakerFunction()
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