@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            @foreach($products as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                    <img class="trending-image" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->name}}</h2>
                      <h5>{{$item->description}}</h5>
                    </div>
             </div>
             <div class="col-sm-3">
             <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
                <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning" >Remove</a>
             </div>
            </div>
            @endforeach
          </div>

     </div>
</div>
@endsection 