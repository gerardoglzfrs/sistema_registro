@if(Session::has('error_user'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <b>¡Error!</b> {{ Session::get('error_user') }}
</div>
@endif
