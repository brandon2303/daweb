@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nuevo usuario         
                    
                    <a href="{{ url('/login') }}"  class="btn btn-warning" style="float:right;">Regresar</a>
                    </div>
                    <registro-component>
                    </registro-component>
                    </div>
                </div>
            </div>
        </div>
@endsection
