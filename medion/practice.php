<?php
$fname=array("mohan","shantanu","chandu","mahesh");
$last=array(array(
    'id'=> '234',
    'fname'=>'kumar',
    'lname'=>'bhure',
),
array(
    'id' => '432',
    'fname' => 'suman',
    'lname' => 'vanke',
),
array(
    'id' => '332',
    'fname' => 'sharan',
    'lname' => 'dhummansure',
)
);
$last_name=array_column($last,'id');
print_r($last_name);

$a=array("name"=>'sharan',"fname"=>'Basavakiran',"lname"=>'Dhummansure');
print_r($a);





?>
