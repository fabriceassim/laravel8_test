<form action="{{ route('company.update', $company->id) }}" method="POST">
	@csrf
    @method('PUT')
	 <td><input type="text" value="{{ $company->name }}" name="name"></td>
	 {{ $errors->first('name') }}
     <td><input type="text" value="{{ $company->email }}"name="email"></td>     
     {{ $errors->first('email') }}
     <td><input type="submit" value="Modifier"></td>
</form>