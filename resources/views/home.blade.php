@extends('layouts.app')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')

<div class="container">
  
    <div class="row justify-content-center">
        <div class="col-md-8">
          <!--  <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> -->

            <!--div class="blocks">
              <ul id="homeblocks">
                <li id="salesRecord" ><a href="{{route('addItem')}}">Add/Remove Sales Record</a></li>
                <li id="editRecord"><a href="{{route('editRecord')}}">Edit Sales Record</a></li>
                <li id="displaySales"><a href="{{route('displaySales')}}">Display Sales Record</a></li>
                <li id="inventoryRecord"><a href="{{route('addInventory')}}">Add/Remove Inventory</a></li>
                <li id="displayInventory"><a href="{{route('displayInventory')}}">Display Inventory</a></li>
              </ul>
            </div -->

            <div class="wrapper">
            <button class="navbuttons navbutton1" onclick="location.href='{{route('addItem')}}'">Add Sales Record</a></button>
            <button class="navbuttons navbutton2" onclick="location.href='{{route('displaySales')}}'">Display/Edit Sales Record</a></button>
            <button class="navbuttons navbutton3" onclick="location.href='{{route('addInventory')}}'">Add Inventory</a></button>
            <button class="navbuttons navbutton4" onclick="location.href='{{route('displayInventory')}}'">Display/Edit Inventory</a></button>
            </div>

        </div>
    </div>
</div>
@endsection
