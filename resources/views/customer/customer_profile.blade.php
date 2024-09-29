@extends("comon/deshbord_layout")
@section("content")





<h1>Customer Deshbord</h1>
<a class="dropdown-item" href="">
    <form action="{{route('customer.logout')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-buy-now" >Log Out</button>
    </form>
</a>





@endsection

