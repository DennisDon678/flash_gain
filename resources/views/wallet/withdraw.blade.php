<!DOCTYPE html>
<html lang="en">

@include('wallet.parts.head')

<body>
    <div class="back">
        Withdrawal
    </div>
    <div class="b-b"><a href="/my_wallet"><i class='bx bx-share'></i></a></div>
    <div class="wi">
        <p>Days of withdrawal is only on <br> Monday To Thursday only <br><br>All request will be aproved befor 24hours</p>
        <span></span>
    </div>
    <div class="wik">
        <div class="mme">
            <h2>CashOut</h2>
        </div>
        <form style="border: 0px;" method="POST">
            @csrf
            <select required name="balance">
                <option >Select Balance</option>
                <option value="grow">Grow Balance</option>
                <option value="order">Order Balance</option>
            </select>
            <div class="lab">
                <label>Enter Amount</label>
                <input type="number" name="amount" id="" min="2000" required>
            </div>

            <button id="open-popup-btn" type="submit">
                Submit
            </button>
        </form>
    </div>
    <div class="view-his"><a href="/history-withdr">View History</a></div>

    </div>
    </div>

    <script src="js/pas.js"></script>
</body>

</html>
