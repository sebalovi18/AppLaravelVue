<template>
  <div>
    <b-button size="sm" variant="primary" @click="showModal(propToEdit.index)">
      <b-icon-pencil-fill variant="light"></b-icon-pencil-fill>
    </b-button>
    <b-modal :ref="propToEdit.index" centered hide-footer header-bg-variant="primary" header-text-variant="light">
      <template v-slot:modal-title>Editar Producto</template>
      <ProductoForm
        :propProducto="propToEdit.item"
        @getProductoData="properties=$event"
      >
        <template #default>
          <b-button
            variant="danger"
            class="ml-1"
            @click="hideModal(propToEdit.index)"
            >Cancelar</b-button
          >
          <b-button variant="primary" class="ml-1" @click="editar(propToEdit.index)"
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
    editar(index) {
      if (this.properties.$invalid) {
        this.showToast(
          "Datos del formulario invalidos",
          "Operacion invalida",
          this.toastConfig.error
        );
        return;
      }
      this.hideModal(index);
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