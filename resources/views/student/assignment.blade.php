@extends("comon/web_layout")

@section("title", "Wallet - Payday Loan Service Template")

@section("blog-content")



<div class="container my-5 text-center">
    <div class="row">
        <div class="col md-3">
            <h2>Assignment</h2>
            <form action="{{ route('send.score') }}" method="post">
                @csrf
                <input type="number" name="score" class="form-control" placeholder="score below 10">
                <button type="submit" class="btn btn-primary my-5"> Provide Score </button>
            </form>
            
        </div>
    </div>
</div>





@endsection