<?php
$created    = "Created Successfully";
$updated    = "Updated Successfully";
$deleted    = "Deleted Successfully";
$fatch      =  "Data Fatched Successfully";
$list       = "List Of All ";
return [
    
    'user' => [
        'created'   => "User ".$created,
        'updated'   => "User ".$updated,
        'deleted'   => "User ".$deleted,
        'list'      =>  $list."Users",
        'single'    =>  "User ".$fatch,
    ],

    'car' => [
        'created'   => "Car ".$created,
        'updated'   => "Car ".$updated,
        'deleted'   => "Car ".$deleted,
        'list'      =>  $list."Cars",
        'single'    =>  "Car ".$fatch,
    ],

    'state' => [
        'created'   => "State ".$created,
        'updated'   => "State ".$updated,
        'deleted'   => "State ".$deleted,
        'list'      =>  $list."States",
        'single'    =>  "State ".$fatch,
    ],
];
