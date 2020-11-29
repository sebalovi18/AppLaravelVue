<template>
<b-col class="m-0 p-0">
  <b-form class="mb-2 p-3 bg-info" @submit.prevent="registrar">
    <h3 class="text-center mb-3 border-bottom border-dark">Registrar/Reservar Mesa</h3>
    <b-row class="my-4">
      <!-- Input numero de Mesa -->
      <b-col cols="12" md="4">
        <b-form-group
        label="Numero de Mesa"
        label-for="numeroDeMesa"
        >
          <b-form-input 
          id="numeroDeMesa"
          v-model.trim="$v.registro.numMesa.$model" 
          min="1" 
          max="99" 
          number
          type="number"
          required 
          :state="checkNumMesa($v.registro.numMesa)">
          </b-form-input>
        </b-form-group>
      </b-col>
      <!---------------------------------------------->
      <!-- Input Horario de Mesa -->
      <b-col cols="12" md="4">
        <b-form-group
        label="Horario"
        label-for="horarioMesa"
        >
          <b-form-timepicker v-model="$v.registro.horario.$model" :state="checkHorario($v.registro.horario)" id="horarioMesa">
          </b-form-timepicker>
        </b-form-group>
      </b-col>
      <!---------------------------------------------->
      <!-- Input Fecha de Mesa -->
      <b-col cols="12" md="4">
        <b-form-group
        label="Fecha"
        label-for="fechaDeMesa"
        >
          <b-form-datepicker 
          id="fechaDeMesa"
          value-as-date
          :state="checkDia($v.registro.dia)"
          @input="formatDate($event)">
          </b-form-datepicker>
        </b-form-group>
      </b-col>
      <!---------------------------------------------->
      <!-- Lista de clientes de la mesa -->
      <b-col cols="12">
        <h5 class="text-center text-uppercase text-light" v-if="clientes.length>0">
          Clientes de la mesa
        </h5>
        <div class="d-flex justify-content-center flex-wrap my-2 border-top border-bottom border-light">
          <b-badge pill 
            variant="dark" 
            v-for="cliente in clientes" 
            :key="cliente.id"
            class="m-1 d-flex justify-content-center align-items-center"
            >
              {{cliente.nombre}} {{cliente.apellido}}
              <b-button size="sm" variant="dark" pill @click="removeClient(cliente)"><b-icon-x-circle-fill variant="danger"></b-icon-x-circle-fill></b-button>
          </b-badge>
        </div>
      </b-col>
      <!---------------------------------------------->
      <!-- Botton de Registrar -->
      <b-col cols="12" class="mb-3">
        <div>
          <b-button block variant="outline-light" type="submit">Registrar</b-button>
        </div>
      </b-col>
      <!---------------------------------------------->
      <!-- Tabla CLientes con botton addClient -->
      <b-col cols="12">
        <TablaClientes :perpage="10">
          <template #acciones="{data_row : {item : cliente}}">
            <b-button variant="warning" @click="addClient(cliente)">
              <b-icon-person-plus-fill variant="dark"></b-icon-person-plus-fill>
            </b-button>
          </template>
        </TablaClientes>
      </b-col>
      <!---------------------------------------------->
    </b-row>
  </b-form>
</b-col>
</template>
<script>
import { mapActions, mapState, mapMutations, mapGetters } from "vuex";
import {required,minLength,maxLength,minValue,maxValue} from "vuelidate/lib/validators";
import TablaClientes from "../ClientesComponents/TablaClientes";
export default {
  data() {
    return {
      registro: {
        numMesa: 1,
        horario: "",
        dia: "",
        clientes:[]
      },
      clientes : [],
      toastConfig:{
        error:{
          title:'',
          toaster:'b-toaster-top-right',
          variant : 'danger',
          autoHideDelay:3000
        },
        success:{
          title:'',
          toaster:'b-toaster-top-right',
          variant : 'success',
          autoHideDelay:3000
        }
      }
    };
  },
  components:{
    TablaClientes
  },
  computed: {
    ...mapGetters("RegistrosMesasModule",["getRegistros"]),
  },
  methods: {
    showToast(message , title , config){
      config.title = title;
      this.$bvToast.toast(message,config);
    },
    addClient(client){
      const flag = this.registro.clientes.includes(client.id);
      if(!flag){
        this.registro.clientes.push(client.id);
        this.clientes.push(client);
        this.$v.registro.clientes.$touch();
        this.showToast(`Cliente ${client.nombre} ${client.apellido} agregado` , 'Operacion exitosa' , this.toastConfig.success);
        return
      }
      this.showToast(`El cliente ${client.nombre} ${client.apellido} ya esta en la mesa de reserva` , 'Error' , this.toastConfig.error)
    },
    removeClient(client){
      const index = this.registro.clientes.indexOf(client.id);
      if(index === -1){
        showToast('Cliente no encontrado' , 'Error' , this.toastConfig.error);
        return
      }
      this.registro.clientes.splice(index,1);
      this.clientes.splice(index,1);
      this.showToast(`El cliente ${client.nombre} ${client.apellido} se ha quitado de la lista` , 'Operacion exitosa!' , this.toastConfig.success);
    },
    formatDate(date) {
      if (date instanceof Date) {
        this.registro.dia = `${date.getFullYear()}/${date.getMonth() + 1}/${date.getDate()}`;
        this.$v.registro.dia.$touch();
        return
      }
      return null;
    },
    checkNumMesa(field){
      if(typeof field.$model === 'number'){
        if(!field.$dirty){
          return field.$model >= 1 && field.$model <=99 ? true : null
        }
        return field.$model >= 1 && field.$model <100 ? true : false
      }
    },
    checkHorario(field){
      if(typeof field.$model === 'string'){
        if(!field.$dirty) return null;
        return field.$model.length === 8 ? true : false
      }
    },
    checkDia(field){
      if(typeof field.$model === 'string'){
        if(!field.$dirty) return null;
        return field.$model.length >= 8 && field.$model.length <=10 ? true : false
      }
    },
    registrar(){
      if(!this.$v.registro.$invalid){
        this.showToast('Se ha registrado correctamente', 'Operacion exitosa' , this.toastConfig.success);
        this.setRegistroDb(this.registro);
        //setTimeout(()=>this.$router.go(),3000);
        return
      };
      this.showToast('Los datos del formulario son incorrectos', 'Error' , this.toastConfig.error );
    },
    ...mapActions('RegistrosMesasModule',["setRegistroDb"]),
  },
  validations:{
    registro:{
      numMesa:{
        required,
        minValue:minValue(1),
        maxValue:maxValue(99),
      },
      horario:{
        required,
        minLength:minLength(8),
        maxLength:maxLength(8),
      },
      dia:{
        required,
        minLength:minLength(8),
        maxLength:maxLength(10),
      },
      clientes:{
        required,
        minLength:minLength(1),
        $each:{
          minValue:minValue(1)
        }
      }
    }
  },
};
</script>