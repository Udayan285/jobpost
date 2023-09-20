
@extends('backend.newlayout')

@section("backendContent")



<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header fs-xl">All Sub-Categories Here</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Sno.</th>
                        <th>Title</th>
                        <th>Parent-Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    @foreach ($subCategories as $key=>$subcategory)                    
                        <tr>
                            <td>{{ $subCategories->firstItem()+$key }}</td>
                            <td>{{ $subcategory->title }}</td>                
                            <td>{{  $subcategory->category->title }}</td>         
                            <td>
                                <a href="{{ route('status.changeSubCtaegoryStatus',$subcategory->slug) }}" class="btn btn-sm badge btn-{{ $subcategory->status == 1 ? 'success' : 'danger' }}">
                                    {{ $subcategory->status == 1 ? 'Active' : 'Deactive' }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('subCategories.editbtn',$subcategory->slug) }}" class="btn btn-sm badge btn-primary">
                                    Edit
                                </a>
                                <a href="{{ route('subCategories.delete',$subcategory->slug) }}" class="btn btn-sm badge btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div>{{ $subCategories->links() }}</div>
                <div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-lg-4">
        <div class="card">
            <div class="card-header fs-xl">{{ isset($subCategory) ? 'Update' : '' }} Sub-Categories</div>
            <div class="card-body">
                
                <form action="{{ isset($subCategory) ? route('subCategories.update',$subCategory->slug) : route('subCategories.store') }}" method="POST">
                    @csrf

                    {{-- select parent caregory work start--}}
                    <h2 class="fs-xl">{{ isset($subCategory) ? '' : 'Select a category' }} </h2>
                    <select name="category_id" {{ isset($subCategory) ? 'hidden' : '' }} id="category" class="form-control">
                        @foreach ($categories as $category)
                            
                        <option  value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                        
                    </select>
                    {{-- select parent caregory work end--}}


                    <input type="text" name="title" class="form-control mt-4" value="{{ isset($subCategory) ? $subCategory->title : '' }}" placeholder="Sub Category">
                    @error('title')
                    <span style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button class="btn btn-primary mt-4">{{ isset($subCategory) ? 'Update' : 'Add' }} Sub-Category</button>
                </form>
            </div>
        </div> 
    </div>
    
</div>

@endsection
              