 @extends('layouts.auth')
  
@section('content')

  <body>      
    <div class="mytop-content" >
        <div class="container" > 
          
                <div class="col-sm-12 " style="background-color:rgba(0, 0, 0, 0.35); height: 60px; " >
                   <a class="mybtn-social pull-right" href="{{ url('/register') }}">
                       Registrarse
                  </a>

                  <a class="mybtn-social pull-right" href="{{ url('/login') }}">
                       Iniciar Sesion
                  </a>
               
                </div>
            
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                

                     <div class="myform-top">
                        <div class="myform-top-left">
                           <img  src="{{ url('img/logo_posr.jpg') }}" class="img-responsive logo" />
                          <h3>Regístrate en nuestro sitio.</h3>
                            <p>Por favor ingresa tus datos personales:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-user"></i>
                        </div>
                      </div>

                  <div class="col-md-12" >
                    @if (count($errors) > 0)
                     
                        <div class="alert alert-danger">
                            <strong>UPPS!</strong> Error al Registrar<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    
                    @endif
                   </div  >

                    <div class="myform-bottom">
                      
                      <form role="form" action="{{ url('/register') }}" method="post" class="">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                        <input type="text" name="name" placeholder="Nombres..." class="form-control" value="{{ old('name') }}" >
                        </div>
                     
                        <div class="form-group">
                            <input type="text" name="email" placeholder="Email..." class="form-control"  
                            value="{{ old('email') }}" />
                        </div>



                        <div class="form-group">
                        <input type="password" name="password" placeholder="Contraseña..." class="form-control" >
                        </div>


                         <div class="form-group">
                        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña..." class="form-control" >
                        </div>

                        <!--Aqui Agregue los otros campos del registro -->
                         <div class="form-group">
                            <input type="text" name="" placeholder="Email..." class="form-control"  
                            value="{{ old('email') }}" />
                        </div>

                        <div class="form-group">
                         {!! Recaptcha::render() !!}
                        </div>



                        <button type="submit" class="mybtn">Registrarme</button>
                      </form>
                    
                    </div>
              </div>
            </div>

           
        </div>
      </div>
 
 </body>
@endsection


