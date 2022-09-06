<?php
/**
 * Declaring widgets
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add filter to the parameters passed to a widget's display callback.
 * The filter is evaluated on both the front and the back end!
 *
 * @link https://developer.wordpress.org/reference/hooks/dynamic_sidebar_params/
 */
add_filter( 'dynamic_sidebar_params', 'understrap_widget_classes' );

if ( ! function_exists( 'understrap_widget_classes' ) ) {

	/**
	 * Count number of visible widgets in a sidebar and add classes to widgets accordingly,
	 * so widgets can be displayed one, two, three or four per row.
	 *
	 * @global array $sidebars_widgets
	 *
	 * @param array $params {
	 *     Parameters passed to a widget’s display callback.
	 *
	 *     @type array $args  {
	 *         An array of widget display arguments.
	 *
	 *         @type string $name          Name of the sidebar the widget is assigned to.
	 *         @type string $id            ID of the sidebar the widget is assigned to.
	 *         @type string $description   The sidebar description.
	 *         @type string $class         CSS class applied to the sidebar container.
	 *         @type string $before_widget HTML markup to prepend to each widget in the sidebar.
	 *         @type string $after_widget  HTML markup to append to each widget in the sidebar.
	 *         @type string $before_title  HTML markup to prepend to the widget title when displayed.
	 *         @type string $after_title   HTML markup to append to the widget title when displayed.
	 *         @type string $widget_id     ID of the widget.
	 *         @type string $widget_name   Name of the widget.
	 *     }
	 *     @type array $widget_args {
	 *         An array of multi-widget arguments.
	 *
	 *         @type int $number Number increment used for multiples of the same widget.
	 *     }
	 * }
	 * @return array $params
	 */
	function understrap_widget_classes( $params ) {

		global $sidebars_widgets;

		/*
		 * When the corresponding filter is evaluated on the front end
		 * this takes into account that there might have been made other changes.
		 */
		$sidebars_widgets_count = apply_filters( 'sidebars_widgets', $sidebars_widgets );

		// Only apply changes if sidebar ID is set and the widget's classes depend on the number of widgets in the sidebar.
		if ( isset( $params[0]['id'] ) && strpos( $params[0]['before_widget'], 'dynamic-classes' ) ) {
			$sidebar_id   = $params[0]['id'];
			$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );

			$widget_classes = 'widget-count-' . $widget_count;
			if ( 0 === $widget_count % 4 || $widget_count > 6 ) {
				// Four widgets per row if there are exactly four or more than six widgets.
				$widget_classes .= ' col-md-3';
			} elseif ( 6 === $widget_count ) {
				// If exactly six widgets are published.
				$widget_classes .= ' col-md-2';
			} elseif ( $widget_count >= 3 ) {
				// Three widgets per row if there's three or more widgets.
				$widget_classes .= ' col-md-4';
			} elseif ( 2 === $widget_count ) {
				// If two widgets are published.
				$widget_classes .= ' col-md-6';
			} elseif ( 1 === $widget_count ) {
				// If just on widget is active.
				$widget_classes .= ' col-md-12';
			}

			// Replace the placeholder class 'dynamic-classes' with the classes stored in $widget_classes.
			$params[0]['before_widget'] = str_replace( 'dynamic-classes', $widget_classes, $params[0]['before_widget'] );
		}

		return $params;

	}
} // End of if function_exists( 'understrap_widget_classes' ).

add_action( 'widgets_init', 'understrap_widgets_init' );

if ( ! function_exists( 'understrap_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function understrap_widgets_init() {
		register_sidebar(
			array(
				'name'          => __( 'Right Sidebar', 'understrap' ),
				'id'            => 'right-sidebar',
				'description'   => __( 'Right sidebar widget area', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Left Sidebar', 'understrap' ),
				'id'            => 'left-sidebar',
				'description'   => __( 'Left sidebar widget area', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Hero Slider', 'understrap' ),
				'id'            => 'hero',
				'description'   => __( 'Hero slider area. Place two or more widgets here and they will slide!', 'understrap' ),
				'before_widget' => '<div class="carousel-item">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Hero Canvas', 'understrap' ),
				'id'            => 'herocanvas',
				'description'   => __( 'Full size canvas hero area for Bootstrap and other custom HTML markup', 'understrap' ),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Top Full', 'understrap' ),
				'id'            => 'statichero',
				'description'   => __( 'Full top widget with dynamic grid', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="static-hero-widget %2$s dynamic-classes">',
				'after_widget'  => '</div><!-- .static-hero-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Footer Full', 'understrap' ),
				'id'            => 'footerfull',
				'description'   => __( 'Full sized footer widget with dynamic grid', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Blog Sidebar', 'understrap' ),
				'id'            => 'blog-sidebar',
				'description'   => __( 'Blog sidebar widget area', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_widget( 'cbtu_recent_post_type' );
	}
} // End of function_exists( 'understrap_widgets_init' ).


if ( !class_exists( 'CBTU_Recent_Post_Type' ) ) {
	class CBTU_Recent_Post_Type extends WP_Widget {

		public function __construct() {
			$widget_ops = array(
			'classname' => 'cbtu-recent-post-type',
			'description' => 'Get recent custom posts',
			);
			parent::__construct( 'cbtu_recent_post_type', 'Recent Post Type', $widget_ops );
		}

		public function widget( $args, $instance ) {
			global $post;

			echo $args['before_widget'];
			if ( !empty($instance['title']) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
	
			echo get_field('title', 'widget_' . $args['widget_id']);

			// outputs the content of the widget
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			$widget_id = 'widget_' . $args['widget_id'];
	
			$post_type = get_field( 'widget_recent_posttype', $widget_id );
			$limit = get_field( 'widget_recent_posttype_limit', $widget_id ) ? get_field( 'widget_recent_posttype_limit', $widget_id ) : 3;
			$args = array(
				'post_type' 		=>	$post_type,
				'numberposts'		=>	$limit,
				'suppress_filters'	=>	false
			);
			$recent_posts = get_posts( $args );

			if ( $recent_posts ) :
				echo '<div class="recent-posts">';
				foreach ( $recent_posts as $post ) :
					setup_postdata( $post );
					?>
					<div class="recent-posts__block">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php echo get_the_permalink(); ?>" class="recent-posts__image">
                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_the_title(); ?>">
							</a>
						<?php endif; ?>
						<div class="recent-posts__info">
							<a href="<?php echo get_the_permalink(); ?>"><h5 class="recent-posts__title"><?php echo get_the_title(); ?></h5></a>
							<span class="recent-posts__date"><?php echo get_the_date( 'j F' ); ?></span>
						</div>
					</div>
			<?php	
				endforeach;
				wp_reset_postdata();
				echo '</div>';
			endif;

			echo $args['after_widget'];
		}
	
		public function form( $instance ) {
			if ( isset($instance['title']) ) {
				$title = $instance['title'];
			}
			?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	
			return $instance;
		}
	}
}

if ( !class_exists( 'CBTU_Popular_Categories' ) ) {
	class CBTU_Popular_Categories extends WP_Widget {

		public function __construct() {
			$widget_ops = array(
			'classname' => 'cbtu-popular-categories',
			'description' => 'Get popular categories',
			);
			parent::__construct( 'cbtu_popular_categories', 'Popular Categories', $widget_ops );
		}

		public function widget( $args, $instance ) {
			global $post;

			echo $args['before_widget'];
			if ( !empty($instance['title']) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
	
			echo get_field('title', 'widget_' . $args['widget_id']);

			// outputs the content of the widget
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			$widget_id = 'widget_' . $args['widget_id'];
	
			$limit = get_field( 'widget_pc_limit', $widget_id ) ? get_field( 'widget_pc_limit', $widget_id ) : 5;
			wp_list_categories('number='. $limit .'&show_count=1&orderby=count&order=DESC&title_li=');
			
			echo $args['after_widget'];
		}
	
		public function form( $instance ) {
			if ( isset($instance['title']) ) {
				$title = $instance['title'];
			}
			?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	
			return $instance;
		}
	}
}

add_action( 'widgets_init', 'cbtu_register_widgets' );
function cbtu_register_widgets() {
	register_widget( 'CBTU_Recent_Post_Type' );
	register_widget( 'CBTU_Popular_Categories' );
}