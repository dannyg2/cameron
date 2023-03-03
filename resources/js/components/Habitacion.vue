<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Cantidad</label
          >
          <input
            type="integer"
            v-model="habitacion.cantidad"
            class="form-control"
          />
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Tipo Habitacion</label
          >
          <input
            type="integer"
            v-model="habitacion.tipo_habitacion"
            class="form-control"
          />
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Acomodacion</label
          >
          <input
            type="integer"
            v-model="habitacion.tipo_acomodacion"
            class="form-control"
          />
        </div>
      </div>
      <button class="btn btn-info btn-sm" @click="agregar">
        Nueva habitacion
      </button>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      habitacion: {
        hotel_id:2
      },
    };
  },
  methods: {
    agregar() {
      this.axios.post("api/habitacion", this.habitacion).then((response) => {
        console.log(response.data);
      });
    },
  },
};
</script>