@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
            <p>Register</p>
            <form method="POST" action="{{ route('site.register') }}">
                @csrf
                <div class="control-group">
                    <div class="form-floating controls mb-3"><input class="form-control" type="text" name="user[name]" required placeholder="Name"><label class="form-label" for="name">Name</label><small class="form-text text-danger help-block"></small></div>
                </div>
                <div class="control-group">
                    <div class="form-floating controls mb-3"><input class="form-control" type="email" name="user[email]" required placeholder="Email Address"><label class="form-label">Email Address</label><small class="form-text text-danger help-block"></small></div>
                </div>
                <div class="control-group">
                    <div class="form-floating controls mb-3"><input class="form-control" type="password" name="user[password]" required placeholder="Password"><label class="form-label">Password</label><small class="form-text text-danger help-block"></small></div>
                </div>
                <div class="control-group">
                    <div class="form-floating controls mb-3"><input class="form-control" type="password" name="user[password_confirmation]" required placeholder="Password"><label class="form-label">Confirmation Password</label><small class="form-text text-danger help-block"></small></div>
                </div>
                <div id="success"></div>
                <div class="mb-3"><button class="btn btn-primary" type="submit">Register</button></div>
            </form>
        </div>
    </div>
</div>

@if($errors -> any())
    <h3>Возникла ошибка при регистрации</h3>
    <ul>
    @foreach ($errors -> all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

@include('includes.footer')
