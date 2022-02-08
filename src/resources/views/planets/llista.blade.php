<p>@if (session('status'))
    {{session('status')}}
@endif</p>
<a href="{{url('planets/newPlaneta')}}">Añadir Planeta</a>
<table border="1">  
    <th>Id</th>
    <th>Nom</th>
    <th>Accions</th>
    @foreach ($planets as $planeta)
    <tr>
        <td>{{$planeta->id}}</td>   
        <td>{{$planeta->name}}</td>
        <td><a href="{{url('planets/delete', $planeta->id)}}">Borrar</a></td> 
    </tr>
    @endforeach   
</table>