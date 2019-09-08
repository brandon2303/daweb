<template>
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ADMINISTRACION DE ARCHIVOS <button style="float:right" class="btn btn-success" @click="abrirModal('agregar')">Nuevo</button></div>
    
                    <div class="card-body">
                       <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Extencion</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Tiempo</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col" width="17%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="archivo in archivos" :key="archivo.id">
                                    <td v-text="archivo.id"></td>
                                    <td v-text="archivo.nombre"></td>
                                    <td v-text="archivo.tipo"></td>
                                    <td v-text="archivo.extencion"></td>
                                    <td v-text="archivo.fecha"></td>
                                    <td v-text="archivo.tiempo"></td>
                                    <td>
                                        <b-img  v-if="archivo.tipo == 'Video'" v-bind:src="'../../../img/video.jpg'" width="70" height="50"></b-img>
                                        <b-img  v-if="archivo.tipo == 'Imagen'" v-bind:src="'../../../img/picture.png'" width="70" height="50"></b-img>
                                        <b-img  v-if="archivo.tipo == 'Audio'" v-bind:src="'../../../img/musica.jpg'" width="70" height="50"></b-img>
                                        <b-img  v-if="archivo.extencion == 'txt'" v-bind:src="'../../../img/txt.jpg'" width="70" height="50"></b-img>
                                        <b-img  v-if="archivo.extencion == 'docx'" v-bind:src="'../../../img/word.png'" width="70" height="50"></b-img>
                                    </td>
                                    <td><button class="btn btn-warning" @click="editar()">Editar</button> <button class="btn btn-danger" @click="eliminar(archivo.id)">Eliminar</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              
            </div>
        </div>
        <!--inicio del modal-->
	   <b-modal v-model="show">
            <template  slot="modal-header">
              <!-- Emulate built in modal header close button action -->
              
               <h5>{{tituloModal}}</h5>
               <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                           <span aria-hidden="true">×</span>
                </button>
                
            </template>
            
            <b-container fluid>
            
                            <form  enctype="multipart/form-data">
                        
                            <input type="file" class="form-control" v-on:change="onFileChange">
                            <br>
                        

                            </form>

            </b-container>

            <div slot="modal-footer" class="w-100">
              <b-button v-if="modoAgregar"
                variant="primary"
                class="float-right ml-2"
                @click="agregar"
              >Agregar
              <i class="fas fa-plus-circle"></i>
              </b-button>
              <b-button v-else
                variant="primary"
                class="float-right ml-2"
                @click="editar"
              >Editar
              <i class="fas fa-pen"></i>
              </b-button>
              <b-button
                variant="danger"
                class="float-right"
                @click="cerrarModal()"
              >
              Cerrar
              <i class="fas fa-times-circle"></i>
              </b-button>
            </div>

          </b-modal>
    </div>
 
     
</div>
    

     <!--   -->
</template>
   
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            this.listar();
        },
        data() {
            return {
              file: '',
              show : false,
              modoAgregar : true,
              tituloModal : '',
              archivos : []
            };
        },
        methods: {
            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
            listar(){
                let t = this;

                axios.get('/listar/archivos')
                .then(function (response) {

                   t.archivos = response.data;
                
                })
                .catch(function (error) {
                   console.log('error: ->', error);
                });
            },
            agregar(){
                if(this.file == '')
                {
                    alert("Por favor seleccione algun archivo");
                    return;
                }

                let t = this;
   
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
    
                let formData = new FormData();
                formData.append('file', this.file);
   
                axios.post('/formSubmit', formData, config)
                .then(function (response) {
                   
                    alert("Archivo subido con exito!");
                    t.cerrarModal();
                    t.listar();        
                })
                .catch(function (error) {
                   console.log('error:->', error);
                });
              
               
            },
            editar(){

            },
            eliminar(id){
                const params = {
                        id : id
                };

                let t = this;
                
                axios.post('/eliminar/archivos',params)
                .then(function (response) {

                   alert("Archivo eliminado con exito!");
                   t.listar(); 
                
                })
                .catch(function (error) {
                   console.log('error: ->', error);
                });
            },
            cerrarModal(){
                this.show = false;
                this.file = '';
            },
            abrirModal(modo, file = []){
                this.show = true;
                if(modo == 'agregar')
                    this.tituloModal = 'AGREGAR';
                else
                {
                    this.modoAgregar = false;
                    this.tituloModal= 'EDITAR';
                }
            }
        }
    }
</script>