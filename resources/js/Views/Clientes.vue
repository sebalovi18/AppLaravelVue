<template>
  <b-col class="m-0 p-0">
    <CrearCliente/>
    <TablaClientes />
  </b-col>
</template>
<script>
import { mapState , mapActions } from "vuex";
import CrearCliente from "../components/ClientesComponents/CrearCliente";
import TablaClientes from '../components/ClientesComponents/TablaClientes';
export default {
  components: {
    CrearCliente,
    TablaClientes
  },
};
</script>