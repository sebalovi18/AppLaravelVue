import Vue from "vue";
import Vuex from "vuex";
import ClienteModule from './Modules/ClienteModule';
import RegistrosMesasModule from './Modules/RegistrosMesasModule';
import NoticiasModule from './Modules/NoticiasModule';
import ContactoModule from './Modules/ContactoModule';
import ProductosModule from './Modules/ProductosModule';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules:{
        ClienteModule,
        RegistrosMesasModule,
        NoticiasModule,
        ContactoModule,
        ProductosModule
    }
});

export default store;
