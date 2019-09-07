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
                                    <th scope="col" width="17%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><button class="btn btn-warning" @click="editar()">Editar</button> <button class="btn btn-danger" @click="eliminar()">Eliminar</button></td>
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
          
        
                
    
                    
                        <div v-if="success != ''" class="alert alert-success" role="alert">
                          {{success}}
                        </div>
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
        },
        data() {
            return {
              file: '',
              success: '',
              show : false,
              modoAgregar : true,
              tituloModal : ''
            };
        },
        methods: {
            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
           
            agregar(){
                if(this.file == '')
                {
                    alert("Por favor seleccione algun archivo");
                    return;
                }
                let currentObj = this;
   
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
    
                let formData = new FormData();
                formData.append('file', this.file);
   
                axios.post('/formSubmit', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            },
            editar(){

            },
            eliminar(){
                
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