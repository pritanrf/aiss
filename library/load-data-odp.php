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
$table = 'ODP_COMPLIANCE';

// Table's primary key
$primaryKey = 'REG';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names
$columns = array(
	array( 'db' => 'REG',			'dt' => 0 ),
	array( 'db' => 'WITEL',			'dt' => 1 ),
	array( 'db' => 'STO',			'dt' => 2 ),
	array( 'db' => 'PD_NAME',		'dt' => 3 ),
	array( 'db' => 'ODP_NAME',		'dt' => 4 ),
	array( 'db' => 'ODP_INDEX',		'dt' => 5 ),
	array( 'db' => 'F_COOR',		'dt' => 6 ),
	array( 'db' => 'F_LOC',			'dt' => 7 ),
	array( 'db' => 'F_OLT',			'dt' => 8 ),
	array( 'db' => 'LATITUDE',		'dt' => 9 ),
	array( 'db' => 'LONGITUDE',		'dt' => 10 ),
	array( 'db' => 'IS_AVAI',		'dt' => 11),
	array( 'db' => 'IS_BLOCKING',	'dt' => 12),
	array( 'db' => 'IS_OTHERS',		'dt' => 13),
	array( 'db' => 'IS_RESERV',		'dt' => 14),
	array( 'db' => 'IS_SERVICE',	'dt' => 15),
	array( 'db' => 'IS_TOTAL',		'dt' => 16),
	array( 'db' => 'UPDATEDATE',	'dt' => 17)
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
// SSP::sql_connect($sql_details);
// echo "<pre>";
// print_r(
// SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
// );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
	// SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $whereResult="",$where)
); 