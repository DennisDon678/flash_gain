<!DOCTYPE html>
<html lang="en">
@include('wallet.parts.head')
<body>
    <div class="back">
        My Team
    </div>
    <div class="b-b"><a href="/my_wallet"><i class='bx bx-share'></i></a></div>
    @php
    $ref = App\Models\User::where('referred_by','=',Auth::user()->referral_id)->get();
    $active = '';
    @endphp

    <div class="wida">
        <div class="bala">
            <div class="mont">
                <p>{{number_format(count($ref))}}</p>
                <span>Total Referral</span>
            </div>
            
        </div>

    </div>
   
    <table class="content-table">
        <thead>
            <tr>
                <th>User Name</th>
                <th>User Id</th>
            </tr>
        </thead>
        <tbody>
            @if(count($ref)>0)
            @foreach ($ref as $team)
            <tr>
                <td>{{$team->name}}</td>
                <td>{{$team->referral_id}}</td>
            </tr>
            @endforeach
            
            @else
            <tr  style="text-align: center;color:rgb(243, 104, 104);">
                <td colspan="2">No Referral</td>
            </tr>
            @endif

        </tbody>
    </table>


</body>
</html>
