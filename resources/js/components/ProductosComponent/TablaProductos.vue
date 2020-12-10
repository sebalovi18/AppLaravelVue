<template>
  <div>
    <!-- Input para Filtrar busqueda -->
    <b-input-group size="sm">
      <b-form-input
        v-model="filter"
        type="search"
        placeholder="Buscar Producto..."
      ></b-form-input>
    </b-input-group>
    <b-table
      :fields="camposProductos"
      :items="getProductos"
      :filter="filter"
      hover
      striped
      head-variant="dark"
      responsive="md"
      class="m-0 p-0"
      small
    >
      <template v-slot:cell(Acciones)="data">
        <slot name="acciones" :data_row="data">
          <EditarProducto :propToEdit="data.item"/>
          <b-button variant="danger" size="sm" @click="borrarProducto(data.item)">
            <b-icon-trash-fill variant="light"></b-icon-trash-fill>
          </b-button>
        </slot>
      </template>
    </b-table>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import EditarProducto from './EditarProducto';
import TOAST from '../../Mixins/Toast';
export default {
  mixins:[
    TOAST
  ],
  data() {
    return {
      camposProductos: [
        {
          key: "id",
          label: "Codigo de producto",
          sortable: true,
        },
        {
          key: "nombre",
          label: "Nombre de producto",
          formatter:function(val){
            return val.toUpperCase();
          },
          sortable: true,
        },
        {
          key: "precio",
          formatter: (val) => `\$${val}`,
          sortable: true,
        },
        "Acciones",
      ],
      filter:''
    };
  },
  components:{
    EditarProducto
  },
  computed: {
    ...mapGetters("ProductosModule", ["getProductos"]),
  },
  methods: {
    borrarProducto(producto){
      let flag = confirm(`Desea borrar el producto ${producto.nombre} ?`);
      if(flag){
        this.deleteProducto(producto);
        this.showToast(`${producto.nombre} ha sido eliminado` , 'Operacion exitosa' , this.toastConfig.success);
      }
    },
    ...mapActions("ProductosModule", ["getAllProductos","deleteProducto"]),
  },
  mounted() {
    this.getAllProductos();
  },
};
</script>