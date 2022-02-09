<?php

namespace App\Http\Controllers\admin;

use App\Enums\MainCategory;
use App\Http\Controllers\Controller;
use App\Interfaces\ICategoryRepository;
use App\Models\Category;
use Error;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(ICategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $data["main_category"] = MainCategory::asSelectArray();
        $data["sub_category"] = $this->categoryRepo->myGet();
       // $data["sub_category"] = Category::get();
        return view('layouts/admin_view/home',$data);
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
        // $category = new Category();
        $category = $this->categoryRepo->myStore($request);
        flash('Successfully store')->success();
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data['category_edit'] = Category::find($id);
        $data['category_edit'] = $this->categoryRepo->myFind($id);
        $data['main_category'] = MainCategory::asSelectArray();
        return view('layouts/admin_view/category_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $category = Category::find($id);
        // $category->main_category_id = $request->main_category;
        // $category->name = $request->sub_category;
        // $category->save();
        $this->categoryRepo->myUpdate($request,$id);
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->categoryRepo->myDelete($id);
        flash('Deleted')->warning();
        return redirect('/admin/categories');

    }
}
