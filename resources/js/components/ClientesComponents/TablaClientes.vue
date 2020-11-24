<template>
    <div>
        <!-- Input para Filtrar busqueda -->
        <b-input-group size="sm">
            <b-form-input v-model="filter" type="search" placeholder="Buscar cliente..."></b-form-input>
        </b-input-group>
        <!--------------------------------->
        <b-table 
        :items="clientes" 
        :fields="campos" 
        :filter="filter"
        :per-page="getPerPage"
        :current-page="currentpage"
        dark striped hover outlined head-variant="light"
        responsive="md"
        class="m-0 p-0"
        >
            <template v-slot:cell(Indice)="data">
                {{data.index+1}}
            </template>
            <!-- Mostrar en un mapa la ubicacion -->
            <template v-slot:cell(domicilio)="data">
                {{data.item.domicilio}}
            </template>
            <!------------------------------------->
            <template v-slot:cell(acciones)="data">
                <slot name="acciones" :data_row="data">
                    <EditarCliente :prop_cliente="data" />
                    <b-button variant="danger" @click="borrar(data.item)"><b-icon-trash-fill variant="light"></b-icon-trash-fill></b-button> 
                </slot>
            </template> 
        </b-table>
        <div class="bg-dark m-0 p-0 border border-light d-flex align-items-center justify-content-center">
            <b-pagination v-model="currentpage" :per-page="getPerPage" :total-rows="clientes.length" class="my-3 p-0"></b-pagination>
        </div>
    </div>
</template>
<script>
import {mapState,mapActions} from 'vuex';
import ClientesFormComponent from './ClientesFormComponent';
import EditarCliente from '../ClientesComponents/EditarCliente';
export default {
    props:{
        perpage:{
            type:Number,
            required:false,
            default:()=>null
        },
    },
    data(){
        return{
            campos: [
                "Indice",
                {
                    key: "nombre",
                    sortable: true,
                    _showDetails: true,
                },
                {
                    key: "apellido",
                    sortable: true,
                    _showDetails: true,
                },
                {
                    key: "dni",
                    sortable: false,
                    _showDetails: true,
                },
                {
                    key: "domicilio",
                    sortable: true,
                    _showDetails: true,
                },
                {
                    key: "telefono",
                    sortable: false,
                    _showDetails: true,
                },
                "Acciones"
            ],
            filter:'',
            currentpage:1,
        }
    },
    computed: {
        getPerPage(){
            if(this.$props.perpage !== null && !isNaN(this.$props.perpage) && Number.isInteger(this.$props.perpage) && this.$props.perpage>0){
                return this.$props.perpage
            }
            return 10
        },
        ...mapState('ClienteModule',["clientes"]),
    },
    methods:{
        async borrar(cliente){
            let query = window.confirm(`Desea a ${cliente.nombre} ${cliente.apellido} de su lista de clientes?`);
            if(query){
                await this.deleteCliente(cliente);
            }
        },
        ...mapActions('ClienteModule',["deleteCliente","getClientes"]),
    },
    components:{
        ClientesFormComponent,
        EditarCliente
    },
    beforeMount() {
        this.getClientes();
    },
}
</script>