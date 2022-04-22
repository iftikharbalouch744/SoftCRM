<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index(){
        $companies=DB::table('finances')
        ->join('companies','finances.companies_id', '=', 'companies.id')
        ->join('deals', 'finances.companies_id', '=','deals.companies_id')
        ->where('finances.is_active','=','1')
        ->select('finances.name','companies.name', 'deals.name')
        ->get();
        //->get();

        return $companies;
    }
}
