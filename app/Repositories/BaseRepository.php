<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepositories;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepositories
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function myGet()
    {
        return $this->model->get();
    }

    public function myFind($id)
    {
        return $this->model->find($id);

    }
    public function myDelete($id)
    {
        $data = $this->model->find($id);
        if(!$data)
        {
            flash('data not found')->warning();
        }
        else{
            return $data->delete();
        }
        
    }
    

    
}
