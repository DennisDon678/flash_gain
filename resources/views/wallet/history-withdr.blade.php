<!DOCTYPE html>
<html lang="en">
@include('wallet.parts.head')
<body>
    <div class="back">
        History
    </div>
    <div class="b-b"><a href="my_wallet"><i class='bx bx-share'></i></a></div>

    <div class="top-rech">
        <a href="/history-recha"><button>Recharge</button></a>
        <a href="/history-withdr"> <button>Withdrawal</button></a>
    </div>
    @php
    $hists = App\Models\Withdrawal::where('user','=',Auth::user()->id)->paginate(10);
    $amount = App\Models\Withdrawal::where('user','=',Auth::user()->id)->sum('amount');
    @endphp
    <div class="tot">
        <div class="tbal">
            <h2>Total Withderawal</h2>
            <p>&#8358;{{number_format($amount)}}</p>
        </div>
    </div>
    @if(count($hists)>0)
    @foreach($hists as $hist)
    <div class="withd">
        <div class="withd-list">
            <div class="w-list1">
                <p>Flash-Ord</p>
                <span>&#8358;{{number_format($hist->amount)}}</span>
            </div>
            <div class="w-list2">
                <p>{{$hist->created_at}}</p>
                <span>{{$hist->status}}</span>
            </div>
        </div>
    </div>
    @endforeach
    @else

    @endif

</body>
</html>
