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
		<h1>Data Table ODP Compliance</h1>

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
					<label for="witel">WITEL</label>
					<select class="form-control" id="witel" style="width: 90%">
						<option value="">All</option>
						<?php
							$object = new ModelData; 

							$filterWit = $object->getFilter("WITEL", "ODP_COMPLIANCE");
							foreach ($filterWit as $mfilterWit => $v) { 
								echo "<option>". $v[0]. "</option>";
							} 
						?>
					</select>
	            </div>

	            <div class="form-group">
		            <label for="f_coor">F_COOR</label>
		            <select class="form-control" id="f_coor" style="width: 90%">
		                <option value="">All</option>
		                <?php
		                	$filterWit = $object->getFilter("F_COOR", "ODP_COMPLIANCE");
		                	foreach ($filterWit as $mfilterWit => $v) { 
		                    	echo "<option>". $v[0]. "</option>";
		                	} 
		                ?>
		            </select>
	            </div>

	            <div class="form-group">
		            <label for="f_loc">F_LOC</label>
		            <select class="form-control" id="f_loc" style="width: 90%">
		                <option value="">All</option>
		                <?php
		                	$filterWit = $object->getFilter("F_LOC", "ODP_COMPLIANCE");
		                	foreach ($filterWit as $mfilterWit => $v) { 
		                    	echo "<option>". $v[0]. "</option>";
		                	}
	                	?>
		              </select>
	            </div>

	            <div class="form-group">
		            <label for="f_olt">F_OLT</label>
		            <select class="form-control" id="f_olt" style="width: 90%">
		                <option value="">All</option>
		                <?php
		            	    $filterWit = $object->getFilter("F_OLT", "ODP_COMPLIANCE");
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
				<th>REG</th>
				<th>WITEL</th>
				<th>STO</th>
				<th>PD_NAME</th>
				<th>ODP_NAME</th>
				<th>ODP_INDEX</th>
				<th>F_COOR</th>
				<th>F_LOC</th>
				<th>F_OLT</th>
				<th>LATITUDE</th>
				<th>LONGITUDE</th>
				<th>IS_AVAI</th>
				<th>IS_BLOCKING</th>
				<th>IS_OTHERS</th>
				<th>IS_RESERV</th>
				<th>IS_SERVICE</th>
				<th>IS_TOTAL</th>
				<th>UPDATEDATE</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
				<th>REG</th>
				<th>WITEL</th>
				<th>STO</th>
				<th>PD_NAME</th>
				<th>ODP_NAME</th>
				<th>ODP_INDEX</th>
				<th>F_COOR</th>
				<th>F_LOC</th>
				<th>F_OLT</th>
				<th>LATITUDE</th>
				<th>LONGITUDE</th>
				<th>IS_AVAI</th>
				<th>IS_BLOCKING</th>
				<th>IS_OTHERS</th>
				<th>IS_RESERV</th>
				<th>IS_SERVICE</th>
				<th>IS_TOTAL</th>
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
			"ajax": "library/load-data-odp.php",
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
<script type="text/javascript" src="assets/js/filter-odp.js"></script>
</body>
</html>