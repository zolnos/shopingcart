<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	//
    public function logIt() {

        $log = new Selection();
        $log->product_id = $this->id;
        $log->save();

    }

}
