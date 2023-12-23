<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')

<body>
    <div class="uza">
        <div class="out"><a href="/my_wallet"><i class='bx bx-log-in-circle'></i></a></div>
        <div class="name">
            <h1>Welcome Back {{Auth::user()->name}}</h1>
        </div>
    </div>
    <div class="bod">
        <div class="iner-bod">
            <img src="/wallet/image/icons.svg" alt="user image">

        </div>
    </div>




    <div class="user-list-info">
        <div class="hobo-iner">
            <p>Name</p>
        </div>
        <span>{{Auth::user()->name}}</span>
    </div>
    <div class="user-list-info">
        <div class="hobo-iner">
            <p>Email</p>
        </div>
        <span>{{Auth::user()->email}}</span>
    </div>
    <div class="user-list-info">
        <div class="hobo-iner">
            <p>Referral Id</p>
        </div>
        <span>{{Auth::user()->referral_id}}</span>
    </div>
    <div class="bank-info">
        <h2>
            <Details>Bank Info</Details>
        </h2>
    </div>
    @php
        $account = App\Models\withdrawal_account::where('user','=',Auth::user()->id)->first();
    @endphp
    <div class="user-list-info">
        <div class="hobo-iner">
            <p>Bank Name</p>
        </div>
        <span>{{$account != null ? $account->bank_name:''}}</span>
    </div>
    <div class="user-list-info">
        <div class="hobo-iner">
            <p>Account Name</p>
        </div>
        <span>{{$account != null ? $account->account_name:'' }}</span>
    </div>
    <div class="user-list-info">
        <div class="hobo-iner">
            <p>Account Number</p>
        </div>
        <span>{{$account != null ? $account->bank_account:'' }}</span>
    </div>
    <div class="mem">
        <div class="mem-iner">
            <p>Account Setting </p>
        </div>
        <span><a href="/setting"><i class='bx bxs-cog'></i></a></span>
    </div>
    <!--buttom menue-->
    @include('wallet.parts.nav')
    <script src="wallet/js/index.js"></script>
</body>

</html>
