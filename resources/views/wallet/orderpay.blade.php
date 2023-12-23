<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')
<body>


    <div class="back">
        Add Money
    </div>
    <div class="b-b"><a href="/allpay"><i class='bx bx-share'></i></a></div>


    <div class="mlm">
        <p>
            Keep on growing your team and
            keep on growing your money, stay strong and keep on wining.
            Flash-Gain will always make you happy......!!!
        </p>
    </div>

    <div class="setra">
        <h3>Click on any option</h3>
    </div>

    <div class="pay-var">
        <form method="POST">
            @csrf
            <input type="button" value="Order 1... &#8358;5,000" onclick="display.value=' &#8358;5,000';amount.value=5000">
            <input type="button" value="Order 2... &#8358;15,000" onclick="display.value=' &#8358;15,000';amount.value=15000">
            <input type="button" value="Order 3... &#8358;45,000" onclick="display.value=' &#8358;45,000';amount.value=45000">
            <input type="button" value="Order 4... &#8358;70,000" onclick="display.value=' &#8358;70,000';amount.value=70000">
            <input type="button" value="Order 5... &#8358;100,000" onclick="display.value=' &#8358;100,000';amount.value=100000">
            <div class="var-out">
                <input type="text" name="display" required>
                <input type="hidden" name="amount" required>
            </div>
            <div class="pay-bu" style="margin-top: 50px">
                <button type="submit">Pay</button>
            </div>
        </form><br>
        <div class="var-image">
            <p><i class='bx bx-checkbox-square'></i>Pay with card</p>
            <span><img src="wallet/image/paystack-.png" alt=""></span>
        </div>

    </div>

</body>
</html>
