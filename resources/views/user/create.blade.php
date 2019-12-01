@extends('template.dashboard')

@section('title', 'Dashboard - Tambah User')

@section('content')
    <form action="add/post" method="post">
        {{ csrf_field() }}

        <div class="field">
            <label class="label">Username</label>
            <div class="control">
                <input class='input' type="text" name="user_name" placeholder="Username" value="">
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
                    <input class='input' type="text" name="email" placeholder="Email" value="">
                </div>
            </div>
            <div class="field column is-6">
                <label class="label">Role</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="user_role">
                            <option value="owner">Owner</option>
                            <option value="admin">Administrator</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" value="Tambah User" class="button is-primary">
    </form>
@endsection