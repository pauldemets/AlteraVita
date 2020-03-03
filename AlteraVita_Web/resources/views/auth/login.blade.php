@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-md-6 justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link text-wrap" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Inscription') }}</div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nom">{{ __('Nom') }}</label>
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                    name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="prenom">{{ __('Prénom') }}</label>
                                <input id="prenom" type="text"
                                    class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                    value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adresse1">{{ __('Adresse') }}</label>
                            <input id="adresse1" type="text"
                                class="form-control @error('adresse1') is-invalid @enderror" name="adresse1"
                                value="{{ old('adresse1') }}" required autocomplete="adresse1" autofocus>

                            @error('adresse1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="adresse2">{{ __('Adresse suite') }}</label>
                            <input id="adresse2" type="text"
                                class="form-control @error('adresse2') is-invalid @enderror" name="adresse2"
                                value="{{ old('adresse2') }}" autocomplete="adresse2" autofocus>

                            @error('adresse2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="ville">{{ __('Ville') }}</label>
                                <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror"
                                    name="ville" value="{{ old('ville') }}" required autocomplete="ville" autofocus>

                                @error('ville')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="cp">{{ __('Code postal') }}</label>
                                <input id="cp" type="number" class="form-control @error('cp') is-invalid @enderror"
                                    name="cp" value="{{ old('cp') }}" required autocomplete="cp" autofocus>

                                @error('cp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email">{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">{{ __('Mot de passe') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password-confirm">{{ __('Confirmez') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            {!! NoCaptcha::display(['data-size' => 'compact ']) !!}
                        </div>

                        <div class="form-group row ml-4">
                            <input type="checkbox" class="form-check-input" id="cgu" required>
                            <label class="form-check-label" for="exampleCheck1">J'ai lu et j'accepte les <a href="{{ route('legal') }}" target="_blank">Conditions Générales d'Utilisation</a></label>
                          </div>

                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Inscription') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection