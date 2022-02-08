<form action="{{url('planets/newPlaneta')}}" method="POST">
    @csrf
    <input type="text" name="planeta">
    <input type="submit" value="Crear Planeta">
</form>