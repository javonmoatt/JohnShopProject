@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="asset/img/retro-2031321.svg" alt="" width="72" height="72">
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>
  
    <div class="row">
      <div class="col-md-7">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" method="POST" action="{{ url('/order') }}" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
    
            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>
    
            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="customerId">ID#: <span class="text-muted"></span></label>
              {{-- <input type="email" class="form-control" id="email" placeholder="you@example.com"> --}}
              <input type="text" id="custId" name="customerId" placeholder="ID#">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            
    
           {{--  <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
    
            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>
    
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>
            <hr class="mb-4">
    
            <h4 class="mb-3">Payment</h4>
    
            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="paypal">Cash</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">PayPal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div> --}}
            <hr class="mb-4">
            <input type="hidden" id="OrderDate" name="orderDate" value={{Date()}}>
            <input type="hidden" id="orderTime" name="orderTime" value={{time()}}>
            <input type="hidden" id="status" name="status" value="Pending">
            
            <a class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</a>
          </form>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
        </div>

    <div class="col-md-3">
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
          <div class="input-group">
              <div class="">
                  <a type="submit" class="btn btn-primary btn-sm btn-block" aria-label="Input group example" aria-describedby="btnGroupAddon">Redeem</a>
              </div>
              <input type="text" class="form-control" placeholder="Promo code">
          </div>
      </form>
    </div>
  </div>
  </div>
@endsection
