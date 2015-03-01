<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package inka
 */

get_header();  ?>

<!-- PAGE HEADER -->
	<header id="page_header">
		<div class="container align_center">
			
			<h3 class="light full-width">404</h3>
						
		</div>
	</header>
	<!-- PAGE HEADER END -->
	
	<!-- MAIN CONTENT -->
	<main>
		<div class="container"><!-- CONTAINER -->
				
			
			
			<div class="row"><br>
				<div class="col one_third">
					
				</div>
				<div class="col one_third align_center">
					<h3>Woops</h3>
					<p>You're looking for something that isn't here.</p>
                    <a class="btn white large" href="<?php echo esc_url(get_site_url()); ?>">
				<i class="fa fa-home"></i>
				<span>return to home</span>
				</a>
				</div>
				<div class="col one_third">
					
				</div>
			</div>
			
			
			

		</div>
		<!-- CONTAINER END -->	
	</main> 
	<!-- MAIN CONTENT END -->
	

<?php get_footer(); ?>

</body>
</html>