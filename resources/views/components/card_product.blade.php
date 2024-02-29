@props(['product'])
<div class="card mt-3">
    <img src="{{$product->image}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h4 class="card-title">{{$product->name}}</h4>
        <div class="tags my-3">
            <span class="badge bg-warning">
                <a href="/product?category={{$product->category->id}}" class="text-black">
                    {{ optional($product->category)->name }}
                </a>
            </span>
        </div>
        <div class="card-text">
            <p class="description">
                {{ substr($product->description, 0, 100) }}{{ strlen($product->description) > 100 ? '...' : '' }}
                @if (strlen($product->description) > 100)
                    <span class="see-more" style="color: blue; cursor: pointer;"> See More</span>
                    <span class="see-less" style="color: blue; cursor: pointer; display: none;"> See Less</span>
                @endif
            </p>
            <p class="full-description" style="display: none;">{{$product->description}}</p>
        </div>
        <p class="price">Price: {{$product->price}}</p>
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

<style>
    .card {
        width: 350px; /* Set a fixed width for all cards */
        height: auto; /* Allow the height to adjust based on content */
        margin-bottom: 20px; /* Add some spacing between cards */
    }

    .card-img-top {
        width: 100%;
        height: 320px; /* Set a fixed height for the image */
        object-fit: cover; /* Ensure the image covers the entire space */
    }

    .description {
        margin-bottom: 10px; /* Add some spacing below the description */
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.see-more').click(function() {
            $(this).closest('.card-text').find('.description').hide();
            $(this).closest('.card-text').find('.full-description').show();
            $(this).hide();
            $(this).siblings('.see-less').show();
        });

        $('.see-less').click(function() {
            $(this).closest('.card-text').find('.full-description').hide();
            $(this).closest('.card-text').find('.description').show();
            $(this).hide();
            $(this).siblings('.see-more').show();
        });
    });
</script>
