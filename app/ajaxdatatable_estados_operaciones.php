<?php

$config=parse_ini_file('./configs/config.inc',true);
session_name($config['bd']['bd']);
session_start();

// DB table to use
$table = 'estados_operaciones';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'id', 'dt' => 0 ),
	array( 'db' => 'nombre', 'dt' => 1 ),
	array( 'db' => 'descripcion', 'dt' => 2 ),
	array( 'db' => 'creado', 'dt' => 3 ),
	array( 'db' => 'modificado', 'dt' => 4 ),
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