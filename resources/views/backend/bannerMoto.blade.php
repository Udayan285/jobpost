@extends('backend.newlayout')

@section("backendContent")

    <div class="container">
        <div class="row">
            <form action="{{ route('banner.create') }}" method="POST" class="form">
                @csrf
                <div class="form-header mt-3 fs-xl">Create Banner Moto Here</div>
                <textarea type="text" name="title" class="mb-2 form-control mt-3"></textarea>
                @error('title')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
                <button class="btn btn-primary mt-3 d-block">
                    Add Moto
                </button>
            </form>

        
             <div class="card mt-5">
                    <div class="card-header fs-xl">All Banner Moto Here</div>
                    <div class="card-body">
                        <table class="table">
                          
                            <tr>
                                <th>Sno.</th>
                                <th>Title</th>
                                <th>Show/Hide</th>
                                <th>Actions</th>
                            </tr> 
                            @foreach ($banner_motos as $key=>$banner_moto)
                            <tr>
                                <td>{{ $banner_motos->firstItem()+$key }}</td>
                                <td>{{ $banner_moto->title }}</td>
                                <td>
                                        <a href="{{ route('status.status',$banner_moto->slug) }}" class="btn btn-{{ $banner_moto->check == 1 ? 'success' : 'danger' }} btn-sm">
                                            {{ $banner_moto->check == 1 ? 'Active' : 'Deactive' }}
                                        </a>
                                 
                                </td>
                                <td>
                                    <a href="{{ route('banner.delete',$banner_moto->slug) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr> 
                            @endforeach
                           

                        </table>
                        <div>{{ $banner_motos->links() }}</div>
                    </div>
                                                                           
                </div>
        </div>
    </div>
@endsection