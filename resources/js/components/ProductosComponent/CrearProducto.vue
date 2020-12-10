<template>
  <div>
    <b-button variant="success" block squared v-b-modal.crearProducto>
      <b-icon-plus-circle-fill> </b-icon-plus-circle-fill>
      Agregar nuevo producto
    </b-button>
    <b-modal id="crearProducto"
    centered
    title="Crear Producto"
    header-bg-variant="success"
    header-text-variant="light"
    hide-footer
    >
        <ProductoForm @getProductoData = "properties = $event">
            <template #default>
                <b-button variant="danger" @click="$bvModal.hide('crearProducto')">
                    Cancelar
                </b-button>
                <b-button variant="primary" class="ml-1" @click="crearProducto()">
                    Crear
                </b-button>
            </template>
        </ProductoForm>
    </b-modal>
  </div>
</template>
<script>
import ProductoForm from "./ProductoForm";
import TOAST from '../../Mixins/Toast';
import {mapActions} from 'vuex';
export default {
  mixins:[
    TOAST
  ],
  data(){
    return {
      properties : null
    }
  },
  components: {
    ProductoForm,
  },
  methods:{
    crearProducto(){
      if(this.properties.$invalid){
        this.showToast('Complete los campos correctamente' , 'Operacion invalida' , this.toastConfig.error);
        return
      }
      this.showToast('Nuevo producto registrado' , 'Operacion exitosa' , this.toastConfig.success);
      this.createProducto(this.properties.producto.$model);
      this.$bvModal.hide('crearProducto');
    },
  ...mapActions('ProductosModule' , ['createProducto'])
  },
};
</script>