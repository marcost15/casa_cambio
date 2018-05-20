<?php

$config=parse_ini_file('./configs/config.inc',true);
session_name($config['bd']['bd']);
session_start();

// DB table to use
$table = 'cambio';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'id', 'dt' => 0 ),
	array( 'db' => 'moneda1_id', 'dt' => 1 ),
	array( 'db' => 'valor_moneda1', 'dt' => 2 ),
	array( 'db' => 'moneda2_id', 'dt' => 3 ),
	array( 'db' => 'valor_moneda2', 'dt' => 4 ),
	array( 'db' => 'operacion', 'dt' => 5 ),
	array( 'db' => 'creado', 'dt' => 6 ),
	array( 'db' => 'modificado', 'dt' => 7 ),
);

// SQL server connection information
$sql_details = array(
    'user' => $config['bd']['login'],
    'pass' => $config['bd']['clave'],
    'db'   => $config['bd']['bd'],
    'host' => $config['bd']['host']
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( './libs/datatables/scripts/ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
)
;