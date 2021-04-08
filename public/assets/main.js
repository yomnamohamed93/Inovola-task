(function(fn) {
	'use strict';
	fn(window.jQuery, window, document);
}(function($, window, document) {
	'use strict';

	$(function() {
		$('#sorting').on('change', function(event) {
			event.preventDefault();
             let sorting_val=$(this).val();
            if(sorting_val!==""){
                let sorting_val_arr=sorting_val.split("-");
                let sorting_key=sorting_val_arr[0];
                let sorting_type=sorting_val_arr[1];
                $.ajax({
                    type: "GET",
                    url: BASE_URL + '/sort_news',
                    data: {
                        "_token": $('#token').val(),
                        'sorting_key': sorting_key,
                        "sorting_type": sorting_type
                    },
                    success: function(data) {
                       $("#news-wrapper").html(data);
                    }
                });

            }
			// call sortDesc() or sortAsc() or whathaveyou...
		});
	});
}));
