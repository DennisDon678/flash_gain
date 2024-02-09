<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')

<body>


    <div class="back">
        Coupon Code
    </div>
    <div class="b-b"><a href="/my_wallet"><i class='bx bx-share'></i></a></div>


    <div class="mlm">
        <p> Keep on growing your team and
            keep on growing your money, stay strong and keep on wining.
            Flash-Grow will always make you happy......!!!
        </p>
    </div>

    <!-- <div class="code">
        <div class="code-in">
            <label>input your coupon code</label><br>
            <input type="text"><br>
            <button>comfirm</button>
        </div>
    </div> -->
    <div class="wik">
        <div class="mme">
            <h2>Submit Your Coupon Here</h2>
        </div><br>
        @if (Session::has('error'))
            <p style="color: red">{{ Session::get('error') }}</p>
        @endif
        <form action="/deposit/coupon" method="post">
            @csrf
            <select name="selected" required>
                <option value="grow">F-Grow--Available</option>
                <option value="order">F-Order--Available</option>
            </select><br>
            <div class="lab">
                <!-- <label>Input your coupon code</label> -->
                <input type="text" name="coupon" id="" placeholder="Input Coupon" required>
            </div>

            <button id="open-popup-btn" type="submit">
                Submit
            </button>
    </div>
    </form>


    <div class="mlm-ina">
        <h2>Choose any vendor to get your coupon</h2><br>
    </div>

    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <a href="https://wa.me/9049843571?text=I%20need%20Flash-Gain%20coupon-code"><i
                        class='bx bxl-whatsapp'></i></a>
            </button>
            <p>Buy Coupon from First vendor</p>

        </div>

    </div>
    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <a href="https://wa.me/8133122086?text=I%20need%20Flash-Gain%20coupon-code"><i
                        class='bx bxl-whatsapp'></i></a>
            </button>
            <p>Buy Coupon from second vendor </p>

        </div>

    </div>
    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <a href="https://wa.me/8146724119?text=I%20need%20Flash-Gain%20coupon-code"><i
                        class='bx bxl-whatsapp'></i></a>
            </button>
            <p>Buy Coupon from third vendor</p>

        </div>

    </div>
    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <a href="https://wa.me/7025227106?text=I%20need%20Flash-Gain%20coupon-code"><i
                        class='bx bxl-whatsapp'></i></a>
            </button>
            <p>Buy Coupon from fourth vendor</p>

        </div>

    </div>
    <div class="asds">
        <div class="asde">
            <button id="open-popup-btn">
                <a href="https://wa.me/7052794486?text=I%20need%20Flash-Gain%20coupon-code">
                    <i class='bx bxl-whatsapp'></i></a></button>
            <p>Buy Coupon from fourth vendor</p>

        </div>

    </div>
    <div class="pay-var">
        <p>Select any vendor and get your code</p>
    </div>
    </div>

</html>
