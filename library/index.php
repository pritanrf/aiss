<html>
<head>
	<title>Datatable Server Side</title>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
</head>
<body>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ODP_ID</th>
                <th>ODP_NAME</th>
                <th>PANEL</th>
                <th>PORT</th>
                <th>OLT</th>
                <th>OLT_MODUL</th>
                <th>OLT_PORT</th>
                <th>CONNECT2OLT</th>
                <th>NOTCONNECT2OLT</th>
                <th>UPDATEDATE</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ODP_ID</th>
                <th>ODP_NAME</th>
                <th>PANEL</th>
                <th>PORT</th>
                <th>OLT</th>
                <th>OLT_MODUL</th>
                <th>OLT_PORT</th>
                <th>CONNECT2OLT</th>
                <th>NOTCONNECT2OLT</th>
                <th>UPDATEDATE</th>
            </tr>
        </tfoot>
    </table>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script>
    $(document).ready(function() {
	   $('#example').DataTable( {
	        "processing": true,
	        "serverSide": true,
	        "ajax": "load-data.php",
	    } );
	} );
	</script>
</body>
</html>