@extends('layouts.app')

@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Wishlist</h2>

      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Size</th>
                <th class="text-center">Action</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>
                    <div class="shopping-cart__product-item">
                        <img loading="lazy" src="{{ asset('uploads/products/thumbnails') }}/{{ $item->model->image }}" width="120" height="120" alt="{{ $item->name }}" />
                    </div>
                    </td>
                    <td>
                    <div class="shopping-cart__product-item__detail">
                        <h4>{{ $item->name }}</h4>
                    </div>
                    </td>
                    <td>
                    <span class="shopping-cart__product-price__detail text-muted">${{ $item->price }}</span>
                    </td>
                    <td>
                        <span class="shopping-cart__product-item__detail text-muted text-center">{{ $item->qty }}</span>
                    </td>
                    <td>
                      <span class="shopping-cart__product-item__detail text-muted text-center">
                        {{ $item->options['size'] ?? 'N/A' }}
                    </span>
                    
                  </td>
                    <td>
                        <div class="row g-2 align-items-center justify-content-around">
                            <div class="col-12 col-sm-auto">
                                <form action="{{ route('wishlist.move.to.cart', ['rowId'=>$item->rowId]) }}" method="POST" class="d-grid">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm w-100">Move to Cart</button>
                                </form>
                            </div>
                            <div class="col-12 col-sm-auto">
                                <form action="{{ route('wishlist.item.remove',['rowId'=>$item->rowId]) }}" method="POST" class="d-grid">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100 d-flex justify-content-center align-items-center">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                            <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </td>
                </tr>

              @endforeach

            </tbody>
          </table>
          @if (Cart::instance('wishlist')->count() > 0)
          <form action="{{ route('wishlist.item.clear') }}" method="POST" class="mt-4">
              @csrf
              @method('DELETE')
              <button class="btn btn-light cart__clear" type="submit">CLEAR WISHLIST</button>
          </form>

          @else

          <div class="row">
            <div class="col-md-12 text-center pt-5 pb-5">
                <p>No items found in your cart</p>
                <a href="{{ route('shop.index') }}" class="btn btn-info">Shop Now</a>
            </div>
         </div>

     </div>


      @endif
     
    </section>
  </main>

@endsection

@push('scripts')
    <script>
      $(function(){

        $(".remove-wishlist").on("click", function(){
          $(this).closest('form').submit();
        });

      });
    </script> 
@endpush