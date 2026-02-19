import { createRouter, createWebHistory } from "vue-router";

const routes =[
    {
        path: '/',
        component: ()=>import('../components/userPages/layouts/contentWrapper.vue'),
        children:[
            {
                path:'',
                component: ()=>import('../components/userPages/pages/home.vue')
            },
            {
                path:'abouts',
                component: ()=>import('../components/userPages/pages/abouts.vue')
            },
            {
                path:'events',
                component: ()=>import('../components/userPages/pages/events.vue')
            },
            {
                path:'gallery',
                component: ()=>import('../components/userPages/pages/gallery.vue')
            },
            {
                path:'contact',
                component: ()=>import('../components/userPages/pages/contact.vue')
            },
        ]
    },
    {
        path:'/admins',
        component: ()=>import('../components/adminPages/layouts/contentWrapper.vue'),
        children:[
            
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            return {
                el: to.hash,
                behavior: 'smooth',
                top: 0
            }
        } else {
            return { top: 0 }
        }
    }
})


export default router;