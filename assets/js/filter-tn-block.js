$("#btn-search").click(function(){
    var REGIONAL = $('#regional').val();
	var WITEL 	= $('#witel').val();

	$("#example1").DataTable().destroy();

	$(document).ready(function(){
		$("#example1").DataTable({
			"processing" : true,
			"serverSide" : true,
			oLanguage: {
				sProcessing: "<img id='min' src='ajax-loader.gif'>"
			},
			"ajax" : {
				"url"	: 'library/filter-tn-block.php',
				"data"	: {
					REGIONAL: REGIONAL, WITEL: WITEL
				}
			}
		});
		$("#example1").closest("div .col-sm-12").css("overflow-x", "auto");
	});
});