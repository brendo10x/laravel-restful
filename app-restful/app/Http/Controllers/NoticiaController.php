<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Noticia; // Add o modelo Noticia
use Illuminate\Http\Request;

class NoticiaController extends Controller {

 

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 
		$noticias  = Noticia::all();
   
        return $this->getJsonUTF8($noticias);
    
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	    $noticia = new Noticia();
        $noticia->titulo = $request->input('titulo');
        $noticia->descricao = $request->input('descricao');
        $noticia->autor = $request->input('autor');
        $noticia->criado_em = $request->input('criado_em');
        $noticia->save(); 

        return $this->getJsonUTF8($noticia);
	}

	/**
	 * Função que retorna um Json de dados definido com UTF-8 no cabeçalho da resposta
	 * 
	 * @param  Array  $data
	 * @return Json
	 */
	public function getJsonUTF8($data){
		return response()->json($data, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$noticia  = Noticia::find($id);
  
        return $this->getJsonUTF8($noticia);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$noticia  = Noticia::find($request->input('id'));
        $noticia->titulo = $request->input('titulo');
        $noticia->descricao = $request->input('descricao');
        $noticia->autor = $request->input('autor');
        $noticia->criado_em = $request->input('criado_em');
        $noticia->save();
  
        return $this->getJsonUTF8($noticia);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return text
	 */
	public function destroy($id)
	{
		$noticia  = Noticia::find($id);
        $noticia->delete();
 
        return 'Deletado com sucesso!';
	}

}
