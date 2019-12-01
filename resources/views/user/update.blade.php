@extends('template.dashboard')

@section('title', 'Dashboard - Edit User')

@section('content')
    <form action="post/{{ $user->id }}" method="post">
        {{ csrf_field() }}

        <div class="field">
            <label class="label">Username</label>
            <div class="control">
                <input class='input' type="text" name="user_name" placeholder="Username" value="{{ $user->user_name }}">
            </div>
        </div>
        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class='input' type="password" name="password" placeholder="Password" value="">
            </div>
        </div>
        <div class="columns">
            <div class="field column is-6">
                <label class="label">Email</label>
                <div class="control">
                    <input class='input' type="text" name="email" placeholder="Email" value="{{ $user->email }}">
                </div>
            </div>
            <div class="field column is-6">
                <label class="label">Role</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="user_role">
                            <option value="owner" @if($user->user_role == 'owner') selected @endif>Owner</option>
                            <option value="admin" @if($user->user_role == 'admin') selected @endif>Administrator</option>
                            <option value="karyawan" @if($user->user_role == 'karyawan') selected @endif>Karyawan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" value="Edit User" class="button is-primary">
    </form>
@endsection