@extends('layouts.app')

@section('content')

    <div class="container">
        <p><a href="{{ url('/shop') }}">Shop</a> / {{ $product->name }}</p>
        <h1>{{ $product->name }}</h1>

        <hr>

        <div class="row">
            <div class="col-md-8">
                <div class="thumbnail">
                    <img src="{{ asset('img/' . $product->image) }}" alt="product" class="img-responsive">
                </div>
            </div>

            <div class="col-md-4">
                <h3>${{ $product->price }}</h3>
                {{ $product->description }}
                <hr>
                <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn btn-success btn-lg btn-block" value="Add to Cart">
                </form>
                <br>
                <form action="{{ url('/wishlist') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="Add to Wishlist">
                </form>
                <br><br>
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->

        <div class="spacer"></div>
        <hr>
        <h3>You may also like...</h3>
        <div class="row">
            @foreach ($interested as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="{{ url('shop', [$product->slug]) }}"><img src="{{ asset('img/' . $product->image) }}" alt="product" class="img-responsive"></a>
                            <a href="{{ url('shop', [$product->slug]) }}"><h3>{{ $product->name }}</h3>
                            <p>{{ $product->price }}</p>
                            </a>
                        </div> <!-- end caption -->

                    </div> <!-- end thumbnail -->
                </div> <!-- end col-md-3 -->
            @endforeach

        </div> <!-- end row -->
        <div class="spacer"></div>
    </div> <!-- end container -->
@endsection
