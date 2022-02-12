<script>
    export default {
        data() {
            return {
                a: 1,
                personajes: []
            }
        },
        methods:{
            plus(){
               this.a = this.a+1
            },
            async listarPersonajes(){
                const $res = await axios.get('/personajes')
                this.personajes = $res.data.data;
            },
            async eliminar(id){
                const $res = await axios.get('/personajes')
                console.log($res)
            },
            async actualizar(event){
            }
        },
        created() {
            this.plus()
            this.listarPersonajes()
            console.log(this.a) // 1
            console.log(this.$data) // { a: 1 }
            console.log(this.personajes)
        },

    }
</script>

<template>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <h1> {{this.personajes}} </h1> -->
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
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
            <th scope="col">Eliminar</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="personaje in personajes" :key="personaje.id">
            <th scope="col">{{personaje.id}}</th>
            <th scope="col">{{personaje.personaje}}</th>
            <th scope="col">{{personaje.nombre}}</th>
            <th scope="col">{{personaje.estado}}</th>
            <th scope="col">{{personaje.raza}}</th>
            <th scope="col">{{personaje.poder}}</th>
            <th scope="col">{{personaje.editorial}}</th>
            <th scope="col">{{personaje.genero}}</th>
            <th scope="col">
                <button @click="boton" class="btn btn-warning">Editar</button>
            </th>
            <th scope="col">
                <button @click="this.eliminar(personaje.id)" class="btn btn-danger">Eliminar</button>
            </th>
          </tr>
        </tbody>
        <!-- <span id="app">{{msj}}</span> -->

  <!-- <button @click="increment">Count is: {{ count }}</button> -->
    </table>
</template>
