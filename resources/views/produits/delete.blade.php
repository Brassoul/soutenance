@foreach ($produits as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->libelle }}</td>
        <td>{{ $item->prix }}</td>
        <td>{{ $item->quantite }}</td> <!-- Correction orthographique -->
        <td>{{ $item->description }}</td>
        <td>{{ $item->cathegorie->cathegorie }}</td>
        <td>
            @if($item->chemin)
                <img src="{{ asset('storage/' . $item->chemin) }}" alt="{{ $item->libelle }}" style="width: 100px; height: auto;">
            @else
                <p>Aucune image</p>
            @endif
        </td>
        <td>
            <div class="d-grid gap-2 d-md-block">
                <a href="{{ route('produits.edit', $item->id) }}" class="btn btn-success">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a href="{{ route('produits.show', $item->id) }}" class="btn btn-primary">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <form action="{{ route('produits.delete', $item->id) }}" method="post" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?');">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
@endforeach
