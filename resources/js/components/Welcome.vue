<template>
<div class="container">

    <h1>Hoteles</h1>
    <button class="btn btn-success" @click="hotel = !hotel">Nuevo Hotel</button>
    <hoteles v-if="hotel"/>
    <hotel-form @listado="listado" v-else/>
    
</div>
</template>
<script>
import Hoteles from "./Hoteles";
import HotelForm from "./Hotel";
export default {
    components:{
        Hoteles,
        HotelForm
    },
    data(){
        return{
            hotel:true
        }
    },
    methods:{
        listado(){
            this.hotel = true;
        }   
    }
  
}
</script>