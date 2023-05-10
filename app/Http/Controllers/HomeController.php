<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Cidade;


class HomeController extends Controller
{
    public function index()
    {
              
        $cidades = Cidade::all();
        return response()->json($cidades);
    }
    public function store(Request $request)
    {
        
        $cep = $request->cep;
        $url = 'https://viacep.com.br/ws/'.$cep.'/json/';
        $client = new Client();
        try {
            $request = $client->request('GET', $url, []);
            $dados = $request->getBody();
            $dados = json_decode($dados);
            $checar = Cidade::where('cep',$dados->cep)->count();
            if ($checar == 0) {
            $cidades = new Cidade;
            $cidades->cep = $dados->cep;
            $cidades->logradouro = $dados->logradouro;
            $cidades->complemento = $dados->complemento;
            $cidades->localidade = $dados->localidade;
            $cidades->uf = $dados->uf;
            $cidades->ibge = $dados->ibge;
            $cidades->gia = $dados->gia;
            $cidades->ddd = $dados->ddd;
            $cidades->siafi = $dados->siafi;
            $cidades->save(); 
            return response()->json($dados);
            } else {
                return response()->json($dados);
            }            
        }
        catch (\GuzzleHttp\Exception\RequestException $e) {
            return response()->json('Erro! = CEP Não encontrado ou Invalido');
        }
        
        
    }
 
}
