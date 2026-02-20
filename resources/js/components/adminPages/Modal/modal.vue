<template>
  <div class="modal fade" :id="id" tabindex="-1" :aria-labelledby="`${id}-label`" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <form @submit.prevent="handleSubmit" class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" :id="`${id}-label`">{{ title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Slot pour insérer le contenu du formulaire -->
          <slot />
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button v-if="isLoading" disabled class="btn btn-primary" type="submit">
            <div class="spinner-border text-light" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </button>
          <button v-else type="submit" class="btn btn-primary">{{ btnText }}</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>

    import { ref, onMounted } from 'vue';

    const props = defineProps({
        id: { type: String, required: true },
        title: { type: String, default: 'Modal Title' },
        btnText: { type: String, default: 'Submit' },
        isLoading: { type: Boolean, default: false },
    });

    const emit = defineEmits(['submit']);

    let modalInstance = null;

    const handleSubmit = () => {
  emit('submit');
};

onMounted(() => {
  const el = document.getElementById(props.id);
  modalInstance = new bootstrap.Modal(el);
});

const show = () => modalInstance?.show();
const hide = () => modalInstance?.hide();

defineExpose({ show, hide });

</script>

<style>

</style>