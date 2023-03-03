<template>
  <div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Ciudad</th>
          <th>Nit</th>
          <th>Habitaciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="hotel in hoteles" :key="hotel">
          <td>{{ hotel.nombre }}</td>
          <td>{{ hotel.direccion }}</td>
          <td>{{ hotel.ciudad }}</td>
          <td>{{ hotel.nit }}</td>
          <td>{{ hotel.num_habitaciones }}</td>
          <td>
            <button class="btn btn-info btn-sm" @click="ver(hotel)">
              Agregar Habitacion
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <habitaciones
      @recargar="reloadList"
      :list="habitacionesAll"
      :hotel="hotel"
    />
  </div>
</template>
<script>
import Habitaciones from "./Habitaciones.vue";
export default {
  components: {
    Habitaciones,
  },
  data() {
    return {
      hoteles: [],
      habitacionesAll: [],
      hotel: {},
    };
  },
  methods: {
    reloadList(info) {
      this.habitacionesAll = info;
    },
    ver(hotel) {
      this.axios
        .get(`api/habitacion/${hotel.id}`)
        .then((response) => {
          this.habitacionesAll = response.data.data;
          this.hotel = hotel;
        })
        .catch((err) => (this.errors = err.response.data.errors));
    },
  },
  mounted() {
    this.axios
      .get("api/hotel")
      .then((response) => {
        this.hoteles = response.data.data;
      })
      .catch((err) => (this.errors = err.response.data.errors));
  },
};
</script>
