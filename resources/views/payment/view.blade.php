@extends("comon/web_layout")

@section("title", "Wallet - Payday Loan Service Template")

@section("blog-content")



<div class="container my-5 text-center">
    <div class="row">
        <div class="col md-3">
            <h2>Make a Payment</h2>
            <form action="{{ route('payment.mail') }}" method="post">
                @csrf
                
                <button type="submit" class="btn btn-primary my-5">Create Payment</button>
            </form>
            
        </div>
    </div>
</div>





@endsection