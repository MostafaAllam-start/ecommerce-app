@extends('layout.layout')
@section('content')
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="Email">Email address</label>
                <input type="email" class="form-control" id="Email" placeholder="Enter email" readonly>
            </div>
            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" class="form-control" id="currentPassword" name="currnet_password" placeholder="Current Password">
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm Password">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection