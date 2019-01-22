@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center">Artcles Lists</h3> <br>

            @if(session('message'))
                 <div class="card-header text-center" style="font-weight: bold; color: darkgreen">
                    {{ session('message') }}
                 </div>
            @endif

            @foreach($response['data'] as $response)
                
                <div class="card">
                    <div class="card-header text-justify" style="font-weight: bold">{{ $response['title'] }}</div>

                    <div class="card-body text-justify">
                        {{ $response['body'] }}

                        <div class="m-3" style="justify-content: right">

                            <a href="{{ url('/show/'.$response['id']) }}"><button type="button" class="btn btn-info">view</button></a>
                            <a href="{{ url('/edit/'.$response['id']) }}"><button type="button" class="btn btn-secondary">edit</button></a>
                            <a href="{{ url('/delete/'.$response['id']) }}"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this')">delete</button></a>

                        </div>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
</div>
@endsection