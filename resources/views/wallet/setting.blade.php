<!DOCTYPE html>
<html lang="en">
@include('wallet.parts.head')
<body>
    @php
    $account = App\Models\withdrawal_account::where('user','=',Auth::user()->id)->first();
    @endphp
    <div class="back">
        Account Setting
    </div>
    <div class="b-b"><a href="/my_wallet"><i class='bx bx-share'></i></a></div>
    <form method="POST">
        @csrf
        <div class="mme">
            <h2>Bank Details</h2>
        </div>
        <div class="lab">
            <label>Bank Name</label>
            <input type="text" name="bname" value="{{$account != null ? $account->bank_name:''}}" required>
        </div>
        <div class="lab">
            <label>Account Name</label>
            <input type="text" name="Aname" value="{{$account != null ? $account->account_name:'' }}" required>
        </div>
        <div class="lab">
            <label>Account Number</label>
            <input type="number" name="Anumber" value="{{$account != null ? $account->bank_account:'' }}" id="">
        </div>
        <button type="submit">Save</button>
    </form>
    <form method="POST" action="/setting/password">
        @csrf
        <div class="mme">
            <h2>Pasword Reset</h2>
        </div>

        @if (Session::has('message'))
            <p style="text-align: center;margin-top:15px; color:rgb(88, 230, 119);margin-buttom:15px;">{{Session::get('message')}} </p>
        @endif

        @if (Session::has('error'))
            <p style="text-align: center;margin-top:15px; color:red;margin-buttom:15px;">{{Session::get('error')}} </p>
        @endif
        <div class="lab">
            <label>Email</label>
            <input type="email" required readonly value="{{Auth::user()->email}}">
        </div>
        <div class="lab">
            <label>Old Pasword</label>
            <input type="password" name="pass" required>
        </div>
        <div class="lab">
            <label>New Pasword</label>
            <input type="password" name="new_pass" id="" required>
        </div>
        <button type="submit">Save</button>
    </form>
</body>
</html>
