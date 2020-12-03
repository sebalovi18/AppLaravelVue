<template>
  <b-col class="m-0 p-0">
    <FormRegistro @getRegistroData="propiedades=$event">
      <template #default>
        <b-button variant="primary" block @click="registrar">Registrar reserva</b-button>
      </template>
    </FormRegistro>
  </b-col>
</template>
<script>
import FormRegistro from "./FormRegistro";
import TOAST from '../../Mixins/Toast';
import { mapActions, mapState, mapMutations, mapGetters } from "vuex";
export default {
    mixins:[TOAST],
    data(){
      return {
        propiedades : null
      }
    },
    methods:{
      registrar(){
        if(this.propiedades.$invalid){
          this.showToast("Complete todos los campos" , "Registro invalido" , this.toastConfig.error);
          return
        }
        this.setNuevoRegistroDb(this.propiedades.registro.$model);
        this.showToast("Se ha registrado correctamente" , "Registro exitoso" , this.toastConfig.success);
      },
      ...mapActions("RegistrosMesasModule", ["setNuevoRegistroDb"]),
    },
    components: {
      FormRegistro,
    },
};
</script>