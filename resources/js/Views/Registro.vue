<template>
  <b-col class="m-0 p-0 bg-dark">
    <b-row class="m-0 p-0">
      <b-col v-for="(section, i) of sections" :key="i" class="m-0 p-0">
        <b-button
          variant="outline-light"
          block
          @click="setCurrentComponent(section)"
        >
          {{ section }}
        </b-button>
      </b-col>
    </b-row>
    <component
      :is="currentComponent"
      @loadEditSection="loadEditSection($event)"
      :to_edit="register_to_edit"
    ></component>
  </b-col>
</template>
<script>
import agregar_registro from "../components/RegistroComponents/AgregarRegistro";
import tabla_registro from "../components/RegistroComponents/TablaRegistros";
import editar_registro from "../components/RegistroComponents/EditarRegistro";
export default {
  data() {
    return {
      currentComponent: tabla_registro,
      sections: ["Registros" , "Agregar Registro"],
      register_to_edit: null,
    };
  },
  methods: {
    setCurrentComponent(component) {
      let current = component.replace(" ", "_").toLowerCase();
      switch (current) {
        case "agregar_registro":
          this.currentComponent = agregar_registro;
          break;
        case "registros":
          this.currentComponent = tabla_registro;
          break;
        case "editar_registro":
          this.currentComponent = editar_registro;
          break;
        default:
          this.currentComponent = agregar_registro;
          break;
      }
    },
    loadEditSection(registro) {
      this.register_to_edit = {
        registro: {
          id : registro.id,
          numMesa: registro.numMesa,
        },
        fecha: registro.fecha.split("/").join("-"),
        horario: registro.horario,
        clientes: registro.clientes,
      };
      this.currentComponent = editar_registro;
    },
  },
  components: {
    agregar_registro,
    tabla_registro,
  },
};
</script>