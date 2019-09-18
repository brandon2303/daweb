<template>
      <div class="container">
                <form v-on:submit.prevent="saveForm()">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <input type="text" v-model="usability.name" @blur="Name()" class="form-control" placeholder="Escribe tu nombre completo" data-placement="left" data-toggle="tooltip" title="Escribe tu nombre completo">
                        </div>

                        <template v-if="vacio==true"></template>
                        <template v-if="vacio==false">
                             <div class="alert alert-danger" role="alert" v-if="errors.name" v-text="errors.name[0]"></div>
                        </template>

                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" v-model="usability.email" @blur="Email()" class="form-control" placeholder="Escribe tu correo electronico" data-placement="left" data-toggle="tooltip" title="Escribe tu correo electronico">
                        </div>

                        <template v-if="vacio==true"></template>
                        <template v-if="vacio==false">
                             <div class="alert alert-danger" role="alert" v-if="errors.email" v-text="errors.email[0]"></div>
                        </template>
                    
                        <div class="form-group">
                            <label class="control-label">Telefono</label>
                            <input type="number" v-model="usability.phone" class="form-control" placeholder="Escribe tu telefono a 10 digitos" data-placement="left" data-toggle="tooltip" title="Escribe tu numero de telefono a 10 digitos">
                            <h6>(123)4567891</h6>
                        </div>
                        
                        <template v-if="vacio==true"></template>
                        <template v-if="vacio==false">
                             <div class="alert alert-danger" role="alert" v-if="errors.phone" v-text="errors.phone[0]"></div>
                        </template>
    
                        <div class="form-group">
                         <label>Podemos regresar la llamada</label>   
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="Si" v-model="usability.r_phone_call">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox2" value="No" v-model="usability.r_phone_call">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                            </div>
                        </div>
                        <template v-if="vacio==true"></template>
                        <template v-if="vacio==false">
                             <div class="alert alert-danger" role="alert" v-if="errors.r_phone_call" v-text="errors.r_phone_call[0]"></div>
                        </template>
                                        
                        <div class="form-group">
                            <label class="control-label">Website</label>
                            <input type="text" v-model="usability.website" class="form-control" placeholder="Escribe el website" data-placement="left" data-toggle="tooltip" title="Escribe el sitio web">
                        </div>
                        <template v-if="vacio==true"></template>
                        <template v-if="vacio==false">
                             <div class="alert alert-danger" role="alert" v-if="errors.website" v-text="errors.website[0]"></div>
                        </template>
               
                    
                        <div class="form-group">
                            <label class="control-label">Prioridad</label>
                            <select class="form-control" v-model="usability.priority" data-placement="left" data-toggle="tooltip" title="Seleccione alguna prioridad">
                                <option value="" disabled>Seleccione una prioridad:</option>
                                <option value="Baja">Baja</option>
                                <option value="Normal">Normal</option>
                                <option value="Alta">Alta</option>
                                <option value="Emergencia">Emergencia</option>
                            </select>
                        </div>
                        <template v-if="vacio==true"></template>
                        <template v-if="vacio==false">
                             <div class="alert alert-danger" role="alert" v-if="errors.priority" v-text="errors.priority[0]"></div>
                        </template>
                
                       
                        <div class="form-group">
                            <label class="control-label">Tipo de servicio</label>
                            <select class="form-control" v-model="usability.type" data-placement="left" data-toggle="tooltip" title="Seleccione el tipo de emergencia">
                                <option value="" disabled>Seleccione una servicio:</option>
                                <option value="Actualizacion de Web Site">Actualizacion de Web Site</option>
                                <option value="Cambio de Informacion">Cambio de Informacion</option>
                                <option value="Informacion Adicional">Informacion Adicional</option>
                                <option value="Nuevos Productos">Nuevos Productos</option>
                            </select>
                        </div>
                        <template v-if="vacio==true"></template>
                        <template v-if="vacio==false">
                             <div class="alert alert-danger" role="alert" v-if="errors.type" v-text="errors.type[0]"></div>
                        </template>
                
                      
                        <div class="form-group">
                            <label class="control-label">Mensaje</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="usability.message" placeholder="Escribe un mensaje" data-placement="left" data-toggle="tooltip" title="Escribe el mensaje"></textarea>
                        </div>
                        <template v-if="vacio==true"></template>
                        <template v-if="vacio==false">
                             <div class="alert alert-danger" role="alert" v-if="errors.message" v-text="errors.message[0]"></div>
                        </template>
                 
                   
                        <div class="form-group">
                            <button class="btn btn-success">Guardar</button>
                            <a class="btn btn-warning" @click="Clear()">Limpiar</a>
                        </div>

                
                </form>
            </div>
</template>


<script>


    export default {
        data: function () {
            return {
                usability: {
                    name: '',
                    email:'',
                    phone:'',
                    r_phone_call:'',
                    website:'',
                    priority :'',
                    type : '',
                    message:''
                },
                checkEmail:false,
                checkName:false,
                errors: [],
                vacio:false

            }
        },
        methods: {
            saveForm() {

                var app = this;
                var newUsability = app.usability;
                axios.post('usability', newUsability)

                    .then(function (resp) {

                        if(app.checkEmail==true || app.checkName==true){
                              alert("Gracias por volver de nuevo");
                        }

                        if(app.checkEmail==true && app.checkName==true){
                              alert("Gracias por volver de nuevo");
                        }

                        alert("Gracias por mandar sus datos");

                        app.vacio=true;

                        app.Clear();
           
                    })
                    .catch(error => {
                        if(error.response.status == 422){
                            this.errors=error.response.data.errors;
                        }
                        
                    });
            },
            Email(){
                    let me=this;
                    var url= 'email/check?email=' + this.usability.email;
                    axios.get(url).then(function (response) {
                        var respuesta= response.data;
                        me.checkEmail = respuesta;
                    })  
                    .catch(function (error) {
                        console.log(error);
                    });
             },
              Name(){
                    let me=this;
                    var url= 'name/check?name=' + this.usability.name;
                    axios.get(url).then(function (response) {
                        var respuesta= response.data;
                        me.checkName = respuesta;
                    })  
                    .catch(function (error) {
                        console.log(error);
                    });
             },
            Clear(){
                this.usability.name="";
                this.usability.email="";
                this.usability.phone="";
                this.usability.r_phone_call="";
                this.usability.website="";
                this.usability.priority=0;
                this.usability.type=0;
                this.usability.message="";
            },
            
        }
    }
</script>