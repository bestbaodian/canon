<?php
namespace App\Http\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wenda
 * @package App\Http\Model
 */

class Wenda extends Model{
    //分页
    public function get_t_tw(){
        $pro=DB::table('t_tw')
            ->join('direction', function ($join) {
                $join->on('direction.d_id', '=', 't_tw.d_id');
            })
            ->join('users', function ($join) {
                $join->on('users.user_id', '=', 't_tw.user_id');
            })
            ->simplePaginate(5);
//        $users = DB::table('t_tw')->distinct()->get();
//        $data['pro']=$pro;
//        $data['users']=$users;
        return $pro;
    }
    public function sels(){
        //$users = DB::table('t_tw')->distinct()->get();
        $users = DB::table('t_tw')
            ->join('direction', 't_tw.d_id', '=', 'dirction.d_id')
            ->join('users', 'users.user_id', '=', 't_tw.user_id')
            ->get();
        return $users;
    }
    //direction
    public function get_direction(){
        $pro=DB::table('direction')->get();
        return $pro;
    }
}
