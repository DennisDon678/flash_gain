<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')
<body>
    <div class="back">
        Rank Payment
    </div>
    <div class="b-b"><a href="/reward"><i class='bx bx-share'></i></a></div>


    <div class="mlm">
        <p> Keep on growing your team and
            keep on growing your money, stay strong and keep on wining.
            Flash-Grow will always make you happy......!!! <br><br><br>NOTE.. You can only pay from your Grow balance
        </p>
    </div>
    @php
        $ranks = App\Models\Rank::all();
    @endphp
    @foreach($ranks as $rank)
    <div class="mlm-top">
        <div class="li"></div>

        <div class="rank">
            <a href="/reward/pay?id={{$rank->id}}"><p>Tap to Pay</p></a>
        </div>
        <div class="mlm-iner1">
            <h2>Pay</h2><br>
            <p>&#8358;{{number_format($rank->pay,2)}}</p><br>
            <span>Only</span>
        </div>
        <div class="mlm-iner2">
            <h2>Earn Back</h2><br>
            <p>&#8358;{{number_format($rank->earn*$rank->team,2)}}</p><br>
            <span>10 Team</span>
        </div>
        <div class="counter">
            <h3>Rank</h3>
            <p>{{$rank->name}}🥇</p>
        </div>
    </div>
    @endforeach



</html>