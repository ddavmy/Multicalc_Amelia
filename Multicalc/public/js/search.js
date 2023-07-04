$(document).ready(function() {
	$('#searchInput').keyup(function() {
		var searchText = $(this).val().toLowerCase();

		$.ajax({
			url: 'window.location.pathname',
			method: 'GET',

			success: function() {
				$('.tiles article').each(function() {
					var articleText = $(this).find('h2').text().toLowerCase();
					var parentArticle = $(this).closest('article');

					if (articleText.indexOf(searchText) === -1) {
						parentArticle.hide();
					} else {
						parentArticle.show();
					}
				});
			}
		});
	});
});