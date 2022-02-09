<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;

    }

    public function myStore($request){

        $this->model->main_category_id = $request->main_category;
        $this->model->name = $request->sub_category;
        $this->model->save();
    }

    public function myUpdate($request,$id){
        $category = $this->model;
        $category->find($id);
        $category->main_category_id = $request->main_category;
        $category->name = $request->sub_category;
        $category->save();
    }



}
