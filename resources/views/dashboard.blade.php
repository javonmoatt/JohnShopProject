@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Operations</span><a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="#">
                <span data-feather="file"></span>Customers</a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <span data-feather="users"></span>Offices</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/employees') }}">
                <span data-feather="bar-chart-2"></span>Employees</a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <span data-feather="layers"></span>Payments</a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <span data-feather="layers"></span>Orders</a></li>
          </ul>
        </div>
      </nav>
  
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">{{$user->name}}'s Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>
        @if ($user->id == 1)
          @foreach ($order as $items)
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="#"><h3>Order #: {{$items->id}}</h3></a>
                            <h5>Order Date: {{$items->orderDate}}</h5>
                            <hr>
                            <span class="badge badge-pill badge-success">{{$items->status}} Order</span>
                            <hr>
                        </div> <!-- end caption -->
                            <ul>
                                @foreach($detail as $details)
                                  <li class="nav-item"><a class="nav-link" href="#">
                                      {{$details->quantityOrdered}} x {{$details->name}} - ${{$details->priceEach}}.00
                                  </li>
                                @endforeach
                            </ul>
                    </div> <!-- end thumbnail -->
                </div> <!-- end col-md-3 -->
            </div> <!-- end row -->
          @endforeach
        @elseif($user->id == 2)
          @foreach ($order as $items)
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="#"><h3>Order #: {{$items->id}}</h3></a>
                            <h5>Order Date: {{$items->orderDate}}</h5>
                            <hr>
                            <span class="badge badge-pill badge-success">{{$items->status}} Order</span>
                            <hr>
                            <a href="#" class="btn btn-primary">Assign</a>
                        </div> <!-- end caption -->
                    </div> <!-- end thumbnail -->
                </div> <!-- end col-md-3 -->
            </div> <!-- end row -->
          @endforeach
        @elseif($user->id == 3)
          <div class="card text-center">
            <div class="card-header">
              Deliveries Outstanding
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">
                @foreach ($order as $items)
                  <div class="row">
                      <div class="col-md-3">
                          <div class="thumbnail">
                              <div class="caption text-center">
                                  <a href="#"><h3>Order #: {{$items->id}}</h3></a>
                                  <h5>Order Date: {{$items->orderDate}}</h5>
                                  <hr>
                                  <span class="badge badge-pill badge-success">{{$items->status}} Order</span>
                                  <hr>
                              </div> <!-- end caption -->
                                  <ul>
                                      @foreach($detail as $details)
                                        <li class="nav-item"><a class="nav-link" href="#">
                                            {{$details->quantityOrdered}} x {{$details->name}} - ${{$details->priceEach}}.00
                                        </li>
                                      @endforeach
                                  </ul>
                          </div> <!-- end thumbnail -->
                      </div> <!-- end col-md-3 -->
                  </div> <!-- end row -->
                @endforeach
              </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="card-footer text-muted">
              2 days ago
            </div>
          </div>
        @endif
      </main>
    </div>
  </div>
@endsection