
@component('mail::message')
    <h4>Credenciales</h4>
    <p>Cedula:{{$cedula}}</p>
    <p>Clave:{{$clave}}</p>
    Link de la encuesta: <a href="http://127.0.0.1:8000">Sistema de Encuestas UTP</a>
    <p>Gracias por su tiempo,</p>
    <p>Universidad Tecnológica de Panamá</p>
@endcomponent