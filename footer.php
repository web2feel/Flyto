<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Flyto
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
			
		<div class="footer-widgets clear">
			<div class="col">
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?> <?php endif; // end sidebar widget area ?>
			</div>
		</div>
	
		<div class="site-info">
			Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'flyto' ), 'Flyto', '<a href="http://www.web2feel.com/" rel="designer">Web2feel.com</a>' ); ?>
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

	<?php if ( is_single() ) { ?>
	
		<script type="text/javascript">
			function show_head(){
			jQuery('#masthead').backstretch("<?php get_image_url(); ?> ");
			}
			show_head();
		</script>
		
		<?php } else { ?>
		
		<script type="text/javascript">
			function show_pic(){
			jQuery('#masthead').backstretch("<?php echo of_get_option('home_header',''); ?> ");
			}
			show_pic();
		</script>
		
	<?php } ?>

</body>
</html>
