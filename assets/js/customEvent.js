$(document).ready(function(){

	$(document).on('click' , '.bn-home' ,function(){
	  $("#home-modal").modal('show');			
	});

	$(document).on('click' , '.bn-edit' ,function(){
			var id = this.id;
			$.ajax({
				url: 'read.php',
				type: 'POST',
				dataType: 'JSON',
				data: {"id":id,"type":"single"},
				success:function(response){
					$("#edit-modal").modal('show');
					$('#specie_name').val(response.specie_name);
					$('#gender').val(response.gender);
					$('#color').val(response.color);
					$("#weight").val(response.weight);
					$("#id").val(id);
				}
			});
		});
	
	
	$(document).on('click' , '#update' ,function(){
			$.ajax({
					url: 'edit.php',
					type: 'POST',
					dataType: 'JSON',
					data: $("#frmEdit").serialize(),
					success:function(response){
						$("#messageModal").modal('show');
						$("#msg").html(response);
						$("#edit-modal").modal('hide');
						loadData();
					}
				});
		});
	
	$(document).on('click' , '.bn-delete' ,function(){
		if(confirm("Are you sure want to delete the record?")) {
			var id = this.id;
			$.ajax({
				url: 'delete.php',
				type: 'POST',
				dataType: 'JSON',
				data: {"id":id},
				success:function(response){
					loadData();
				}
			});
		}
	});
});
	
function loadData() {
	$.ajax({
		url: 'read.php',
		type: 'POST',
		data: {"type":"all"},
		success:function(response){
			$("#container").html(response);
		}
	});
}