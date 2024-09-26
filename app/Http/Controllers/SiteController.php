<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        //Estou pedindo os produtos paginados
        $produtos = Products::paginate(20);
        return view(
            'site.home',
            compact(['produtos'])
        );
    }
    public function detalhes($slug)
    {
        $produto = Products::where('slug', $slug)
            ->first();
        //Passar o produto para a pagina de detalhes
        return view('site.detalhes', compact('produto'));
    }
    public function categoria($categoria)
    {
        // Pesquisar por nomes
        // Categoria = Categoria::where('nome',$categoria)->first()
        // Pesquisar por id
        $categoria = Category::find($categoria);
        //Pesquisar por produtos
        $produtos = Products::where('id_category', $categoria->id)
            ->paginate(20);

        return view('site.categoria', compact(['produtos', 'categoria']));
    }
}
