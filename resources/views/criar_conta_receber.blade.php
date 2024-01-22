<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar conta a pagar</title>
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="container">
        <header>
            <div class="back-page">
                <a href="{{route('home.index')}}"><i class="fa-solid fa-arrow-left"></i></a>
            </div><!--back-page-->

            <div class="title">
                <h2>Conta a Receber</h2>
            </div><!--title-->
        </header>

        <div class="form">
            <form action="{{route('conta_receber')}}" method="post">
                @csrf

                @if ($id_user)
                    <input type="hidden" name="user_id" value="{{$id_user}}">
                @endif

                <div class="camp">
                    <label>Titulo</label>
                    <input type="text" name="title" placeholder="Escreva um titulo">
                </div><!--camp-->

                <div class="camp">
                    {{--verificar no controller se o email existe e debitar da conta dele como saida--}}
                    <label>Email de quem vai pagar</label>
                    <input type="email" name="email_pay">
                </div><!--camp-->

                <div class="camp">
                    <label>Email de quem vai receber</label>
                    <input type="email" name="email_receive">
                </div><!--camp-->

                <div class="camp">
                    <label>Data de pagamento:</label>
                    <input type="text" name="date" placeholder="10/10/2024">
                </div><!--camp-->

                <div class="camp">
                    <label>Forma de Pagamento:</label>
                    <select name="payment_form" id="payment_form">
                        <option value="default">Selecione uma forma ded pagamento</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                        <option value="cartao_credito">Cartão de Crédito</option>
                        <option value="cartao_debito">Cartão de Débito</option>
                        <option value="boleto">Boleto</option>
                    </select>
                </div><!--camp-->

                <div class="camp">
                    <label>Valor</label>
                    <input type="text" name="value" placeholder="Digite um valor">
                </div><!--camp-->

                <div class="camp">
                    <label>Parcelas:</label>
                    <select name="plots" id="plots">
                        <option value="default">Escolha uma parcela</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div><!--camp-->

                <div class="camp">
                    <label>Pagou?</label>
                    <select name="paid" id="paid">
                        <option value="default">Escolha uma opção</option>
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>
                </div><!--camp-->

                <div class="camp">
                    <button type="submit">Criar</button>
                </div><!--camp-->
            </fo
            rm>
        </div><!--form-->
    </div><!--container-->
</body>
</html>
