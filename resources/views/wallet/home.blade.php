<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')

<body>
    <div class="display-top"></div>
    <div class="home">
        <h2>Welcome <br>To <br> Flash-Gain</h2>
    </div>
    <div class="home-display">
        <div class="dislplay1">
            <h1>Make The <br> <b>Right Chioces </b><br>Today</h1>
            <p>We always hear that we should dream big, but sometimes that is easier said than done. Having a bucket
                list is definitely an inspirational invitation to do just that, but there are times when you need a
                little extra help.</p>
            <button><a href="/register">Join Us</a></button>
        </div>
        <div class="dislplay2">
            <img src="{{asset('wallet/image/logo.png')}}" alt="">
        </div>

    </div>
    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <a href="https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2Fgroups%2F2137831693224059%2F"><i class='bx bxl-facebook'></i></a>
            </button>
            <p>Facebook</p>


        </div>
    </div>
    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <a href="https://t.me/T6El_jWsDY0"><i class='bx bxl-telegram'></i></a>
            </button>
            <p>Telegram</p>
        </div>
    </div>

    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <a href="https://apk.e-droid.net/apk/app2995039-pcsjbt.apk?v=1"><i class='bx bxl-play-store'></i></a>
            </button>
            <p>Telegram</p>
        </div>
    </div>
    <!--buttom menue-->
    @include('wallet.parts.nav')
</body>

</html>
