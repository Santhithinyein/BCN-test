@props(['product']);
  <div class="card">
    <img
      src="/images/bee-product.jpg"
      class="card-img-top"
      alt="..."
    />
    <div class="card-body">
      <h4 class="card-title">{{$product->name}}</h4>
      <div class="tags my-3">
      <span class="badge bg-warning">
        <a href="/product?category={{$product->category->id}}" class="text-black">
          {{ optional($product->category)->name }}
        </a>
      </span>
      </div>
      <p class="card-text">
        {{$product->description}}
      </p>
      <p>Price: {{$product->price}}</p> 
      
      @auth
      <!-- If the user is authenticated, display the form -->
      <form method="post" action="/products/{{$product->id}}">
          @csrf
          <label for="quantity">Quantity:</label>
          <input type="number" name="quantity" value="1" min="1">
          <button type="submit" class="btn btn-warning my-2">Add to Cart</button>
      </form>
      @else
      <!-- If the user is not authenticated, display a message or a link to the login page -->
        <p>Please <a href="{{ route('login') }}">log in</a> to add items to your cart.</p>
      @endauth

      
     </div>
  </div>

