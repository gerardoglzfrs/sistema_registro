@if (Session::has('not_found'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <b>¡Error!</b> {{ Session::get('not_found') }}
</div>
@endif