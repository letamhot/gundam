@php 
    $current = $user->currentPage() * $user->perPage() - $user->perPage();
@endphp
@foreach($user as $key => $value)
<tr>
    @if($value->user_type == 'admin')
    <td ><a href="{{route('admin.user.show', $user)}}">AD{{++$current}}</a></td>
    @elseif ($value->user_type == 'merchant')
    <td ><a href="{{route('admin.user.show', $user)}}">MER{{++$current}}</a></td>
    @elseif ($value->user_type == 'customer')
    <td ><a href="{{route('admin.user.show', $user)}}">CUS{{++$current}}</a></td>
    @endif
    <td>{{$value->name}}</td>
    <td>{{$value->email}}</td>
    @if($value->gender == 1)
    <td><label class="badge bg-black" >Male</label></td>
    @else
    <td><label class="badge bg-success" >Female</label></td> 
    @endif
    @if($value->user_type == 'customer')
    <td><label>customer</label></td>
    @elseif($value->user_type == 'merchant')
    <td><label>merchant</label></td> 
    @elseif ($value->user_type == 'admin')
    <td><label >admin</label></td>
    @endif
    <td>{{$value->address}}</td>
    <td>{{$value->phone}}</td>
    @if(!empty($value->provider_id))
    <td><img src="{{ $value->avatar  }}" alt="{{ $value->name }}" width="80px" height="80px" /></td>
    @else
    <td><img src="{{asset(Storage::url($value->avatar))}}" alt="{{ $value->name }}" width="80px" height="80px" /></td>
    @endif
        
    <td><a href="{{ route('admin.user.edit', $value->id) }}"
            class="btn btn-warning btn-sm" type="submit"><i class="fa fa-edit" title="Edit"></i>
        </a>
        <br/>
        <form action="{{ route('admin.user.destroy', $value->id) }}"
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
    <td colspan="9">
        {!! $user->links() !!}
    </td>
</tr>