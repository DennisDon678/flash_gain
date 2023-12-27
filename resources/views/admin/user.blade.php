<!DOCTYPE html>
<html lang="en">

@include('admin.parts.head')

<body>
    <div class="bat">
        <a href="/admin/user"> <i class='bx bxs-left-arrow-circle'></i></a>
    </div>
    <h1>Users Details</h1>
    <div class="dill">
        <div class="dill-info">
            <p>username</p>
            <span>{{$user->name}}</span>
        </div>
        <div class="dill-info">
            <p>Email</p>
            <span>{{$user->email}}</span>
        </div>
        <div class="dill-info">
            <p>Order bal</p>
            <span>&#8358;{{$user->order_bal}}</span>
        </div>
        <div class="dill-info">
            <p>Grow Bal</p>
            <span>&#8358;{{$user->grow_bal}}</span>
        </div>
        @php
            $team = App\Models\User::where('referred_by','=',$user->referral_id)->get();
        @endphp
        <div class="dill-info">
            <p>Active Team</p>
            <span>{{count($team)}}</span>
        </div>
        <div class="dill-info">
            <p>Date joind</p>
            <span>{{$user->created_at}}</span>
        </div>
        {{-- <div class="dill-info">
            <p>Total Earn</p>
            <i class='bx bx-star'></i><span>&#8358;200,000</span>
        </div> --}}
    </div>

</html>
</body>

</html>