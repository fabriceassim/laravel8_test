<br>
    
    <div class="col-sm-offset-4 col-sm-4">
        <a href="{{ route('employee.create') }}">Créer un employé(e)</a>
        @if(session()->has('ok'))
            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des utilisateurs</h3>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{!! $employee->id !!}</td>                            
                            <td class="text-primary"><strong>{!! $employee->first_name !!}</strong></td>
                            <td class="text-primary"><strong>{!! $employee->last_name !!}</strong></td>
                            <td class="text-primary"><strong>{!! $employee->email !!}</strong></td>
                            <td><a href="{{ route('employee.edit', $employee->id) }}">Modifier
                                <i class="fas fa-edit  fa-lg"></i>
                            </a></td>
                            <td class="text-primary">
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="delete">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{ $employees->links() }}
    </div>
    <script>
        
    </script>