<template>
  <b-col>
    <b-row
      class="d-flex justify-content-center align-items-center my-5"
      @submit="enviar"
    >
      <b-col cols="12" md="6">
        <b-form novalidate>
          <b-form-group
            label="Nombre"
            label-cols="3"
            label-for="nombrecontacto"
          >
            <b-form-input
              id="nombrecontacto"
              v-model.trim="$v.contacto.nombre.$model"
              :state="checkErrors($v.contacto.nombre)"
              autofocus
            ></b-form-input>
            <p
              class="m-0 p-0 text-danger font-weight-lighter font-italic"
              v-if="!$v.contacto.nombre.minLength"
            >
              Este campo debe contener minimo 4 letras
            </p>
          </b-form-group>
          <b-form-group label="Email" label-cols="3" label-for="emailcontacto">
            <b-form-input
              id="emailcontacto"
              v-model.trim="$v.contacto.email.$model"
              :state="checkErrors($v.contacto.email)"
            ></b-form-input>
            <p
              class="m-0 p-0 text-danger font-weight-lighter font-italic"
              v-if="!$v.contacto.email.email"
            >
              Ingrese un email valido
            </p>
          </b-form-group>
          <b-form-group
            label="Mensaje"
            label-cols="3"
            label-for="mensajecontacto"
          >
            <b-form-textarea
              id="mensajecontacto"
              rows="10"
              no-resize
              v-model.trim="$v.contacto.mensaje.$model"
              :state="checkErrors($v.contacto.mensaje)"
              placeholder="Su mensaje de contener al menos 20 letras"
            ></b-form-textarea>
            {{ countLettersMessage }}/200 <span class="text-muted">(maximo)</span>
          </b-form-group>
          <div class="d-flex justify-content-end">
            <b-button variant="primary" type="submit">Enviar</b-button>
          </div>
        </b-form>
      </b-col>
    </b-row>
  </b-col>
</template>
<script>
/* Separar esta logica . Esta a modo de prueba */
import {required,minLength,maxLength,email} from "vuelidate/lib/validators";
export default {
  data() {
    return {
      contacto: {
        nombre: "",
        email: "",
        mensaje: "",
      },
    };
  },
  computed: {
    countLettersMessage() {
      return this.contacto.mensaje.length;
    },
  },
  methods: {
    enviar(evt) {
      evt.preventDefault();
      if (this.$v.$invalid) {
        alert("Los datos ingresados son incorrectos!");
        return;
      }
      axios.post(`${window.location.origin}/api/contacto`,this.contacto)
      .then(res=>{
        console.log(res)
      })
      .catch(err=>{
        console.log(err.response.data)
      })
      this.$router.go();
    },
    checkErrors(field) {
      if (field.$model.length === 0){
        return field.$dirty ? false : null;
      }
      return field.$error ? false : true
    },
  },
  validations: {
    contacto: {
      nombre: {
        required,
        minLength: minLength(4),
        maxLength: maxLength(100)
      },
      email: {
        required,
        email,
      },
      mensaje: {
        required,
        minLength: minLength(20),
        maxLength: maxLength(200),
      },
    },
  },
};
</script>