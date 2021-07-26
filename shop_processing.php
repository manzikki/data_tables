<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'petshop';
 
// Table's primary key
$primaryKey = 'prodid';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'prodname', 'dt' => 0 ),
    array( 'db' => 'brand',  'dt' => 1 ),
    array( 'db' => 'url',   'dt' => 2, 'formatter' => function( $d, $row ) { return "<a href=".$row[2].">URL</a>"; }  ), 
    array( 'db' => 'image',   'dt' => 3, 'formatter' => function( $d, $row ) { return "<a href=".$row[3].">Photo</a>"; }  ),
    array( 'db' => 'price',   'dt' => 4 ),
);

// SQL server connection information
$sql_details = array(
    'user' => 'petshop',
    'pass' => 'petshop',
    'db'   => 'petshop',
    'host' => 'localhost'
//    'charset' => 'utf8'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
