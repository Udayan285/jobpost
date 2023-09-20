@extends('backend.newlayout')

@section("backendContent")
        
            <!-- BEGIN: Content -->
            <div class="content"> 
           
                <div class="intro-y d-flex align-items-center mt-8">
                    <h2 class="fs-lg fw-medium me-auto">
                        Change Password
                    </h2>

                </div>


<form action="{{ route("profile.resetPassword") }}" method="POST">
    @csrf
    <div class="from-group">
        <input type="password" class="form-control mt-4" name="old_password" placeholder="Current Password">
        @error('old_password')
        <span style="color: red;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="password" class="form-control mt-4" name="new_password" placeholder="New Password">
        @error('new_password')
        <span style="color: red;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="password" class="form-control mt-4" name="new_password_confirmation" placeholder="Confirm Password">
        @error('new_password_confirmation')
        <span style="color: red;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit" class="btn btn-primary mt-4">Update Password</button>
    </div>
</form>

            </div>
            @endsection