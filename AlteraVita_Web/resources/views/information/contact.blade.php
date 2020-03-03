@extends('layouts.app')

@section('title', 'Contactez nous')
@section('content')
<style> 
    .invalid-feedback{
        display: block;
    }
</style>
<div class="container mt-3 mb-3">
    <div class="card">
        <div class="card-header">Contactez nous</div>
        <div class="row justify-content-center">
            <div class="mt-5 mb-4">
                @if (Session::has('flash_message'))
                    <div class="alert alert-success"> {{ Session::get('flash_message') }}</div>    
                @endif
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <form method="POST" action="{{ route('sendMessage') }}" >
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Email : </label>
                            <input type="email" class="form-control" required autocomplete="email" autofocus name="email">
                            @if ($errors->has('email'))
                                <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Message : </label>
                            <textarea name="message" required class="form-control" cols="30" rows="10"></textarea>
                            @if ($errors->has('message'))
                                <small class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
                            @endif
                        </div>
                        <div class="form-group row justify-content-center"> 
                            <button class="btn btn-primary" >Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script', asset('js/contact.js'))
@endsection