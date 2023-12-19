@props(['categories','currentCategory'])
<div class="">
  <div class="dropdown">
    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      filter by category
    </button>
    <ul class="dropdown-menu ">
      <li>
        @foreach ($categories as $category)
           <a class="dropdown-item text-black " href="/product?category={{$category->name}}
            {{ request('search') ? '&search=' .request('search') : '' }} ">
             {{$category->name}}
            </a>
         @endforeach   
      </li>
    </ul>
  </div>
</div>
