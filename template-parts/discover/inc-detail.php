<div class="entry-post">
	<div class="left-box">
		<a href="#" class="history-back-discover">
			<i class="fa-solid fa-arrow-left-long"></i>
		</a>
	</div>

	<div class="right-box">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="entry-content">
            <div class="thumbnail-image">
                <?php the_post_thumbnail('full'); ?>
            </div>

            <div class="post-info">
                <div class="post-info__left">
                    <h1 class="title">
		                <?php the_title(); ?>
                    </h1>

                    <div class="desc">
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="post-info__right">
                    <a href="#" class="share-social">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>