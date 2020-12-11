<template>
  <b-form>
    <!-- Nombre del producto -->
    <b-form-group label="Nombre del producto" label-for="productname">
      <b-input-group>
        <b-form-input
          id="productname"
          v-model="$v.producto.nombre.$model"
          :state="checkField($v.producto.nombre)"
        ></b-form-input>
      </b-input-group>
    </b-form-group>
    <!-- Precio del producto -->
    <b-form-group label="Precio del producto" label-for="productprice">
      <b-input-group prepend="$">
        <b-form-input
          id="productprice"
          type="number"
          v-model.number="$v.producto.precio.$model"
          :state="checkField($v.producto.precio)"
        ></b-form-input>
      </b-input-group>
    </b-form-group>
    <!-- Descripcion del producto -->
    <b-form-group
      label="Descripcion del producto"
      label-for="productdescription"
    >
      <b-input-group>
        <b-form-textarea
          id="productdescription"
          v-model="$v.producto.descripcion.$model"
          :state="checkField($v.producto.descripcion)"
          no-resize
        ></b-form-textarea>
      </b-input-group>
    </b-form-group>
    <!-- Acciones del form -->
    <template>
      <div class="d-flex justify-content-end">
        <slot></slot
        ><!-- Importante el uso de este slot -->
      </div>
    </template>
  </b-form>
</template>
<script>
import {
  required,
  minLength,
  maxLength,
  minValue,
  maxValue,
} from "vuelidate/lib/validators";
export default {
  props:{
    propProducto:{
      type:Object,
      default:function(){
        return {}
      }
    }
  },
  data() {
    return {
      producto: {
        id:this.propProducto.id,
        nombre:this.propProducto.nombre,
        precio:this.propProducto.precio,
        descripcion:this.propProducto.descripcion
      }
    };
  },
  methods:{
    checkField(field){
      if(field.$invalid){
        return field.$dirty ? false : null;
      }
      return field.$dirty ? true : null;
    }
  },
  mounted(){
    this.$emit('getProductoData',this.$v);
  },
  updated(){
    this.$emit('getProductoData',this.$v);
  },
  validations: {
    producto: {
      nombre: {
        required,
        minLength: minLength(4),
        maxLength: maxLength(255),
      },
      precio: {
        required,
        minValue: minValue(0),
        maxValue: maxValue(100000),
      },
      descripcion: {
        minLength: minLength(0),
        maxLength: maxLength(255),
      },
    },
  },
};
</script>