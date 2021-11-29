<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"> 
<link rel="stylesheet/less" type="text/css" href="{{ asset('css/home.less') }}">  	
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js"></script>


<div class="row">
    <div class="col-md-12">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>
</div>


<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form method="POST" action="{{ route('login') }}" class="card login">
            <div class="card-body login-border">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                </div>
                <br />
                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label">Hasło</label>
                    <div class="col-md-10">
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>
                </div>

                <br />

                <div class="form-group row">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Zapamiętaj mnie') }}</span>
                    </label>
                </div>


                <div class="form-group row">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Zapomniałeś hasło?') }}
                        </a>
                    @endif
                    
                    <br />
                    <br />

                    <input type="submit" name="login" value="Zaloguj" class="btn btn-primary col-md-12" />
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

