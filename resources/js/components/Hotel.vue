<template>
  <div>
    <div class="alert alert-success" role="alert" v-if="creado">
  Hotel Creado
</div>
    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Nombre</label
          >
          <input type="text" v-model="hotel.nombre" class="form-control" />
          <span v-if="errors['nombre']" class="text-danger">{{
            errors["nombre"][0]
          }}</span>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Dirección</label
          >
          <input type="text" v-model="hotel.direccion" class="form-control" />
          <span v-if="errors['direccion']" class="text-danger">{{
            errors["direccion"][0]
          }}</span>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Ciudad</label
          >
          <input type="text" v-model="hotel.ciudad" class="form-control" />
          <span v-if="errors['ciudad']" class="text-danger">{{
            errors["ciudad"][0]
          }}</span>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nit</label>
          <input type="text" v-model="hotel.nit" class="form-control" />
          <span v-if="errors['nit']" class="text-danger">{{
            errors["nit"][0]
          }}</span>
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
          <span v-if="errors['num_habitaciones']" class="text-danger">{{
            errors["num_habitaciones"][0]
          }}</span>
        </div>
      </div>
      <button class="btn btn-success btn-sm" @click="crear">Guardar</button>
      
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
      errors: {},
      habitacionSelected:{},
      creado:false

    };
  },
  methods: {
    crear() {
      this.axios
        .post("api/hotel", this.hotel)
        .then((response) => {
          console.log(response.data);
          this.creado = true;
          this.$emit("listado");
        })
        .catch((err) => (this.errors = err.response.data.errors));
    },
  },
};
</script>