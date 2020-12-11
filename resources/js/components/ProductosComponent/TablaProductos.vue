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
      :per-page="perPage"
      :current-page="currentPage"
      hover
      striped
      dark
      head-variant="light"
      responsive="md"
      class="m-0 p-0"
      small
    >
      <template v-slot:cell(Acciones)="data">
        <slot name="acciones" :data_row="data">
          <div class="d-flex">
            <EditarProducto :propToEdit="data" />
            <div>
              <b-button variant="danger" size="sm" @click="borrarProducto(data.item)" class="ml-2">
                <b-icon-trash-fill variant="light"></b-icon-trash-fill>
              </b-button>
            </div>
          </div>
        </slot>
      </template>
    </b-table>
    <div
      class="bg-dark m-0 p-0 border border-light d-flex align-items-center justify-content-center"
    >
    <b-pagination
      v-model="currentPage"
      :per-page="perPage"
      :total-rows="getProductos.length"
      small
      class="my-3 p-0"
    ></b-pagination>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters , mapState} from "vuex";
import EditarProducto from "./EditarProducto";
import TOAST from "../../Mixins/Toast";
export default {
  mixins: [TOAST],
  props:{
    perPage:{
      type:Number,
      default:function(){
        return 15
      }
    }
  },
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
          formatter:v=>v.toUpperCase(),
          sortable: true,
        },
        {
          key: "precio",
          formatter: (val) => `\$${val}`,
          sortable: true,
        },
        "Acciones",
      ],
      filter: "",
      currentPage : 1,
    };
  },
  components: {
    EditarProducto,
  },
  computed: {
    ...mapGetters("ProductosModule", ["getProductos"]),
  },
  methods: {
    borrarProducto(producto) {
      let flag = confirm(`Desea borrar el producto ${producto.nombre} ?`);
      if (flag) {
        this.deleteProducto(producto);
        this.showToast(
          `${producto.nombre} ha sido eliminado`,
          "Operacion exitosa",
          this.toastConfig.success
        );
      }
    },
    ...mapActions("ProductosModule", ["getAllProductos", "deleteProducto"]),
  },
  beforeMount() {
    this.getAllProductos();
  },
};
</script>