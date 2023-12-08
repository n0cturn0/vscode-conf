<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function vaga()
    {
        return view('site.vaga');
    }


}
