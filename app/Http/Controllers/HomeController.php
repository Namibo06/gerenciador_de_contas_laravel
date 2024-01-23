<?php

namespace App\Http\Controllers;

use App\Models\ContaPagar;
use App\Models\ContaReceber;
use App\Models\Home;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $dataAtual = Carbon::now()->toDateString();

        $dataMes = Carbon::parse($dataAtual)->format('d/m/Y');

        $idCookie = Cookie::get('id_user');
        $nameCookie = Cookie::get('name_user');

        $count_pay = ContaPagar::select('value')->sum('value');
        $with_pay = ContaPagar::select('value')->where('paid','sim')->sum('value');
        $without_pay = ContaPagar::select('value')->where('paid','nao')->sum('value');
        $count_with_pay = ContaPagar::select('value')->where('paid','sim')->count('value');
        $count_without_pay = ContaPagar::select('value')->where('paid','nao')->count('value');
        $count_total_pay = $count_with_pay + $count_without_pay;
        $count_porcent_paid_pay = ($count_with_pay / $count_total_pay) * 100;
        $count_porcent_unpaid_pay = ($count_without_pay / $count_total_pay) * 100;


        $count_receive = ContaReceber::select('value')->sum('value');
        $with_receive = ContaReceber::select('value')->where('paid','sim')->sum('value');
        $without_receive = ContaReceber::select('value')->where('paid','nao')->sum('value');
        $count_with_receive = ContaReceber::select('value')->where('paid','sim')->count('value');
        $count_without_receive = ContaReceber::select('value')->where('paid','nao')->count('value');
        $count_total_receive = $count_with_receive + $count_without_receive;
        $count_porcent_paid_receive = ($count_with_receive / $count_total_receive) * 100;
        $count_porcent_unpaid_receive = ($count_without_receive / $count_total_receive) * 100;

        $box = $count_receive - $count_pay;

        return view('home',['id_user'=>$idCookie,'name_user'=>$nameCookie,'count_pay'=>$count_pay,'with_pay'=>$with_pay,'without_pay'=>$without_pay,'count_with_pay'=>$count_with_pay,'count_without_pay'=>$count_without_pay,'count_porcent_paid_pay'=>$count_porcent_paid_pay,'count_porcent_unpaid_pay'=>$count_porcent_unpaid_pay,'count_receive'=>$count_receive,'with_receive'=>$with_receive,'without_receive'=>$without_receive,'count_with_receive'=>$count_with_receive,'count_without_receive'=>$count_without_receive,'count_porcent_paid_receive'=>$count_porcent_paid_receive,'count_porcent_unpaid_receive'=>$count_porcent_unpaid_receive,'box'=>$box,'data_mes'=>$dataMes]);

    }

    public function criar_conta_pagar(){
        $idCookie=Cookie::get('id_user');

        return view('criar_conta_pagar',['id_user'=>$idCookie]);
    }

    public function conta_pagar(Request $req){

        $validated = Validator::make($req->all(),[
            'user_id'=>'required',
            'title'=>'required|min:4|max:50',
            'email_pay'=>'required|email',
            'email_receive'=>'required|email',
            'date'=>'required',
            'payment_form'=>'required',
            'value'=>'required',
            'plots'=>'required',
            'paid'=>'required',
        ],
        [
            'title.required'=>'Titulo Obrigatório',
            'email_pay.required'=>'Email do Pagador Obrigatório',
            'email_receive.required'=>'Email do Recebedor Obrigatório',
            'date.required'=>'Data de Pagamento Obrigatória',
            'payment_date.required'=>'Forma de Pagamento Obrigatório',
            'value.required'=>'Valor Obrigatório',
            'plots.required'=>'Parcelas Obrigatório'
        ]);

        if($validated->fails()){
            return redirect()->route('criar-conta-pagar')->with('error','Erro na validação');
        }

        $validator = $validated->validate();

        $criar_conta = ContaPagar::create($validator);

        if($criar_conta){
            return redirect()->route('home.index')->with('success','Conta a pagar inserida com sucesso!');
        }
        return redirect()->route('criar-conta-pagar')->with('error','Não foi possivel criar conta a pagar');
    }

    public function criar_conta_receber(){
        $idCookie=Cookie::get('id_user');

        return view('criar_conta_receber',['id_user'=>$idCookie]);
    }

    public function conta_receber(Request $req){
        $validated = Validator::make($req->all(),[
            'user_id'=>'required',
            'title'=>'required|min:4|max:50',
            'email_pay'=>'required|email',
            'email_receive'=>'required|email',
            'date'=>'required',
            'payment_form'=>'required',
            'value'=>'required',
            'plots'=>'required',
            'paid'=>'required',
        ],
        [
            'title.required'=>'Titulo Obrigatório',
            'email_pay.required'=>'Email do Pagador Obrigatório',
            'email_receive.required'=>'Email do Recebedor Obrigatório',
            'date.required'=>'Data de Pagamento Obrigatória',
            'payment_date.required'=>'Forma de Pagamento Obrigatório',
            'value.required'=>'Valor Obrigatório',
            'plots.required'=>'Parcelas Obrigatório'
        ]);

        if($validated->fails()){
            return redirect()->route('criar-conta-receber')->with('error','Erro na validação');
        }

        $validator = $validated->validate();

        $criar_conta = ContaReceber::create($validator);

        if($criar_conta){
            return redirect()->route('home.index')->with('success','Conta a receber inserida com sucesso!');
        }
        return redirect()->route('criar-conta-receber')->with('error','Não foi possivel criar conta a receber');
    }
}
