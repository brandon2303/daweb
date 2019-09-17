<template>
    <div>
        <br>
        <h1>Administracion de casas</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista <b-button @click="abrirModal(modo='agregar')" variant="success" class="float-right">Nuevo</b-button> </div>

                    <div class="card-body">
                       <div class="table-responsive">
                         <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col"  width="5%">Cuartos</th>
                                    <th scope="col"  width="5%">Mts. contruccion</th>
                                    <th scope="col"  width="5%">Mts. terreno</th>
                                    <th scope="col"  width="5%">Plantas</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col" width="5%">Costo</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col" width="17%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="casa in arrayCasas" :key="casa.id">
                                    <td v-text="casa.id"></td>
                                    <td v-text="casa.nombre"></td>
                                    <td v-text="casa.direccion" ></td>
                                    <td v-text="casa.cuartos"></td>
                                    <td v-text="casa.mts_construc"></td>
                                    <td v-text="casa.mts_terreno"></td>
                                    <td v-text="casa.plantas"></td>
                                    <td v-text="casa.fecha"></td>
                                    <td v-text="casa.costo"></td>
                                    <td v-text="casa.nombre_giro"></td>
                                    <td> <b-img rounded alt="Rounded image" width="60" height="40" :src="'../../../upload/'+casa.imagen"> </b-img> </td>
                                    <td><b-button variant="warning" @click="abrirModal(modo='editar',casa)">Editar</b-button> <b-button variant="danger" @click="eliminar(casa.id)">Eliminar</b-button></td>
                                </tr> 
                            </tbody>
                        </table>
                       </div>
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
                <b-row class="mb-1">
                    <b-col cols="3">
                        Nombre:
                    </b-col>
                    <b-col cols="9">
                        <input type="text" v-model="nombre" class="form-control">
                    </b-col>
                </b-row>

                <b-row class="mb-1">
                    <b-col cols="3">
                        Direccion:
                    </b-col>
                    <b-col cols="9">
                        <input type="text" v-model="direccion" class="form-control">
                    </b-col>
                </b-row>

                <b-row class="mb-1">
                    <b-col cols="3">
                        Cuartos:
                    </b-col>
                    <b-col cols="9">
                        <input type="number" v-model="cuartos" class="form-control">
                    </b-col>
                </b-row>

                   <b-row class="mb-1">
                    <b-col cols="3">
                        Mts. construccion:
                    </b-col>
                    <b-col cols="9">
                        <input type="number" v-model="mts_construc" class="form-control">
                    </b-col>
                </b-row>

                <b-row class="mb-1">
                    <b-col cols="3">
                         Mts. terreno:
                    </b-col>
                    <b-col cols="9">
                        <input type="number" v-model="mts_terreno" class="form-control">
                    </b-col>
                </b-row>

                <b-row class="mb-1">
                    <b-col cols="3">
                        No. plantas:
                    </b-col>
                    <b-col cols="9">
                        <input type="number" v-model="plantas" class="form-control">
                    </b-col>
                </b-row>

                <b-row class="mb-1">
                    <b-col cols="3">
                        Fecha:
                    </b-col>
                    <b-col cols="9">
                        <input type="date" v-model="fecha" class="form-control">
                    </b-col>
                </b-row>

                <b-row class="mb-1">
                    <b-col cols="3">
                        Costo:
                    </b-col>
                    <b-col cols="9">
                        <input type="number" v-model="costo" class="form-control">
                    </b-col>
                </b-row>

                <b-row class="mb-1">
                    <b-col cols="3">
                        Giro  de negocio:
                    </b-col>
                    <b-col cols="9">
                           <select class="form-control" v-model="giro_id">
                            <option value="0" disabled>Seleccione un giro de negocio:</option>
                            <option v-for="giro in arrayGiros" :key="giro.id" :value="giro.id" v-text="giro.nombre"></option>
                        </select>
                    </b-col>
                </b-row>
                
                <b-row class="mb-1 ">
                    <b-col cols="3">
                        Imagen de perfil:
                    </b-col>
                    <b-col cols="9" >
                        <input type="file" class="form-control" v-on:change="onFileChange">
                        
                        <div id="preview">
                            <div v-if="imagenNueva">
                                <div class="mt-3">Imagen seleccionada: {{ file ? file.name : '' }}
                                <button type="button" v-show="file" class="close" @click="file=null,url=null" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <b-img v-if="url" rounded alt="Rounded image" :src="url"> </b-img>
                            </div>
                            <div v-else>
                            <div class="mt-3">Imagen seleccionada: {{ fileUp }}
                                <button type="button" v-show="file" class="close" @click="file=null" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <b-img rounded alt="Rounded image" v-if="fileUp" :src="'../../../upload/'+fileUp"> </b-img>
                            </div>
                        </div>
                    </b-col>
                </b-row>   
              </form>
            </b-container>

            <div slot="modal-footer" class="w-100">
              <b-button v-if="modoAgregar"
                variant="primary"
                class="float-right ml-2"
                @click="agregar()"
              >Agregar
              <i class="fas fa-plus-circle"></i>
              </b-button>
              <b-button v-else
                variant="primary"
                class="float-right ml-2"
                @click="editar()"
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
</template>

<script>
    export default {
        mounted() {
            this.listar();
            this.listarGiros();
        },
        data() {
            return {
                arrayCasas : [],
                id : 0,
                nombre : '',
                direccion : '',
                cuartos : 0,
                mts_construc : 0,
                mts_terreno : 0,
                plantas : 0,
                costo : 0,
                fecha : '',
                show : false,
                modoAgregar : true,
                tituloModal : '',
                giro_id : 0,
                url: null,
                file : null,
                imagenNueva : false,
                fileUp : '',
                arrayGiros : []
            }
        },
        methods: {
            onFileChange(e){
                this.file = e.target.files[0];
                this.url = URL.createObjectURL(this.file);
                this.imagenNueva = true;
            },
             listarGiros(){
                let t = this;

                axios.get('/listar/giros')
                .then(function (response) {

                   t.arrayGiros = response.data;
                
                })
                .catch(function (error) {
                   console.log('error: ->', error);
                });
            },
            listar(){
                let t=this;
                var url= '/casas';

                axios.get(url).then(function (response) {
                    t.arrayCasas = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            agregar(){
                
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let t=this;
                let formData = new FormData();
                formData.append('id' , this.id);
                formData.append('nombre' , this.nombre);
                formData.append('direccion' , this.direccion);
                formData.append('cuartos' , this.cuartos);
                formData.append('mts_construc' , this.mts_construc);
                formData.append('mts_terreno' , this.mts_terreno);
                formData.append('plantas' , this.plantas);
                formData.append('costo' , this.costo);
                formData.append('fecha' , this.fecha);
                formData.append('giro_id' , this.giro_id);
                formData.append('file', this.file);

                axios.post('/casas/agregar',formData,config)
                .then(function (response) {
                    alert("Registro agregado con exito");
                    t.listar();
                    t.cerrarModal();
                })
                .catch(function (error) {
                    console.log('error: ->', error);
                }); 
            },
            editar(){
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let t=this;
                let formData = new FormData();
            
                formData.append('id' , this.id);
                formData.append('nombre' , this.nombre);
                formData.append('direccion' , this.direccion);
                formData.append('cuartos' , this.cuartos);
                formData.append('mts_construc' , this.mts_construc);
                formData.append('mts_terreno' , this.mts_terreno);
                formData.append('plantas' , this.plantas);
                formData.append('costo' , this.costo);
                formData.append('fecha' , this.fecha);
                formData.append('giro_id' , this.giro_id);
                formData.append('file', this.file);
                    
                axios.post('/casas/editar', formData, config)
                .then(function (response) {
                    alert("Registro editado con exito");
                    t.listar();
                    t.cerrarModal();
                })
                .catch(function (error) {
                    console.log('error: ->', error);
                }); 
            },
            eliminar(id){
                const data = {
                    id : id
                };
                let t=this;
                axios.post('/casas/eliminar', data)
                .then(function (response) {
                    alert("Registro eliminado con exito");
                    t.listar();
                })
                .catch(function (error) {
                    console.log('error: ->', error);
                }); 
            },
            abrirModal(modo, casa = []){
                this.show = true;
                if(modo == "agregar")
                {
                    this.tituloModal = "Agregar casa";
                    this.modoAgregar = true;
                }
                else
                {
                    this.modoAgregar = false;
                    this.tituloModal = "Editar casa";
                    this.id = casa.id;
                    this.nombre = casa.nombre;
                    this.direccion = casa.direccion;
                    this.cuartos = casa.cuartos;
                    this.mts_construc = casa.mts_construc;
                    this.mts_terreno = casa.mts_terreno;
                    this.plantas = casa.plantas;
                    this.fecha = casa.fecha;
                    this.costo = casa.costo;
                    this.giro_id = casa.giro_id;
                    this.fileUp = casa.imagen;
                }
            },
            cerrarModal(){
                this.show = false;
                this.nombre = '';
                this.direccion = '';
                this.cuartos = 0;
                this.mts_construc = 0;
                this.mts_terreno = 0;
                this.plantas = 0;
                this.fecha = '';
                this.costo = 0;
                this.id = 0;
                this.file = null;
                this.imagenNueva = false;
                this.fileUp = '';
                this.giro_id = 0;
    
            }
        },
    }
</script>
<style>
#preview {
  display: flex;
  justify-content: center;
  align-items: center;
}
#preview img {
  max-width: 50%;
  max-height: 25%;
}
</style>
