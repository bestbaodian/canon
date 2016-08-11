<?php

namespace App\Http\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    public function index()
    {
        return DB::table('shiti')->orderBy("click","desc")->limit(8)->get();
    }
}
