<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/scss/style.scss')
        @vite('resources/css/createUser.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Sistema de Gestão ERP Online | Register</title>
    </head>
    <body>
        <section>
            <div class="ca-left-side">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>

                <a href="{{ route('admin.login') }}">sign in</a>
            </div>

            <div class="ca-right-side">
                <h1>Create Account</h1>
                <p>First we just need the basics, then you can add more information!</p>
                
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="inp-group">
                        <label for="name"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="name" id="name" placeholder="Name">
                    </div>

                    <div class="inp-group">
                        <label for="email"><i class="fa-solid fa-envelope"></i></label>
                        <input type="email" name="email" id="email" placeholder="E-mail">
                    </div>

                    <div class="inp-group">
                        <label for="pass"><i class="fa-solid fa-lock"></i></label>
                        <input type="password" name="password" id="pass" placeholder="Password">
                    </div>
                    
                    <button type="submit">SIGN UP</button>
                </form>

                <small class="text-secondary mt-3">By clicking Sign up, you agree to the terms of use.</small>
            </div>
        </section>
    </body>
</html>