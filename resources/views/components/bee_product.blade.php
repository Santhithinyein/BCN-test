@props(['product'])


<div class="card h-100">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body text-bg-secondary">
                  <h5 class="card-title">{{$product->name}}</h5>
                  
                  <p class="card-text">
                  {{$product->description}}
                <br>
               <b>Price - </b> {{$product->price}}
                
              </p>
                </div>
                <div class="card-footer text-bg-secondary">
                    <a href="/product" class="btn btn-warning">Go shopping</a>
                </div>
            </div>
            