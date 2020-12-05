<template>
  <div>
    <FormRegistro
      :propRegistro="to_edit"
      @getRegistroData = "updateProperties = $event"
    >
      <template #titulo>Editar registro de mesa</template>
      <template #default>
        <b-button variant="primary" block @click="editar">Editar reserva</b-button>
      </template>
    </FormRegistro>
  </div>
</template>
<script>
import FormRegistro from "./FormRegistro";
import TOAST from '../../Mixins/Toast';
import { mapActions } from 'vuex';
export default {
  props: {
    to_edit: {
      type: Object,
      default: function () {
        return {
          registro: {
            id : null,
            numMesa: null,
            fecha_horario: null,
            clientes: [],
          },
          fecha: null,
          horario: null,
          clientes: [],
        };
      },
    },
  },
  mixins:[
    TOAST
  ],
  data() {
    return {
      updateProperties : null,
    };
  },
  components: {
    FormRegistro,
  },
  methods:{
    editar(){
      if(this.updateProperties.$invalid){
        this.showToast("Complete todos los campos" , "Actualizacion invalida" , this.toastConfig.error);
        return
      }
      this.updateRegistroDb(this.updateProperties.registro.$model);
      this.showToast("Se ha actualizado correctamente" , "Actualizacion exitosa" , this.toastConfig.success);
      setTimeout(()=>this.$router.go(),1500);
    },
    ...mapActions('RegistrosMesasModule',['updateRegistroDb'])
  },
  mounted(){
  },
  updated(){
  }
};
</script>