<?php
// memanggil file config.php
require '../config-tns.php';

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
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
$table = 'TN_BLOCK_INFO';

// Table's primary key
$primaryKey = 'REGIONAL';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names
$columns = array(
	array( 'db' => 'REGIONAL',		'dt' => 0 ),
	array( 'db' => 'WITEL',			'dt' => 1 ),
	array( 'db' => 'DATEL',			'dt' => 2 ),
	array( 'db' => 'A_STO',			'dt' => 3 ),
	array( 'db' => 'STO_NAME',		'dt' => 4 ),
	array( 'db' => 'SWITCH_ID',		'dt' => 5 ),
	array( 'db' => 'SPECIFICATION',	'dt' => 6 ),
	array( 'db' => 'DESCRIPTION',	'dt' => 7 ),
	array( 'db' => 'VENDOR',		'dt' => 8 ),
	array( 'db' => 'NAME',			'dt' => 9 ),
	array( 'db' => 'ADD1',			'dt' => 10 ),
	array( 'db' => 'ADD2',			'dt' => 11),
	array( 'db' => 'ADD3',			'dt' => 12),
	array( 'db' => 'ADD4',			'dt' => 13),
	array( 'db' => 'ADD5',			'dt' => 14),
	array( 'db' => 'ADD6',			'dt' => 15),
	array( 'db' => 'ADD7',			'dt' => 16),
	array( 'db' => 'ADD8',			'dt' => 17),
	array( 'db' => 'ADD9',			'dt' => 18),
	array( 'db' => 'TNBLOCKID',		'dt' => 19),
	array( 'db' => 'START_RANGE',	'dt' => 20),
	array( 'db' => 'END_RANGE',		'dt' => 21),
	array( 'db' => 'DESCRIPTION2',	'dt' => 22),
	array( 'db' => 'AREA_CODE',		'dt' => 23),
	array( 'db' => 'DN_SET',		'dt' => 24),
	array( 'db' => 'REGION',		'dt' => 25),
	array( 'db' => 'TOTAL',			'dt' => 26),
	array( 'db' => 'AVAILABLE',		'dt' => 27),
	array( 'db' => 'UNAVAILABLE',	'dt' => 28),
	array( 'db' => 'RESERVATION',	'dt' => 29),
	array( 'db' => 'USED',			'dt' => 30),
	array( 'db' => 'TRANSITIONAL',	'dt' => 31)
);

// SQL server connection information
$sql_details = array(
	'tns' => $tns,
	'user' => $dbuser,
	'pass' => $dbpass
	// 'db'   => $dbname,
	// 'host' => $dbhost
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

$where = array();

for ($i = 0; $i < count($columns); $i++) { 
	if(isset($_GET[ $columns[$i]['db'] ])){
		if($_GET[ $columns[$i]['db'] ] != "")
			$where[] = $columns[$i]['db']. "='". $_GET[ $columns[$i]['db'] ]."'";
	}
}

// foreach ($_GET as $key => $value) {
// 	if(!empty($_GET[$key])){
// 		$where[] = "$key = '$value'";
// 	}
// }

 // $where = ["ODP_NAME = 'ODP-KDI-FP/16 FP/D05/16.01'", "PANEL = 'ODP-KDI-FP/16 FP/D05/16.01-FR_1660594-PANEL'"];

echo json_encode( 
	SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, "",$where)
); 