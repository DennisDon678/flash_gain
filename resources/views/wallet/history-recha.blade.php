<!DOCTYPE html>
<html lang="en">
@include('wallet.parts.head')
<body>
    <div class="back">
        History
    </div>
    <div class="b-b"><a href="/my_wallet"><i class='bx bx-share'></i></a></div>

    <div class="top-rech">
        <a href="/history-recha"> <button>Recharge</button></a>
        <a href="/history-withdr"> <button>Withderawal</button></a>
    </div>
    @php
    $trn = App\Models\Deposit::where('user','=',Auth::user()->id)->orderby('created_at','DESC')->paginate(10);
    @endphp
    @if(count($trn)>0)
    @foreach($trn as $trans)
    <div class="withd">
        <div class="withd-list">
            <div class="w-list1">
                <p>Flash-{{$trans->type == 'order_pay'?'Order':'Grow'}}</p>
                <span>&#8358;{{number_format($trans->amount,2)}}</span>
            </div>
            <div class="w-list2">
                <p>{{$trans->created_at}}</p>
                <span>{{$trans->status}}</span>
            </div>
        </div>
    </div>
    @endforeach
    @else

    @endif
</body>
</html>
