
@extends('backend.newlayout')

@section("backendContent")
        
            <!-- BEGIN: Content -->
            <div class="content"> 
           
                <div class="intro-y d-flex align-items-center mt-8">
                    <h2 class="fs-lg fw-medium me-auto">
                        Account Layout
                    </h2>

                </div>


<form action="{{ route("profile.update") }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="from-group">
        <input type="text" name="name" class="form-control mb-2 mt-4" value="{{ str(auth()->user()->name)->headline() }}" >
        
        @error('name')
        <span style="color: red;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        
        <input type="text" name="designation" class="form-control mt-4 mb-4" value="{{ auth()->user()->designation }}" >
        @error('designation')
        <span style="color: red;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <textarea id="ckEditor" type="text" name="description" class="form-control mt-4" placeholder="{{ auth()->user()->description ? auth()->user()->description : '' }}" >
        </textarea>
        @error('description')
        <span style="color: red;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input type="email" name="email" class="form-control mt-4" value="{{ auth()->user()->email }}" >
        @error('email')
        <span style="color: red;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="number" name="phone" class="form-control mt-4" value="{{ auth()->user()->phone ? auth()->user()->phone : '018' }}">
        @error('phone')
        <span style="color: red;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        
        <label class="fs-xl">Your Image</label>
        <input type="file" name="profile_pic" value="{{ auth()->user()->profile_url ? auth()->user()->profile_url : ''  }}" class="form-control mt-4">
        @error('profile_pic')
        <span style="color: red;">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
       
        <button type="submit" class="btn btn-primary mt-4 d-block">Update Account</button>
    </div>
</form>

            </div>



            @push('customdesc')
                <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
                <script>
                    ClassicEditor
                    .create( document.querySelector( '#ckEditor' ) )
                    .catch( error => {
                        console.error( error );
                    } );
                </script>
            @endpush
            @endsection