@foreach($producer as $key => $value)
<tr>
    <td>{{++$key}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->slug}}</td>
    <td>{{$value->address}}</td>
    <td>{{$value->phone}}</td>
    <td>{{$value->taxCode}}</td>
    <td><img src="{{$value->image?Storage::url($value->image):""}}" alt="{{$value->name}}"></td>
    <td>
        <a href="{{ route('admin.producer.restore', $value->id) }}"
        class="btn btn-warning btn-sm" type="submit"
        onclick="return confirm('Are you sure to update?')"
        style="color:yellow"><i class="fas fa-window-restore" title="Restore"></i>
        </a>
        <form action="{{ route('admin.producer.deleteTrash', $value->id) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit"
                onclick="return confirm('Are you sure to delete?')" title="delete"><i
                    class="fas fa-backspace"></i></button>
        </form>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="8">
        {!! $producer->links() !!}
    </td>
</tr>