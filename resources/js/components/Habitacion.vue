<template>
  <div>
    <div></div>
    <div></div>
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
          <span v-if="errors['cantidad']" class="text-danger">{{
            errors["cantidad"][0]
          }}</span>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Tipo Habitacion</label
          >
          <select v-model="habitacion.tipo_habitacion" class="form-control">
            <option
              :value="tipo.name"
              v-for="tipo in tipoHabitaciones"
              :key="tipo"
            >
              {{ tipo.name }}
            </option>
          </select>
          <span v-if="errors['tipo_habitacion']" class="text-danger">{{
            errors["tipo_habitacion"][0]
          }}</span>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"
            >Acomodacion</label
          >
          <select v-model="habitacion.tipo_acomodacion" class="form-control">
            <option :value="tipo" v-for="tipo in tipoAcomodacion" :key="tipo">
              {{ tipo }}
            </option>
          </select>
          <span v-if="errors['tipo_acomodacion']" class="text-danger">{{
            errors["tipo_acomodacion"][0]
          }}</span>
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
  props: { hotel: {} },
  data() {
    return {
      habitacion: {},
      errors: {},
      tipoHabitaciones: [
        {
          name: "ESTANDAR",
          options: ["SENCILLA", "DOBLE"],
        },
        {
          name: "JUNIOR",
          options: ["TRIPLE", "CUADRUPLE"],
        },
        {
          name: "SUIT",
          options: ["SENCILLA", "DOBLE", "TRIPLE"],
        },
      ],
    };
  },
  computed: {
    tipoAcomodacion() {
      const type = this.tipoHabitaciones.filter((tipo) => {
        return tipo.name == this.habitacion.tipo_habitacion;
      });
      if (type.length) {
        return type[0].options;
      }
      return [];
    },
  },
  methods: {
    recargar() {
      this.axios.get(`api/habitacion/${this.hotel.id}`).then((response) => {
        this.$emit("recargar", response.data.data);
      });
    },
    agregar() {
      this.habitacion.hotel_id = this.hotel.id;
      this.axios
        .post("api/habitacion", this.habitacion)
        .then((response) => {
          this.recargar();
          this.habitacion = {};
        })
        .catch((err) => (this.errors = err.response.data.errors));
    },
  },
};
</script>