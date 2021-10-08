<script>
	$('.carditem-content').mouseenter(function () {
		$(this).find('.carditem-content-blur').animate({ opacity: 1 }, 100);
		$(this).find('.carditem-content-title').animate({
			top: 120,
			opacity: 1
		}, 150);
	});

	$('.carditem-content').mouseleave(function () {
		$(this).find(".carditem-content-blur").finish();
		$(this).find(".carditem-content-title").finish();
		$(this).find('.carditem-content-blur').animate({ opacity: 0 }, 100);
		$(this).find('.carditem-content-title').animate({
			top: 50,
			opacity: 0
		}, 150);
	});
</script>
