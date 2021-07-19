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
$table = 'hotels2';
 
// Table's primary key
$primaryKey = 'hotel_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'hotel_name', 'dt' => 0 ),
    array( 'db' => 'accommodation_type',  'dt' => 1 ),
    array( 'db' => 'city',   'dt' => 2 ),
    array( 'db' => 'country',   'dt' => 3 ),
    array( 'db' => 'star_rating',   'dt' => 4 ),
    array( 'db' => 'rating_average',     'dt' => 5),
    array( 'db' => 'rates_from',     'dt' => 6),
    array( 'db' => 'url', 'dt' => 7, 'formatter' => function( $d, $row ) { return "<a href=".$row[7].">Book</a>"; }  ),
    array( 'db' => 'photo1', 'dt' => 8, 'formatter' => function( $d, $row ) { return "<a href=".$row[8].">Photo</a>"; }  )
);

// SQL server connection information
$sql_details = array(
    'user' => 'hotels',
    'pass' => 'hotels',
    'db'   => 'hotels',
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
