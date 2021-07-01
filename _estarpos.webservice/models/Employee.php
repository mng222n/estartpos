<?php

class Employee extends \Illuminate\Database\Eloquent\Model  {

    public function people() {
    	return $this->hasOne('People');
    }
}