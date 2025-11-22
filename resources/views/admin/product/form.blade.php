@extends('admin_master')

@section('content')
<div class="row mt-2">
  <div class="col-12">
    <div class="card">
      <div class="card-body card-body-breadcums">
        <div class="page-title-box justify-content-between d-flex align-items-md-center flex-md-row flex-column">
          <h4 class="page-title">Add {{ ucfirst($moduleName) }}</h4>
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product') }}">{{ ucfirst($moduleName) }}</a></li>
            <li class="breadcrumb-item active">Add {{ ucfirst($moduleName) }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
          @csrf()
          <div class="row g-2">
            <div class="mb-1 col-md-4">
              <label for="name" class="form-label">Name</label>
              <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="Name">
              <span class="error text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="mb-1 col-md-4">
              <label for="aff_link" class="form-label">Aff Link</label>
              <input value="{{ old('aff_link') }}" type="text" class="form-control" id="aff_link" name="aff_link" placeholder="Aff Link">
              <span class="error text-danger">{{ $errors->first('aff_link') }}</span>
            </div>
            <div class="mb-1 col-md-4">
              <label for="sku" class="form-label">SKU</label>
              <input value="{{ old('sku') }}" type="text" class="form-control" id="sku" name="sku" placeholder="SKU">
              <span class="error text-danger">{{ $errors->first('sku') }}</span>
            </div>
            <div class="mb-1 col-md-4">
              <label for="category_id" class="form-label">Category</label>
              <select id="category_id" name="category_id" class="form-select">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
                @endforeach
              </select>
              <span class="error text-danger">{{ $errors->first('category_id') }}</span>
            </div>
            <div class="mb-1 col-md-4">
              <label for="price" class="form-label">Price</label>
              <input value="{{ old('price') }}" type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Price">
              <span class="error text-danger">{{ $errors->first('price') }}</span>
            </div>
            <div class="mb-1 col-md-4">
              <label for="discount_price" class="form-label">Discount Price</label>
              <input value="{{ old('discount_price') ?? 0 }}" type="number" step="0.01" class="form-control" id="discount_price" name="discount_price" placeholder="discount_price">
              <span class="error text-danger">{{ $errors->first('discount_price') }}</span>
            </div>
            <div class="mb-1 col-md-4">
              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control" id="image" name="image" accept="image/*">
              <span class="error text-danger">{{ $errors->first('image') }}</span>
            </div>
            <div class="mb-1 col-md-12">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description">{{ old('description') }}</textarea>
              <span class="error text-danger">{{ $errors->first('description') }}</span>
            </div>
            <div class="mb-1 col-md-4">
              <label for="status" class="form-label">Status</label>
              <select id="status" name="status" class="form-select">
                <option value="0" {{ old('status',0) == 0 ? 'selected' : '' }}>Inactive</option>
                <option value="1" {{ old('status',1) == 1 ? 'selected' : '' }}>Active</option>
              </select>
              <span class="error text-danger">{{ $errors->first('status') }}</span>
            </div>
            <div class="mb-1 col-md-4">
              <label for="is_trend" class="form-label">Is Trend ? </label>
              <select id="is_trend" name="is_trend" class="form-select">
                <option value="0" {{ old('is_trend',0) == 0 ? 'selected' : '' }}>Inactive</option>
                <option value="1" {{ old('is_trend',1) == 1 ? 'selected' : '' }}>Active</option>
              </select>
              <span class="error text-danger">{{ $errors->first('is_trend') }}</span>
            </div>
          </div>
          <hr>
          <button type="submit" class="btn btn-primary"><i class="ri-edit-line"></i> Add</button>
          <a href="{{ route('product') }}" class="btn btn-info"><i class="ri-close-line"></i> Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection