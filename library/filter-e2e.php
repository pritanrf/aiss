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
$table = 'ODP_E2E';

// Table's primary key
$primaryKey = 'ODP_ID';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names
$columns = array(
	array( 'db' => 'ODP_ID', 'dt' => 0 ),
	array( 'db' => 'ODP_NAME',  'dt' => 1 ),
	array( 'db' => 'PANEL',  'dt' => 2 ),
	array( 'db' => 'PORT',  'dt' => 3 ),
	array( 'db' => 'OLT',  'dt' => 4 ),
	array( 'db' => 'OLT_MODUL',  'dt' => 5 ),
	array( 'db' => 'OLT_PORT',  'dt' => 6 ),
	array( 'db' => 'CONNECT2OLT',  'dt' => 7 ),
	array( 'db' => 'NOTCONNECT2OLT',  'dt' => 8 ),
	array( 'db' => 'UPDATEDATE',  'dt' => 9 )
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
			$where[] = $columns[$i]['db']. "=". $_GET[ $columns[$i]['db'] ];
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