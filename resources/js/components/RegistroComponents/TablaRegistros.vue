<template>
  <div>
    <b-table
    striped
    hover
    :items="getRegistros.data"
    :fields="fields"
    dark
    >  
      <template #cell(detalles)="row">
        <b-button size="sm" block variant="light" @click="row.toggleDetails" class="mr-2">
          {{ row.detailsShowing ? 'Ocultar' : 'Mostrar'}} detalles
        </b-button>
      </template>
      <template #row-details="row">
          <b-table
          hover
          head-variant="light"
          table-variant="info"
          :items = row.item.clientes
          class="rounded"
          >
          </b-table>
          <b-row>
          <b-col cols="6">
            <b-button block variant="primary">Editar Registro</b-button>
          </b-col>
          <b-col cols="6">
            <b-button block variant="danger" @click="borrarRegistro(row.item.id)">Borrar Registro</b-button>
          </b-col>
          </b-row>
      </template>
    </b-table>
  </div>
</template>
<script>
import {mapGetters,mapActions} from 'vuex';
import Date_Esp from '../../Mixins/Date_Esp';
import EditarRegistro from '../RegistroComponents/EditarRegistro';
export default {
  mixins:[
    Date_Esp
    ],
  data() {
    return {
      fields : [
        {
          key : 'numMesa',
          label : 'Nº Mesa',
          sortable : true
        },
        {
          key : 'fecha',
          label : "Fecha",
          formatter:value=>{ 
            let d = new Date(value);
            let dia = d.getDay();
            let fecha_completa = d.toLocaleDateString().split('/').map(v=>v < 10 ? `0${v}` : v).join('/');
            return `${this.dias[dia].toUpperCase()} - ${fecha_completa}`;
          },
          sortable:true
        },
        {
          key : 'horario',
          label : "Horario",
          sortable : true
        },
        "detalles"
      ],
    };
  },
  computed:{
    ...mapGetters('RegistrosMesasModule',['getRegistros'])
  },
  methods:{
    borrarRegistro(registro){
      if(window.confirm('Desea borrar este registro?')){
        this.borrarRegistroDb(registro);
      }
    },
    ...mapActions('RegistrosMesasModule' , ['getAllRegistrosMesasDb','borrarRegistroDb'])
  },
  components:{
    EditarRegistro
  },
  mounted(){
    this.getAllRegistrosMesasDb();
  }
};
</script>