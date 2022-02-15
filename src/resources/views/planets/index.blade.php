<div>
    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

<div>
    <a href="{{ route('planets.create') }}">Nou planeta</a>
</div>

<div>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>           
                <th>Operacions</th>
                </tr>
        </thead>

            <tbody>
            @foreach ($planets as $planet)
            <tr>
                <td>{{ $planet->id }}</td>
                <td>{{ $planet->name }}</td>
               
                <td>                
                   <a href="{{ route('planets.show',$planet->id) }}">Mostrar</a> 
                
                            
                   <a href="{{ route('planets.destroy',$planet->id) }}">Esborrar</a> 
                
                            
                   <a href="{{ route('planets.edit',$planet->id) }}">Actualitzar</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>