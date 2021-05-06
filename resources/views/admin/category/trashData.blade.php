@foreach($category as $key => $value)

<tr>
    <td>{{++$key}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->slug}}</td>
    <td><a href="{{ route('admin.category.restore', $value->id) }}"
            class="btn btn-warning btn-sm" type="submit"
            onclick="return confirm('Are you sure to update?')"
            style="color:yellow"><i class="fas fa-window-restore" title="Restore"></i>
        </a>
        <form action="{{ route('admin.category.deleteTrash', $value->id) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit"
                onclick="return confirm('Are you sure to delete?')"><i
                    class="fas fa-backspace"></i></button>
        </form>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="4">
        {!! $category->links() !!}
    </td>
</tr>
