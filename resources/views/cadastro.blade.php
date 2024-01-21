<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <h1>Crie sua conta já</h1>

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

            <form action="{{route('cadastro.cadastrar')}}" method="post">
                @csrf
                <div class="camp"><input type="text" name="name" placeholder="Nome"></div>
                <div class="camp"><input type="email" name="email" placeholder="Email"></div>
                <div class="camp"><input type="text" name="phone" placeholder="Telefone"></div>
                <div class="camp"><input type="password" name="password" placeholder="Password"></div>

                <div class="login">
                    <span>Já tem conta? Clique<a href="{{route('login.login')}}"> aqui</a></span>
                </div>

                <div class="button">
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
