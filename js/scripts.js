$(document).ready(function(){
	$('.plantType').css({'height':parseInt($('.content').height()+25)+"px"})
})

$('.addType').on('click',function(){
	$('#addPlantType').show();
})
$('.plantNew').on('click',function(){
	$('body').find('#plantNewModal').show();
	$('#plantNewModal [name="Plant[slot_id]"]').val($(this).data('slotid'));
})


$('.close').on('click',function(){
	$(this).closest('.modal').hide();
})