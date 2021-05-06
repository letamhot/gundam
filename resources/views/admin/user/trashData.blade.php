@php 
$current = $user->currentPage() * $user->perPage() - $user->perPage();
@endphp
@foreach($user as $key => $value)
<tr>
    @if($value->user_type == 'admin')
    <td ><a href="{{route('admin.user.show', $user)}}">AD{{++$key}}</a></td>
    @elseif ($value->user_type == 'merchant')
    <td ><a href="{{route('admin.user.show', $user)}}">MER{{++$key}}</a></td>
    @elseif ($value->user_type == 'customer')
    <td ><a href="{{route('admin.user.show', $user)}}">CUS{{++$key}}</a></td>
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
    <td >
        <a class="btn btn-success" href="{{route('admin.user.restore', $value)}}"  onclick="return confirm('Do you want restore user-{{ $value->name }}?')">
            <i class="far fa-window-restore" aria-hidden="true" title="Restore"></i></a>
        <form action="{{route('admin.user.delete', $value) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"
                onclick="return confirm('Do you want permanently deleted user-{{ $value->name }}?')"><i class="fa fa-backspace"
                    title="Delete"></i></button>
        </form>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="9">
        {!! $user->links() !!}
    </td>
</tr>