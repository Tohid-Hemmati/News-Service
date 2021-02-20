@extends('layouts.app') @section('content')

<table class="table table-bordered text-center">
    <thead>
        <tr>
            <td>#</td>
            <td>User Name</td>
            <td>Email</td>
            <td>Users Role</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key=>$user)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <select
                    name="Roles"
                    id="user_{{$user->id}}"
                    onchange="updateRole(this)"
                >
                    <option value="0">No role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" @if($user->
                        role && $user-> role->name == $role->name) selected
                        @endif>
                        {{$role->name}}
                    </option>
                    @endforeach
                </select>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('js')
    <script>
        function updateRole(selectObject) {
            let user_id_from_select = selectObject.id.replace("user_", "");
            let role_id_from_select = selectObject.value;

            $.ajax({
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content"),
                },
                url: "{{route('user.update.role')}}",
                data: {
                    user_id: user_id_from_select,
                    role_id: role_id_from_select,
                },
                type: "post",
                success: function (responce) {
                    alert(responce);
                },
            });
        }
</script>
@endpush
