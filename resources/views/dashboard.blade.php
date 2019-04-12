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
          <h1 class="h2">Dashboard</h1>
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
        {{-- content goes here --}}

        {{-- Customer see here --}}
        {{-- end of cutomer view --}}
        
        {{-- Employee see here --}}
        {{-- end of employee view --}}
        
        {{-- Delivery Person see here --}}
        {{-- end of delivery Person view --}}

        {{-- Owner see here --}}
        @if()
        <div class="row">
            <div class="col">
              Customers
            </div>
            <div class="col">
              Users
            </div>
            <div class="col">
              Offices
            </div>
        </div>
        <div class="row">
            <div class="col">
              Orders
            </div>
            <div class="col">
              Payments
            </div>
            <div class="col">
              Products
            </div>
        </div>
        @endif
        {{-- end of owners view --}}
        
        {{-- content stops here --}}
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"> HI</canvas>
      </main>
    </div>
  </div>
@endsection