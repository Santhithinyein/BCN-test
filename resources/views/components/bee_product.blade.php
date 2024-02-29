@props(['product'])

<div class="card h-100">
    <img src="{{$product->image}}" class="card-img-top" alt="..." style="width:100%; height:350px;">
    <div class="card-body text-bg-secondary">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">
            <!-- Display truncated description -->
            {{$product->truncated_description}} <!-- You may need to truncate the description in your backend code -->
            <span class="full-description" style="display: none;">{{$product->description}}</span>
            <span class="toggle-description text-warning text-bold" style="cursor: pointer;">See More</span>
        </p>
        <b>Price - </b> {{$product->price}}
    </div>
    <div class="card-footer text-bg-secondary">
        <a href="/product" class="btn btn-warning">Go shopping</a>
    </div>
</div>

<script>
    // JavaScript to toggle between truncated and full description for all cards
    document.addEventListener('DOMContentLoaded', function () {
        const toggleDescriptions = document.querySelectorAll('.toggle-description');

        toggleDescriptions.forEach(function(toggleDescription) {
            toggleDescription.addEventListener('click', function () {
                const fullDescription = this.parentElement.querySelector('.full-description');

                if (this.textContent === 'See More') {
                    this.textContent = 'See Less';
                    fullDescription.style.display = 'inline'; // Display full description
                } else {
                    this.textContent = 'See More';
                    fullDescription.style.display = 'none'; // Hide full description
                }
            });
        });
    });
</script>
