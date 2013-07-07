		$(document).on("pageshow", function(e) {

			$("#autocomplete").autocomplete({
				target: $('#resultados'),
				source: '/estados/live_search',
				link: '#',
				minLength: 1,
                                termParam: 'termo',
                                callback: function(e) {
					var $a = $(e.currentTarget);
					$('#estado_id').val($a.data('autocomplete').id);
					$('#autocomplete').val($a.data('autocomplete').nome + '/' + $a.data('autocomplete').sigla);
					$("#autocomplete").autocomplete('clear');
				}
			});
		});