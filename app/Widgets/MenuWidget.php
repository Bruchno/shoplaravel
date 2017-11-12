<?php

namespace App\Widgets;
use App\Widgets\Contract\ContractWidget;
use App\Models\Category;
class MenuWidget implements ContractWidget 
{
    protected $format = '';
    public function __construct($data = []){
    if (isset($data['format'])){
        $this->format = $data['format'];
    } 
 } 
      public function execute(){
       $data = Category::all();
       if($this->format == '' || $this->format == 'sidebar_list')
       {
            return view('Widgets::menu', ['data' => $data]);
       }
       else {
           return view('Widgets::menubar', ['data' => $data]);
       }
     }
}
