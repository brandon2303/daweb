@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">   
                  <ul>
                   <a  class="" href="#" style="margin:-50px;">
                      {{ Auth::user()->email }} <span class="caret"></span>
                    </a>

                    <a class="" href="{{ route('logout') }}" 
                         onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" style="float:right;">
                             Cerrar Sesion
                    </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                        

                        
                    @endif
                                 
                    Bienvenido 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
