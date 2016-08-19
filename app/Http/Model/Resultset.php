<?php
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Resultset extends Model
{
	
		/** 
	 * 返回的错误码
	 **/
	public $code;
	
	/** 
	 * 返回的错误信息
	 **/
	public $msg;
}