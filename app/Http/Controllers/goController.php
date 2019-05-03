<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class goController extends Controller
{
    public function get_query(Request $request){

    	$result = DB::table('ps_category_product as a')->select('a.id_product','b.reference','c.name','d.id_image')
    	->join('ps_product as b','a.id_product','b.id_product')
    	->join('ps_product_lang as c','a.id_product','c.id_product')
    	->join('ps_image as d','d.id_product','a.id_product')
    	->groupBy('a.id_product')
    	->where('a.id_category',$request->cata_id)->get();

    	return $result;

	}

	public function updateRef(Request $request){


		$query = DB::connection('mysql2')->table('ps_product')
		->where('reference','like','%'.$request->old_ref.'%')
		->get();

		return $query;


	}

	public function upadteStock(){
		$query = DB::connection('mysql3')->table('sm_replishment_history')
		->where('send',0)->get();

		$arr = [];
		for($i = 0; $i < $query->count(); $i++){
			$a = DB::connection('mysql3')->table('ps_stock_available')->where('id_product',$query[$i]->shop_product_id)->increment('quantity',$query[$i]->quantity);


		}

		return $query;
		return $arr;
 	}


 	public function xiaomi(Request $request){

 	}

}
