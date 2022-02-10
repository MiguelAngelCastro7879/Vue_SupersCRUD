

<template>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Personaje</th>
            <th scope="col">Nombre</th>
            <th scope="col">Estado</th>
            <th scope="col">Raza</th>
            <th scope="col">Poder</th>
            <th scope="col">Editorial</th>
            <th scope="col">Genero</th>
          </tr>
        </thead>
        <!-- <tbody>
          <tr v-for="personaje in personajes" :key="personaje.id">
            <th scope="col">{{personaje.id}}</th>
            <th scope="col">{{personaje.personaje}}</th>
            <th scope="col">{{personaje.nombre}}</th>
            <th scope="col">{{personaje.estado}}</th>
            <th scope="col">{{personaje.raza}}</th>
            <th scope="col">{{personaje.poder}}</th>
            <th scope="col">{{personaje.editorial}}</th>
            <th scope="col">{{personaje.genero}}</th>
          </tr>
        </tbody> -->
        <h1>{{msj}}</h1>

    </table>
</template>

<script >
    export default{
        datos(){
            return {

                msg: 'Hello world!'
                // personajes:[],
            }
        },
        // methods:{
        //     async listarItems (){
        //         const pers = await axios.get('personajes');
        //         this.personajes = pers.datos;
        //     }
        // },
        // creacion(){
        //     this.listarItems();
        // },

    }
</script>
