<?php

class Customer extends \Illuminate\Database\Eloquent\Model  {

    public function people() {
    	return $this->hasOne('People');
    }
}