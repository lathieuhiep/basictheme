<div class="grid-discover__item grid-sizer">
	<figure class="thumbnail-image">
		<?php the_post_thumbnail('large'); ?>
	</figure>

	<h4 class="title">
		<?php the_title() ?>
	</h4>

	<?php if ( has_term('' , 'paint_discover_cat' ) ) : ?>
		<div class="meta">
			<?php the_terms( get_the_ID(), 'paint_discover_cat', '', ', ' ); ?>
		</div>
	<?php endif; ?>
</div>