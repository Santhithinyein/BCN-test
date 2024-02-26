@props(['randomProducts'])
<section  id="suggestion" >
<div class="container" >
            <h1 class="text-center pt-5">Suggestion for our products</h1>
            
            
        <div class="row row-cols-1 row-cols-md-3 g-4" >  
        @foreach ($randomProducts as $product)      


            

            <div class="col">
              <div class="card">
              
            <x-bee_product :product="$product"/>
               </div>



            </div>
        @endforeach
          

          </div>

</div>
      
        
     
</section>

