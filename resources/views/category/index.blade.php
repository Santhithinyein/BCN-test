<x-admin-layout>
    <div class="container">
    <h1>Category list</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>                             
                               
                <th
                    scope="col"
                    colspan="2"
                >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>                
               
                
                <td><a
                        href="/admin/categories/{{$category->id}}/edit"
                        class="btn btn-link btn-warning"
                    >Edit</a></td>
                <td>
                    <form
                        action="/admin/categories/{{$category->id}}/destroy"
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
    
    </div>
   
  
</x-admin-layout>