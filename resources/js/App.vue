<template>
  <b-container fluid>
    <b-row>
      <CustomNav />
    </b-row>
    <b-row>
      <router-view></router-view>
    </b-row>
  </b-container>
</template>
<script>
import CustomNav from './components/NavegadorComponent/CustomNav';
export default {
  components:{
    CustomNav
  }
}
</script>