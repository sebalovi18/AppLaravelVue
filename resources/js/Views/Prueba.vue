<template>
  <b-col class="m-0 p-0">
    <h1>Prueba</h1>
    <div id="mydiv">
      <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->
      <div id="mydivheader">Click here to move</div>
      <p>Move</p>
      <p>this</p>
      <p>DIV</p>
    </div>
  </b-col>
</template>
<script>
export default {
  data() {
    return {
      mesas: [],
    };
  },
  mounted() {
    for (let i = 1; i < 100; i++) {
      this.mesas.push(i);
    }
  },
};
</script>
<style scoped>
</style>