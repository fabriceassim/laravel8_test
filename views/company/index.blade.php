<br>
    
    <div class="col-sm-offset-4 col-sm-4">
        <a href="{{ route('company.create') }}">Créer une companie</a>
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
                        <th>Nom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{!! $company->id !!}</td>                            
                            <td class="text-primary"><strong>{!! $company->name !!}</strong></td>
                            <td class="text-primary"><strong>{!! $company->email !!}</strong></td>
                            <td><a href="{{ route('company.edit', $company->id) }}">Modifier
                                <i class="fas fa-edit  fa-lg"></i>
                            </a></td>
                            <td class="text-primary">
                                <form action="{{ route('company.destroy', $company->id) }}" method="POST">
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
        
        {{ $companies->links() }}
    </div>
    <script>
        
    </script>