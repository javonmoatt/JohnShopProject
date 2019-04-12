@extends('layouts.app')

@section('content')

    <div class="container">
        <p><a href="{{ url('shop') }}">Home</a> / Cart</p>
        <h1>
            <span class="text-muted">Your Cart</span> 
            <span class="badge-secondary badge-pill">{{ Cart::instance('default')->count(false) }}</span>
        </h1>
        <hr>
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

{{--         @if (sizeof(Cart::content()) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                    <tr>
                        <td class="table-image">
                            <a href="{{ url('shop', [$item->model->slug]) }}">
                                <img src="{{ asset('img/' . $item->model->image) }}" alt="product" class="img-thumbnail">
                            </a>
                        </td>
                        <td><a href="{{ url('shop', [$item->model->slug]) }}">{{ $item->name }}</a></td>
                        <td>
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </td>
                        <td>${{ $item->subtotal }}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm btn-block" value="Remove">
                            </form>
                            <br>
                            <form action="{{ url('switchToWishlist', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="submit" class="btn btn-light btn-sm btn-block" value="To Wishlist">
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                        <td>${{ Cart::instance('default')->subtotal() }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Tax</td>
                        <td>${{ Cart::instance('default')->tax() }}</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 40px;"></td>
                        <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                        <td class="table-bg">${{ Cart::total() }}</td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>

            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
            <a href="{{ url('/login') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>

            <div style="float:right">
                <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>
        @else
            <h3>You have no items in your shopping cart</h3>
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
        @endif
        <div class="spacer"></div> --}}
    <div class="row">
        <div class="col-md-3 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Cart Summary</span>
            <span class="badge badge-secondary badge-pill"></span>
            </h4>
            <ul class="list-group mb-3">
                @if (sizeof(Cart::content()) > 0)
                    @foreach (Cart::content() as $item)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                            <h6 class="my-0">{{ $item->name }}</h6>
                            <small class="text-muted">{{$item->description}}</small>
                            </div>
                            <span class="text-muted">${{ $item->subtotal }}</span>
                        </li>
                    @endforeach
                @else
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <h3>Empty cart</h3>
                    </li>
                @endif
                <li class="list-group-item d-flex justify-content-between">
                    <span>SubTotal (JMD)</span>
                    ${{ Cart::instance('default')->subtotal() }}
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Tax</span>
                    ${{ Cart::instance('default')->tax() }}
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Your Total (JMD)</span>
                    <strong>${{ Cart::total() }}</strong>
                </li>
            </ul>
            <form class="card p-2">
                <br>
                @guest
                    {{-- goes to login --}}
                    <a href="{{ url('/login') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
                @else
                    {{-- goes to checkout --}}
                    <a href="{{ url('/checkout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
                @endguest
            </form>
            <br>
            <form class="card p-2">
                <div class="input-group">
                    <div class="">
                        <a type="submit" class="btn btn-secondary btn-sm btn-block" aria-label="Input group example" aria-describedby="btnGroupAddon">Redeem</a>
                    </div>
                    <input type="text" class="form-control" placeholder="Promo code">
                </div>
            </form>
        </div>

        <div class="col-md-7">
        @if (sizeof(Cart::content()) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                    <tr>
                        <td class="table-image">
                            <a href="{{ url('shop', [$item->model->slug]) }}">
                                <img src="{{ asset('img/' . $item->model->image) }}" alt="product" class="img-thumbnail">
                            </a>
                        </td>
                        <td><a href="{{ url('shop', [$item->model->slug]) }}">{{ $item->name }}</a></td>
                        <td>
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </td>
                        <td>${{ $item->subtotal }}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm btn-block" value="Remove">
                            </form>
                            <br>
                            <form action="{{ url('switchToWishlist', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="submit" class="btn btn-light btn-sm btn-block" value="To Wishlist">
                            </form>
                        </td>
                    </tr>

                    @endforeach
                   {{--  <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                        <td>${{ Cart::instance('default')->subtotal() }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Tax</td>
                        <td>${{ Cart::instance('default')->tax() }}</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 40px;"></td>
                        <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                        <td class="table-bg">${{ Cart::total() }}</td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr> --}}

                </tbody>
            </table>
            <br><hr><br>
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;

            <div style="float:right">
                <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>
        @else
            <h3 class="text-center">You have no items in your shopping cart</h3>
            <br><hr><br>
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
        @endif
        <div class="spacer"></div>
    </div>
    </div>
    </div> <!-- end container -->
@endsection

@section('extra-js')
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '{{ url("/cart") }}' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/cart') }}';
                  }
                });

            });

        })();

    </script>
@endsection
