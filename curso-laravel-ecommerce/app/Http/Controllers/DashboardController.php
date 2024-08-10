<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $countUsers = User::all()->count();
        //Gráfico 1 - Users
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();
        //Preparando Array
        foreach($usersData as $userData){
            $ano[] = $userData->ano;
            $total[] = $userData->total;
        }
        $userLabel = "'Comparativo de cadastro de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        //Gráfico 2 - Categorias
        $catsData = Categoria::with('produtos')->get();
        //Preparando Array
        foreach($catsData as $catData){
            $catNome[] = "'".$catData->nome."'";
            $catTotal[] = $catData->produtos->count();
        }
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('countUsers', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
