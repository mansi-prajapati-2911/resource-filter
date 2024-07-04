<?php

function theme_scripts_styles()
{
	wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"', [], '5.2.3');
	wp_enqueue_style('custom-css', plugins_url('../assets/css/style.css', __FILE__), [], '1.0');

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1', false);
	wp_enqueue_script('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', ['jquery'], '5.2.3', true);
	wp_enqueue_script('custom-js', plugins_url('../assets/js/custom.js', __FILE__), ['jquery'], '1.0', true);
	wp_localize_script('custom-js', 'localize_data', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'theme_scripts_styles');


/* Resource Rendering Functions */
function renderResourceHtml($resourceTypeFilter = null, $resourceTopicFilter = null)
{

	$args = [
		'post_type'        => 'resource',
		'posts_per_page'   => -1,
		'post_status'      => 'publish',
		'orderby' => 'title',
		'order' => 'ASC',
	];

	$taxQuery = [];
	if (!empty($resourceTypeFilter)) {
		$taxQuery[] = [
			'taxonomy' => 'resource_type',
			'field'    => 'slug',
			'terms'    => $resourceTypeFilter,
			'operator' => 'AND'
		];
	}

	if (!empty($resourceTopicFilter)) {
		$taxQuery[] = [
			'taxonomy' => 'resource_topic',
			'field'    => 'slug',
			'terms'    => $resourceTopicFilter,
			'operator' => 'AND'
		];
	}

	if ($taxQuery && count($taxQuery) > 0) {
		$args['tax_query'] = $taxQuery;
	}

	$resourceQuery = new WP_Query($args);
	ob_start();
	if ($resourceQuery->have_posts()) {
		if ($resourceQuery->posts && is_array($resourceQuery->posts) && count($resourceQuery->posts) > 0) :
			foreach ($resourceQuery->posts as $posts) : ?>
				<div class="col-lg-4 col-md-6 ajax-remove-reosurceBlocks__cards">
					<div class="reosurceBlocks__cards">
						<a href="<?php echo get_permalink($posts->ID); ?>">
							<div class="resourceBlocks__cards__image">
								<?php if (get_the_post_thumbnail_url($posts->ID)) : ?>
									<img src="<?php echo get_the_post_thumbnail_url($posts->ID); ?>" alt="featured-image">
								<?php endif; ?>
							</div>
							<div class="resourceBlocks_cards_content">
								<h3><?php echo get_the_title($posts->ID); ?></h3>
								<span>
									<?php
									$terms = get_the_terms($posts->ID, 'resource_type');
									if ($terms && !is_wp_error($terms)) :
										$terms_list = [];
										foreach ($terms as $term) {
											$terms_list[] = $term->name;
										}
										echo implode(', ', $terms_list);
									endif;
									?>
								</span>
								<span>
									<?php
									$terms = get_the_terms($posts->ID, 'resource_topic');
									if ($terms && !is_wp_error($terms)) :
										$terms_list = [];
										foreach ($terms as $term) {
											$terms_list[] = $term->name;
										}
										echo implode(', ', $terms_list);
									endif;
									?>
								</span>
							</div>
						</a>
					</div>
				</div>
<?php
			endforeach;
		endif;
		echo '<div class="col-12 ajax-loader" style="display: none; position:relative; text-align: center; margin: 5rem 0 1rem;"><div class="loader">Loading...</div></div>';
		wp_reset_postdata();
	} else {
		echo '<div class="col-12 ajax-loader" style="display: none; position:relative; text-align: center; margin: 5rem 0 1rem;"><div class="loader">Loading...</div></div>';
		echo '<h3 class="resource-no-found" style=" text-align:center; padding: 150px 0;">No Resource Found.</h3>';
	}
	$data = ob_get_clean();
	return $data;
}

/**
 * Resource Post Pagination
 */
function resource_pagination()
{
	$resourceTypeFilter = (isset($_POST["resourceTypeFilter"])) ? $_POST["resourceTypeFilter"] : null;
	$resourceTopicFilter = (isset($_POST["resourceTopicFilter"])) ? $_POST["resourceTopicFilter"] : null;
	$data         = renderResourceHtml($resourceTypeFilter,  $resourceTopicFilter);
	echo json_encode(array('resourceHtml' => $data));
	die();
}

add_action('wp_ajax_nopriv_resource_pagination', 'resource_pagination');
add_action('wp_ajax_resource_pagination', 'resource_pagination');
