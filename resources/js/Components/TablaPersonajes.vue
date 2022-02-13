<script>

    export default {

        data() {
            return {
                a: 1,
                personajes: [],
	            show: true,
                btn: "Editar",
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
                personajeE: {
                    id:'',
                    personaje:'',
                    nombre:'',
                    estado:'',
                    raza:'',
                    poder:'',
                    editorial:'',
                    genero:'',
                },
                e: '',

            }
        },
        methods:{
            plus(){
               this.a = this.a+1
            },
            async listarPersonajes(){
                const $res = await axios.get('/api/personajes')
                this.personajes = $res.data;
            },
            async eliminar(id){
                const $res = await axios.delete('/api/personajes/'+id)
                this.listarPersonajes()
            },
            async actualizar(id){
                const $pos = await axios.put('/api/personajes/'+id,this.personajeE)
                this.listarPersonajes()
                this.e=''
            },
            async mostrarUno(id){
                const $res = await axios.get('/api/personajes/'+id)
                this.personaje=$res.data
                this.personajeE=this.personaje
            },
            async crear(event){
                const $res = await axios.post('/api/personajes',this.personaje)
                this.resetDatos()
                this.showToggle()
                this.listarPersonajes()
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
            },
            editar:function(id){
                this.mostrarUno(id)
                this.e = id
                this.edit = !this.edit
                if(this.edit){
                    this.btn = "Editar"

                }else{
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
            this.editar(null)
        },

    }
</script>

<template>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <button v-text="btnText" @click="showToggle" class="mb-2 btn btn-success"></button>

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
            <th scope="col"><div class="d-grid gap-2"><button @click="this.crear()" class="btn btn-success btn-sm">Enviar</button></div></th>
            <th scope="col"></th>
            <td scope="col"><input v-model="personaje.personaje" type="text" id="ipersonaje" class="form-control-sm form-control" size="7" placeholder="personaje" ></td>
            <td scope="col"><input v-model="personaje.nombre" type="text" id="inombre" class="form-control-sm form-control" size="7" placeholder="nombre"></td>
            <td scope="col"><input v-model="personaje.estado" type="text" id="iestado" class="form-control-sm form-control" size="7" placeholder="estado" ></td>
            <td scope="col"><input v-model="personaje.raza" type="text" id="iraza" class="form-control-sm form-control" size="7" placeholder="raza" ></td>
            <td scope="col"><input v-model="personaje.poder" type="text" id="ipoder" class="form-control-sm form-control" size="7" placeholder="poder" ></td>
            <td scope="col"><input v-model="personaje.editorial" type="text" id="ieditorial" class="form-control-sm form-control" size="7" placeholder="editorial" ></td>
            <td scope="col"><input v-model="personaje.genero" type="text" id="igenero" class="form-control-sm form-control" size="7" placeholder="genero" ></td>
          </tr>
          <tr v-for="personaje in personajes" :key="personaje.id">
            <td scope="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button v-if="e!=personaje.id" v-text="btn" @click="editar(personaje.id)" class="btn btn-warning btn-sm"></button>
                    <button v-if="e==personaje.id" @click="actualizar(personaje.id)" class="btn btn-success btn-sm">Enviar</button>

                    <button  @click="this.eliminar(personaje.id)" class="btn btn-danger btn-sm">Eliminar</button>
                </div>
            </td>
            <td v-if="e!=personaje.id" scope="col">{{personaje.id}}</td>
            <td v-if="e!=personaje.id" scope="col">{{personaje.personaje}}</td>
            <td v-if="e!=personaje.id" scope="col">{{personaje.nombre}}</td>
            <td v-if="e!=personaje.id" scope="col">{{personaje.estado}}</td>
            <td v-if="e!=personaje.id" scope="col">{{personaje.raza}}</td>
            <td v-if="e!=personaje.id" scope="col">{{personaje.poder}}</td>
            <td v-if="e!=personaje.id" scope="col">{{personaje.editorial}}</td>
            <td v-if="e!=personaje.id" scope="col">{{personaje.genero}}</td>
            <th scope="col"></th>
            <td v-if="e==personaje.id" scope="col"><input v-model="personajeE.personaje" type="text" id="ipersonaje" class="form-control-sm form-control" size="7" placeholder="personaje" ></td>
            <td v-if="e==personaje.id" scope="col"><input v-model="personajeE.nombre" type="text" id="inombre" class="form-control-sm form-control" size="7" placeholder="nombre"></td>
            <td v-if="e==personaje.id" scope="col"><input v-model="personajeE.estado" type="text" id="iestado" class="form-control-sm form-control" size="7" placeholder="estado" ></td>
            <td v-if="e==personaje.id" scope="col"><input v-model="personajeE.raza" type="text" id="iraza" class="form-control-sm form-control" size="7" placeholder="raza" ></td>
            <td v-if="e==personaje.id" scope="col"><input v-model="personajeE.poder" type="text" id="ipoder" class="form-control-sm form-control" size="7" placeholder="poder" ></td>
            <td v-if="e==personaje.id" scope="col"><input v-model="personajeE.editorial" type="text" id="ieditorial" class="form-control-sm form-control" size="7" placeholder="editorial" ></td>
            <td v-if="e==personaje.id" scope="col"><input v-model="personajeE.genero" type="text" id="igenero" class="form-control-sm form-control" size="7" placeholder="genero" ></td>
          </tr>
        </tbody>
    </table>
</template>

