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
		<h1>Data Table TN-BLOCK</h1>

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
		            <label for="regional">REGIONAL</label>
		            <select class="form-control" id="regional" style="width: 90%">
		                <option value="">All</option>
		                <?php
							$object = new ModelData;

						    $filterReg = $object->getFilter("REGIONAL", "tn_block_info");
			                foreach ($filterReg as $mfilterReg => $v) { 
			                    echo "<option>". $v[0]. "</option>";
			                }
		                ?>
		            </select>
	            </div>

	            <div class="form-group">
					<label for="witel">WITEL</label>
					<select class="form-control" id="witel" style="width: 90%">
		                <option value="">All</option>
		                <?php
		                	$filterWit = $object->getFilter("WITEL", "tn_block_info");
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
				<th>REGIONAL</th>
				<th>WITEL</th>
				<th>DATEL</th>
				<th>a.STO</th>
				<th>STO_NAME</th>
				<th>SWITCH_ID</th>
				<th>SPECIFICATION</th>
				<th>DESCRIPTION</th>
				<th>VENDOR</th>
				<th>NAME</th>
				<th>ADD1</th>
				<th>ADD2</th>
				<th>ADD3</th>
				<th>ADD4</th>
				<th>ADD5</th>
				<th>ADD6</th>
				<th>ADD7</th>
				<th>ADD8</th>
				<th>ADD9</th>
				<th>TNBLOCKID</th>
				<th>START_RANGE</th>
				<th>END_RANGE</th>
				<th>DESCRIPTION</th>
				<th>AREA_CODE</th>
				<th>DN_SET</th>
				<th>REGION</th>
				<th>TOTAL</th>
				<th>AVAILABLE</th>
				<th>UNAVAILABLE</th>
				<th>RESERVATION</th>
				<th>USED</th>
				<th>TRANSITIONAL</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
				<th>REGONAL</th>
				<th>WITEL</th>
				<th>DATEL</th>
				<th>a.STO</th>
				<th>STO_NAME</th>
				<th>SWITCH_ID</th>
				<th>SPECIFICATION</th>
				<th>DESCRIPTION</th>
				<th>VENDOR</th>
				<th>NAME</th>
				<th>ADD1</th>
				<th>ADD2</th>
				<th>ADD3</th>
				<th>ADD4</th>
				<th>ADD5</th>
				<th>ADD6</th>
				<th>ADD7</th>
				<th>ADD8</th>
				<th>ADD9</th>
				<th>TNBLOCKID</th>
				<th>START_RANGE</th>
				<th>END_RANGE</th>
				<th>DESCRIPTION</th>
				<th>AREA_CODE</th>
				<th>DN_SET</th>
				<th>REGION</th>
				<th>TOTAL</th>
				<th>AVAILABLE</th>
				<th>UNAVAILABLE</th>
				<th>RESERVATION</th>
				<th>USED</th>
				<th>TRANSITIONAL</th>
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
			"ajax": "library/load-data-tn-block.php",
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
<script type="text/javascript" src="assets/js/filter-tn-block.js"></script>
</body>
</html>