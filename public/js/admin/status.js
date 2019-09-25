$(document).ready(function(){
	$('.btn-check').on('click', function(){
		var id = $(this).find('.valeur').attr('data-id');
		var valeur = $(this).find('.valeur').attr('data-valeur');
		var element  = $(this);

		$.ajax({
			url: "http://localhost:8000/status/change",
			type: 'get',
			data: {
				_id: id,
				current_val: valeur
			},
			success: function(reponse){
				console.log(reponse);
				if(reponse != null && reponse.cmd != undefined){
			
					element.parents().eq(1).find('i').each(function(){
						$(this).removeClass('fa-check-square');
						$(this).removeClass('fa-square');
						if($(this).attr('data-valeur') == reponse.cmd.status){
							$(this).addClass('fa-check-square');
						}else{
							$(this).addClass('fa-square');
						}
					});

					var nbr = element.parents().eq(3).attr('data-nbr');
					$('#cmd'+nbr+'').find('span').removeClass('label-warning label-info label-success');
					switch(reponse.cmd.status){
						case '0':
							
							$('#cmd'+nbr+'').find('span').addClass('label-warning').html('Non Traité');;
							
						break;
						case '1':
						
							$('#cmd'+nbr+'').find('span').addClass('label-info').html('Traité');
							
						break;
						case '2':
						
							$('#cmd'+nbr+'').find('span').addClass('label-success').html('Terminé');

						break;

					}
					
				}	
			},	
			error: function(error){
				console.log(error);
			},
			dataType: 'json'
		})
	})
})