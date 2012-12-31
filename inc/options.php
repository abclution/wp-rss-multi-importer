<?php



//  Categories Page

function wp_rss_multi_importer_category_images_page() {


       ?>
      <div class="wrap">
		 <h2>Categories Default Images Admin</h2>
	<div id="poststuff">
  


     <form action="options.php" method="post"  >  
	
		<div class="postbox">
		<div class="inside">
	<h3><?php _e("Set a Default Image for Your Categories (Optional) - the full URL is required", 'wp-rss-multi-importer')?></h3>
	<?php
	
	settings_fields( 'wp_rss_multi_importer_categories_images' );


	$options = get_option('rss_import_categories' ); 
	$options_images = get_option('rss_import_categories_images' ); 

	if ( !empty($options) ) {
		$size = count($options);


		for ( $i=1; $i<=$size; 	$i++ ) {   
		   
if( $i % 2== 0 ) continue;

  
					
				   $key = key( $options );

	$j = cat_get_id_number($key);
	$textUpper=strtoupper($options[$key]);
	$cat_default_image=	$options_images[$j];

	
echo "<div class='default-list-name'>".$textUpper.":</div>";


	next( $options );
   	$key = key( $options );


 

echo "<div class='default-list-image'><input class='default-cat-image'  size='70' name='rss_import_categories_images[$j]' type='text' value='$cat_default_image' /></div>";
	next( $options );	
}

		 

}
	?>

<p class="submit"><input type="submit" value="Save Settings" name="submit" class="button-primary"></p>
</div></div>	          
</form>
</div></div>

<?php

}

































	function wprssmi_convert_key( $key ) { 

     if ( strpos( $key, 'feed_name_' ) === 0 ) { 
	

 $label = str_replace( 'feed_name_', __('Feed Name ','wp-rss-multi-importer') , $key );

     }

     else if ( strpos( $key, 'feed_url_' ) === 0 ) { 

         $label = str_replace( 'feed_url_', __('Feed URL ','wp-rss-multi-importer'), $key );
     }

		else if ( strpos( $key, 'feed_cat_' ) === 0 ) { 

         $label = str_replace( 'feed_url_', __('Feed Category ','wp-rss-multi-importer'), $key );
     }

		else if ( strpos( $key, 'cat_name_' ) === 0 ) { 

         $label = str_replace( 'cat_name_', __('Category ID # ','wp-rss-multi-importer'), $key );
     }


     return $label;
 }

 function wprss_get_id_number($key){
	
	if ( strpos( $key, 'feed_name_' ) === 0 ) { 

     $j = str_replace( 'feed_name_', '', $key );
 }
	return $j;
	
 }


function cat_get_id_number($key){

	if ( strpos( $key, 'cat_name_' ) === 0 ) { 

     $j = str_replace( 'cat_name_', '', $key );
 }
	return $j;

 }


function check_feed($url){
	
		$url=(string)($url);


		while ( stristr($url, 'http') != $url )
			$url = substr($url, 1);

		$url = esc_url_raw(strip_tags($url));


					$feed = fetch_feed($url);

		if (is_wp_error( $feed ) ) {
			return "<span class=chk_feed>".__('This feed has errors', 'wp-rss-multi-importer')."</span>";			
			
		/*	$error_msg=$feed->get_error_message();
			return $error_msg;
			return "<span  ><button id=my-button class=chk_feed >Error: Click to see</button></span>
		<div id=element_to_pop_up>
			   <a class=bClose>x<a/>
			  This feed is causing errors - this is the error message: '.$error_msg.'
			</div>"; */
		}
		
}



function wp_rss_multi_importer_intro_page() {
		$feed = fetch_feed("http://rss.marketingprofs.com/marketingprofs");
	?>
	
	<div class="wrap">
						
			
	                                <div class="postbox-container" style="min-width:400px; max-width:600px; padding: 0 20px 0 0;">	<h2>Put RSS Feeds on Your Site in 3 Different Ways</h2>
					<div class="metabox-holder">	
						<div class="postbox-container">
							<H3 class="info_titles">1. Display the feed items in one of 8 customizable templates</H3>
							<p class="info_text"><?php _e("Start by adding feeds (RSS Feeds tab), adding Categories and optional default category images (Categories tab), then assign the feeds to the categories in the RSS Feeds tab.  Then use shortcode and put it on the page where you want to display the feed articles.  Select the templates and change the settings in the Settings tab. Use shortcode parameters (Shortcode Parameters tab) to put more customization onto your feed presentation.", 'wp-rss-multi-importer')?></p>
							<H3 class="info_titles">2. Create blog posts from the feed items (Feed to Post)</H3>
							<p class="info_text"><?php _e("Start by adding feeds (RSS Feeds tab), adding Categories and optional default category images (Categories tab), then assign the feeds to the categories in the RSS Feeds tab.  Then click on the Feed to Post tab and set the options.", 'wp-rss-multi-importer')?></p>
							<H3 class="info_titles">3. Display the aggregated feed items in a widget</H3>
							<p class="info_text"><?php _e("If your theme supports widgets, then start by adding feeds (RSS Feeds tab), adding Categories and optional default category images (Categories tab), then assign the feeds to the categories in the RSS Feeds tab.  Then go to Appearance->Widgets, add the RSS Multi-Importer widget, configure the options and click Save..", 'wp-rss-multi-importer')?></p>
							<p><?php _e("You don't have to choose one way or another to present the feeds.  You can do all 3 at the same time.", 'wp-rss-multi-importer')?></p>
						</div>
					</div>
				</div>
					<div class="postbox-container" style="width:25%;min-width:200px;max-width:350px;">
			<div id="sidebar" class="MP_box">
					<div >
			<h2 class="MP_title">Improve Your Marketing Know-How</h2>
		</div>
		
		
											
												
													<div class="txtorange">Join MarketingProfs.com</div>
														<div class="txtwhite">Over 492,000 have already</div>
													<div class="txtorange">Your Free Membership Includes:</div>
													<ul class="padding_nomargin txtleft" style="margin-left:30px;padding-top:5px;padding-bottom:5px;margin-top:0px;">
														<li style="margin:3px;"><b>FREE</b> access to all marketing articles</li>
														<li style="margin:3px;"><b>FREE</b> community forum use</li>
														<li style="margin:3px;"><b>FREE</b> weekly newsletters</li>
													</ul>
													<form style="padding-bottom:4px;" onsubmit="validateEmail(document.getElementById('e'));" action="https://www.marketingprofs.com/login/signup.asp" method="POST">
																				<div class="center width_full"><input type="text" onfocus="this.value=''" value="you@company.com" style="width:225px;color:#444;" id="e" name="e"></div>
																				<div class="center width_full"><input type="image" style="margin-top:4px;" src="http://www.mpdailyfix.com/wp-content/themes/mpdailyfix/images/signup_blue.gif" id="btnsignup" name="btnsignup"></div>
																				<input type="hidden" value="amwplugin" name="adref">
																				<script type="text/javascript">
																					function validateEmail(emailField){
																							var re = /^(([^&lt;&gt;()[\]\\.,;:\s@\"]+(\.[^&lt;&gt;()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
																							if (re.test(emailField.value) == false) 
																							{
																								alert('Oops! That email address doesn\'t look quite right.\n\nPlease make sure it was typed correctly and try again.');
																								return false;
																							}
																							return true;
																					}				
																				</script>
																			</form>
																		<span class="MP_title">	<a class="button-primary" style="text-align:center" href="https://www.marketingprofs.com/login/join?adref=amwplugin" target="_blank">Learn more »</a></span>
																
							
			
			
			
			</div>
			
			
			<?php
				if (!is_wp_error( $feed ) ){
		?>
			
			<h3 style="text-align:center;"><?php print 'Latest '.$feed->get_title(); ?></h3>
			<ul>
			<?php foreach ($feed->get_items(0, 5) as $item): ?>
			    <li>
			        <a href="<?php print $item->get_permalink(); ?>" target="_blank">
			        <?php print $item->get_title(); ?></a>
			    </li>
			<?php endforeach; ?>
			</ul>
			<?php	
			}
			
			?>
			
	
			
			
			<div id="sidebar" class="MP_box">
				<div >
		<h2 class="MP_title">Need Plugin Help?</h2>
	</div>
	
	<p><a href="http://www.allenweiss.com/wp_plugin/" target="_blank" style="color:white">Go here</a> to find FAQs, our discussion board, template examples, and more.</p>
	<p><a href="http://www.allenweiss.com/faqs/im-told-the-feed-isnt-valid-or-working/" target="_blank" style="color:white">Go here if you have a feed that isn't working</a><p>			
				
				</div>
			
			
		</div>
				
				</div>
	
	
	<?php
	
}








function wp_rss_multi_importer_options_page() {


delete_db_transients();


       ?>

       <div class="wrap">
	<h2><?php _e("Settings for Displaying Feed Items Using Shortcode", 'wp-rss-multi-importer')?></h2>
	<div id="poststuff">

       <?php screen_icon(); 

//do_settings_sections( 'wprssimport' );

?>

    

       <div id="options">
	

       <form action="options.php" method="post"  >            

       <?php
		$siteurl= get_site_url();
        $images_url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/images';

      settings_fields( 'wp_rss_multi_importer_item_options' );


       $options = get_option( 'rss_import_options' ); 


    	




  

    

       ?>

      
      

<div class="postbox"><h3><label for="title"><?php _e("Options Settings for Displaying the Feed Items", 'wp-rss-multi-importer')?></label></h3>
	<p style="margin-left:20px">These are settings for the option to display the feed items on your site.  If you want the settings for the Feed to Post option, use that tab instead.</p>
<div class="inside">

<h3><?php _e("Template", 'wp-rss-multi-importer')?></h3>


<?php
$thistemplate=$options['template'];
	get_template_function($thistemplate);
?>

<?php
if ($options['maxperPage']=='' || $options['maxperPage']=='NULL') {
?>
<H2 class="save_warning"><?php _e("You must choose and then click Save Settings for the plugin to function correctly.  If not sure which options to choose right now, don't worry - the most common settings have been set for you - just click Save Settings.", 'wp-rss-multi-importer')?></H2>
<?php
}
?>


<h3><?php _e("Sorting and Separating Posts", 'wp-rss-multi-importer')?></h3>
 
      <p><label class='o_textinput' for='sortbydate'><?php _e("Sort Output by Date (Descending = Closest Date First", 'wp-rss-multi-importer')?></label>
	
		<SELECT NAME="rss_import_options[sortbydate]">
		<OPTION VALUE="1" <?php if($options['sortbydate']==1){echo 'selected';} ?>><?php _e("Ascending", 'wp-rss-multi-importer')?></OPTION>
		<OPTION VALUE="0" <?php if($options['sortbydate']==0){echo 'selected';} ?>><?php _e("Descending", 'wp-rss-multi-importer')?></OPTION>
		
		</SELECT></p>  
		
		
		<p><label class='o_textinput' for='todaybefore'><?php _e("Separate Today and Earlier Posts", 'wp-rss-multi-importer')?></label>

		<SELECT NAME="rss_import_options[todaybefore]">
		<OPTION VALUE="1" <?php if($options['todaybefore']==1){echo 'selected';} ?>><?php _e("Yes", 'wp-rss-multi-importer')?></OPTION>
		<OPTION VALUE="0" <?php if($options['todaybefore']==0){echo 'selected';} ?>><?php _e("No", 'wp-rss-multi-importer')?></OPTION>

		</SELECT></p>
	
<h3><?php _e("Number of Posts and Pagination", 'wp-rss-multi-importer')?></h3>
<p><label class='o_textinput' for='maxfeed'><?php _e("Number of Entries per Feed", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_import_options[maxfeed]">
<OPTION VALUE="1" <?php if($options['maxfeed']==1){echo 'selected';} ?>>1</OPTION>
<OPTION VALUE="2" <?php if($options['maxfeed']==2){echo 'selected';} ?>>2</OPTION>
<OPTION VALUE="3" <?php if($options['maxfeed']==3){echo 'selected';} ?>>3</OPTION>
<OPTION VALUE="4" <?php if($options['maxfeed']==4){echo 'selected';} ?>>4</OPTION>
<OPTION VALUE="5" <?php if($options['maxfeed']==5){echo 'selected';} ?>>5</OPTION>
<OPTION VALUE="10" <?php if($options['maxfeed']==10){echo 'selected';} ?>>10</OPTION>
<OPTION VALUE="15" <?php if($options['maxfeed']==15){echo 'selected';} ?>>15</OPTION>
<OPTION VALUE="20" <?php if($options['maxfeed']==20){echo 'selected';} ?>>20</OPTION>
</SELECT></p>


<p><label class='o_textinput' for='maxperPage'><?php _e("Number of Entries per Page of Output", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_import_options[maxperPage]">
<OPTION VALUE="5" <?php if($options['maxperPage']==5){echo 'selected';} ?>>5</OPTION>
<OPTION VALUE="10" <?php if($options['maxperPage']==10){echo 'selected';} ?>>10</OPTION>
<OPTION VALUE="20" <?php if($options['maxperPage']==20){echo 'selected';} ?>>20</OPTION>
<OPTION VALUE="30" <?php if($options['maxperPage']==30){echo 'selected';} ?>>30</OPTION>
<OPTION VALUE="40" <?php if($options['maxperPage']==40){echo 'selected';} ?>>40</OPTION>
<OPTION VALUE="50" <?php if($options['maxperPage']==50){echo 'selected';} ?>>50</OPTION>
</SELECT></p>




<p><label class='o_textinput' for='pag'><?php _e("Do you want pagination?", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_import_options[pag]" id="pagination">
<OPTION VALUE="1" <?php if($options['pag']==1){echo 'selected';} ?>><?php _e("Yes", 'wp-rss-multi-importer')?></OPTION>
<OPTION VALUE="0" <?php if($options['pag']==0){echo 'selected';} ?>><?php _e("No", 'wp-rss-multi-importer')?></OPTION>
</SELECT>  <?php _e("(Note: this will override the Number of Entries per Page of Output)", 'wp-rss-multi-importer')?></p>



<span id="pag_options" <?php if($options['pag']==0){echo 'style="display:none"';}?>>
	
	<p style="padding-left:15px"><label class='o_textinput' for='perPage'><?php _e("Number of Posts per Page for Pagination", 'wp-rss-multi-importer')?></label>
	<SELECT NAME="rss_import_options[perPage]">
	<OPTION VALUE="6" <?php if($options['perPage']==6){echo 'selected';} ?>>6</OPTION>
	<OPTION VALUE="12" <?php if($options['perPage']==12){echo 'selected';} ?>>12</OPTION>
	<OPTION VALUE="15" <?php if($options['perPage']==15){echo 'selected';} ?>>15</OPTION>
	<OPTION VALUE="20" <?php if($options['perPage']==20){echo 'selected';} ?>>20</OPTION>
	</SELECT></p>	
	
</span>



<h3><?php _e("How Links Open and No Follow Option", 'wp-rss-multi-importer')?></h3>

<p><label class='o_textinput' for='targetWindow'><?php _e("Target Window (when link clicked, where should it open?)", 'wp-rss-multi-importer')?></label>
	<SELECT NAME="rss_import_options[targetWindow]" id="targetWindow">
	<OPTION VALUE="0" <?php if($options['targetWindow']==0){echo 'selected';} ?>><?php _e("Use LightBox", 'wp-rss-multi-importer')?></OPTION>
	<OPTION VALUE="1" <?php if($options['targetWindow']==1){echo 'selected';} ?>><?php _e("Open in Same Window", 'wp-rss-multi-importer')?></OPTION>
	<OPTION VALUE="2" <?php if($options['targetWindow']==2){echo 'selected';} ?>><?php _e("Open in New Window", 'wp-rss-multi-importer')?></OPTION>
	</SELECT>	
</p>
<p style="padding-left:15px"><label class='o_textinput' for='noFollow'>Set links as No Follow.  <input type="checkbox" Name="rss_import_options[noFollow]" Value="1" <?php if ($options['noFollow']==1){echo 'checked="checked"';} ?></label></p>





<h3><?php _e("What Shows - Attribution", 'wp-rss-multi-importer')?></h3>



<p><label class='o_textinput' for='sourcename'><?php _e("Feed Source Attribution Label", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_import_options[sourcename]">
<OPTION VALUE="Source" <?php if($options['sourcename']=='Source'){echo 'selected';} ?>><?php _e("Source", 'wp-rss-multi-importer')?></OPTION>
<OPTION VALUE="Via" <?php if($options['sourcename']=='Via'){echo 'selected';} ?>><?php _e("Via", 'wp-rss-multi-importer')?></OPTION>
<OPTION VALUE="Club" <?php if($options['sourcename']=='Club'){echo 'selected';} ?>><?php _e("Club", 'wp-rss-multi-importer')?></OPTION>
<OPTION VALUE="Sponsor" <?php if($options['sourcename']=='Sponsor'){echo 'selected';} ?>><?php _e("Sponsor", 'wp-rss-multi-importer')?></OPTION>
<OPTION VALUE="" <?php if($options['sourcename']==''){echo 'selected';} ?>><?php _e("No Attribution", 'wp-rss-multi-importer')?></OPTION>
</SELECT></p>

<p ><label class='o_textinput' for='addAuthor'><?php _e("Show Feed or Author Name (if available)", 'wp-rss-multi-importer')?>   <input type="checkbox" Name="rss_import_options[addAuthor]" Value="1" <?php if ($options['addAuthor']==1){echo 'checked="checked"';} ?></label></p>



<h3><?php _e("What Shows - EXCERPTS", 'wp-rss-multi-importer')?></h3>

<p><label class='o_textinput' for='showdesc'><?php _e("<b>Show Excerpt</b>", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_import_options[showdesc]" id="showdesc">
<OPTION VALUE="1" <?php if($options['showdesc']==1){echo 'selected';} ?>><?php _e("Yes", 'wp-rss-multi-importer')?></OPTION>
<OPTION VALUE="0" <?php if($options['showdesc']==0){echo 'selected';} ?>><?php _e("No", 'wp-rss-multi-importer')?></OPTION>
</SELECT></p>

<p style="padding-left:15px"><label class='o_textinput' for='showcategory'><?php _e("Show Category Name", 'wp-rss-multi-importer')?>   <input type="checkbox" Name="rss_import_options[showcategory]" Value="1" <?php if ($options['showcategory']==1){echo 'checked="checked"';} ?></label></p>


<span id="secret" <?php if($options['showdesc']==0){echo 'style="display:none"';}?>>
	
	
	<p style="padding-left:15px"><label class='o_textinput' for='showmore'><?php _e("Let your readers determine if they want to see the excerpt with a show-hide option. ", 'wp-rss-multi-importer')?><input type="checkbox" Name="rss_import_options[showmore]" Value="1" <?php if ($options['showmore']==1){echo 'checked="checked"';} ?></label>
	</p>	
	
	
<p style="padding-left:15px"><label class='o_textinput' for='descnum'><?php _e("Excerpt length (number of words)", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_import_options[descnum]" id="descnum">
<OPTION VALUE="20" <?php if($options['descnum']==20){echo 'selected';} ?>>20</OPTION>
<OPTION VALUE="30" <?php if($options['descnum']==30){echo 'selected';} ?>>30</OPTION>
<OPTION VALUE="50" <?php if($options['descnum']==50){echo 'selected';} ?>>50</OPTION>
<OPTION VALUE="100" <?php if($options['descnum']==100){echo 'selected';} ?>>100</OPTION>
<OPTION VALUE="200" <?php if($options['descnum']==200){echo 'selected';} ?>>200</OPTION>
<OPTION VALUE="300" <?php if($options['descnum']==300){echo 'selected';} ?>>300</OPTION>
<OPTION VALUE="400" <?php if($options['descnum']==400){echo 'selected';} ?>>400</OPTION>
<OPTION VALUE="500" <?php if($options['descnum']==500){echo 'selected';} ?>>500</OPTION>
<OPTION VALUE="99" <?php if($options['descnum']==99){echo 'selected';} ?>><?php _e("Give me everything", 'wp-rss-multi-importer')?></OPTION>
</SELECT><?php _e("  Note: Choosing Give me everything will just be a pure extract of the content without any image processsing, etc.", 'wp-rss-multi-importer')?></p>
<h3><?php _e("Image Handling", 'wp-rss-multi-importer')?></h3>
<p><?php _e("An attempt will be made to select an image for your post.  Usually this is the first image in the content or in a feed enclosure, but you have the option - if those are not available - to get the first image in the content.", 'wp-rss-multi-importer')?>
<p><label class='o_textinput' for='stripAll'><?php _e("Check to get rid of all images in the excerpt.", 'wp-rss-multi-importer')?><input type="checkbox" Name="rss_import_options[stripAll]" Value="1" <?php if ($options['stripAll']==1){echo 'checked="checked"';} ?></label>
</p>
<p><label class='o_textinput' for='anyimage'><?php _e("Check to use any image in the content if possible", 'wp-rss-multi-importer')?><input type="checkbox" Name="rss_import_options[anyimage]" Value="1" <?php if ($options['anyimage']==1){echo 'checked="checked"';} ?></label>
</p>

<p><?php _e("You can adjust the image, if it exists.  Note that including images in your feed may slow down how quickly it renders on your site, so you'll need to experiment with these settings.", 'wp-rss-multi-importer')?></p>
<p style="padding-left:15px"><label class='o_textinput' for='adjustImageSize'><?php _e("If you want excerpt images, check to fix their width at 150 (can be over-written in shortcode).", 'wp-rss-multi-importer')?>  <input type="checkbox" Name="rss_import_options[adjustImageSize]" Value="1" <?php if ($options['adjustImageSize']==1){echo 'checked="checked"';} ?></label></p>
	
<p style="padding-left:15px"><label class='o_textinput' for='floatType'><?php _e("Float images to the left (can be over-written in shortcode).", 'wp-rss-multi-importer')?>  <input type="checkbox" Name="rss_import_options[floatType]" Value="1" <?php if ($options['floatType']==1){echo 'checked="checked"';} ?></label></p>
</span>


	<p style="padding-left:15px"><label class='o_textinput' for='RSSdefaultImage'><?php _e("Default category image setting", 'wp-rss-multi-importer')?></label>
	<SELECT NAME="rss_import_options[RSSdefaultImage]" id="RSSdefaultImage">
	<OPTION VALUE="0" <?php if($options['RSSdefaultImage']==0){echo 'selected';} ?>>Process normally</OPTION>
	<OPTION VALUE="1" <?php if($options['RSSdefaultImage']==1){echo 'selected';} ?>>Use default image for category</OPTION>
	<OPTION VALUE="2" <?php if($options['RSSdefaultImage']==2){echo 'selected';} ?>>Replace articles with no image with default category image</OPTION>

	</SELECT></p>




<h3><?php _e("Get Social", 'wp-rss-multi-importer')?></h3>
<p ><label class='o_textinput' for='showsocial'><?php _e("Add social icons (Twitter and Facebook) to each post. ", 'wp-rss-multi-importer')?><input type="checkbox" Name="rss_import_options[showsocial]" Value="1" <?php if ($options['showsocial']==1){echo 'checked="checked"';} ?></label>
</p>


<h3><?php _e("Cache and Conflict Handling", 'wp-rss-multi-importer')?></h3>

<p><label class='o_textinput' for='cacheMin'><?php _e("Number of minutes you want the post data held in cache (match to how often your feeds are updated)", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_import_options[cacheMin]" id="cacheMin">
<OPTION VALUE="0" <?php if($options['cacheMin']==0){echo 'selected';} ?>>Turn off caching</OPTION>
<OPTION VALUE="1" <?php if($options['cacheMin']==1){echo 'selected';} ?>>1</OPTION>
<OPTION VALUE="5" <?php if($options['cacheMin']==5){echo 'selected';} ?>>5</OPTION>
<OPTION VALUE="10" <?php if($options['cacheMin']==10){echo 'selected';} ?>>10</OPTION>
<OPTION VALUE="20" <?php if($options['cacheMin']==20){echo 'selected';} ?>>20</OPTION>
<OPTION VALUE="30" <?php if($options['cacheMin']==30){echo 'selected';} ?>>30</OPTION>
<OPTION VALUE="40" <?php if($options['cacheMin']==40){echo 'selected';} ?>>40</OPTION>
<OPTION VALUE="60" <?php if($options['cacheMin']==60){echo 'selected';} ?>>60</OPTION>
<OPTION VALUE="120" <?php if($options['cacheMin']==120){echo 'selected';} ?>>120</OPTION>
<OPTION VALUE="180" <?php if($options['cacheMin']==180){echo 'selected';} ?>>180</OPTION>
<OPTION VALUE="240" <?php if($options['cacheMin']==240){echo 'selected';} ?>>240</OPTION>
<OPTION VALUE="300" <?php if($options['cacheMin']==300){echo 'selected';} ?>>300</OPTION>
</SELECT></p>




<p ><label class='o_textinput' for='cb'><?php _e("Check if you are having colorbox conflict problems.", 'wp-rss-multi-importer')?>   <input type="checkbox" Name="rss_import_options[cb]" Value="1" <?php if ($options['cb']==1){echo 'checked="checked"';} ?></label></p>


<p ><label class='o_textinput' for='cb'><?php _e("Check if you want to suppress warning messages.", 'wp-rss-multi-importer')?>   <input type="checkbox" Name="rss_import_options[warnmsg]" Value="1" <?php if ($options['warnmsg']==1){echo 'checked="checked"';} ?></label></p>


<input   size='10' name='rss_import_options[plugin_version]' type='hidden' value='<?php echo WP_RSS_MULTI_VERSION ?>' />

</div></div>

       <p class="submit"><input type="submit" value="Save Settings" name="submit" class="button-primary"></p>



       </form>

      <div class="postbox"><h3><label for="title"><?php _e("Help Others", 'wp-rss-multi-importer')?></label></h3><div class="inside"><?php _e("If you find this plugin helpful, let others know by <a href=\"http://wordpress.org/extend/plugins/wp-rss-multi-importer/\" target=\"_blank\">rating it here</a>.  That way, it will help others determine whether or not they should try out the plugin.  Thank you.", 'wp-rss-multi-importer')?></div></div> 

       </div>
</div>
       </div>

       <?php 

  }




function wp_rss_multi_importer_items_page() {


	delete_db_transients();

       ?>

       <div class="wrap">
	 <h2>RSS Feeds Admin</h2>
	<div id="poststuff">
 
       <?php screen_icon(); 

do_settings_sections( 'wprssimport' );

?>



       <div id="options">


       <form action="options.php" method="post"  >            

       <?php

	$removeurl=WP_RSS_MULTI_IMAGES."remove.png";

      settings_fields( 'wp_rss_multi_importer_options' );


       $options = get_option( 'rss_import_items' ); 

       $catOptions_exist= get_option( 'rss_import_categories' ); 

//this included for backward compatibility
  if ( !empty($options) ) {
$cat_array = preg_grep("^feed_cat_^", array_keys($options));

	if (count($cat_array)==0) {
	   //echo "category was not found\n";
		$catExists=0;
		$modnumber=2;
	}else{
		$catExists=1;
		$modnumber=3;	
	}
}


       if ( !empty($options) ) {

           $size = count($options);  

           for ( $i=1; $i<=$size; $i++) {            

               //if( $i % $modnumber == 0 ) continue;


               $key = key( $options );


            if ( !strpos( $key, '_' ) > 0 ) continue; //this makes sure only feeds are included here...everything else are options

				$j = wprss_get_id_number($key);
			

             echo "<div class='wprss-input' id='$j'>";

               echo "<p><label class='textinput' for='$key'>" . wprssmi_convert_key( $key ) . "</label>

               <input  class='wprss-input' size='75' name='rss_import_items[$key]' type='text' value='$options[$key]' />  <a href='javascript:void(0)' class='btnDelete' id='$j'><img src='$removeurl'/></a></p>";


               next( $options );


               $key = key( $options );

$url_esc=esc_url($options[$key]);
               echo "<p><label class='textinput' for='$key'>" . wprssmi_convert_key( $key ) . "</label>

               <input id='$j' class='wprss-input' size='75' name='rss_import_items[$key]' type='text' value='$url_esc' />" ; 


			if (empty($catOptions_exist)){
				echo " <input id='$j' class='wprss-input' size='10' name='rss_import_items[feed_cat_$j]' type='hidden' value='0' />" ; 	

			}



	if ($catExists==1){
		    next( $options );
            $key = key( $options );	
			$selectName="rss_import_items[feed_cat_$j]";
	}else{
		$selectName="rss_import_items[feed_cat_$j]";		
	}


$catOptions= get_option( 'rss_import_categories' ); 

	if ( !empty($catOptions) ) {
		echo "<span class=category_list>Category ";
echo "<SELECT NAME=".$selectName." id='feed_cat'>";
echo "<OPTION VALUE='0'>NONE</OPTION>";
	$catsize = count($catOptions);

//echo $options[$key];

	for ( $k=1; $k<=$catsize; $k++ ) {   

if( $k % 2== 0 ) continue;

 	$catkey = key( $catOptions );
 	$nameValue=$catOptions[$catkey];
next( $catOptions );
 	$catkey = key( $catOptions );
	$IDValue=$catOptions[$catkey];


	 if($options[$key]==$IDValue){
		$sel='selected  ';

		} else {
		$sel='';

		}

echo "<OPTION " .$sel.  "VALUE=".$IDValue.">".$nameValue."</OPTION>";
next( $catOptions );

}
echo "</SELECT></span>";
}
echo check_feed($url_esc);  // needs style

              echo " </p>";



               next( $options );

               echo "</div>"; 



           }

       }







       ?>

       <div id="buttons"><a href="javascript:void(0)" id="add" class="addbutton"><img src="<?php echo WP_RSS_MULTI_IMAGES; ?>add.png"></a>  



       <p class="submit"><input type="submit" value="Save Settings" name="submit" class="button-primary"></p>



       </form>

	



      <div class="postbox"><h3><label for="title">   <?php _e("Help Others", 'wp-rss-multi-importer')?></label></h3><div class="inside"><?php _e("If you find this plugin helpful, let others know by <a href=\"http://wordpress.org/extend/plugins/wp-rss-multi-importer/\" target=\"_blank\">rating it here</a>.  That way, it will help others determine whether or not they should try out the plugin.  Thank you.", 'wp-rss-multi-importer')?></div></div> 

       </div>

</div>
       </div>

       <?php 

  }



















//  Categories Page

function wp_rss_multi_importer_category_page() {


       ?>
      <div class="wrap">
	 <h2>Categories Admin</h2>	
	<div id="poststuff">



     <form action="options.php" method="post"  >  

		<div class="postbox">
		<div class="inside">
	<h3><?php _e("RSS Multi-Importer Categories (and their shortcodes)", 'wp-rss-multi-importer')?></h3>
	<?php

	settings_fields( 'wp_rss_multi_importer_categories' );

	$options = get_option('rss_import_categories' ); 


	if ( !empty($options) ) {
		$size = count($options);


		for ( $i=1; $i<=$size; $i++ ) {   

if( $i % 2== 0 ) continue;



				   $key = key( $options );

	$j = cat_get_id_number($key);
		$textUpper=strtoupper($options[$key]);
 			echo "<div class='cat-input' id='$j'>";
	echo "<p><label class='textinput' for='Category ID'>" . wprssmi_convert_key( $key ) . "</label>



       <input id='5' class='cat-input' size='20' name='rss_import_categories[$key]' type='text' value='$textUpper' />  [wp_rss_multi_importer category=\"".$j."\"]";
next( $options );
   $key = key( $options );

     echo"  <input id='5'  size='20' name='rss_import_categories[$key]' type='hidden' value='$options[$key]' />" ; 
	echo "</div>";
	next( $options );	
}



}
	?>
  <div id="category"><a href="#" id="addCat" class="addCategory"><img src="<?php echo WP_RSS_MULTI_IMAGES; ?>addCat.png"></a>  	
<p class="submit"><input type="submit" value="Save Settings" name="submit" class="button-primary"></p>
</div></div>	          
</form>
</div></div>

<?php

}



function wp_rss_multi_importer_feed_page() {

       ?>

       <div class="wrap">
	  <h2><?php _e("Export Your RSS Feed", 'wp-rss-multi-importer')?></h2>
	<div id="poststuff">

  
<p><?php _e("You can re-export your feeds as an RSS feed for your readers.  You configure some options for this feed here.  Please note this feature is in beta and is not supported as much as the other features.", 'wp-rss-multi-importer')?></p>


       <div id="options">

       <form action="options.php" method="post"  >            

       <?php

      settings_fields('wp_rss_multi_importer_feed_options');
      $options = get_option('rss_feed_options');    

       ?>


<div class="postbox">
	
<div class="inside">



<h3><?php _e("Export Feed Options Settings", 'wp-rss-multi-importer')?></h3>


<p><label class='o_textinput' for='feedtitle'><?php _e("Feed Title", 'wp-rss-multi-importer')?></label>

<input id="feedtitle" type="text" value="<?php echo $options['feedtitle']?>" name="rss_feed_options[feedtitle]"></p>

<p><label class='o_textinput' for='feedslug'><?php _e("Feed Slug", 'wp-rss-multi-importer')?></label>

<input id="feedslug" size="10" type="text" value="<?php echo $options['feedslug']?>" name="rss_feed_options[feedslug]"> <?php _e("(no spaces are allowed!  See what a slug is below)", 'wp-rss-multi-importer')?></p>

<p><label class='o_textinput' for='feeddesc'><?php _e("Feed Description", 'wp-rss-multi-importer')?></label>

<input id="feeddesc" type="text" value="<?php echo $options['feeddesc']?>" name="rss_feed_options[feeddesc]" size="50"></p>

<p><label class='o_textinput' for='striptags'><?php _e("Check to get rid of all images in the feed output.", 'wp-rss-multi-importer')?><input type="checkbox" Name="rss_feed_options[striptags]" Value="1" <?php if ($options['striptags']==1){echo 'checked="checked"';} ?></label>
</p>

</div></div>

       <p class="submit"><input type="submit" value="Save Settings" name="submit" class="button-primary"></p>



       </form>

	<?php
	$url=site_url();
	if (!empty($options['feedslug'])){

		echo "<h3>". __("Your RSS feed is here:", 'wp-rss-multi-importer'). "<br><br><a href=".$url."?feed=".$options['feedslug']." target='_blank'>".$url."?feed=".$options['feedslug']."</a></h3>";
		echo "<p>". __("To activate this feature, you may need to save your permalinks again by going to Settings -> Permalinks and clicking Save Changes.", 'wp-rss-multi-importer'). "</p>";
	}else{
		
		echo "<h3>". __("Your RSS feed is here:", 'wp-rss-multi-importer')." <br><br>".$url."?feed=[this is your slug]</h3>";
	}

	?>

</div></div></div>
<?php
}




function wp_rss_multi_importer_post_page() {

       ?>

       <div class="wrap">
	 <h2><?php _e("Put Your RSS Feed Into Blog Posts", 'wp-rss-multi-importer')?></h2>
	<div id="poststuff">


       <div id="options">

       <form action="options.php" method="post"  >            

       <?php

      settings_fields('wp_rss_multi_importer_post_options');
      $post_options = get_option('rss_post_options');    

       ?>


<div class="postbox">
<h3><label for="title"><?php _e("Feed to Post Options Settings", 'wp-rss-multi-importer')?></label></h3>

<div class="inside">

<h3><?php _e("Activation and Post Type Settings", 'wp-rss-multi-importer')?></h3>



<p><label class='o_textinput' for='active'><?php _e("Check to Activate this Feature", 'wp-rss-multi-importer')?><input type="checkbox" Name="rss_post_options[active]" Value="1" <?php if ($post_options['active']==1){echo 'checked="checked"';} ?></label><?php if ($post_options['active']!=1){echo "   <span style=\"color:red\">This feature is not active</span>";}?>
</p>
<?php
if ($post_options['active']==1){
wp_rss_multi_deactivation();
wp_rss_multi_activation();
}else{	
wp_rss_multi_deactivation();
}
?>

<p><label class='o_textinput' for='fetch_schedule'><?php _e("How often to import feeds (to change the fetch schedule, first deactivate, then change, then activate again)", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_post_options[fetch_schedule]" id="post_status">
<OPTION VALUE="2" <?php if($post_options['fetch_schedule']=="2"){echo 'selected';} ?>>Every 10 Min.</OPTION>
<OPTION VALUE="1" <?php if($post_options['fetch_schedule']=="1"){echo 'selected';} ?>>Hourly</OPTION>
<OPTION VALUE="12" <?php if($post_options['fetch_schedule']=="12"){echo 'selected';} ?>>Twice Daily</OPTION>
<OPTION VALUE="24" <?php if($post_options['fetch_schedule']=="24"){echo 'selected';} ?>>Daily</OPTION>
<OPTION VALUE="168" <?php if($post_options['fetch_schedule']=="168"){echo 'selected';} ?>>Weekly</OPTION>
</SELECT></p>



<p><label class='o_textinput' for='post_status'><?php _e("Default status of posts", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_post_options[post_status]" id="post_status">
<OPTION VALUE="draft" <?php if($post_options['post_status']=="draft"){echo 'selected';} ?>>draft</OPTION>
<OPTION VALUE="publish" <?php if($post_options['post_status']=="publish"){echo 'selected';} ?>>publish</OPTION>
<OPTION VALUE="pending" <?php if($post_options['post_status']=="pending"){echo 'selected';} ?>>pending</OPTION>
<OPTION VALUE="future" <?php if($post_options['post_status']=="future"){echo 'selected';} ?>>future</OPTION>
<OPTION VALUE="private" <?php if($post_options['post_status']=="private"){echo 'selected';} ?>>private</OPTION>
</SELECT></p>


<p><label class='o_textinput' for='post_format'><?php _e("Default post format", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_post_options[post_format]" id="post_format">
<OPTION VALUE="standard" <?php if($post_options['post_format']=="standard"){echo 'selected';} ?>>Standard</OPTION>
<OPTION VALUE="aside" <?php if($post_options['post_format']=="aside"){echo 'selected';} ?>>Aside</OPTION>
<OPTION VALUE="gallery" <?php if($post_options['post_format']=="gallery"){echo 'selected';} ?>>Gallery</OPTION>
<OPTION VALUE="link" <?php if($post_options['post_format']=="link"){echo 'selected';} ?>>Link</OPTION>
<OPTION VALUE="image" <?php if($post_options['post_format']=="image"){echo 'selected';} ?>>Image</OPTION>
<OPTION VALUE="quote" <?php if($post_options['post_format']=="quote"){echo 'selected';} ?>>Quote</OPTION>
<OPTION VALUE="status" <?php if($post_options['post_format']=="status"){echo 'selected';} ?>>Status</OPTION>
</SELECT></p>


<p ><label class='o_textinput' for='postTags'><?php _e("Comma delimited list of tags", 'wp-rss-multi-importer')?>   <input  id='postTags' type="text" size='20'  Name="rss_post_options[postTags]" Value="<?php echo $post_options['postTags'] ?>">(if left blank, no tags will be used)</label></p>

<p ><label class='o_textinput' for='bloguserid'><?php _e("Post to blog user_id", 'wp-rss-multi-importer')?>   <input  id='bloguserid' type="text" size='2' maxlength='3' Name="rss_post_options[bloguserid]" Value="<?php echo $post_options['bloguserid'] ?>">(if left blank, the admin will be the user)</label></p>

<p><label class='o_textinput' for='overridedate'><?php _e("Check to over-ride the posts date/time with the current date and time.", 'wp-rss-multi-importer')?><input type="checkbox" Name="rss_post_options[overridedate]" Value="1" <?php if ($post_options['overridedate']==1){echo 'checked="checked"';} ?></label>
</p>

<p ><label class='o_textinput' for='showsocial'><?php _e("Add social icons (Twitter and Facebook) to each post. ", 'wp-rss-multi-importer')?><input type="checkbox" Name="rss_post_options[showsocial]" Value="1" <?php if ($post_options['showsocial']==1){echo 'checked="checked"';} ?></label>
</p>

<h3><?php _e("Fetch Quantity Settings", 'wp-rss-multi-importer')?></h3>


<p><label class='o_textinput' for='maxfeed'><?php _e("Number of Entries per Feed to Fetch", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_post_options[maxfeed]">
<OPTION VALUE="1" <?php if($post_options['maxfeed']==1){echo 'selected';} ?>>1</OPTION>
<OPTION VALUE="2" <?php if($post_options['maxfeed']==2){echo 'selected';} ?>>2</OPTION>
<OPTION VALUE="3" <?php if($post_options['maxfeed']==3){echo 'selected';} ?>>3</OPTION>
<OPTION VALUE="4" <?php if($post_options['maxfeed']==4){echo 'selected';} ?>>4</OPTION>
<OPTION VALUE="5" <?php if($post_options['maxfeed']==5){echo 'selected';} ?>>5</OPTION>
<OPTION VALUE="10" <?php if($post_options['maxfeed']==10){echo 'selected';} ?>>10</OPTION>
<OPTION VALUE="15" <?php if($post_options['maxfeed']==15){echo 'selected';} ?>>15</OPTION>
<OPTION VALUE="20" <?php if($post_options['maxfeed']==20){echo 'selected';} ?>>20</OPTION>
</SELECT></p>



<p><label class='o_textinput' for='maxperfetch'><?php _e("Number of Total Post Entries per Fetch (should be much greater than the number of entries per feed)", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_post_options[maxperfetch]">
<OPTION VALUE="1" <?php if($post_options['maxperfetch']==1){echo 'selected';} ?>>1</OPTION>
<OPTION VALUE="2" <?php if($post_options['maxperfetch']==2){echo 'selected';} ?>>2</OPTION>
<OPTION VALUE="3" <?php if($post_options['maxperfetch']==3){echo 'selected';} ?>>3</OPTION>
<OPTION VALUE="4" <?php if($post_options['maxperfetch']==4){echo 'selected';} ?>>4</OPTION>
<OPTION VALUE="5" <?php if($post_options['maxperfetch']==5){echo 'selected';} ?>>5</OPTION>
<OPTION VALUE="10" <?php if($post_options['maxperfetch']==10){echo 'selected';} ?>>10</OPTION>
<OPTION VALUE="15" <?php if($post_options['maxperfetch']==15){echo 'selected';} ?>>15</OPTION>
<OPTION VALUE="20" <?php if($post_options['maxperfetch']==20){echo 'selected';} ?>>20</OPTION>
<OPTION VALUE="100" <?php if($post_options['maxperfetch']==100){echo 'selected';} ?>>100</OPTION>
<OPTION VALUE="200" <?php if($post_options['maxperfetch']==200){echo 'selected';} ?>>200</OPTION>
<OPTION VALUE="300" <?php if($post_options['maxperfetch']==300){echo 'selected';} ?>>300</OPTION>
</SELECT></p>


<h3><?php _e("Link Settings", 'wp-rss-multi-importer')?></h3>


<p><label class='o_textinput' for='targetWindow'><?php _e("Target Window (when link clicked, where should it open?)", 'wp-rss-multi-importer')?></label>
	<SELECT NAME="rss_post_options[targetWindow]" id="targetWindow">
	<OPTION VALUE="0" <?php if($post_options['targetWindow']==0){echo 'selected';} ?>><?php _e("Use LightBox", 'wp-rss-multi-importer')?></OPTION>
	<OPTION VALUE="1" <?php if($post_options['targetWindow']==1){echo 'selected';} ?>><?php _e("Open in Same Window", 'wp-rss-multi-importer')?></OPTION>
	<OPTION VALUE="2" <?php if($post_options['targetWindow']==2){echo 'selected';} ?>><?php _e("Open in New Window", 'wp-rss-multi-importer')?></OPTION>
	</SELECT>


<p><label class='o_textinput' for='descnum'><?php _e("Excerpt length (number of words)", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_post_options[descnum]" id="descnum">
<OPTION VALUE="20" <?php if($post_options['descnum']==20){echo 'selected';} ?>>20</OPTION>
<OPTION VALUE="30" <?php if($post_options['descnum']==30){echo 'selected';} ?>>30</OPTION>
<OPTION VALUE="50" <?php if($post_options['descnum']==50){echo 'selected';} ?>>50</OPTION>
<OPTION VALUE="100" <?php if($post_options['descnum']==100){echo 'selected';} ?>>100</OPTION>
<OPTION VALUE="200" <?php if($post_options['descnum']==200){echo 'selected';} ?>>200</OPTION>
<OPTION VALUE="300" <?php if($post_options['descnum']==300){echo 'selected';} ?>>300</OPTION>
<OPTION VALUE="400" <?php if($post_options['descnum']==400){echo 'selected';} ?>>400</OPTION>
<OPTION VALUE="500" <?php if($post_options['descnum']==500){echo 'selected';} ?>>500</OPTION>
<OPTION VALUE="99" <?php if($post_options['descnum']==99){echo 'selected';} ?>><?php _e("Give me everything", 'wp-rss-multi-importer')?></OPTION>
</SELECT><?php _e("  NOTE: Choosing Give me everything will prohibit you from getting a Featured Image", 'wp-rss-multi-importer')?></p>

<h3><?php _e("Author and Source Settings", 'wp-rss-multi-importer')?></h3>
<p ><label class='o_textinput' for='addAuthor'><?php _e("Show Feed or Author Name (if available)", 'wp-rss-multi-importer')?>   <input type="checkbox" Name="rss_post_options[addAuthor]" Value="1" <?php if ($post_options['addAuthor']==1){echo 'checked="checked"';} ?></label></p>


<p ><label class='o_textinput' for='addSource'><?php _e("Show Feed Source", 'wp-rss-multi-importer')?>   <input type="checkbox" Name="rss_post_options[addSource]" Value="1" <?php if ($post_options['addSource']==1){echo 'checked="checked"';} ?></label></p>



<h3><?php _e("HTML and Image Handling", 'wp-rss-multi-importer')?></h3>


<p><label class='o_textinput' for='stripAll'><?php _e("Check to get rid of all html and images in the excerpt.", 'wp-rss-multi-importer')?>
	<SELECT NAME="rss_post_options[stripAll]" id="stripAll">
	<OPTION VALUE="1" <?php if($post_options['stripAll']==1){echo 'selected';} ?>><?php _e("Yes", 'wp-rss-multi-importer')?></OPTION>
	<OPTION VALUE="0" <?php if($post_options['stripAll']==0){echo 'selected';} ?>><?php _e("No", 'wp-rss-multi-importer')?></OPTION>
	</SELECT>
</p>







<span id="stripAllsecret" <?php if($post_options['stripAll']==1){echo 'style="display:none"';}?>>
	
	
	<p ><label class='o_textinput' for='stripSome'><?php _e("Preserve limited tags (p,strong,b,br,i,em,li,ul,pre,code,sup,sub>,u>,h2,h3>,h4)   ", 'wp-rss-multi-importer')?><input type="checkbox" Name="rss_post_options[stripSome]" Value="1" <?php if ($post_options['stripSome']==1){echo 'checked="checked"';} ?></label>   (leave unchecked for all html to be preserved)</p>

<p><label class='o_textinput' for='maximgwidth'><?php _e("Maximum width size of images", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_post_options[maximgwidth]">
<OPTION VALUE="150" <?php if($post_options['maximgwidth']==150){echo 'selected';} ?>>150px</OPTION>
<OPTION VALUE="250" <?php if($post_options['maximgwidth']==250){echo 'selected';} ?>>250px</OPTION>
<OPTION VALUE="350" <?php if($post_options['maximgwidth']==350){echo 'selected';} ?>>350px</OPTION>
<OPTION VALUE="500" <?php if($post_options['maximgwidth']==500){echo 'selected';} ?>>500px</OPTION>
<OPTION VALUE="999" <?php if($post_options['maximgwidth']==999){echo 'selected';} ?>><?php _e("unrestricted", 'wp-rss-multi-importer')?></OPTION>
</SELECT></p>

<p ><label class='o_textinput' for='RSSdefaultImage'><?php _e("Default category image setting", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_post_options[RSSdefaultImage]" id="RSSdefaultImage">
<OPTION VALUE="0" <?php if($post_options['RSSdefaultImage']==0){echo 'selected';} ?>>Process normally</OPTION>
<OPTION VALUE="1" <?php if($post_options['RSSdefaultImage']==1){echo 'selected';} ?>>Use default image for category</OPTION>
<OPTION VALUE="2" <?php if($post_options['RSSdefaultImage']==2){echo 'selected';} ?>>Replace articles with no image with default category image</OPTION>

</SELECT></p>




<p ><label class='o_textinput' for='setFeaturedImage'><?php _e("Select how to use the image (in excerpt and/or as the Featured Image).", 'wp-rss-multi-importer')?></label>
<SELECT NAME="rss_post_options[setFeaturedImage]" id="setFeaturedImage">
<OPTION VALUE="0" <?php if($post_options['setFeaturedImage']==0){echo 'selected';} ?>>Excerpt Only</OPTION>
<OPTION VALUE="1" <?php if($post_options['setFeaturedImage']==1){echo 'selected';} ?>>Excerpt and Featured Image</OPTION>
<OPTION VALUE="2" <?php if($post_options['setFeaturedImage']==2){echo 'selected';} ?>>Featured Image Only</OPTION>
</SELECT></p>


</span>





<?php



$catOptions= get_option( 'rss_import_categories' ); 

	if ( !empty($catOptions) ) {
		echo "<h3><label class='o_textinput' for='category'>".__('Restrict feeds to one of your defined RSS Multi Importer categories and place them in your blog categories', 'wp-rss-multi-importer')."</label></h3>";
			echo "<p>".__('Choose a category and enter 0 if you want this to go into an uncategorized category on your blog, or enter the ID number of the blog category you want the posts to go into. <a href="http://www.allenweiss.com/faqs/finding-the-id-number-for-feed-to-post-category" target=_"blank">How to find this ID number.</a>', 'wp-rss-multi-importer')."</p>";
				
	//if (count(array_filter($post_options['categoryid']['wpcatid'],'chk_zero_callback')) == 0){

//	echo "<h3>".__('You must select at least one category (or all) and an integer ID of your blog category for this to work...enter 0 if not sure.')."</h3>";
//	}

echo '<div class="ftpost_head">Category</div><div class="ftpost_head">Blog Category ID</div><div style="clear:both;"></div>';	
		$catsize = count($catOptions);
		$postoptionsize= $catsize/2;

		for ( $q=1; $q<=$postoptionsize; $q++ ){
			

			
			if ($post_options['categoryid']['wpcatid'][$q]<>'' || $q==1){
			echo "<div class='category_id_options' id='$q'>";
			$selclear=0; // added
			}else{	
			echo "<div class='category_id_options' id='$q' style='display:none'>";
			$selclear=1; // added
			}
?>

<p><span class="ftpost_l"><SELECT NAME="rss_post_options[categoryid][plugcatid][<?php echo $q ?>]">
	<?php if ($selclear==1){  // added
	?>
	<OPTION selected VALUE=''>None</OPTION>
	<?php
}
	?>
	
<OPTION VALUE='0'>All</OPTION>
<?php




	for ( $k=1; $k<=$catsize; $k++) {   

if( $k % 2== 0 ) continue;

 	$catkey = key( $catOptions );
 	$nameValue=$catOptions[$catkey];
next( $catOptions );
 	$catkey = key( $catOptions );
	$IDValue=$catOptions[$catkey];


	 if($post_options['categoryid']['plugcatid'][$q]==$IDValue && $selclear==0){  // selclear added
		$sel='selected  ';

		} else {
		$sel='';

		}

echo "<OPTION " .$sel.  "VALUE=".$IDValue.">".$nameValue."</OPTION>";
next( $catOptions );

}
echo "</SELECT></span><span class='ftpost_r'>";
echo "<input id='wpcategory' type='text' name='rss_post_options[categoryid][wpcatid][$q]' size='2' maxlength='3' value=".$post_options['categoryid']['wpcatid'][$q]." ></span></p></div>";
reset($catOptions);

}

echo "<a href='javascript:void(0)' class='add_cat_id'>Add another category</a>";








}else{
	
	echo __("<b>NOTE: If you set up categories (in Category Options) you can restrict only feeds in that category to go into blog posts.</b> ", 'wp-rss-multi-importer');
}

?>


</div></div>

       <p class="submit"><input type="submit" value="Save Settings" name="submit" class="button-primary"></p>



       </form>

<button type="button" name="fetchnow" id="fetch-now" value=""><?php _e("CLICK TO FETCH FEEDS NOW", 'wp-rss-multi-importer')?></button>	
<div id="note"></div>
</div></div></div>
<?php
}


function chk_zero_callback($val) {
    if ($val != null){
	return true;
}
}


?>