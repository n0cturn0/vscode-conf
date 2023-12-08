<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class SiteController extends Controller
{
    public function index()
    {
        $images  = DB::table('produtos')
            ->join('produtos_images', 'produtos_images.idproduto', '=', 'produtos.id')
            ->select('produtos_images.image', 'produtos_images.idproduto', 'produtos_images.imagepath', 'produtos_images.id', 'produtos.*', 'produtos_images.destaque', 'produtos.perfil')
            ->where('produtos_images.destaque', '=', 1)->get();

        // $images = DB::table('produtos_images')
        // ->where('produtos_images.destaque', '=', 1)->get();
         $categorias = Categoria::all();
         $produtos = Produto::all();
         $vaga = Vaga::all();

         $cat = $categorias;
         $prod = $produtos;
         $image = $images;
         $vaga = $vaga;
       
        return view('site.index',compact('cat','prod','image', 'vaga'));
    }

    public function modal($parametro)
    {
        
        $resultados = DB::table('perfis')->where('perfil_id', '=', $parametro)->get();
        return view('site.modal', compact('resultados'));
    }

    public function colaborador()
    {
        $vaga = Vaga::all();
        $vaga = $vaga;
        return view('site.colaborador', compact('vaga'));  
    }

    public function vaga($id=NULL)
    {
        $idvaga = $id;
        return view('site.vaga', compact('idvaga'));
    }

    public function cadastracv(Request $request)
    {
         
         
        $request->input('curriculopdf'); 
        
        $validate = [
          'nome' => 'required|string',
          'curriculopdf' => 'required|mimes:pdf|max:2048',
        ];
        
        $mensage = [
            'nome.required' => 'O campo nome é obrigatório',
            'arquivo.mimes' => 'O arquivo deve ser do tipo PDF.',
        ];
        $validator = Validator::make($request->all(), $validate, $mensage);
        
        if ($validator->fails()) {
           echo 'Algo deu errado, tente enviar novamente.';
        } else {
            $arquivos = $request->allFiles()['curriculopdf'];
            $nomeAleatorio = uniqid() . '_' . $arquivos->getClientOriginalName();
            $arquivos->storeAs('curriculos', $nomeAleatorio);
            $query = "INSERT INTO curriculos (idvaga, nome, curriculo) VALUES (?, ?, ?)";
             if  (DB::insert($query, [ $request->input('idvaga'), $request->input('nome'),$nomeAleatorio ]))
          {
            echo "Seu currículo foi recebido";
          }




        }
        
       
           
         

        

    }


}
