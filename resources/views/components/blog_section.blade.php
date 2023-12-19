@props(['products','categories'])
<section class="container text-center" id="blogs">
  <div class="container mt-4">
    <h2>Discover the latest hive! 🍯</h2>
    <p class="lead">Check out <span class="brand-name">BeeCrafter Network's</span> Featured Products</p>
  </div>
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6">
          <form action="/product" class="my-1" >
            @csrf
            <div class="input-group mb-3">
              <input
                type="text"
                autocomplete="false"
                class="form-control"
                name="search"
                value="{{request('search')}}"
                placeholder="Search products..."
              />
            <input type="hidden"
              name="category"
              value="{{request('category')}}"
              >
              <button
                class="input-group-text bg-warning text-black"
                id="basic-addon2"
                type="submit"
              >
               Search
              </button>
          </div>
          <x-category/>
        </form>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>   
    @endif

    <div class="row">
      @foreach ($products as $product)
        <div class="col-md-4 mb-4">
          <x-card_product :product="$product"/>
        </div>
      @endforeach
    </div>
    {{ $products->links() }}
  </section>