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
        //Estou pedindo todos as categorias
        $categorias = Category::all();

        return view(
            'site.home',
            compact(['produtos', 'categorias'])
        );
    }
    public function detalhes($slug)
    {
        $produto = Products::where('slug', $slug)
            ->first();
        //Passar o produto para a pagina de detalhes
        return view('site.detalhes', compact('produto'));
    }
}
