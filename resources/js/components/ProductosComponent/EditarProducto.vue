<template>
  <div class="d-inline">
    <b-button size="sm" variant="primary" @click="showModal(propToEdit.id)">
      <b-icon-pencil-fill variant="light"></b-icon-pencil-fill>
    </b-button>
    <b-modal :ref="propToEdit.id" centered hide-footer>
      <template v-slot:modal-title>Edicion de Productos</template>
      <ProductoForm
        :propProducto="propToEdit"
        @getProductoData="properties=$event"
      >
        <template #default>
          <b-button
            variant="danger"
            class="ml-1"
            @click="hideModal(propToEdit.id)"
            >Cancelar</b-button
          >
          <b-button variant="primary" class="ml-1" @click="editar()"
            >Editar</b-button
          >
        </template>
      </ProductoForm>
    </b-modal>
  </div>
</template>
<script>
import ProductoForm from "./ProductoForm";
import TOAST from "../../Mixins/Toast";
import { mapActions } from "vuex";
export default {
  props: {
    propToEdit: {
      type: Object,
      default: function () {
        return {};
      },
    },
  },
  mixins: [TOAST],
  data() {
    return {
      properties: null,
    };
  },
  methods: {
    showModal(ref) {
      this.$refs[ref].show();
    },
    hideModal(ref) {
      this.$refs[ref].hide();
    },
    editar() {
      if (this.properties.$invalid) {
        this.showToast(
          "Datos del formulario invalidos",
          "Operacion invalida",
          this.toastConfig.error
        );
        return;
      }
      this.hideModal(this.propToEdit.id);
      this.showToast(
        "Edicion realizada",
        "Operacion exitosa",
        this.toastConfig.success
      );
      this.updateProducto(this.properties.producto.$model);
    },
    ...mapActions("ProductosModule", ["updateProducto"]),
  },
  components: {
    ProductoForm,
  },
  mounted() {
  },
  updated() {
  },
};
</script>