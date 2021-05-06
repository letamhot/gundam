@foreach($bill as $key => $value)
<tr>
    <td>{{++$key}}</td>
    <td>{{$value->user['name']}}</td>
    <td>{{$value->phone}}</td>
    <td>{{$value->address}}</td>
    <td>{{$value->priceTotal}}</td>
    @if($value->status == 0)
    <td style="color:red">Chưa hoàn thành</td>
    @elseif($value->status == 1)
    <td style="color:green">Hoàn thành</td>
    @endif
    @if(!empty($value->coupon['sale']))
    <td>{{$value->coupon['sale']}}</td>
    @else
    <td>0</td>
    @endif
    <td><a href="{{ route('admin.bill.edit', $value->id) }}"
            class="btn btn-warning btn-sm" type="submit"><i class="fa fa-edit" title="Edit"></i>
        </a>
        <br/>
        <form action="{{ route('admin.bill.destroy', $value->id) }}"
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
        {!! $bill->links() !!}
    </td>
</tr>