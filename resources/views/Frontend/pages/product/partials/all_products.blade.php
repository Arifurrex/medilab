
 <section class="">
       <div class="">
           <div class="row">
               @foreach ($products as $product)
               <div class="col-lg-3 col-md-6 col-sm-12 border">
                 <div class="product-top">
                    <!-- this is for image start -->
                  @php $i = 1; @endphp

                  @foreach ($product->images as $image)
                    @if ($i > 0)
                        <a href="{{route('products.show',$product->slug)}}"><img class="card-img-top feature-img" src="{{ asset('images/products/'. $image->image) }}" alt="{{ $product->title }}" ></a>
                    @endif

                    @php $i--; @endphp
                  @endforeach

                    <!-- this is for image end -->
              
                    <div class="overlay-right">
                        {{-- <button type="button" class="btn btn-secondary" title="quick shop">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-secondary" title="Add to wishlist">
                            <i class="fas fa-heart"></i>
                        </button>
                        <button type="button" class="btn btn-secondary" title="Add to cart list">
                            <i class="fas fa-shopping-cart"></i>
                        </button> --}}
                        @include('Frontend.partial.cart_button')
                    </div>
                  </div>
                  <div class="product-bottom text-center">
                         <h><a href="{!!route('products.show',$product->slug)!!}">{{ $product->title }}</a></h>
                         <h>&#2547; {{ $product->price }}</h>
                  </div>

               </div>
               @endforeach
               </div>
       </div>
   </section>