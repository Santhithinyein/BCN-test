<div class="container">

        @props(['product' => null ,'categories' => null ])

  <form
    action="{{$product ? '/admin/products/'.$product->id.'/update' : '/admin/products/store'}}"
    method="POST"
    enctype="multipart/form-data"
  >
    @csrf
    @if ($product)
    @method('PUT')
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">Product name</label>
        <input
            value="{{$product?->name}}"
            type="text"
            name="name"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Enter name"
        >
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    @if ($product)
    <img
        src="{{$product->image}}"
        width="200"
        height="200"
    >
    @endif

    <div class="form-group">
        <label for="exampleInputEmail1">Product Image</label>
        <input
            type="file"
            name="image"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
        >
        @error('image')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Product Slug</label>
        <input
            value="{{$product?->slug}}"
            type="text"
            name="slug"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Enter slug"
        >
        @error('slug')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Product Description</label>
        <textarea
            name="description"
            class="form-control"
            cols="30"
            rows="10"
        >
            {{$product?->description}}
        </textarea>
        @error('description')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input
            value="{{$product?->price}}"
            type="text"
            name="price"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Enter price"
        >
        @error('price')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Quantity</label>
        <input
            value="{{$product?->quantity}}"
            type="text"
            name="quantity"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Enter quantity"
        >
        @error('quantity')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="exampleInputEmail1">Product Category</label>
        <select
            name="category_id"
            class="form-control"
            id=""
        >
            @foreach ($categories as $category)
            <option {{$category->id == $product?->category->id ? 'selected' : ''}}
                value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <button
        type="submit"
        class="btn btn-primary"
    >{{ $product ? 'Update' : 'Create' }}</button>
  </form>
</div>