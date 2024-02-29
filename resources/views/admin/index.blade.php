<x-admin-layout>
    <div class="container">
    <h1>Product list</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>                
                <th scope="col">Slug</th>
                <th scope="col">Category</th>
                <th
                    scope="col"
                    colspan="2"
                >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->slug}}</td>
                <td>{{$product->category->name}}</td>
                <td><a
                        href="/admin/products/{{$product->id}}/edit"
                        class="btn btn-link btn-warning"
                    >Edit</a></td>
                <td>
                    <form
                        action="/admin/products/{{$product->id}}/destroy"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="btn btn-danger"
                        >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{$products->links()}}
    </div>
   
  
</x-admin-layout>

    
    
