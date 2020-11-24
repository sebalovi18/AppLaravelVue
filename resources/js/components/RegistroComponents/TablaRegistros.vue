<template>
  <div>
      <b-card v-for="(registro,index) in getRegistros" :key="index" header-bg-variant="dark" header-text-variant="light">
          <template v-slot:header>
              <h3 class="text-center">Mesa {{registro.numMesa}}</h3>
          </template>
          <b-card-sub-title class="text-center border-bottom border-dark">Fecha : {{registro.dia}} | Horario : {{registro.horario}}hs</b-card-sub-title>
          <b-card-body class="m-0 p-0">
              <b-table :items="registro.clientes" :fields="fields" small striped bordered hover>
              </b-table>
          </b-card-body>
      </b-card>
  </div>
</template>
<script>
import {mapGetters} from 'vuex';
export default {
  data() {
    return {
      fields: ["nombre", "apellido", "dni", "domicilio", "telefono"],
    };
  },
  computed:{
    ...mapGetters('RegistrosMesasModule',['getRegistros'])
  }
};
</script>