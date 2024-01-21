<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contas</title>
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    @vite(['resources/css/app.css'])

</head>
<body>
    <div class="container">
        <aside id="aside">
            <div class="menu-btn">
                <i class="fa-solid fa-bars" id="menu_btn"></i>
            </div>
            <div class="close-menu">
                <button type="button" id="close_menu">X</button>
            </div>
            <menu class="menu-list" id="menu_list">
                {{--se for admin o type,vai aparecer criar usuário,ou atualizar usuário ai escolhe o usuário--}}
                <p><a href="">Exibir perfil</a></p>
                <p><a href="{{route('criar-conta-pagar')}}">Criar conta a pagar</a></p>
                <p><a href="">Exibir contas a pagar</a></p>
                <p><a href="">Exibir contas pagas</a></p>

                <p><a href="">Criar conta a receber</a></p>
                <p><a href="">Exibir contas a receber</a></p>
                <p><a href="">Exibir contas recebidas</a></p>
            </menu>
        </aside>

        <section class="dashboard" id="dashboard">
            <div class="welcome">
                @if ($name_user)
                    <p>Bem Vindo {{$name_user}}</p>
                @else
                    <p>Bem Vindo</p>
                @endif
            </div>
            <div class="dashboard-data">
                <div class="dashboard-data-pay">
                    {{--circulo com contas pagas,e a pagar em porcentagem,e total ao lado ou em cima em R$--}}
                    <div class="dashboard-data-pay-details">
                        <div class="total-pay">
                            <h3>Total a pagar</h3>
                            <p>R$<span>1.000,00</span></p>
                        </div><!--total-pay-->

                        <div class="quantity-pay">
                            <h3>Contas pagas</h3>
                            <p>20% | <span>R$200,00</span></p>
                        </div><!--quantity-pay-->

                        <div class="quantity-without-pay">
                            <h3>Contas sem pagar</h3>
                            <p>80% | <span>R$800,00</span></p>
                        </div>
                    </div><!--dashboard-data-pay-details-->
                </div><!--dashboard-data-pay-->

                <div class="dashboard-data-receive">
                    {{--circulo com contas recebidas e a receber em porcentagem,e total ao lado em R$--}}
                    <div class="dashboard-data-receive-details">
                        <div class="total-receive">
                            <h3>Total a receber</h3>
                            <p>R$<span>1.000,00</span></p>
                        </div><!--total-receive-->

                        <div class="quantity-receive">
                            <h3>Contas recebidas</h3>
                            <p>20% | <span>R$200,00</span></p>
                        </div><!--quantity-receive-->

                        <div class="quantity-without-receive">
                            <h3>Contas sem receber</h3>
                            <p>80% | <span>R$800,00</span></p>
                        </div><!--quantity-without-receive-->
                    </div><!--dashboard-data-receive-details-->
                </div><!--dashboard-data-receive-->

                <div class="dashboard-data-total">
                    <div class="dashboard-data-total-start">
                        <h3>Entradas</h3>
                        <p>R$ <span>200,00</span></p>
                    </div><!--dashboard-data-total-start-->

                    <div class="dashboard-data-total-end">
                        <h3>Saídas</h3>
                        <p>R$ <span>200,00</span></p>
                    </div><!--dashboard-data-total-end-->

                    <div class="dashboard-data-total-together">
                        <h3>Entradas - Saídas</h3>
                        <p>R$ <span>0,00</span></p>
                    </div><!--dashboard-data-total-together-->
                </div><!--dashboard-data-total-->
            </div><!--dashboard-data-->
            <div class="dashboard-messages">
                @if (session('success'))
                    <p class="success-message">{{session('success')}}</p>
                @endif

                @if (session('error'))
                    <p class="error-message">{{session('error')}}</p>
                @endif
            </div>
        </section>
    </div>

    <script src="{{asset('js/menu.js')}}"></script>
</body>
</html>
