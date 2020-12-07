<template>
  <b-form>
    <b-form-group label="Nombre" label-for="nombreCliente">
      <b-form-input id="nombreCliente" name="nombre" v-model="$v.form.nombre.$model" :state="checkErrors($v.form.nombre)"></b-form-input>
    </b-form-group>
    <b-form-group label="Apellido" label-for="apellidoCliente">
      <b-form-input id="apellidoCliente" name="apellido" v-model="$v.form.apellido.$model" :state="checkErrors($v.form.apellido)"></b-form-input>
    </b-form-group>
    <b-form-group label="Dni" label-for="dniCliente">
      <b-form-input id="dniCliente" name="dni" v-model="$v.form.dni.$model" :state="checkErrors($v.form.dni)"></b-form-input>
    </b-form-group>
    <b-form-group label="Fecha de nacimiento" label-for="fnacimiento">
      <b-form-datepicker id="fnacimiento" name="fnacimiento" v-model="$v.form.fnacimiento.$model" :state="checkErrors($v.form.fnacimiento)"
      hide-header block size="sm" placeholder="Seleccione fecha de nacimiento" show-decade-nav
      ></b-form-datepicker>
    </b-form-group>
    <b-form-group label="Domicilio" label-for="domicilioCliente">
      <b-form-input id="domicilioCliente" name="domicilio" v-model="$v.form.domicilio.$model" :state="checkErrors($v.form.domicilio)"></b-form-input>
    </b-form-group>
    <b-form-group label="Telefono" label-for="telefonoCliente">
      <b-form-input id="telefonoCliente" name="telefono" v-model="$v.form.telefono.$model" :state="checkErrors($v.form.telefono)"></b-form-input>
    </b-form-group>
    <b-form-group label="Email" label-for="telefonoCliente">
      <b-form-input id="emailcliente" name="email" v-model="$v.form.email.$model" :state="checkErrors($v.form.email)"></b-form-input>
    </b-form-group>
    <template>
      <div class="d-flex justify-content-end">
        <slot></slot><!-- Importante el uso de este slot -->
      </div>
    </template>
  </b-form>
</template>
<script>
import {required,minLength,maxLength,email} from "vuelidate/lib/validators";
export default {
  props: {
    cliente: {
      type: Object,
      default: function () {
        return {
          nombre:'',
          apellido:'',
          dni:'',
          fnacimiento:'',
          domicilio:'',
          telefono:'',
          email:''
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
        fnacimiento: this.cliente.fnacimiento,
        domicilio: this.cliente.domicilio,
        telefono: this.cliente.telefono,
        email:this.cliente.email
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
      fnacimiento:{
        required,
        minLength:minLength(10),
        maxLength:maxLength(10),
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
      },
      email:{
        required,
        email,
      },
    }
  }

}
</script>