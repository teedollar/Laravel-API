@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Add Article Details</div>

                     @if(session('message'))
                         <div class="card-header text-center" style="font-weight: bold; color: darkgreen">
                            {{ session('message') }}
                         </div>
                     @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('create') }}" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-3 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-8">
                                <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" required></textarea>

                                @if ($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Article') }}
                                </button>
                            </div>
                        </div>


                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection