<template>
  <div class="row">
    <div class="col-md-6">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Cantidad</th>
            <th>Tipo Habitación</th>
            <th>Tipo Acomodación</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="habitacion in list" :key="habitacion">
            <td>{{ habitacion.cantidad }}</td>
            <td>{{ habitacion.tipo_habitacion }}</td>
            <td>{{ habitacion.tipo_acomodacion }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <habitacion-form @recargar="reloadList" :hotel="hotel" />
    </div>
  </div>
</template>
<script>
import HabitacionForm from "./Habitacion";
export default {
  props: {
    list: {},
    hotel:{}
  },
  components: {
    HabitacionForm,
  },
  data() {
    return {};
  },
  methods:{
    reloadList(info){
        this.$emit("recargar", info);
    }
  }
};
</script>