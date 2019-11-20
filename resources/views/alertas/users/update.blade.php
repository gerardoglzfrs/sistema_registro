@if (Session::has('user_update'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <b>¡Éxito!</b> {{ Session::get('user_update') }}
</div>
@endif