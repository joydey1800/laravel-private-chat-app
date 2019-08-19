@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Dashboard</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif  
                    
                <div class="card-body">
                    <ul class="list-group">

                        @foreach ($users as $user)
                            @if ($user->id != auth()->user()->id)
                          
                            @if($user->isOnline())
                                    <a href="message/{{$user->id}}" class="list-group-item list-group-item-action m-2">
                            
                                        {{$user->name}}  <span class="float-right badge badge-primary">Online</span>
                                
                                    </a>
                            @else
                                    <a href="message/{{$user->id}}" class="list-group-item list-group-item-action m-2">
                            
                                        {{$user->name}}  <span class="float-right badge badge-dark">Ofline</span>
                                
                                    </a>
                             @endif
                            
                            @endif
                            
                        @endforeach
                 
                 </ul>
                </div> 
                
            </div>
        </div>
    </div>
</div>
@endsection
