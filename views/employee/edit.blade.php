<form action="{{ route('employee.update', $employee->id) }}" method="POST">
	@csrf
    @method('PUT')
	 <td><input type="text" value="{{ $employee->first_name }}" name="first_name"></td>
	 {{ $errors->first('name') }}
     <td><input type="text" value="{{ $employee->last_name }}"name="last_name"></td>     
     {{ $errors->first('last_name') }}
     <td><input type="submit" value="Modifier"></td>
</form>