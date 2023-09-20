
@extends('backend.newlayout')

@section("backendContent")



<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header fs-xl">Categories Here</div>
            <div class="card-body">
                <table class="table">
                  
                    <tr>
                        <th>Sno.</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    @foreach ($categories as $key=>$category)
                    <tr>
                        <td>{{ $categories->firstItem()+$key }}</td>
                        <td>{{ $category->title }}</td>
                       
                        <td>
                            <a href="{{ route('status.changeCtaegoryStatus',$category->slug) }}" class="btn btn-sm badge btn-{{ $category->status == 1 ? 'success' : 'danger' }}">
                                {{ $category->status == 1 ? 'Active' : 'Deactive' }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route("categories.edit", $category->slug) }}" class="btn btn-sm btn-primary">
                                Edit
                            </a>
                            <a href="{{ route("categories.delete", $category->slug) }}" class="btn btn-sm btn-danger">
                                Delete
                            </a>
                        </td>
                        
                    </tr>
                    @endforeach  
                </table>
                <div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-lg-4">
        <div class="card">
            <div class="card-header fs-xl">{{ isset($editedCategory) ? 'Edit' : 'Add' }} Categories</div>
            <div class="card-body">
                
                <form action="{{ isset($editedCategory) ? route('categories.update',$editedCategory->slug) : route("categories.store")  }}" method="POST">
                    @csrf
                    <input type="text" name="title" class="form-control mt-4" value="{{ isset($editedCategory) ? $editedCategory->title : '' }}" placeholder="{{ isset($editedCategory) ? 'Edit' : 'Add' }} Category">
                    @error('title')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button class="btn btn-primary mt-4">{{ isset($editedCategory) ? 'Update' : 'Add' }} Category</button>
                </form>
            </div>
        </div> 
    </div>
    
</div>

@endsection
              