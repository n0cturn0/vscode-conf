<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoImage;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation;
use App\Models\Categoria;
use Illuminate\Routing\Redirector;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function categoria()
    {
        $categoria = DB::table('categorias')->get();
        return view('categoria.categoria',['categoria' => $categoria]);
    }

    public function createcategoria(Request $request){

        try {
            $validated = $request->validate([
                'categoria' => 'required|max:255',
            ]);
            $categoria = new Categoria;
            $categoria->categoria = $validated['categoria'];
            $categoria->save();
            return redirect()->route('categoria')->with('success', 'Categoria criada com sucesso!');
        } catch (ValidationException $e) {
            // A validação falhou, trate a exceção aqui
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

    }


    public function destroy($id)
    {
        $categoria = Categoria::query()->findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoria')->with('success', 'Categoria excluída com sucesso!');
    }

    public function colaboradores()
    {   
        $vagas = DB::table('vagas')->get();
        return view('vagas.vaga', ['vagas' => $vagas]);
    }

    public function criavaga(Request $request)
    {
        
        $vaga = new Vaga();
        $vaga->vaga = $request->input('vaga');
        $vaga->descricao = $request->input('informacao');
        $vaga->status = 1;
        
        if($vaga->save()){
            return redirect()->route('admcolaboradores')->with('success', 'Vaga Adicionada com sucesso!');
        }
    }

    public function apagavaga($id=NULL)
    {
        dd($id);
    }
    public function produtos()
    {
        
        $categoria = DB::table('categorias')->get();
        $produtos = DB::table('produtos')->get();
        return view('produto.produto', ['categorias' => $categoria],['produtos' => $produtos]);
    }
    public function perfil($id='NULL')
    {    
        $produtos =  DB::table('produtos')
        ->join('perfis', 'perfis.perfil_id', '=', 'produtos.id')
        ->select('produtos.produto', 'produtos.perfil', 'perfis.col_a', 'perfis.col_b', 'perfis.espessura')
        ->where('produtos.perfil', '=', 0)
        ->get();
        $result = DB::table('produtos')->where('id', '=', $id)->first();
        
        
        if ($result) {
            if ($result->perfil == 0 AND $result->tipo == 9)
            {
                //Desconfigurado
                $configurado = 1;
                $data = [
                    'produtos' => $produtos,
                    'id' => $id,
                    'configurado' => $configurado
                ];
               
                return view('perfil.perfilproduto', ['data' => $data]);
            } else {
                //PERFIL CONFIGURADO
                $perfil = DB::table('perfis')->where('perfil_id', '=', $id)->get();
                $tipo = DB::table('produtos')->where('id', '=', $id)->first();
                if ($tipo){
                    $getipo = $tipo->tipo; 
                }
                $configurado = 0;
                $data = [
                    'produtos' => $produtos,
                    'id' => $id,
                    'configurado' => $configurado,
                    'perfil' => $perfil,
                    'tipo' => $getipo,
                ];
               
                return view('perfil.perfil', ['data' => $data]);
            }
            // Faça algo com o valor da coluna "tipo"
        }
       
    }
    public function criaperfilproduto(Request $request)
    {
       
       if (DB::table('produtos')->where('id',$request->id)->update(['tipo'=>$request->tipo]))
       {
        return redirect()->route('perfil', ['id' => $request->id])->with('success', 'Pronto para inserir um item do perfil!');
       }
    }

    public function criaperfil(Request $request)
    {
        $inputs = $request->all();
       
       if(DB::table('perfis')->insert([
        'perfil_id' => $request->id,
        'col_a' => $request->cola,
        'col_b' => $request->colb,
        'espessura' => $request->espessura,
        'tipo'  => $request->tipo
        ])) {
        return redirect()->route('perfil', ['id' => $request->id])->with('success', 'Item do perfil inserido!');
       }
       
       
    }

    public function criaproduto(Request $request){
        $tipo = 9; 
        if ($request->has('addperfil') && $request->input('addperfil') === 'on') 
        {
        //Ativa perfil
        $perfil = 0;  
        } else{
        $perfil = 1;
        }
        $produto = new Produto();
        $produto->idcategoria = $request->input('categoria');
        $produto->produto = $request->input('produto');
        $produto->descricao = $request->input('informacao');
        $produto->perfil = $perfil;
        $produto->tipo = $tipo;
        if($produto->save()){
            return redirect()->route('produtos')->with('success', 'Produto criado com sucesso!');
        }
    }





    public function produtoimage($id='NULL'){
        return view('produto.produtoimage',['id' => $id]);

}

        public function uploadimage(Request $request){

            for( $i=0; $i < count($request->allFiles()['arquivo']); $i++){
            $arquivos = $request->allFiles()['arquivo'][$i];
            $nomeAleatorio = uniqid() . '_' . $arquivos->getClientOriginalName();
            $arquivos->storeAs('produtos', $nomeAleatorio);
            $produto = new ProdutoImage();
            $produto->idproduto =  $request->input('idproduto');
            $produto->image = $nomeAleatorio;
            $produto->imagepath =$nomeAleatorio;
            $produto->save();

        }
            return redirect()->route('showproduto', ['id' => $request->input('idproduto')])->with('success', 'Produto criado com sucesso!');
        }

        public function showproduto($id='NULL'){
//            $produtos = DB::table('produtos_images')->where('idproduto','=', $id)->get();
            $produtos =  DB::table('produtos_images')
                ->join('produtos', 'produtos.id', '=', 'produtos_images.idproduto')
                ->select('produtos_images.image', 'produtos.produto', 'produtos.destaque', 'produtos_images.imagepath', 'produtos_images.id', 'produtos_images.destaque')
                ->get();
            return view('produto.show', ['produtos' => $produtos]);
        }

        public function apagarproduto($id='NULL'){
            DB::table('produtos_images')->where('idproduto','=', $id)->delete();
            DB::table('produtos')->where('id','=', $id)->delete();
            return redirect()->route('produtos')->with('success', 'Produto deletado!');
        }
    public function apagarprodutoimagem($id='NULL'){
        DB::table('produtos_images')->where('id','=', $id)->delete();
        return redirect()->route('showproduto', ['id' => $id])->with('success', 'Imagem apagada!');
    }
        public function destaque($id='NULL'){
            $produtos = DB::table('produtos_images')->where('id','=', $id)->pluck('destaque');
            foreach ($produtos as $key){ $idselected = $key; }
            $idselected = ($idselected == 0) ? 1 : 0;
            DB::table('produtos_images')->where('id',$id)->update(['destaque'=>$idselected]);
//            return redirect()->route('produtos')->with('success', 'Destaque alterado!');
            return redirect()->route('showproduto', ['id' => $id])->with('success', 'Destaque da página inicial alterado com sucesso!');

    }

}
