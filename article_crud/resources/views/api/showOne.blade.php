@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center" style="font-weight: bold">
                {{ $response['title'] }}
            </h3> <br>
                
                <div class="card">
                    <div class="card-body text-justify">
                        {{ $response['body'] }}

                    </div>
                </div>


        </div>
    </div>
</div>
@endsection