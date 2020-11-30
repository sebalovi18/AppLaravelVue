<template>
  <b-col class="m-0 p-0 bg-dark">
    <div class="border-top border-light">
      <b-row class="m-0 p-0">
        <b-col cols="12" md="6" class="m-0 p-0 bg-dark" v-for="(v,i) of components" :key="i">
          <b-button variant="outline-light" block @click='changeComponents(v)'>
            {{v}}
          </b-button>
        </b-col>
      </b-row>
      <keep-alive>
        <component :is="currentComponent"></component>
      </keep-alive>
    </div>
  </b-col>
</template>
<script>
import tablaregistros from '../components/RegistroComponents/TablaRegistros';
import addregistro from '../components/RegistroComponents/AddRegistro';
export default {
  data(){
    return{
      currentComponent : 'tablaregistros',
      components:['Agregar Registros' , 'Ver Registros']
    }
  },
  components:{
    tablaregistros,
    addregistro,
  },
  methods:{
    changeComponents(component){
      switch(component){
        case 'Agregar Registros':
          this.currentComponent = 'addregistro'
          break;
        case 'Ver Registros':
          this.currentComponent = 'tablaregistros'
          break;
        default:
          this.currentComponent = 'addregistro';
          break
      }
    }
  }
};
</script>