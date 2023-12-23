<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')

<body>
    <div class="uper"></div>
    <div class="uper1"></div>
    <div class="bana"><br>
        <h1>FLASH <br> <br>GAIN</h1>
        <div class="xa">
            <div class="dapa"><i class='bx bxs-bolt'></i></div>
            <div class="dapa"><i class='bx bxs-bolt'></i></div>
        </div>
        <img src="wallet/image/slide2.jpg" alt="">
    </div>
    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <a href="/orderpay"><i class='bx bx-plus-medical'></i></a>
            </button>
            <p>Add Order Balance</p>

        </div>

    </div>
    @if(Session::has('message'))
    <p style="color: red;text-align:center;">
        {{Session::get('message')}}
    </p>
    @endif

    @php
    $current = App\Models\Active_orders::where('user','=',Auth::user()->id)->where('status','=','on')->first();
    if (!empty($current)){
    $cur = App\Models\Orders::where('id','=',$current->id)->first();
    }

    @endphp
    @if(!empty($current))
    <div class="pakage">
        <h2>Curent Order</h2><br>
        <h2>.....Order {{$cur->id}}.....</h2>
        <div class="oder">
            <img src="/wallet/image/gain.png" alt="" width="200px" height="100px">
            <div class="iner-oder">
                <div class="item-right">
                    <p>Order-{{$cur->id}}</p>
                    <span class="pill">&#8358;{{number_format($cur->amount)}}</span>
                </div>
                <div class="item-right">
                    <p>Circle</p>
                    <span>{{$cur->days}} Day's</span>
                </div>
                <div class="item-right">
                    <p>Daily Income</p>
                    <span>&#8358;{{number_format($cur->daily,2)}}</span>
                </div>
            </div>
        </div>
        <a class="buttom">
            <h3>Expires in {{Carbon\Carbon::parse($current->expires)->diffInDays(Carbon\Carbon::now())}} Days.</h3>
        </a>
    </div>
    @else
    <p style="color: red;text-align:center;">
        You Have No active Plan.
    </p>
    @endif
    <br><br>

    <div class="alyi">
        <p>
            You are geting 6% bonus On any Order Your downline Purchase
        </p>
    </div>
    <br>
    <div class="aly">
        <h1>All Oder</h1>

    </div>
    @php
    if(!empty($current)){
        $order = App\Models\Orders::where('id','!=',$cur->id)->get();
    }else {
        $order = App\Models\Orders::all();
    }
    
    @endphp

    @foreach($order as $order)
    <div class="pakage">
        <h2>.....Order {{$order->id}}.....</h2>
        <div class="oder">
            <img src="/wallet/image/gain.png" alt="" width="200px" height="100px">
            <div class="iner-oder">
                <div class="item-right">
                    <p>Order-{{$order->id}}</p>
                    <span class="pill">&#8358;{{number_format($order->amount)}}</span>
                </div>
                <div class="item-right">
                    <p>Circle</p>
                    <span>{{$order->days}} Day's</span>
                </div>
                <div class="item-right">
                    <p>Daily Income</p>
                    <span>&#8358;{{number_format($order->daily,2)}}</span>
                </div>

            </div>

        </div>
        <a href="/order/activate?id={{$order->id}}" class="buttom">
            <h3>Earn Back &#8358;{{number_format($order->daily*$order->days,2)}}; Activate</h3>
        </a>
    </div>
    @endforeach


    <!--butom menu-->
    @include('wallet.parts.nav')
</body>

</html>
