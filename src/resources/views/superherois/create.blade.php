<div>           
	<form action="{{ route('superherois.store') }}" method="POST">
	    @csrf
	       
	    <strong>Real Name:</strong>
	    <input type="text" name="realName">
        <strong>Hero Name:</strong>
	    <input type="text" name="heroName">
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <select name="planet"></select>
	            
	    <input type="submit" value="desar">     
	   
	</form>
</div>

<div>
@if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>    
@endif
</div>