@foreach($producer as $key => $value)
<tr>
    <td>{{++$key}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->slug}}</td>
    <td>{{$value->address}}</td>
    <td>{{$value->phone}}</td>
    <td>{{$value->taxCode}}</td>
    <td><img src="{{$value->image? asset(Storage::url($value->image)):""}}" alt="{{$value->name}}" width="80px" height="80px"></td>
    <td><a href="{{ route('admin.producer.edit', $value->id) }}"
            class="btn btn-warning btn-sm" type="submit"><i class="fa fa-edit" title="Edit"></i>
        </a>
        <br/>
        <form action="{{ route('admin.producer.destroy', $value->id) }}"
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
    <td colspan="8">
        {!! $producer->links() !!}
    </td>
</tr>