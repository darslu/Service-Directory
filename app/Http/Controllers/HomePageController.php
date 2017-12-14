<?php

namespace App\Http\Controllers;

use App\HomePage;
use Illuminate\Http\Request;
use App\Company;
use App\Category;
use App\City;
use App\Http\Controllers\Traits\FileUploadTrait;


class HomePageController extends Controller
{

    public function index( Request $request)
    {
        $cities = City::get()->pluck('name', 'id');
        $categories = Category::get()->pluck('name', 'id');
        $categoriesAll = Category::all();
        

        return view('mainTable.index', compact( 'cities', 'categories', 'categoriesAll'));
    }

    public function table(Request $request)
    {
        $cities = City::get()->pluck('name', 'id');
        $categories = Category::get()->pluck('name', 'id');
        $categoriesAll = Category::all();
        $companies = Company::filterByRequest($request)->paginate(9);

        return view('mainTable.search', compact('companies', 'cities', 'categories', 'categoriesAll'));
    }

    public function company(Request $request, $id)
    {
        $cities = City::get()->pluck('name', 'id');
        $categories = Category::get()->pluck('name', 'id');
        $categoriesAll = Category::all();
        $company = Company::find($id);

        return view('mainTable.company', compact('cities', 'categories', 'categoriesAll', 'company'));
    }

    public function show(Request $request, $id)
    {
        $cities = City::get()->pluck('name', 'id');
        $categories = Category::get()->pluck('name', 'id');
        $categoriesAll = Category::all();
        $category = Category::find($id);
        $companies = Company::join('category_company', 'companies.id', 
        '=', 'category_company.company_id')
        ->where('category_id', $id)
        ->paginate(9);
        
        

        return view('mainTable.category', compact('companies', 'cities', 'categories', 'categoriesAll', 'category'));
    }
}