@props(['totalQuantity'])
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-Mp/1NuQvM5bBkYqHwvY2XNIIzmCfTL8yfLY3AnXPQZHQ2Tt7pY51HUIdkiXcV+8hR6L8GJhG4Dl2t8Llns5/Ww==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>

  
  <body id="home">
    <div>
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg bg-gradient" style="background-color: darkgoldenrod;">
        <div class="container">
          <img src="/Photo/titlelg5-removebg-preview.png" width="150px" height="100%">
          <div>
            @if(Auth::check())
              <a href="/view" class="text-light btn btn-outline-warning" style="text-decoration: none;">
                <i class="fas fa-cart-shopping"></i>
                Cart
                <x-cart :totalQuantity="$totalQuantity" />
              </a>
            @else
              <a href="/product" class="text-light btn btn-outline-warning" style="text-decoration: none;">
                <i class="fas fa-cart-shopping"></i>
                Cart
              </a>
            @endif

            @if(Auth::check())
              <a href="/home" class="text-light mx-2 btn btn-outline-warning" style="text-decoration: none;">
                {{ Auth::user()->name }}
              </a>
            @else
              <!-- Adjusted the styles for the login button -->
              <a href="/login" class="btn btn-outline-warning text-light" style="text-decoration: none;">
                <i class="fas fa-sign-in-alt"></i>
                Login
              </a>
            @endif

            <!-- Adjusted the styles for the register button -->
            <a href="/register" class="btn btn-outline-warning text-light" style="text-decoration: none;">
              <i class="fas fa-user-plus"></i>
              Register
            </a>
          </div>
        </div>
      </nav>
   
      {{$slot}}
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
