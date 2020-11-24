import Vue from "vue";
import Vuex from "vuex";
import ClienteModule from './Modules/ClienteModule';
import RegistrosMesasModule from './Modules/RegistrosMesasModule';
import NoticiasModule from './Modules/NoticiasModule';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules:{
        ClienteModule,
        RegistrosMesasModule,
        NoticiasModule
    }
});

export default store;
