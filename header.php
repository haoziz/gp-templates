<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title><?php echo gp_title(); ?></title>

	<?php
	// Enqueue the base style so we don't have to load it manually on each page.
	gp_enqueue_styles( 'gp-base' );

	gp_head();
	?>
	<?php
	/**
	 * Hook - zakra_action_head
	 *
	 * Functions hooked into zakra_action_head action
	 *
	 * @hooked zakra_head - 10
	 */
	do_action( 'zakra_action_head' );
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'no-js' ); ?>>
	<script type="text/javascript">document.body.className = document.body.className.replace('no-js','js');</script>
<!--
	<header class="gp-bar clearfix">
		<h1>
			<a href="<?php echo esc_url( gp_url( '/' ) ); ?>" rel="home">
				<?php
				/**
				 * Filter the main heading (H1) of a GlotPress page that links to the home page.
				 *
				 * @since 1.0.0
				 *
				 * @param string $title The text linking to home page.
				 */
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo apply_filters( 'gp_home_title', 'GlotPress' );
				?>
			</a>
		</h1>

		<nav id="main-navigation" role="navigation">
			<?php echo gp_nav_menu(); ?>
		</nav>

		<nav id="side-navigation">
			<?php echo gp_nav_menu( 'side' ); ?>
		</nav>
	</header>
-->

	<?php
	/**
	 * WordPress function to load custom scripts after body.
	 *
	 * Introduced in WordPress 5.2.0
	 *
	 * @since Zakra 1.2.3
	 */
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>

	<?php
	/**
	 * Hook - zakra_action_before
	 *
	 * @hooked zakra_page_start - 10
	 * @hooked zakra_skip_to_content - 15
	 */
	do_action( 'zakra_action_before' );
	?>

	<?php
	/**
	 * Hook - zakra_action_before_header
	 *
	 * @hooked zakra_header_start - 10
	 */
	do_action( 'zakra_action_before_header' );
	?>

	<?php
	/**
	 * Hook - zakra_action_header_top
	 *
	 * @hooked zakra_header_top - 10
	 */
	do_action( 'zakra_action_header_top' );
	?>

	<?php
	/**
	 * Hook - zakra_action_before_header_main
	 *
	 * @hooked zakra_before_header_main - 10
	 */
	do_action( 'zakra_action_before_header_main' );
	?>

	<?php
	/**
	 * Hook - zakra_action_header_main
	 *
	 * @hooked zakra_header_main_site_branding - 10
	 * @hooked zakra_header_main_site_navigation - 15
	 * @hooked zakra_header_main_action- 20
	 */
	do_action( 'zakra_action_header_main' );
	?>

	<?php
	/**
	 * Hook - zakra_action_after_header_main
	 *
	 * @hooked zakra_header - 10
	 */
	do_action( 'zakra_action_after_header_main' );
	?>

	<?php
	/**
	 * Hook - zakra_action_after_header
	 *
	 * @hooked zakra_header_end - 10
	 */
	do_action( 'zakra_action_after_header' );
	?>


	<div class="gp-content" style="width: 1160px; margin-left: auto; margin-right: auto;">
		<?php echo gp_breadcrumb(); ?>

		<div id="gp-js-message" class="gp-js-message"></div>

		<?php if ( gp_notice( 'error' ) ) : ?>
			<div class="error">
				<?php echo gp_notice( 'error' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( gp_notice() ) : ?>
			<div class="notice">
				<?php echo gp_notice(); ?>
			</div>
		<?php endif; ?>

		<?php
		/**
		 * Fires after the error and notice elements on the header.
		 *
		 * @since 1.0.0
		 */
		do_action( 'gp_after_notices' );
