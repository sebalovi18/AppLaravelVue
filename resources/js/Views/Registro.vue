<template>
  <b-col class="m-0 p-0 bg-dark">
    <b-button variant="danger" block>Nuevo registro</b-button>
    <TablaRegistros />
  </b-col>
</template>
<script>
import AgregarRegistro from '../components/RegistroComponents/AgregarRegistro';
import TablaRegistros from '../components/RegistroComponents/TablaRegistros';
export default {
  data(){
    return {
    }
  },
  components:{
    AgregarRegistro,
    TablaRegistros
  },
  methods:{
  }
};
</script>