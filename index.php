<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'ModelData.php'; 
		include 'tag-head.php'; 
	?>	
</head>
<body>
	<div class="container">
		<h1>Data Table ODP E2E</h1>

		<button class="btn btn-primary" data-toggle="modal" data-target="#lab-slide-bottom-popup">Open Modal</button>
		<div class="modal fade" id="lab-slide-bottom-popup" data-keyboard="false" data-backdrop="false">
			<div class="lab-modal-body">
				<button type="button" class="close" data-dismiss="modal" id="close-modal-menu"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

				<?php include 'menu.php'; ?>

			</div>
		</div>

		<div class="row" style="margin:0px 0px; padding:15px 20px;">
			<form class="form-inline">
	            <div class="form-group" style="margin-right: 10px;">
	            	<label for="odp_name">CONNECT2OLT</label>
	            	<select class="form-control" id="connect2olt" style="width: 90%;">
		                <option value="">All</option>
		                <?php
		                	$object = new ModelData;

							$filterReg = $object->getFilter("CONNECT2OLT", "ODP_E2E");
							foreach ($filterReg as $mfilterReg => $v) { 
						    	echo "<option>". $v[0]. "</option>";
		                	} 
		                ?>
		            </select>
		        </div>

		        <div class="form-group">
					<label for="panel">NOTCONNECT2OLT</label>
					<select class="form-control" id="notconnect2olt" style="width: 90%">
						<option value="">All</option>
						<?php
							$filterWit = $object->getFilter("NOTCONNECT2OLT", "ODP_E2E");
							foreach ($filterWit as $mfilterWit => $v) { 
								echo "<option>". $v[0]. "</option>";
							} 
						?>
					</select>
	            </div>

	            <div class="form-group">
					<button type="button" class="btn btn-primary" id='btn-search' style="margin-top: 15px"><i class="fa fa-search"></i></button>
	            </div>
            </form>
        </div>

		<table id="example1" class="table table-bordered table-hover">
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
	</div>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

<!-- DataTables -->
<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.js"></script>

<script >
	$(document).ready(function() {
	    $('.lab-slide-up').find('a').attr('data-toggle', 'modal');
	    $('.lab-slide-up').find('a').attr('data-target', '#lab-slide-bottom-popup');

		$('#example1').DataTable( {
			"processing": true,
			"serverSide": true,
			oLanguage: {
				sProcessing: "<img id='min' src='ajax-loader.gif'>"
			},
			"ajax": "library/load-data-e2e.php",
		} );
		$("#example1").closest("div .col-sm-12").css("overflow-x", "auto");
	});

	var modal = document.getElementById('lab-slide-bottom-popup');
	window.onclick = function(event) {
	    if (event.target == modal) {
			$("#close-modal-menu").click();
	    	//modal.style.display = "none";
	    }
	}
</script>
<script type="text/javascript" src="assets/js/filter-e2e.js"></script>
</body>
</html>