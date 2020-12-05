<template>
  <div>
    <b-table
      striped
      hover
      :items="getRegistros.data"
      :fields="fields"
      :tbody-tr-class="checkDate"
      dark
    >
      <template #cell(dia)="row">
        {{ getDayName(row.item.fecha) }}
      </template>
      <template #cell(detalles)="row">
        <b-button
          size="sm"
          block
          variant="light"
          @click="row.toggleDetails"
          class="mr-2"
        >
          {{ row.detailsShowing ? "Ocultar" : "Mostrar" }} detalles
        </b-button>
      </template>
      <template #row-details="row">
        <b-table
          hover
          head-variant="light"
          table-variant="info"
          :items="row.item.clientes"
          class="rounded"
        >
        </b-table>
        <b-row>
          <b-col cols="6">
            <b-button block variant="primary" @click="loadEditSection(row.item)"
              >Editar Registro</b-button
            >
          </b-col>
          <b-col cols="6">
            <b-button
              block
              variant="danger"
              @click="borrarRegistro(row.item.id)"
              >Borrar Registro</b-button
            >
          </b-col>
        </b-row>
      </template>
    </b-table>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import Date_Esp from "../../Mixins/Date_Esp";
export default {
  mixins: [Date_Esp],
  data() {
    return {
      fields: [
        {
          key: "numMesa",
          label: "Nº Mesa",
          sortable: true,
        },
        "dia",
        {
          key: "fecha",
          label: "Fecha",
          formatter: (value) => {
            let d = new Date(value);
            let fecha_completa = d
              .toLocaleDateString()
              .split("/")
              .map((v) => (v < 10 ? `0${v}` : v))
              .join("/");
            return fecha_completa;
          },
          sortable: true,
        },
        {
          key: "horario",
          label: "Horario",
          sortable: true,
        },
        "detalles",
      ],
      classesTable: {
        proximo: ["bg-warning", "text-dark"],
        hoy: ["bg-success", "text-light"],
        mesActual: ["bg-info", "text-light"],
        antiguo: ["bg-danger", "text-light"],
      },
    };
  },
  computed: {
    ...mapGetters("RegistrosMesasModule", ["getRegistros"]),
  },
  methods: {
    checkDate(item, type) {
      //HOY
      let now = new Date();
      let mes_actual = now.getMonth() + 1;
      let ano_actual = now.getFullYear();
      let dia_actual = now.getDate();
      //Fechas del registro
      let fecha_registro = new Date(item.fecha);
      let mes_r = fecha_registro.getMonth() + 1;
      let ano_r = fecha_registro.getFullYear();
      let dia_r = fecha_registro.getDate();
      //

      if (ano_actual === ano_r) {
        if (mes_actual == mes_r) {
          if (dia_actual < dia_r) {
            return this.classesTable.proximo;
          }
          if (dia_actual == dia_r) {
            return this.classesTable.hoy;
          }
          if (dia_actual > dia_r) {
            return this.classesTable.antiguo;
          }
        }
        if (mes_actual > mes_r) {
          return this.classesTable.antiguo;
        }
      }
      if (ano_actual > ano_r) {
        return this.classesTable.antiguo;
      }
    },
    getDayName(date) {
      let d = new Date(date);
      let dia = d.getDay();
      return this.dias[dia].toUpperCase();
    },
    borrarRegistro(registro) {
      if (window.confirm("Desea borrar este registro?")) {
        this.borrarRegistroDb(registro);
      }
    },
    loadEditSection(registro) {
      this.$emit("loadEditSection", registro);
    },
    ...mapActions("RegistrosMesasModule", [
      "getAllRegistrosMesasDb",
      "borrarRegistroDb",
    ]),
  },
  mounted() {
    this.getAllRegistrosMesasDb();
  },
};
</script>