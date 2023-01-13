<?php

get_header();

while ( have_posts() ) :
	the_post();
?>

	<!-- Content -->
	<article class="page">
		<h1 class="page__title"><?= the_title() ?></h1>
		<div class="page__content">
			<?= the_content() ?>
		</div>
	</article>
	
<?php
endwhile;

get_footer();
