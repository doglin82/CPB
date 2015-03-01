<?php 
if(!is_404()){
global $post;
$template='';
if(isset($post->ID))$template = get_post_meta($post->ID, '_wp_page_template', true ); 
if($template!= 'sections-template.php'  || is_search()){ ?>	
		</div></div></main>
<?php }} ?>


	
<?php 	$footer_1=ot_get_option('footer_1_show', '');	$footer_2=ot_get_option('footer_2_show', '');

	if(!isset($footer_1[0]) && !isset($footer_1[0]))		{?>
		<footer id="main_footer">
		<div class="container"><div class="row">
			<div class="col one_quarter">
				  <?php dynamic_sidebar( 'footer-1-1' );?>	
			</div>
			<div class="col one_quarter">
				 <?php dynamic_sidebar( 'footer-1-2' );?>	
			</div>
			<div class="col one_quarter">
				 <?php dynamic_sidebar( 'footer-1-3' );?>	
			</div>
			<div class="col one_quarter">
				 <?php dynamic_sidebar( 'footer-1-4' );?>	
			</div>
		</div></div>
	</footer>
     <?php } ?>

      <?php 	if(!isset($footer_2[0])  && !isset($footer_2[0]) )		{?>
      <footer id="sub_footer">
		<div class="container">
			<div class="row">
				<div class="col one_half">
					<?php dynamic_sidebar( 'footer-bottom-1' );?>
				</div>
				
				<div class="col one_half">	
					<?php dynamic_sidebar( 'footer-bottom-2' );?>
				</div>
			</div>

		</div>
		
			<a id="totop" href="#top"><i class="fa fa-angle-up"></i></a>
	</footer>
      <?php } ?>
	

<?php
$gan=ot_get_option("google_analitics");if($gan!=''){echo $gan;}

wp_footer(); ?>

</body>
</html>