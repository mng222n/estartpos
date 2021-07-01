<?php

/* ----------------------------------ITEMS-------------------------------------*/
//Get all items
$app->get('/api/items', function () {
    echo Item::all()->toJson();
});

//Get all categories
$app->get('/api/categories', function() {
    echo Item::select('category')->groupBy('category')->get()->toJson();

});

//Get a specific item based on id
$app->get('/api/items/:item_id',  function($id) {
	try {
		echo Item::find($id)->toJson();
	} catch (Exception $e) {
		echo '{"error":{"text":'. 'Unable to get the web service. ' . $e->getMessage() .'}}';
	}
});

//Get a specific item based on name 
$app->get('/api/items/search/:query', function($query) {
	echo Item::where('name', '=', $query)->get()->toJson();
});

//Post to add a new item
$app->post('/api/items/add', function() use ($app) {
    try {
        $Item = new Item;

        $Item->name = $app->request()->post('name');
        $Item->phone = $app->request()->post('phone');
        $Item->email = $app->request()->post('email');

        if($Item->save()) {
            echo '{"message":"Successfully add new Item"}';
        } else {
             echo '{"message":"Failed to add new Item"}';
        }
    } catch (Exception $e) {
        echo '{"error":{"text":'. 'Unable to get the web service. ' . $e->getMessage() .'}}';
    }

});

$app->put('/api/items/update/:id', function($id) use ($app) {
    try {
        $Item = Item::find($id);

        $Item->name = $app->request()->post('name');
        $Item->phone = $app->request()->post('phone');
        $Item->email = $app->request()->post('email');

        if($Item->save()) {
            echo '{"message":"Successfully update Item info"}';
        } else {
             echo '{"message":"Failed update Item info"}';
        }   
    } catch (Exception $e) {
        echo '{"error":{"text":'. 'Unable to get the web service. ' . $e->getMessage() .'}}';
    }
    
});

$app->delete('/api/items/:id', function($id) {
	$Item = Item::find($id);
	
    if($Item->delete()) {
        echo '{"message":"Successfully delete Item"}';
    } else {
         echo '{"message":"Failed to delete Item"}';
    }
});

/*-----------------------------------CUSTOMERS---------------------------------*/
//Get all customers
$app->get('/api/customers', function () {
    echo Customer::join('people','people.person_id', '=', 'customers.person_id')
    //->select('people.*')
    ->get()->toJson();
});

/*-----------------------------------ITEM KITS---------------------------------*/
$app->get('/api/itemkits', function () {
    echo ItemKit::all()->toJson();
});

/*-----------------------------------SALES-------------------------------------*/
$app->get('/api/sales', function () {
    echo Sale::all()->toJson();
});

/*-----------------------------------SALE ITEMS--------------------------------*/
$app->get('/api/salesitems', function () {
    echo SalesItem::all()->toJson();
});

/*-----------------------------------EMPLOYEES---------------------------------*/
$app->get('/api/employees', function () {
    echo Employee::join('people','people.person_id', '=', 'employees.person_id')
    ->get()->toJson();
});