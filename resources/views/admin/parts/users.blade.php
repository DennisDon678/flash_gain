<!DOCTYPE html>
<html lang="en">

@include('admin.parts.head')

<body>
    <!--buttom menue-->
    @include('admin.parts.nav')
    </div>
    <div class="serch">
        <p>search user by Email</p>
        <div class="ser">
            <i class='bx bx-search'></i>
            <input type="text" name="" id="">
        </div>
    </div>
    <div class="header_fixed">
        @php
            $users = App\Models\User::all();
            $sn = 1;
        @endphp

        <table>
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{$sn}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><button><a href="userinfo?user={{$user->id}}">View</a></button></td>
                </tr>
                @php
                    $sn++;
                @endphp
                @empty
                <tr>
                    <td>No registered user</td>
                    
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</html>
</body>

</html>