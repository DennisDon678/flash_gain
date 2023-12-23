<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')
<body>


    <div class="back">
        Ranks Payment
    </div>
    <div class="b-b"><a href="/reward/activate"><i class='bx bx-share'></i></a></div>


    <div class="mlm">
        <p> Keep on growing your team and
            keep on growing your money, stay strong and keep on wining.
            Flash-Grow will always make you happy......!!! <br><br><br>NOTE.. You can only pay from your Grow balance
        </p>
    </div>
    @if(Session::has('message'))
        <p style="text-align: center; color:red; margin-top:15px;"> {{Session::get('message')}} </p>
    @endif
    <div class="mlm-ina">
        <h2>Rank {{$rank->name}}🥇</h2><br>
    </div>
    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <i class='bx bx-plus-medical'></i>
            </button>
            <p>Pay From Grow Balance</p>

        </div>

    </div>
    <div class="popup" id="popup">
        <img src="/wallet/image/logo.png">
        <h2>Flash-Grow Payment</h2> <br>
        <p>You are about to activate Flash-Grow Rank {{$rank->name}}🥇 with the sum of</p><br>
        <h2>&#8358;{{number_format($rank->pay,2)}}</h2><br>
        <p>From your Flash-Grow balance</p><br>
        <div class="bot">
            <button id="dismiss-popup-btn"><a href="">Cancel</a></button>
            <form method="POST" style="border: 0px;
            border-radius: 0px;
            margin: 0px;
            text-align: center;
            padding: 0px;
            text-align: center;">
                @csrf
                <input type="hidden" name="amount" value="{{$rank->pay}}">
                <button type="submit">Confirm</button>
            </form>
            
        </div>
    </div>

    <div class="pay-var">
        <div class="pay-bu">
            <button>&#8358;{{number_format($rank->pay,2)}}</button>
        </div>
    </div>
    <script src="/wallet/js/pas.js"></script>

</html>
