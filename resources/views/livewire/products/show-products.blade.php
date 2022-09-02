<div class="container mb-5">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header text-center"><h3>Our Products</h3></div>
           </div>

           <a href="{{route('add-product')}}" class="btn btn-sm btn-primary mt-3"> + Add Product</a>

           <div class="row mt-3" >
               @foreach($products as $product)
               <div class="col-md-3 mt-3" x-data="{ open: false }">
                   <div class="card" style="width: 18rem;">
                       <img src="/assets/products/{{$product->getFeaturedProductImage($product->id)->product_image ?? '' }}" class="card-img-top" alt="...">
                       <div class="card-body">
                           <h5 class="card-title">
                               <div class="row">
                                   <div class="col-md-1">
                                       <span class="d-flex custom-circle" style="background: {{$product->getColor->color_code ?? '#000' }};"></span>
                                   </div>
                                   <div class="col-md-9" style="margin-top: -5px;">
                                       {{$product->product_name ?? '' }}
                                   </div>
                               </div>
                           </h5>
                           <p> <small>Medium</small> | <small>{{env('APP_CURRENCY')}}{{number_format($product->price,2)}}</small></p>
                           <p>
                               @foreach($product->getProductCategories as $cat)
                                   <small><span class="custom-badge">{{$cat->getCategory->category_name ?? '' }}</span></small>,
                               @endforeach
                           </p>

                           <p class="card-text" x-show="open">{{$product->product_details ?? '' }}</p>
                           <a href="javascript:void(0);" class="btn btn-custom" @click="open = !open">View</a>
                       </div>
                   </div>
               </div>
               @endforeach
           </div>
           <div class="row mt-3">
               <div class="col-md-12 d-flex justify-content-center">
                   {{ $products->links() }}
               </div>
           </div>
       </div>
   </div>
</div>
