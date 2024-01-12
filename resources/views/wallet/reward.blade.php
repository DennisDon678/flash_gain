<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')
<body>
    <div class="mlme">
        <h2>Flash Grow </h2>
        <p> Make money faster with Flash Grow the more team you get the more money you make, always remember that we can
            grow faster with people around us …..</p>
        <br>

    </div>
    <div class="mlm">
        <p class="vb"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas saepe sunt nihil illo facere,
            suscipit,
            necessitatibus expedita quam aliquid placeat blanditiis tenetur dolor, nobis officiis porro. Illo aliquam
            natus numquam!</p>
    </div>

    <div class="box-user">
        <h2>Flash-Grow Balance</h2>
        <div class="balance">
            {{-- <div class="mount">
                <p>&#8358;3,000</p>
                <span>Today Earn</span>
            </div> --}}
            <div class="mount">
                <p>&#8358;{{number_format(Auth::user()->grow_bal,2)}}</p>
                <span>Curent Ball</span>
            </div>
        </div>
        <div class="box-list">

            <a href="/withdraw">
                <div class="min-list">
                    <span><i class='bx bxs-down-arrow-square'></i></span>
                    <p>Withdraw</p>
                </div>
            </a>
            <a href="/mlhistoty">
                <div class="min-list">
                    <span><i class='bx bx-rotate-right'></i></span>
                    <p>History</p>
                </div>
            </a>
            <a href="/reward/activate">
                <div class="min-list">
                    <span><i class='bx bxs-up-arrow-square'></i></span>
                    <p>Add Rank</p>
                </div>
            </a>
        </div>
    </div>

    <div class="mod">
        <div class="mod-d">
            <h4>Clink On Details learn More</h4>
            <details>
                <p>In Flash Grow Rank you can make millions of Naira when you have a good active team, if you grow your
                    team your team will also grow you because the more team you complete the more money you make. That
                    is what we call Multi Level Marketing...!! <br> <br><a href="/reward/more">Read More</a> </p>
            </details>
        </div>
    </div>
    @php
        $rewards = App\Models\Active_reward::where('user','=',Auth::user()->id)->get();
    @endphp

    @forelse ($rewards as $reward)
        <div class="mlm-top">
        <div class="rank">
            @if($reward->round <= 5)
                <p>{{$reward->status == 'on' ? 'Active':'Inactive'}}</p>
            @else
            <p>Maxed</p>
            @endif
        </div>
        <div class="ranke">
            @if($reward->round <= 5)
            <p><a href="/reward/pay?id={{$reward->rank}}">Reactivate</i></a></p>
            @else
            <p><a href="/reward/rank1"><i class='bx bxs-down-arrow'></i></a></p>
            @endif
            
        </div>
        <div class="li"></div>
        <div class="le"></div>
        <div class="mlm-in">
            <h2>Rank</h2><br>
            <p>{{$reward->rank}}🥇</p>
        </div>
        <div class="mlm-in">
            <h2>Team</h2><br>
            <p>{{$reward->team}}</p>
        </div>
        <div class="count">
            <h5>Round</h5>
            <p>{{$reward->round}}</p>
        </div>
    </div>
    @empty
        <p style="text-align: center; color:red;">You Don't have anything to show here. Add a rank.</p>
    @endforelse
    
    
    <!--buttom menue-->
    @include('wallet.parts.nav')
</body>

</html>
