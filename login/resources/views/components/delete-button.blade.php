@props(['recipe'])

@if(auth()->check() && auth()->user()->hasRole('admin'))
    <div style="margin-left: auto; padding-left: 20px;">
        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('ADMIN: Yakin ingin menghapus resep ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">
                Delete
            </button>
        </form>
    </div>
@endif