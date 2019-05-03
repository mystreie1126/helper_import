<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class stockController extends Controller
{
	public function check(){
		$arr = [];
		$updatedRecord = DB::connection('mysql4')->table('sm_updateStockRecord')->where('created_at','!=','2019-04-26 00:00:00')->get()->toArray();

		for($i = 0; $i < count($updatedRecord); $i++){

			$name = DB::connection('mysql3')->table('ps_product_lang')->where('id_product',$updatedRecord[$i]->id_product)->value('name');

			$sendQty = DB::connection('mysql3')->table('sm_replishment_history')->where('created_at','>=',$updatedRecord[$i]->created_at)->where('shop_product_id',$updatedRecord[$i]->id_product)->sum('quantity');

			$currentQty = DB::connection('mysql3')->table('ps_stock_available')->where('id_stock_available',$updatedRecord[$i]->stock_id)->value('quantity');
			 $arr[]=[
			 		    'name'=>$name,
			 	    'barcode' =>$updatedRecord[$i]->reference,
			 	 'updated_qty'=>$updatedRecord[$i]->updated_qty,
			    'updated_time'=>$updatedRecord[$i]->created_at,
			 	    'send_qty'=>$sendQty,
			     'current_qty'=>$currentQty,
			  ];
		}

		return response()->json($arr);

	}
}
