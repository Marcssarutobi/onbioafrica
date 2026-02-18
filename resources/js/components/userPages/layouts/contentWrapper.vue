<template lang="html">
    <headers/>
    <main>
        <RouterView />
    </main>
    <footers/>
</template>
<script setup>

    import headers from './header.vue';
    import footers from './footer.vue';
    import { Main } from '../../plugins/main';
    import { onMounted, watch, ref } from "vue";
    import { useRoute } from "vue-router";

    const route = useRoute()

    function initializePlugins(){
        setTimeout(()=>{
            Main()
        },0)
    }

    onMounted(()=>{
        initializePlugins()
    })

    watch(route,()=>{
        initializePlugins()
    })

</script>
<style lang="">
    
</style>