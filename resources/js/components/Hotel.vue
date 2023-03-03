<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Nombre</label
          >
          <input type="text" v-model="hotel.nombre" class="form-control" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Dirección</label
          >
          <input type="text" v-model="hotel.direccion" class="form-control" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Ciudad</label
          >
          <input type="text" v-model="hotel.ciudad" class="form-control" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nit</label>
          <input type="text" v-model="hotel.nit" class="form-control" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Número de habitaciones</label
          >
          <input
            type="text"
            v-model="hotel.num_habitaciones"
            class="form-control"
          />
        </div>
      </div>
      <button class="btn btn-success btn-sm" @click="crear">Guardar</button>
      <habitacion />
    </div>
  </div>
</template>
<script>
import Habitacion from "./Habitacion.vue";
export default {
  components: {
    Habitacion,
  },
  data() {
    return {
      hotel: {},
    };
  },
  methods: {
    crear() {
      this.axios.post("api/hotel", this.hotel).then((response) => {
        console.log(response.data);
      });
    },
  },
};
</script>