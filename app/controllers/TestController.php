<?php

class TestController extends \BaseController {

	public function __construct(){

	}
	public function testFunction(){
	
	
	$categories= Categories::all();

	
	$data[][]="";
	foreach ($categories as $category){
		$data[$category->id-1][0] = Books::select('book_id','title','author','description','category_id','added_at_timestamp')
			->where('category_id', '=',$category->id)
			->orderBy('added_at_timestamp')->count();
		$data[$category->id-1][1]=$category->category;
		$m=Books::select('added_at_timestamp')->where('category_id', '=',$category->id)->max('added_at_timestamp');
		
		$data[$category->id-1][2]=DB::select(DB::raw("select book_id FROM books WHERE added_at_timestamp='$m'"));
	}
	$j=json_encode($data);
		
	return $data;
	}

}
