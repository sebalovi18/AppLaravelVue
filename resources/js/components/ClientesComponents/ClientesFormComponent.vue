<template>
  <b-form>
    <b-form-group label="Nombre del cliente" label-for="nombreCliente">
      <b-form-input id="nombreCliente" name="nombre" v-model="$v.form.nombre.$model" :state="checkErrors($v.form.nombre)"></b-form-input>
    </b-form-group>
    <b-form-group label="Apellido del cliente" label-for="apellidoCliente">
      <b-form-input id="apellidoCliente" name="apellido" v-model="$v.form.apellido.$model" :state="checkErrors($v.form.apellido)"></b-form-input>
    </b-form-group>
    <b-form-group label="Dni del cliente" label-for="dniCliente">
      <b-form-input id="dniCliente" name="dni" v-model="$v.form.dni.$model" :state="checkErrors($v.form.dni)"></b-form-input>
    </b-form-group>
    <b-form-group label="Domicilio del cliente" label-for="domicilioCliente">
      <b-form-input id="domicilioCliente" name="domicilio" v-model="$v.form.domicilio.$model" :state="checkErrors($v.form.domicilio)"></b-form-input>
    </b-form-group>
    <b-form-group label="Telefono del cliente" label-for="telefonoCliente">
      <b-form-input id="telefonoCliente" name="telefono" v-model="$v.form.telefono.$model" :state="checkErrors($v.form.telefono)"></b-form-input>
    </b-form-group>
    <template>
      <div class="d-flex justify-content-end">
        <slot></slot><!-- Importante el uso de este slot -->
      </div>
    </template>
  </b-form>
</template>
<script>
import {required,minLength,maxLength} from "vuelidate/lib/validators";
export default {
  props: {
    cliente: {
      type: Object,
      default: function () {
        return {
          nombre:'',
          apellido:'',
          dni:'',
          domicilio:'',
          telefono:''
        };
      },
    },
  },
  data() {
    return {
      form: {
        id:this.cliente.id,
        nombre: this.cliente.nombre,
        apellido: this.cliente.apellido,
        dni: this.cliente.dni,
        domicilio: this.cliente.domicilio,
        telefono: this.cliente.telefono,
      },
    };
  },
  methods:{
    checkErrors(field) {
      if (field.$model.length === 0){
        return field.$dirty ? false : null;
      }
      return field.$error ? false : true
    },
  },
  mounted(){
    this.$emit('getData',this.$v);
  },
  updated(){
    this.$emit('getData',this.$v);
  },
  validations:{
    form:{
      nombre:{
        required,
        minLength:minLength(2),
        maxLength:maxLength(100)
      },
      apellido:{
        required,
        minLength:minLength(2),
        maxLength:maxLength(100)
      },
      dni:{
        required,
        minLength:minLength(8),
        maxLength:maxLength(8)
      },
      domicilio:{
        required,
        minLength:minLength(2),
        maxLength:maxLength(100)
      },
      telefono:{
        required,
        minLength:minLength(2),
        maxLength:maxLength(100)
      }
    }
  }

}
</script>