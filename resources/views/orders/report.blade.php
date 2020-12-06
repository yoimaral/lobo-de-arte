@extends('layouts.app')

@section('content')

<script>
    $(document).ready(function(){
$.ajax({
url: '/OrderController@report',
method:'GET'
data: {
    id:1,
    _token:$('input[name="_token"]').val()
}
}).done(function(res){
    var arreglo = JSON.parse(res);

for(var x=0;x<arreglo.length;x++>){
    var todo='<tr><td>'+arreglo[x].id+'</td>';
    todo+='<td><td>'+arreglo[x].status+'</td>';
    todo+='<td><td>'+arreglo[x].created_at+'</td>';
    todo+='<td></td></tr>';
    $('#tbody').append(todo);
}
});

});


</script>

{{-- Implement Canvast for grafic --}}

<canvas id="myChart" width="400" height="400"></canvas>

{{-- End Canvast --}}

@endsection