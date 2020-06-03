$(document).ready(function() {
var xin_table = $('#xin_table').dataTable({
	"bDestroy": true,
	"ajax": {
		url : site_url+"payroll/payment_history_list/",
		type : 'GET'
	},
	dom: 'lBfrtip',
		"buttons": [{
			extend: 'csv',
			exportOptions: {
				columns: [ 1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14]
			}
		}, {
			extend: 'excel',
			exportOptions: {
				columns: [ 1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14]
			}
		}, {
			extend: 'pdfHtml5',
			exportOptions: {
				columns: [ 1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14]
			}
		},], // colvis > if needed
	"fnDrawCallback": function(settings){

		if( settings.json ){

			$( "#totalAmountNomina" ).html( settings.json.p_amount );
		}
		$('[data-toggle="tooltip"]').tooltip();          
	}
});

$('.fecha_inicial').datepicker({
changeMonth: true,
changeYear: true,
maxDate: '0',
dateFormat:'yy-mm-dd',
altField: "#date_format",
altFormat: js_date_format,
yearRange: '1970:' + new Date().getFullYear(),
beforeShow: function(input) {
	$(input).datepicker("widget").show();
}

});

$('.fecha_final').datepicker({
changeMonth: true,
changeYear: true,
maxDate: '0',
dateFormat:'yy-mm-dd',
altField: "#date_format",
altFormat: js_date_format,
yearRange: '1970:' + new Date().getFullYear(),
beforeShow: function(input) {
	$(input).datepicker("widget").show();
}

});

$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
$('[data-plugin="select_hrm"]').select2({ width:'100%' }); 	
jQuery("#aj_company").change(function(){
	jQuery.get(escapeHtmlSecure(base_url+"/get_company_plocations/"+jQuery(this).val()), function(data, status){
		jQuery('#location_ajax').html(data);
	});
});
$("#ihr_report").submit(function(e){
	
	e.preventDefault();

	var xin_table2 = $('#xin_table').dataTable({
	"bDestroy": true,
	"ajax": {
		url : site_url+"payroll/payment_history_list/?ihr=true&company_id="+$('#aj_company').val()+"&location_id="+$('#aj_location_id').val()+"&department_id="+$('#aj_subdepartments').val()+"&salary_month="+$('#salary_month').val()+"&"+$( "#fecha_inicial" ).serialize()+"&"+$( "#fecha_final" ).serialize(),
		type : 'GET'
	},
	dom: 'lBfrtip',
	"buttons": [{
	extend: 'csv',
	exportOptions: {
	columns: [ 1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14]
	}
	}, {
	extend: 'excel',
	exportOptions: {
	columns: [ 1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14]
	}
	}, {
	extend: 'pdfHtml5',
	exportOptions: {
	columns: [ 1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14]
	}
	},], // colvis > if needed
	"fnDrawCallback": function(settings){

		if( settings.json ){

			$( "#totalAmountNomina" ).html( settings.json.p_amount );
		}
		$('[data-toggle="tooltip"]').tooltip();          
	}
	});
	xin_table2.api().ajax.reload(function(){ }, true);
});
// Month & Year
$('.month_year').datepicker({
changeMonth: true,
changeYear: true,
showButtonPanel: true,
dateFormat:'yy-mm',
yearRange: '1970:' + new Date().getFullYear(),
beforeShow: function(input) {
$(input).datepicker("widget").addClass('hide-calendar');
},
onClose: function(dateText, inst) {
var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
$(this).datepicker('setDate', new Date(year, month, 1));
$(this).datepicker('widget').removeClass('hide-calendar');
$(this).datepicker('widget').hide();
}

});
// detail modal data
$('.detail_modal_data').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var employee_id = button.data('employee_id');
	var pay_id = button.data('pay_id');
	var modal = $(this);
	$.ajax({
		url: site_url+'payroll/make_payment_view/',
		type: "GET",
		data: 'jd=1&is_ajax=11&mode=modal&data=pay_payment&type=pay_payment&emp_id='+employee_id+'&pay_id='+pay_id,
		success: function (response) {
			if(response) {
				$("#ajax_modal_details").html(response);
			}
		}
	});
});
});