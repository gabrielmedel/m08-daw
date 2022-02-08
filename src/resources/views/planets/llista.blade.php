<table border="1">  
    <th>Id</th>
    <th>Nom</th>
    <th>Accions</th>
    @foreach ($planets as $planeta)
    <tr>
        <td>{{$planeta->id}}</td>   
        <td>{{$planeta->name}}</td>
        <td><a href="#">Borrar</a></td> 
    </tr>
    @endforeach   
</table>