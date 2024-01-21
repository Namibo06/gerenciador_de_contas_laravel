<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <h1>Inicie uma Sessão</h1>

            <div class="messages-callback">
                @if (session('success'))
                    <p class="success-message">{{session('success')}}</p>
                @endif

                @if (session('error'))
                    <p class="error-message">{{session('error')}}</p>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $e)
                        <p>{{$e}}</p>
                    @endforeach
                @endif
            </div>

            <form action="{{route('login.autenticar')}}" method="post">
                @csrf
                <div class="camp"><input type="email" name="email" placeholder="Email"></div>
                <div class="camp"><input type="password" name="password" placeholder="Password"></div>

                <div class="sign-in">
                    <span>Não tem conta? Crie uma<a href="{{route('cadastro')}}"> aqui</a></span>
                </div>

                <div class="button">
                    <button type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
