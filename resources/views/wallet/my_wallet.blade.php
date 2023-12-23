<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')

<body>
    <div class="uza">
        <div class="name">
            <h1>User {{Auth::user()->name}}</h1>
        </div>
    </div>
    <div class="bod">
        <div class="iner-bod">
            <img src="/wallet/image/icons.svg" alt="user image">
            <div class="all">
                <div class="label">Copy Link</div>
                <div class="copy-link">
                    <input type="text" class="copy-link-input" value="{{env('APP_URL')}}/register?id={{Auth::user()->referral_id}}" readonly>
                    <button type="button" class="copy-link-button">
                        <span class="material-icons"><i class='bx bxs-copy'></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="box-user">
        <h2>Flash-Gain Balance</h2>

        <div class="balance">
            <div class="mount">
                <p>&#8358;{{number_format(Auth::user()->order_bal)}}</p>
                <span>Order Bal</span>
            </div>
            <div class="mount">
                <a href="allpay">
                    <p>Add</p>
                    <span><i class='bx bx-plus-medical'></i></span>
                </a>
            </div>
            <div class="mount">
                <p>&#8358;{{number_format(Auth::user()->grow_bal)}}</p>
                <span>Grow Bal</span>
            </div>
        </div>
        <div class="box-list">

            <a href="/withdraw">
                <div class="min-list">
                    <span><i class='bx bxs-down-arrow-square'></i></span>
                    <p>Withdraw</p>
                </div>
            </a>
            <a href="/history">
                <div class="min-list">
                    <span><i class='bx bx-rotate-right'></i></span>
                    <p>History</p>
                </div>
            </a>
            <a href="/order">
                <div class="min-list">
                    <span><i class='bx bxs-up-arrow-square'></i></span>
                    <p>Order Level</p>
                </div>
            </a>
        </div>
    </div>
    <div class="hobo">
        <div class="hobo-iner">
            <p><i class='bx bxs-user'>Profile</i> </p>
        </div>
        <span><a href="/profile"><i class='bx bxs-chevron-right'></i></a></span>
    </div>

    <div class="hobo">
        <div class="hobo-iner">
            <p><i class='bx bx-cog'>Setting</i> </p>
        </div>
        <span><a href="/setting"><i class='bx bxs-chevron-right'></i></a></span>
    </div>

    <div class="hobo">
        <div class="hobo-iner">
            <p><i class='bx bxs-group'>My Team</i> </p>
        </div>
        <span><a href="/team"><i class='bx bxs-chevron-right'></i></a></span>
    </div>

    <div class="hobo">
        <div class="hobo-iner">
            <p><i class='bx bxs-coin-stack'>Withdrawal Record</i> </p>
        </div>
        <span><a href="/history-withdraw"><i class='bx bxs-chevron-right'></i></a></span>
    </div>
    <div class="hobo">
        <div class="hobo-iner">
            <p><i class='bx bxs-receipt'>Order Record</i> </p>
        </div>
        <span><a href="/history-recharge"><i class='bx bxs-chevron-right'></i></a></i></span>
    </div>
    <div class="hobo">
        <div class="hobo-iner">
            <p><i class='bx bx-cart-add'>Order</i></p>
        </div>
        <span><a href="/order"><i class='bx bxs-chevron-right'></i></a></span>
    </div>
    <div class="hobo">
        <div class="hobo-iner">
            <p><i class='bx bxs-bolt'>F-Grow</i></p>
        </div>
        <span><a href="/reward"><i class='bx bxs-chevron-right'></i></a></span>
    </div>
    <div class="hobo">
        <div class="hobo-iner">
            <p><i class='bx bxs-notification'>About Us</i></p>
        </div>
        <span><a href="/about"><i class='bx bxs-chevron-right'></i></a></span>
    </div>
    <div class="hobo">
        <div class="hobo-iner">
            <p><i class='bx bxs-user'>Logo out</i></p>
        </div>
        <span><a href="/logout"><i class='bx bxs-chevron-right'></i></a></span>
    </div>

    <!--buttom menue-->
    @include('wallet.parts.nav')

    <script src="/wallet/js/index.js"></script>
</body>

</html>
