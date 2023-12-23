<!DOCTYPE html>
<html lang="en">
@include('wallet.parts.head')
<body>
    <div class="back">
        Login
    </div>
    <div class="b-b"><a href="/"><i class='bx bx-share'></i></a></div>

    <div class="container">

        <form action="" class="form" method="POST">
            @csrf
            <img src="wallet/image/logo.png" alt="web logo" width="130px">
            <h2>Login In</h2>
            <input type="email" name="email" class="box" placeholder="Enter Email">
            <div class="boss">
                <input type="password" name="password" placeholder="Enter Password" id="password">
                <img src="wallet/image/eye-close.png" alt="hide password" id="eyeicon">
            </div>
            <input type="submit" id="submit" value="Sign In">
            <a href="pasword.html">Forget Password?</a>
            <a href="/register">Create</a>
        </form>
        <div class="side">
            <img src="wallet/image/bg1.png">
        </div>
    </div>
    <script src="wallet/js/index.js"></script>
</body>
</html>
