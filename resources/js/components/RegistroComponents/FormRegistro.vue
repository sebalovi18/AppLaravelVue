<template>
  <b-col class="m-0 p-0">
    <b-form class="mb-2 p-3 bg-dark" @submit.prevent="registrar">
      <h3 class="text-center text-light mb-3 border-bottom border-light">
        <slot name="titulo">Registrar reserva de mesa</slot>
      </h3>
      <b-row class="my-4">
        <!-- Input numero de Mesa -->
        <b-col cols="12" md="4">
          <b-form-group
            label="Numero de Mesa"
            label-for="numeroDeMesa"
            class="text-light"
          >
            <b-form-input
              id="numeroDeMesa"
              v-model.trim="$v.registro.numMesa.$model"
              min="1"
              max="99"
              number
              type="number"
              required
              :state="checkNumMesa($v.registro.numMesa)"
            >
            </b-form-input>
          </b-form-group>
        </b-col>
        <!---------------------------------------------->
        <!-- Input Horario de Mesa -->
        <b-col cols="12" md="4">
          <b-form-group
            label="Horario"
            label-for="horarioMesa"
            class="text-light"
          >
            <b-form-timepicker
              id="horarioMesa"
              minutes-step="10"
              v-model="horario"
              :state="checkHorario($v.horario)"
            >
            </b-form-timepicker>
          </b-form-group>
        </b-col>
        <!---------------------------------------------->
        <!-- Input Fecha de Mesa -->
        <b-col cols="12" md="4">
          <b-form-group
            label="Fecha"
            label-for="fechaDeMesa"
            class="text-light"
          >
            <b-form-datepicker
              id="fechaDeMesa"
              v-model="fecha"
              :state="checkFecha($v.fecha)"
            >
            </b-form-datepicker>
          </b-form-group>
        </b-col>
        <!---------------------------------------------->
        <!-- Lista de clientes de la mesa -->
        <b-col cols="12">
          <h5
            class="text-center text-uppercase text-light"
            v-if="clientes.length > 0"
          >
            Clientes de la mesa
          </h5>
          <div
            class="d-flex justify-content-center flex-wrap my-2 border-top border-bottom border-light"
          >
            <b-badge
              pill
              variant="light"
              v-for="cliente in clientes"
              :key="cliente.id"
              class="m-1 d-flex justify-content-center align-items-center"
            >
              {{ cliente.nombre }} {{ cliente.apellido }}
              <b-button
                size="sm"
                variant="light"
                pill
                @click="removeClient(cliente)"
                ><b-icon-x-circle-fill variant="danger"></b-icon-x-circle-fill
              ></b-button>
            </b-badge>
          </div>
        </b-col>
        <!---------------------------------------------->
        <!-- Botton de accion -->
        <b-col cols="12" class="mb-3">
          <slot></slot>
        </b-col>
        <!---------------------------------------------->
        <!-- Tabla CLientes con botton addClient -->
        <b-col cols="12">
          <TablaClientes :perpage="10">
            <template #acciones="{ data_row: { item: cliente } }">
              <b-button variant="warning" @click="addClient(cliente)">
                <b-icon-person-plus-fill
                  variant="dark"
                ></b-icon-person-plus-fill>
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
import {
  required,
  minLength,
  maxLength,
  minValue,
  maxValue,
} from "vuelidate/lib/validators";
import TablaClientes from "../ClientesComponent/TablaClientes";
import TOAST from '../../Mixins/Toast';
export default {
  mixins:[TOAST],
  props: {
    propRegistro: {
      type: Object,
      default: function () {
        return {
          registro: {
            id : null,
            clientes : [],
            numMesa: null,
            fecha_horario: null,
          },
          fecha: null,
          horario: null,
          clientes: [],
        };
      },
    },
  },
  data() {
    return {
      registro: this.propRegistro.registro,
      fecha: this.propRegistro.fecha,
      horario: this.propRegistro.horario,
      clientes: this.propRegistro.clientes,
      toastConfig: {
        error: {
          title: "",
          toaster: "b-toaster-top-right",
          variant: "danger",
          autoHideDelay: 3000,
        },
        success: {
          title: "",
          toaster: "b-toaster-top-right",
          variant: "success",
          autoHideDelay: 3000,
        },
      },
    };
  },
  methods: {
    addClient(client) {
      const flag = this.registro.clientes.includes(client.id);
      if (!flag) {
        this.clientes.push(client);
        this.setRegistroClientes();
        this.$v.registro.clientes.$touch();
        this.showToast(
          `Cliente ${client.nombre} ${client.apellido} agregado`,
          "Operacion exitosa",
          this.toastConfig.success
        );
        return;
      }
      this.showToast(
        `El cliente ${client.nombre} ${client.apellido} ya esta en la mesa de reserva`,
        "Error",
        this.toastConfig.error
      );
    },
    removeClient(client) {
      const index = this.registro.clientes.indexOf(client.id);
      if (index === -1) {
        showToast("Cliente no encontrado", "Error", this.toastConfig.error);
        return;
      }
      this.clientes.splice(index, 1);
      this.setRegistroClientes();
      this.showToast(
        `El cliente ${client.nombre} ${client.apellido} se ha quitado de la lista`,
        "Operacion exitosa!",
        this.toastConfig.success
      );
    },
    checkNumMesa(field) {
      if (typeof field.$model === "number") {
        if (!field.$dirty) {
          return field.$model >= 1 && field.$model <= 99 ? true : null;
        }
        return field.$model >= 1 && field.$model < 100 ? true : false;
      }
    },
    checkHorario(field) {
      if (typeof field.$model === "string") {
        if (!field.$dirty) {
          return field.$model.length >= 8 && field.$model.length <= 8
            ? true
            : null;
        }
        return field.$model >= 8 && field.$model <= 8 ? true : false;
      }
    },
    checkFecha(field) {
      if (typeof field.$model === "string") {
        if (!field.$dirty) {
          return field.$model.length >= 10 && field.$model.length <= 10
            ? true
            : null;
        }
        return field.$model >= 10 && field.$model <= 10 ? true : false;
      }
    },
    setFechaHorario() {
      if (!this.$v.fecha.$invalid && !this.$v.horario.$invalid) {
        this.registro.fecha_horario = `${this.fecha} ${this.horario}`;
        return;
      }
      return;
    },
    setRegistroClientes(){
      this.registro.clientes = this.clientes.map(v=>v.id);
    }
  },
  mounted() {
    this.setFechaHorario();
    this.setRegistroClientes();
    this.$emit("getRegistroData", this.$v);
  },
  updated() {
    this.setFechaHorario();
    this.setRegistroClientes()
    this.$emit("getRegistroData", this.$v);
  },
  components: {
    TablaClientes,
  },
  validations: {
    registro: {
      numMesa: {
        required,
        minValue: minValue(1),
        maxValue: maxValue(99),
      },
      fecha_horario: {
        required,
        minLength: minLength(19),
        maxLength: maxLength(19),
      },
      clientes: {
        required,
        minLength: minLength(1),
        $each: {
          minValue: minValue(1),
        },
      },
    },
    horario: {
      required,
      minLength: minLength(8),
      maxLength: maxLength(8),
    },
    fecha: {
      required,
      minLength: minLength(10),
      maxLength: maxLength(10),
    },
    clientes: {
      required,
      minLength: minLength(1),
      $each: {
        nombre: {
          required,
          minLength: minLength(2),
          maxLength: maxLength(100),
        },
        apellido: {
          required,
          minLength: minLength(2),
          maxLength: maxLength(100),
        },
        dni: {
          required,
          minLength: minLength(8),
          maxLength: maxLength(8),
        },
        domicilio: {
          required,
          minLength: minLength(2),
          maxLength: maxLength(100),
        },
        telefono: {
          required,
          minLength: minLength(2),
          maxLength: maxLength(100),
        },
      },
    },
  },
};
</script>