<div class="container">
        @props(['category' => null ])
  <form
    action="{{$category ? '/admin/categories/'.$category->id.'/update' : '/admin/categories/store'}}"
    method="POST"
    enctype="multipart/form-data"
  >
    @csrf
    @if ($category)
    @method('PUT')
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">Category name</label>
        <input
            value="{{$category?->name}}"
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

    <div class="form-group">
        <label for="exampleInputEmail1">Category Description</label>
        <textarea
            name="description"
            class="form-control"
            cols="30"
            rows="10"
        >
            {{$category?->description}}
        </textarea>
        @error('description')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    

    
    
    
    
    
    

    <button
        type="submit"
        class="btn btn-primary"
    >{{ $category ? 'Update' : 'Create' }}</button>
  </form>
</div>