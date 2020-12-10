<template>
    <div>
        <b-button v-b-modal.crearCliente block squared variant="success">
            <b-icon-person-plus-fill></b-icon-person-plus-fill>
        </b-button>
        <b-modal id="crearCliente" centered hide-footer>
            <template v-slot:modal-title>Creador de Clientes</template>
            <ClientesFormComponent @getData=" properties = $event">
                <template #default>
                    <b-button variant="primary" class="ml-1" @click="crear()">Crear</b-button>
                </template>
            </ClientesFormComponent>
        </b-modal>
    </div>
</template>
<script>
import {mapActions} from 'vuex';
import ClientesFormComponent from './ClientesFormComponent';
import TOAST from '../../Mixins/Toast';
export default {
    mixins:[
        TOAST
    ],
    data(){
        return{
            properties:null
        }
    },
    methods: {
        crear(){
            if(this.properties.$invalid){
                this.showToast("Datos de formulario incorrectos!" , "Operacion invalida" , this.toastConfig.error);
                return;
            } 
            this.createCliente(this.properties.form.$model);
            this.$bvModal.hide('crearCliente');
            this.showToast("Cliente registrado" , "Operacion Exitosa" , this.toastConfig.success);
        },
        ...mapActions('ClienteModule',['createCliente'])
    },
    components:{
        ClientesFormComponent
    },
}
</script>