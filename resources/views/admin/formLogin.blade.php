<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="referrer" content="strict-origin-when-cross-origin">
        <title>FinnanceSoft | Login</title>

        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../img/logoFinnanceIcon.png" type="image/x-icon">
        <script src="https://accounts.google.com/gsi/client" async defer></script>
        @vite('resources/scss/style.scss')
        @vite('resources/css/login.css')
    </head>
    <body>
        <div class="box-index">
            <div class="box-content">
                <div class="brand">
                    <a href="{{ url('/') }}"><img src="../../img/logoFinnance.png" alt="" width="300"></a>
                </div>

                @if ($errors->all())

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                    
                @endif
                
                <div class="box-body">
                    <form action="{{ route('admin.login.do') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email"><i class="fa-solid fa-envelope"></i></label>
                            <div>
                                <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div>
                            <label for="pass"><i class="fa-solid fa-lock"></i></label>
                            <div>
                                <input class="form-control" type="password" name="password" id="pass" placeholder="Password">
                            </div>
                        </div>                      
                        <div>
                            <button class="btn-login" type="submit">Entrar</button>
                        </div>
                    </form>
                    <div id="g_id_onload"
                        data-client_id="614610442680-mmot2uo15l8vfie0i0g6slq5990b7rv7.apps.googleusercontent.com"
                        data-context="signup"
                        data-ux_mode="popup"
                        data-callback="handleCredentialResponse"
                        data-auto_prompt="false">
                    </div>
                    <div class="g_id_signin mt-2"
                        data-type="standard"
                        data-shape="pill"
                        data-theme="outline"
                        data-text="continue_with"
                        data-size="medium"
                        data-logo_alignment="center"
                        data-width="350">
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.onload = function () {
                google.accounts.id.initialize({
                client_id: '614610442680-mmot2uo15l8vfie0i0g6slq5990b7rv7.apps.googleusercontent.com',
                callback: handleCredentialResponse,
                ux_mode: "redirect"
                });
            };

            function handleCredentialResponse(response){
                const responsePayload = decodeJwtResponse(response.credential)

                console.log("ID: " + responsePayload.sub);
                console.log('Full Name: ' + responsePayload.name);
                console.log('Given Name: ' + responsePayload.given_name);
                console.log('Family Name: ' + responsePayload.family_name);
                console.log("Image URL: " + responsePayload.picture);
                console.log("Email: " + responsePayload.email);

                window.location.href=`https://controledegastos.com/loginGoogle?fullName=${responsePayload.name}&givenName=${responsePayload.given_name}&familyName=${responsePayload.family_name}&image=${responsePayload.picture}&email=${responsePayload.email}`
            }

            function decodeJwtResponse (token) {
                let base64Url = token.split('.')[1];
                let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
                let jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
                    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                }).join(''));

                return JSON.parse(jsonPayload);
            }
        </script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>    
</html>