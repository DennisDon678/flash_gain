<!DOCTYPE html>
<html lang="en">
@include('admin.parts.head')
<body>
    @php
    $grow = App\Models\User::sum('grow_bal');
    $order = App\Models\User::sum('order_bal');
    @endphp
    <!--buttom menue-->
    @include('admin.parts.nav')
    <div class="box-user">
        <h2>Total Balance</h2>
        <div class="balance">
            <div class="mount">
                <p>&#8358;{{number_format($grow)}}</p>
                <span>Grow Bal</span>
            </div>
            <div class="mount">
                <p>&#8358;{{number_format($order)}}</p>
                <span>Order Bal</span>
            </div>
        </div>
    </div>
    <!--table-->

    @php
    $pends = App\Models\Withdrawal::where('status','=','pending')->get();
    $sn = 1;
    @endphp

    <div class="vcc"></div>
    <h1>Pendind withdrawal</h1>
    <div class="header_fixed">


        <table>
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Bal</th>
                    <th>BankName</th>
                    <th>AccountNumer</th>
                    <th>AccountName</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pends as $pend)
                <tr>
                    <td>{{$sn}}</td>
                    <td>{{$pend->balance}}</td>
                    @php
                    $info = App\Models\withdrawal_account::where('user','=',$pend->user)->first();
                    $sn++;
                    @endphp
                    <td>{{$info->bank_name}}</td>
                    <td>{{$info->bank_account}}</td>
                    <td>{{$info->account_name}}</td>
                    <td>&#8358; {{$pend->amount}}</td>
                    <td class="bt"><button><i class='bx bx-check'></i></button><button><i class='bx bx-x'></i></button></td>
                </tr>
                @empty
                <tr>
                    <td>No Pending Withdrawal</td>

                </tr>
                @endforelse

            </tbody>
        </table>
    </div>


</html>
</body>
</html>
