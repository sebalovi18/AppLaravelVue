<template>
    <b-col class="m-0 p-0">
        <CrearProducto />
        <TablaProductos />
    </b-col>
</template>
<script>
import TablaProductos from '../components/ProductosComponent/TablaProductos';
import ProductoForm from '../components/ProductosComponent/ProductoForm';
import CrearProducto from '../components/ProductosComponent/CrearProducto';
export default {
    components:{
        TablaProductos,
        ProductoForm,
        CrearProducto
    }
}
</script>