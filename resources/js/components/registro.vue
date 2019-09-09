<template>
        <div class="card-body">
            <form>
                
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control "  required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" required autocomplete="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control " required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contraseña</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>

                    <div class="col-md-6">
                        <input  type="date" class="form-control">
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
                        <input class="form-check-input" type="radio"  id="inlineRadio1" >
                        <label class="form-check-label" for="inlineRadio1">Hombre</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  id="inlineRadio2">
                        <label class="form-check-label" for="inlineRadio2">Mujer</label>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="form-check col-md-2 col-form-label text-md-right" >
                        <input id="my-input" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">GYM</label>
                    </div>

                    <div class="form-check col-md-2 col-form-label text-md-right">
                        <input id="my-input" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">Musica</label>
                    </div>

                    <div class="form-check col-md-2 col-form-label text-md-right">
                        <input id="my-input" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">Danza</label>
                    </div>

                    <div class="form-check col-md-2 col-form-label text-md-right">
                        <input id="my-input" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">Deportes</label>
                    </div>

                    <div class="form-check col-md-2 col-form-label text-md-right" >
                        <input id="my-input" class="form-check-input" type="checkbox">
                        <label for="my-input" class="form-check-label">Gamer</label>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button @click="agregar" class="btn btn-primary">
                            Registrar
                        </button>
                    
                    </div>
                </div>
            </form>


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
            estatus : 0 
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
        agregar(){
            axios.post('/agregar/users')
            .then(function (response) {

                t.arrayNations = response.data;
            
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