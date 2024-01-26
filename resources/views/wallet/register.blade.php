<!DOCTYPE html>
<html lang="en">
@include('wallet.parts.head')
<body>
    <div class="back">
        Create Account
    </div>
    <div class="b-b"><a href="/"><i class='bx bx-share'></i></a></div>

    <div class="container">

        <form action="" class="form" method="POST">
            @csrf
            <img src="wallet/image/logo.png" alt="web logo" width="130px">
            <h2>Register</h2>
            <input type="text" name="username" class="box" placeholder="Username" required>
            <input type="email" name="email" class="box" placeholder="Enter Email" required>
            <div class="boss">
                <input type="password" name="password" placeholder="Enter Password" id="password" required>
                <img src="wallet/image/eye-close.png" alt="hide password" id="eyeicon">
            </div>
            @php
                if(isset($_GET['id'])){
                    $ref = $_GET['id'];
                    $act = null;
                }else {
                    $ref = null;
                    $act = 'readonly';
                }
                
            @endphp
            <input type="text" name="refered" class="box" placeholder="Referral Id" value="{{$ref}}"  {{$act}}>
            <input type="submit" id="submit" value="Sign Up">
            <a href="/login">Login</a>
        </form>
        <div class="side">
            <img src="wallet/image/bg1.png">
        </div>
    </div>
    <script src="wallet/js/index.js"></script>
</body>
</html>
