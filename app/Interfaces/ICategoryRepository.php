<?php

namespace App\Interfaces;

interface ICategoryRepository extends IBaseRepositories
{
    public function myStore($request);
    public function myUpdate($request,$id);
}
