<!-- this is payment.html page -->

<!DOCTYPE html>
<html lang="en">

@include('admin.parts.head')


<body>
    <style>
        /* coupon css */
        .in-bod {
            background: #5888a0;
            margin: 20px;
            padding: 10px;
            align-items: ;

        }

        .copy-link {
            --height: 60px;

            display: flex;
            max-width: 250px;
        }


        .copy-link-input {
            font-size: 15px;
            border: 1px solid #cccccc;
            border-right: none;
            outline: none;

            padding: 4px;
        }

        .copy-link-input:hover {
            background: #eeeeee;
        }

        .copy-link-button {
            flex-shrink: 0;
            width: var(--height);
            height: var(--height);
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dddddd;
            color: #333333;
            outline: none;
            border: 1px solid #cccccc;
            cursor: pointer;
        }

        .copy-link-button:hover {
            background: #cccccc;
        }

        h3 {
            text-align: center;
            margin-top: 30px;
        }

        .wik .lab input {
            width: 200px;
            height: 30px;
            padding: 5px;
            border: 1px solid #1f77ce;
            margin-bottom: 5px;
            margin-top: 10px;
        }

        .wik button {
            width: 200px;
            height: 30px;
            padding: 5px;

            border: 1px solid #1f77ce;
        }
    </style>
    <!--buttom menue-->
    @include('admin.parts.nav')


    <div class="box-user">
        <h2>Coupon</h2>
        <form action="/admin/coupon/generate" method="POST">
            @csrf
            <div class="wik">
                <div class="lab">
                    <input type="number" name="amount" id="" placeholder="Input amount Eg 3,000" required>
                </div>

                <button id="open-popup-btn" type="submit">
                    Create
                </button>
            </div>
        </form>

    </div>


    <div class="bat">
        <a href="/admin"> <i class='bx bxs-right-arrow-circle'></i></a>
    </div>


    <h3>Active Coupon</h3>
    <div class="in-bod"
        style="
        display:flex;
        flex-direction:row;
        flex-wrap:wrap;
        gap: 5px;
        column-gap: 10px;
    ">
    @php
        $coupons = App\Models\Coupon::where('status','=','0')->orderBy('created_at','DESC')->get()
    @endphp

        @forelse ($coupons as $coupon)
            <div class="copy-link">
                <input type="text" class="copy-link-input" value="{{ $coupon->coupon }}" readonly>
                <button type="button" class="copy-link-button">
                    <span class="material-icons"><i class='bx bxs-copy'></i></span>
                </button>
            </div>
        @empty
            <div class="copy-link" style="color: red;text-align:center;">
                <p>No coupon</p>
            </div>
        @endforelse

    </div>



    <h3>Expired Coupon</h3>
    <div class="serch">
        <p>search Coupon</p>
        <div class="ser">
            <i class='bx bx-search'></i>
            <input type="text" name="" id="">
        </div>
    </div>
    <div class="header_fixed">


        <table>
            <thead>
                <tr>
                    <th>Coupon</th>
                    <th>Used By</th>
                </tr>
            </thead>
            <tbody>

                @forelse (App\Models\Coupon::where('status','=','0') as $coupon)
                    <tr>
                        <td>Rak625upta</td>
                        <td>rakhigupta@gmail.com</td>
                    </tr>
                @empty
                    <tr>
                        <td>Nothing Here</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <script>
        document.querySelectorAll(".copy-link").forEach((copyLinkParent) => {
            const inputField = copyLinkParent.querySelector(".copy-link-input");
            const copyButton = copyLinkParent.querySelector(".copy-link-button");
            const text = inputField.value;

            inputField.addEventListener("focus", () => inputField.select());

            copyButton.addEventListener("click", () => {
                inputField.select();
                navigator.clipboard.writeText(text);

                inputField.value = "Copied!";
                setTimeout(() => (inputField.value = text), 2000);
            });
        });
    </script>


</body>

</html>
