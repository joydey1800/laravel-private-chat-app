<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .list-group{
        height: 90vh;
    }
    </style>
</head>
<body>
    <div id="app">

      <main class="">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-0 m-0">
            <div class="card">
           

    <ul class="list-group">
            <div class="card-header text-center">{{$u_name->name}}</div>
            @foreach ($msgs as $msg)

                @if ($msg->s_uid == auth()->user()->id)

                 <li class="list-group-item list-group-item-warning text-right">{{$msg->message}}</li>

                @else

                 <li class="list-group-item list-group-item-primary">{{$msg->message}}</li>

                @endif    

            @endforeach
       
            </ul> 
            <form action="{{url('message', $id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="input-group ">
                            <input type="text" name="message" class="form-control border border-primary" placeholder="message" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-info" type="submit">send</button>
                            </div>
                    </div>

            </form>
            </div>
        </div>
    </div>
</div>

</main>
</div>
</body>
</html>