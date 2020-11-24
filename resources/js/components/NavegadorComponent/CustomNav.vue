<template>
  <b-col cols="12" class="m-0 p-0">
    <b-navbar type="dark" variant="dark" toggleable="md">
      <b-navbar-brand to="/">App</b-navbar-brand>
      <b-navbar-toggle target="main-nav">
        <template v-slot:default="{ expanded }">
          <b-icon v-if="expanded" icon="chevron-bar-up"></b-icon>
          <b-icon v-else icon="chevron-bar-down"></b-icon>
        </template>
      </b-navbar-toggle>
      <b-collapse
        is-nav
        id="main-nav"
        class="justify-content-center justify-content-md-end"
      >
        <b-navbar variant="dark" type="dark" class="m-0 p-0">
          <b-navbar-nav class="d-flex flex-column flex-md-row">
            <b-nav-item to="/">Home</b-nav-item>
            <b-nav-item to="/clientes">Clientes</b-nav-item>
            <b-nav-item to="/registro">Registro</b-nav-item>
            <b-nav-item to="/noticias">Noticias</b-nav-item>
            <b-nav-item to="/contacto">Contacto</b-nav-item>
          </b-navbar-nav>
        </b-navbar>
      </b-collapse>
    </b-navbar>
  </b-col>
</template>
<script>
export default {};
</script>