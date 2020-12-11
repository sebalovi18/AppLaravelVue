<template>
  <div>
    <b-button @click="showModal(prop_cliente.index)" size="sm" variant="primary"
      ><b-icon-pencil-fill variant="light"></b-icon-pencil-fill
    ></b-button>
    <b-modal :ref="prop_cliente.index" hide-footer centered header-bg-variant="primary" header-text-variant="light">
      <template v-slot:modal-title>Editar Cliente</template>
      <ClientesFormComponent
        @getData="properties = $event"
        :cliente="prop_cliente.item"
      >
        <template #default>
          <b-button
            variant="danger"
            class="ml-1"
            @click="hideModal(prop_cliente.index)"
            >Cancelar</b-button
          >
          <b-button
            variant="primary"
            class="ml-1"
            @click="editar(prop_cliente.index)"
            >Editar</b-button
          >
        </template>
      </ClientesFormComponent>
    </b-modal>
  </div>
  <!---------------------------------------------------------->
</template>
<script>
import { mapActions } from "vuex";
import ClientesFormComponent from "./ClientesFormComponent";
import TOAST from "../../Mixins/Toast";
export default {
  mixins: [TOAST],
  props: {
    prop_cliente: {
      type: Object,
      default: function () {
        return {};
      },
    },
  },
  data() {
    return {
      properties: null,
    };
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
        this.showToast("Datos del formulario invalidos" , "Operacion invalida", this.toastConfig.error);
        return;
      }
      this.updateCliente(this.properties.form.$model);
      this.hideModal(index);
      this.showToast("Edicion realizada" , "Operacion exitosa" , this.toastConfig.success);
    },
    ...mapActions("ClienteModule", ["updateCliente"]),
  },
  components: {
    ClientesFormComponent,
  },
};
</script>