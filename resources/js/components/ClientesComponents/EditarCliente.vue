<template>
  <div class="d-inline">
    <!------- Accion editar (Separar en otro componente) ------->
    <b-button @click="showModal(prop_cliente.index)" variant="primary"><b-icon-pencil-fill variant="light"></b-icon-pencil-fill></b-button>
    <b-modal :ref="prop_cliente.index" hide-footer centered>
      <template v-slot:modal-title>Edicion de Clientes</template>
      <ClientesFormComponent
        :cliente="prop_cliente.item"
        @getData="properties = $event"
      >
        <template #default>
          <b-button variant="danger" class="ml-1" @click="hideModal(prop_cliente.index)"
            >Cancelar</b-button
          >
          <b-button variant="primary" class="ml-1" @click="editar(prop_cliente.index)"
            >Editar</b-button
          >
        </template>
      </ClientesFormComponent>
    </b-modal>
  </div>
  <!---------------------------------------------------------->
</template>
<script>
import {mapActions} from 'vuex';
import ClientesFormComponent from './ClientesFormComponent';
export default {
  props:{
      prop_cliente:{
          type:Object,
          default:function(){return {}}
      }
  },
  data(){
      return {
        properties:null
      }
  },
  methods: {
    showModal(id) {
      this.$refs[id].show();
    },
    hideModal(id) {
      this.$refs[id].hide();
    },
    editar(index) {
      if (this.properties.$invalid) {
        console.log("Datos del formulario invalidos!");
        return;
      }
      this.updateCliente(this.properties.form.$model);
      this.hideModal(index);
    },
    ...mapActions('ClienteModule',["updateCliente"]),
  },
  components:{
    ClientesFormComponent
  }
};
</script>