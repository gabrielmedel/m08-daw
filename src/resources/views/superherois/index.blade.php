<div>
    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

<div>
    <a href="{{ route('superherois.create') }}">Nou planeta</a>
</div>

<div>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Real Name</th>     
                <th>Hero Name</th>           
                <th>gender</th>          
                <th>Planet id</th>           
            </tr>
        </thead>

            <tbody>
            @foreach ($superherois as $superheroi)
            <tr>
                <td>{{ $superheroi->id }}</td>
                <td>{{ $superheroi->realname }}</td>
                <td>{{ $superheroi->heroname }}</td>
                <td>{{ $superheroi->gender }}</td>
                <td>{{ $superheroi->planet->name }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>