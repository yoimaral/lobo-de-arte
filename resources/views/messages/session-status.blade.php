@if(session('message'))

<div class="container">
    <div class="alert alert-info mt-2" role="alert">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        {{ session('message') }}
    </div>
</div>

@endif