@extends('comon/web_layout')

@section('title', 'Wallet - Payday Loan Service Template')

@section('blog-content')



    <div class="container my-5 text-center">
        <div class="row">
            <div class="col md-3">
                <h1>my notification</h1>
                @if (count($notifications) > 0)
                    <ul>
                        @foreach ($notifications as $notification)
                            @if (isset($notification->data['score']) && isset($notification->data['states']))
                                <li> Score: {{ $notification->data['score'] }} and Status: {{ $notification->data['states'] }}</li>
                                {{ $notification->markAsRead() }}
                            @endif
                            
                        @endforeach
                    </ul>
                @else
                    <p>no notification found</p>
                @endif
            </div>
        </div>
    </div>





@endsection
