@if(Session::has('user_found'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<b>¡Error!</b> {{ Session::get('user_found') }}
</div>
@endif
