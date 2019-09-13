<template>
        <div class="card-body">
            
                
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control "  v-model="name" required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>

                    <div class="col-md-6">
                        <input id="email" type="email" v-model="email" class="form-control" required autocomplete="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                    <div class="col-md-6">
                        <input id="password" v-model="password" type="password" class="form-control " required autocomplete="new-password">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>

                    <div class="col-md-6">
                        <input  type="date" v-model="fecha_nacimiento" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Nacionalidad</label>

                    <div class="col-md-6">
                        <select class="form-control" v-model="nation_id">
                            <option value="0" disabled>Seleccione una nacionalidad:</option>
                            <option v-for="nation in arrayNations" :key="nation.id" :value="nation.id" v-text="nation.nombre"></option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">

                    <label for="Sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>

                    <div class="form-check form-check-inline" style="margin-left: 14px;">
                        <input class="form-check-input" value="Hombre"  v-model="sexo" type="radio"  id="inlineRadio1" >
                        <label class="form-check-label" for="inlineRadio1">Hombre</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" value="Mujer" v-model="sexo" type="radio"  id="inlineRadio2">
                        <label class="form-check-label" for="inlineRadio2">Mujer</label>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="form-check col-md-2 col-form-label text-md-right" >
                        <input v-model="gym" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">GYM</label>
                    </div>

                    <div class="form-check col-md-2 col-form-label text-md-right">
                        <input v-model="musica"  id="my-input" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">Musica</label>
                    </div>

                    <div class="form-check col-md-2 col-form-label text-md-right">
                        <input v-model="danza"   id="my-input" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">Danza</label>
                    </div>

                    <div class="form-check col-md-2 col-form-label text-md-right">
                        <input v-model="deportes"  id="my-input" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">Deportes</label>
                    </div>

                    <div class="form-check col-md-2 col-form-label text-md-right" >
                        <input v-model="gamer" id="my-input" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">Gamer</label>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button @click="agregar()" class="btn btn-primary">
                            Registrar
                        </button>
                    </div>
                </div>
           

        </div>
    
</template>
<script>
export default {
    data() {
        return {
            arrayNations : [],
            name : '',
            email : '',
            password : '',
            fecha_nacimiento : '',
            hobi : '',
            nation_id : 0,
            sexo : '',
           
            gym : false,
            musica : false,
            danza : false,
            deportes : false,
            gamer : false         
        
        }
    },
    methods: {
        listarNAtions(){
            let t = this;

            axios.get('/listar/nations')
            .then(function (response) {

                t.arrayNations = response.data;
            
            })
            .catch(function (error) {
                console.log('error: ->', error);
            });
        },
        validar(){
            
        
            
          
        },
        agregar(){
            //hobi gym
            if(this.gym)
            {
                this.hobi = 'GYM';
            }
            if(this.musica)
            {
                this.hobi = 'Musica';
            }
              if(this.danza)
            {
                this.hobi = 'Danza';
            }

            if(this.deportes)
            {
                this.hobi = 'Deporte';
            }

            if(this.gamer)
            {
                this.hobi = 'Gamer';
            }

            if(this.gym && this.musica)
            {
                this.hobi = 'GYM y Musica';
            }
            if(this.gym && this.danza)
            {
                this.hobi = 'GYM y Danza';
            }
            if(this.gym && this.deportes)
            {
                this.hobi = 'GYM y Deportes';
            }
            if(this.gym && this.gamer)
            {
                this.hobi = 'GYM y Gamer';
            }

            
            if(this.musica && this.danza)
            {
                this.hobi = 'Musica y Danza';
            }
            if(this.musica && this.deportes)
            {
                this.hobi = 'Musica y Deportes';
            }
            if(this.musica && this.gamer)
            {
                this.hobi = 'Musica y Gamer';
            }

            if(this.danza && this.deportes)
            {
                this.hobi = 'Danza y Deportes';
            }
            if(this.danza && this.gamer)
            {
                this.hobi = 'Danza y Gamer';
            }

            if(this.deportes && this.gamer)
            {
                this.hobi = 'Deporte y Gamer';
            }

            if(this.gym && this.musica && this.danza)
            {
                this.hobi = 'GYM, Danza y Musica';
            }
            if(this.gym && this.musica && this.deportes)
            {
                this.hobi = 'GYM, Deportes y Musica';
            }
            if(this.gym && this.musica && this.gamer)
            {
                this.hobi = 'GYM, Gamer y Musica';
            }

            if(this.gym && this.danza && this.deportes)
            {
                this.hobi = 'GYM, Danza y Deportes';
            }
            if(this.gym && this.danza && this.gamer)
            {
                this.hobi = 'GYM, Danza y Gamer';
            }

            if(this.gym && this.deportes && this.gamer)
            {
                this.hobi = 'GYM, Deportes y Gamer';
            }

            if(this.musica && this.danza && this.deportes)
            {
                this.hobi = 'Musica, Danza y Deportes ';
            }
           
            if(this.musica && this.gamer && this.danza)
            {
                this.hobi = 'Musica, Danza y Gamer ';
            }
            if(this.musica && this.gamer && this.deportes)
            {
                this.hobi = 'Musica, Deportes y Gamer ';
            }
            
            if(this.danza && this.deportes && this.gamer)
            {
                this.hobi = 'Danza, Deportes y Gamer ';
            }

            if(this.gamer && this.musica && this.danza && this.deportes)
            {
                this.hobi = 'Gamer, Danza, Deportes y Musica';
            }
            if(this.gym && this.musica && this.danza && this.deportes)
            {
                this.hobi = 'GYM, Danza, Deportes y Musica';
            }
            if(this.gym && this.musica && this.danza && this.gamer)
            {
                this.hobi = 'GYM, Danza, Gamer y Musica';
            }
            if(this.gym && this.musica && this.deportes && this.gamer)
            {
                this.hobi = 'GYM, Deportes, Gamer y Musica';
            }
            if(this.gym && this.danza && this.deportes && this.gamer)
            {
                this.hobi = 'GYM, Deportes, Gamer y Danza';
            }

            if(this.gym && this.musica && this.danza && this.gamer && this.deportes)
            {
                this.hobi = 'GYM, Danza, Deportes, Gamer y Musica';
            }

            //end hobi gym

            //hobi musica
            
            
          

            //aqui epiesan las validaciones--->>
            if(this.email == '')
            {
                  alert("Por complete el campo email");
                return;
            }
          
            if(this.password == '')
            {
                  alert("Por complete el campo contraseña");
                return;
            }
            if(this.fecha_nacimiento == '')
            {
                alert("Por favor seleccione una fecha");
                return;
            }
            if(this.sexo == '' || this.sexo == null)
            {
                alert("Por favor seleccione un sexo");
                return;
            }


             
                const data = {
                           name: this.name,
                           email : this.email,
                           password :this.password,
                           fecha_nacimiento: this.fecha_nacimiento,
                           hobi : this.hobi,
                           nation_id : this.nation_id,
                           sexo : this.sexo
                          };
            axios.post('/agregar/users', data)
            .then(function (response) {
                alert("Usuario registrado con exito");
                
                
                this.name = '';
                this.email = '';
                this.password = '';
                this.fecha_nacimiento = '';
                this.hobi = '';
                this.nation_id = 0;
                this.sexo = '';
            
            })
            .catch(function (error) {
                console.log('error: ->', error);
            }); 
        }
    },
    mounted() {
        this.listarNAtions();
    },
   
}
</script>