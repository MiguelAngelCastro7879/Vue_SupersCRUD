<script>

    export default {

        data() {
            return {
                a: 1,
                personajes: [],
                open: false,
	            show: true,
	            btnText: "Ocultar",
                personaje: {
                    id:'',
                    personaje:'',
                    nombre:'',
                    estado:'',
                    raza:'',
                    poder:'',
                    editorial:'',
                    genero:'',
                },
            }
        },
        methods:{
            plus(){
               this.a = this.a+1
            },
            async listarPersonajes(){
                const $res = await axios.get('/personajes')
                this.personajes = $res.data;
            },
            async eliminar(id){
                const $res = await axios.delete('/personajes/'+id)
                this.listarPersonajes()
            },
            async actualizar(event){
            },
            async crear(event){
                const $res = await axios.post('/personajes',this.personaje)
                this.resetDatos()
                this.showToggle()
                this.listarPersonajes()
            },

            async mostrarInsertar(){
            },

            resetDatos(){
                this.personaje.personaje='',
                this.personaje.nombre='',
                this.personaje.estado='',
                this.personaje.raza='',
                this.personaje.poder='',
                this.personaje.editorial='',
                this.personaje.genero=''
            },
            showToggle:function(){
                this.isShow = !this.isShow
                if(this.isShow){
                    this.btnText = "Añadir"
                    this.resetDatos()
                }else{
                    this.btnText = "Cancelar"
                }
            }
        },
        created() {
            this.plus()
            this.listarPersonajes()
            console.log(this.a) // 1
            console.log(this.$data) // { a: 1 }
            console.log(this.personajes)
            this.showToggle()
        },

    }
</script>

<template>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <button v-text="btnText" @click="showToggle" class="btn btn-success"></button>
    <div v-show="isShow"> El bloque de contenido que se mostrará y ocultará </div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Acciones</th>
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
        <tbody>
          <tr v-show="!isShow">
            <th scope="col"><button @click="this.crear()" class="btn btn-success">Enviar</button></th>
            <th scope="col"></th>
            <td scope="col"><input v-model="personaje.personaje" type="text" id="ipersonaje" class="form-control-sm" size="15" placeholder="personaje" ></td>
            <td scope="col"><input v-model="personaje.nombre" type="text" id="inombre" class="form-control-sm" size="15" placeholder="nombre"></td>
            <td scope="col"><input v-model="personaje.estado" type="text" id="iestado" class="form-control-sm" size="7" placeholder="estado" ></td>
            <td scope="col"><input v-model="personaje.raza" type="text" id="iraza" class="form-control-sm" size="7" placeholder="raza" ></td>
            <td scope="col"><input v-model="personaje.poder" type="text" id="ipoder" class="form-control-sm" size="15" placeholder="poder" ></td>
            <td scope="col"><input v-model="personaje.editorial" type="text" id="ieditorial" class="form-control-sm" size="15" placeholder="editorial" ></td>
            <td scope="col"><input v-model="personaje.genero" type="text" id="igenero" class="form-control-sm" size="7" placeholder="genero" ></td>
          </tr>
          <tr v-for="personaje in personajes" :key="personaje.id">
            <td scope="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button @click="boton" class="btn btn-warning btn-sm">Editar</button>
                    <button @click="this.eliminar(personaje.id)" class="btn btn-danger btn-sm">Eliminar</button>
                </div>
            </td>
            <td scope="col">{{personaje.id}}</td>
            <td scope="col">{{personaje.personaje}}</td>
            <td scope="col">{{personaje.nombre}}</td>
            <td scope="col">{{personaje.estado}}</td>
            <td scope="col">{{personaje.raza}}</td>
            <td scope="col">{{personaje.poder}}</td>
            <td scope="col">{{personaje.editorial}}</td>
            <td scope="col">{{personaje.genero}}</td>
          </tr>
        </tbody>
    </table>
</template>

