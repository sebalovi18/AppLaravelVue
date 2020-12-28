import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../Views/Home.vue';
import Noticias from '../Views/Noticias.vue';
import Clientes from '../Views/Clientes.vue';
import Registro from '../Views/Registro.vue';
import Contacto from '../Views/Contacto.vue';
import Productos from '../Views/Productos.vue';
Vue.use(VueRouter)

const routes = [
    {
        path:'/',
        component: Home
    },
    {
        path:'/clientes',
        component: Clientes
    },
    {
        path:'/registro',
        component: Registro
    },
    {
        path:'/noticias',
        component: Noticias
    },
    {
        path:'/contacto',
        component: Contacto
    },
    {
        path : '/productos',
        component : Productos
    },
    /*
    {
        path:'*',
        component: Home
    }
    */
];

const router = new VueRouter({
    routes,
    mode:'history'
})

export default router;