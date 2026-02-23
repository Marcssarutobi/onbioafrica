<template>
 <div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">List of programs</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><RouterLink to="/admins">Home</RouterLink></li>
                <li class="breadcrumb-item active">Programs</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div></div>
                        <button class="btn btn-primary" @click="showModal"><i class="fas fa-plus me-1"></i> Add Program</button>
                    </div>

                    <div class="table-responsive">
                        <DataTable :data="allprogram" :columns="columns" />
                    </div>

                </div>
            </div>
        </div>
    </div>

    <Modal :id="'addprogram'" :title="modalTitle" :btn-text="modalBtn" :isLoading="isLoader" ref="addmodal" @submit="!isEdite ? AddProgramFunction() : UpdateProgramFunction()">
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
                <label for="">Session Title</label>
                <input type="text" class="form-control" :class="isEmpty.session_title ? 'is-invalid border border-danger' : ''" placeholder="ex: Presentation ..." v-model="data.session_title">
                <div v-if="isEmpty.session_title" class="invalid-feedback">
                    {{ msgInput.session_title }}
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <label for="">Session Type</label>
                <input type="text" class="form-control" :class="isEmpty.session_type ? 'is-invalid border border-danger' : ''" placeholder="ex: keynote, panelist,..." v-model="data.session_type">
                <div v-if="isEmpty.session_type" class="invalid-feedback">
                    {{ msgInput.session_type }}
                </div>
            </div>

            <div class="col-lg-12 mb-3">
                <label for="">Date</label>
                <input type="date" class="form-control" :class="isEmpty.date ? 'is-invalid border border-danger' : ''" v-model="data.date">
                <div v-if="isEmpty.date" class="invalid-feedback">
                    {{ msgInput.date }}
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <label for="">Start Time</label>
                <input type="time" class="form-control" :class="isEmpty.start_time ? 'is-invalid border border-danger' : ''" v-model="data.start_time">
                <div v-if="isEmpty.start_time" class="invalid-feedback">
                    {{ msgInput.start_time }}
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <label for="">End Time</label>
                <input type="time" class="form-control" :class="isEmpty.end_time ? 'is-invalid border border-danger' : ''" v-model="data.end_time">
                <div v-if="isEmpty.end_time" class="invalid-feedback">
                    {{ msgInput.end_time }}
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <label for="">Location</label>
                <input type="text" class="form-control" :class="isEmpty.location ? 'is-invalid border border-danger' : ''" placeholder="ex: Room A, Room B,..." v-model="data.location">
                <div v-if="isEmpty.location" class="invalid-feedback">
                    {{ msgInput.location }}
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <label for="">Speaker</label>
                <select class="form-select" :class="isEmpty.speaker_id ? 'is-invalid border border-danger' : ''" v-model="data.speaker_id">
                    <option value="" disabled selected>Select a speaker</option>
                    <option v-for="speaker in allspeaker" :key="speaker.id" :value="speaker.id">{{ speaker.firstname }} {{ speaker.lastname }}</option>
                </select>
                <div v-if="isEmpty.speaker_id" class="invalid-feedback">
                    {{ msgInput.speaker_id }}
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
    import { allPrograms, deleteProgram, postProgram, singleProgram, togglePublishProgram, updateProgram } from '../api/program';
    import Modal from '../Modal/modal.vue';
    import { allSpeakers } from '../api/speaker';

    const data = ref({
        id:'',
        date:'',
        start_time:'',
        end_time:'',
        session_title:'',
        session_type:'',
        speaker_id:'',
        location:'',
        photo:'',
    })
    const isEmpty = ref({})
    const msgInput = ref({})
    const isLoader = ref(false)
    const isEdite = ref(false)
    const modalTitle = ref('')
    const modalBtn = ref('')
    const preview = ref('')
    const allspeaker = ref([])
    const allprogram = ref([])
    const addmodal = ref(null)

    function showModal(){
        data.value = {
            id:'',
            date:'',
            start_time:'',
            end_time:'',
            session_title:'',
            session_type:'',
            speaker_id:'',
            location:'',
            photo:'',
        }
        isEdite.value = false
        modalTitle.value = 'Add Program'
        modalBtn.value = 'Save'
        isEmpty.value = {}
        msgInput.value = {}
        addmodal.value.show()
        preview.value = ''
    }

    const handleImageUpload = (event) => {
        const file = event.target.files[0]
        if (!file) return

        data.value.photo = file
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

    async function AllProgramFunction() {
        allprogram.value = await allPrograms()
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
            title: 'Title', 
            data: null,
            render: (data, type, row)=>{
                return `<span class='fw-bold'>${row.session_title}</span>`
            }
        },
        { 
            title: 'Date', 
            data: 'date',
            render: (data, type, row) => {
                // Formater la date
                const date = new Date(row.date); // Assure-toi que `date` est au format ISO ou timestamp
                return new Intl.DateTimeFormat('en-EN', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                }).format(date); // Formater la date à la française
            }
        },
        { 
            title: 'Time', 
            data: null,
            render: (data, type, row) => {
                return `${row.start_time} - ${row.end_time}`;
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
                        ${publishBtn}
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

    async function AddProgramFunction() {
        

        const ignoredFields = ['id','photo']
        for (const field in data.value) {
            if (ignoredFields.includes(field)) continue
            isEmpty.value[field] = !data.value[field]
            msgInput.value[field] = `Please enter ${field.replace('_', ' ')}`;
        }

        const allEmpty = Object.values(isEmpty.value).every(value => value === false)

        if (allEmpty) {
            isLoader.value = true
            const formData = new FormData()

            for (const field in data.value) {
                if (field === 'photo') continue
                formData.append(field, data.value[field])
            }

            if (data.value.photo) {
                formData.append('photo', data.value.photo)
            }

            await postProgram(formData).then(res => {
                isLoader.value = false
                for (const field in data.value) {
                    data.value[field] = ''
                }
                Swal.fire({
                    icon: 'success',
                    title: 'Program created successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
                AllProgramFunction()
                addmodal.value.hide()
            }).catch(err => {
                console.error(err)
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while adding the program.',
                })
            }).finally(() => {
                isLoader.value = false
            })
        }
    }

    window.getProgramFunction = async (id)=>{
        data.value = await singleProgram(id)

        // 🔥 correction ici
        data.value.date = data.value.date
            ? data.value.date.split('T')[0]
            : '';
        modalTitle.value = 'Edit Program'
        modalBtn.value = 'Update'
        isEdite.value = true
        preview.value = `/storage/${data.value.photo}`
        addmodal.value.show()
    }

    async function UpdateProgramFunction() {
        isLoader.value = true

        const formData = new FormData()

        for (const field in data.value) {
            if (field === 'photo') continue
            formData.append(field, data.value[field])
        }

        if (data.value.photo) {
            formData.append('photo', data.value.photo)
        }

        

        await updateProgram(data.value.id, formData).then(res => {
            isLoader.value = false
            Swal.fire({
                icon: 'success',
                title: 'Program updated successfully',
                showConfirmButton: false,
                timer: 1500
            });
            AllProgramFunction()
            addmodal.value.hide()
        }).catch(err => {
            console.error(err)
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while updating the program.',
            })
        }).finally(() => {
            isLoader.value = false
        })

    }

    window.DeleteProgramFunction = async (id) => {
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        });

        if (result.isConfirmed) {
            await deleteProgram(id).then(res => {
                Swal.fire(
                    'Deleted!',
                    'The program has been deleted.',
                    'success'
                );
                AllProgramFunction()
            }).catch(error => {
                console.error('There was an error!', error);
                Swal.fire({
                    icon: 'error',
                    title: 'An error occurred while deleting the program.',
                    text: error.message || 'Please try again later.'
                });
            });
        }
    }

    window.toggleisPublishedFunction = async (id)=>{
        await togglePublishProgram(id).then(res=>{
            Swal.fire({
                icon: 'success',
                title: 'Program status updated successfully',
                showConfirmButton: false,
                timer: 1500
            });
            AllProgramFunction()
        }).catch(err=>{
            console.error(err)
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while toggling publish status.',
            })
        })
    }

    onMounted(()=>{
        AllProgramFunction()
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