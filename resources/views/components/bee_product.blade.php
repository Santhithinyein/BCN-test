@props(['product'])


<div class="card h-100">
                <img src="./Photo/ke2.jpg" class="card-img-top" alt="...">
                <div class="card-body text-bg-secondary">
                  <h5 class="card-title">{{$product->pd_name}}</h5>
                  
                  <p class="card-text">
                  {{$product->detail}}
                <br>
               <b>Price - </b> {{$product->price}}
                
              </p>
                </div>
                <div class="card-footer text-bg-secondary">
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>