<?php

namespace App\Http\Controllers;

use App\HomePage;
use Illuminate\Http\Request;
use App\Company;
use App\Category;
use App\Http\Controllers\Traits\FileUploadTrait;


class HomePageController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index( Request $request)
    {
        $cities = \App\City::get()->pluck('name', 'id');
        $categories = \App\Category::get()->pluck('name', 'id');
        $categoriesAll = \App\Category::all();

        return view('mainTable.index', compact( 'cities', $cities, 'categories', $categories,  'categoriesAll', $categoriesAll));
    }

    public function table(Request $request)
    {
        $cities = \App\City::get()->pluck('name', 'id');
        $categories = \App\Category::get()->pluck('name', 'id');
        $categoriesAll = \App\Category::all();
        $companies = \App\Company::filterByRequest($request)->paginate(9);

        return view('mainTable.search', compact('companies', $companies, 'cities', $cities, 'categories', $categories,  'categoriesAll', $categoriesAll));
    }

    public function company(Request $request, $id)
    {
        $cities = \App\City::get()->pluck('name', 'id');
        $categories = \App\Category::get()->pluck('name', 'id');
        $categoriesAll = \App\Category::all();
        // $companies = \App\Company::where('');
        $company = \App\Company::find($id);

        return view('mainTable.company', compact('cities', $cities, 'categories', $categories,  'categoriesAll', $categoriesAll, 'company', $company));
    }

    public function show(Request $request, $id)
    {
        $cities = \App\City::get()->pluck('name', 'id');
        $categories = \App\Category::get()->pluck('name', 'id');
        $categoriesAll = \App\Category::all();
        $companies = \App\Company::filterByRequest($request)->paginate(9);
        $category = Category::find($id);

        return view('mainTable.category', compact('companies', $companies, 'cities', $cities, 'categories', $categories,  'categoriesAll', $categoriesAll, 'category', $category));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        //
    }
}