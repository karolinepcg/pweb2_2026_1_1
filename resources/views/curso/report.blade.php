<!DOCTYPE html>
<html lang="en">
<body>
     <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Requisito</th>
                        <th scope="col">Carga Horiria</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->requisito }}</td>
                            <td>{{ $item->carga_horaria }}</td>
                            <td>{{ $item->valor }}</td>
                            <td><a href="{{ route('curso.turmas', $item->id) }}"
                                 class="btn btn-primary">Ver Turma {{$item->turmas->count()}}  </a></td>
                            <td><a href="{{ route('curso.edit', $item->id) }}" class="btn btn-warning">Editar</a></td>
                            <td>
                                <form action="{{ route('curso.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Deseja remover o registro?')">
                                        Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    <br/>

    <strong>Public Folder:</strong>

    <img src="{{ public_path('dummy.jpg') }}" style="width: 200px; height: 200px">

    <br/>

    <strong>Storage Folder:</strong>

    <img src="{{ storage_path('app/public/dummy.jpg') }}" style="width: 200px; height: 200px">

</body>

</html>
