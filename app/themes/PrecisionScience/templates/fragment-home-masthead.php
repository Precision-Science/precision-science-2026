<style>
#nav_button{
	position: relative;
	top:-1px;
	cursor: pointer;
}
.select-box {
  position: relative;
  display: inline-block;
  width: 180px;
  margin: 0 auto;
  font-size: 1.15rem;
}
.select-box__current {
  position: relative;
  border:1px solid #f1f1f1;
  cursor: pointer;
  outline: none;
  background: #FFF;
}
.select-box__current:focus + .select-box__list {
  opacity: 1;
  -webkit-animation-name: none;
          animation-name: none;
}
.select-box__current:focus + .select-box__list .select-box__option {
  cursor: pointer;
}
.select-box__current:focus .select-box__icon {
  -webkit-transform: translateY(-50%) rotate(180deg);
          transform: translateY(-50%) rotate(180deg);
}
.select-box__icon {
  position: absolute;
  top: 50%;
  right: 15px;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  width: 20px !important;
  opacity: 0.3;
  -webkit-transition: 0.2s ease;
  transition: 0.2s ease;
}
.select-box__value {
  padding:0 6px;
  display: -webkit-box;
  display: flex;
}
.select-box__input {
  display: none;
}
.select-box__input:checked + .select-box__input-text {
  display: block;
}
.select-box__input-text {
  display: none;
  width: 100%;
  margin: 1px 0 0;
  padding: 4px 0 5px;
  line-height: 100% !important;
  font-weight: normal !important;
}
.select-box__list {
  position: absolute;
  width: 100%;
  margin:-1px 0 0;
  padding: 0;
  list-style: none;
  opacity: 0;
  -webkit-animation-name: HideList;
          animation-name: HideList;
  -webkit-animation-duration: 0.5s;
          animation-duration: 0.5s;
  -webkit-animation-delay: 0.5s;
          animation-delay: 0.5s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
  -webkit-animation-timing-function: step-start;
          animation-timing-function: step-start;
  border:1px solid #f1f1f1;
}
.select-box__list li{
	margin:0;
	padding:0;
}
.select-box__list li:before{
	display: none !important;
}
.select-box__option {
  display: block;
  padding: 4px 6px;
  font-size:1.15rem;
  background-color: #fff;
}
.select-box__option:hover, .select-box__option:focus {
  color: #63666a;
  background-color: rgba(134, 200, 188,0.3);
}
@-webkit-keyframes HideList {
  from {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
  to {
    -webkit-transform: scaleY(0);
            transform: scaleY(0);
  }
}

@keyframes HideList {
  from {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
  to {
    -webkit-transform: scaleY(0);
            transform: scaleY(0);
  }
}
.logos .column{
	display: flex;
	flex-wrap: wrap;
	gap: 32px;
	align-items: center;
	opacity:0.5 !important;
}

</style>
<?php

	function capabilities_dropdown() { 
		global $post; 
		 
		$args = array(
			'title_li'	=> null,
			'echo'		=> false,
			'child_of'	=> 44,
			'walker'    => new wp_sage_dropdownwalker()
		);
		$childpages = wp_list_pages($args);
		 
/*
		$output  = '<select id="nav_select">';
		$output .= $childpages;
		$output .= '</select>';
		$output .= '<button id="nav_button">Go</button>';
*/
		?>
		
		<div class="select-box">
		  <div class="select-box__current" tabindex="1">
		    <div class="select-box__value">
		      <input class="select-box__input" type="radio" id="0" value="softchews" name="nav_select" checked="checked">
		      <p class="select-box__input-text">Soft Chews</p>
		    </div>
		    <div class="select-box__value">
		      <input class="select-box__input" type="radio" id="1" value="powder" name="nav_select">
		      <p class="select-box__input-text">Powders</p>
		    </div>
		    <div class="select-box__value">
		      <input class="select-box__input" type="radio" id="2" value="pellets" name="nav_select">
		      <p class="select-box__input-text">Pellets</p>
		    </div>
		    <div class="select-box__value">
		      <input class="select-box__input" type="radio" id="3" value="faqs" name="nav_select">
		      <p class="select-box__input-text">FAQs</p>
		    </div>
		    <img class="select-box__icon" src="https://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true">
		  </div>
		  <ul class="select-box__list">
		    <li>
		      <label class="select-box__option" for="0" aria-hidden="aria-hidden">Soft Chews</label>
		    </li>
		    <li>
		      <label class="select-box__option" for="1" aria-hidden="aria-hidden">Powders</label>
		    </li>
		    <li>
		      <label class="select-box__option" for="2" aria-hidden="aria-hidden">Pellets</label>
		    </li>
		    <li>
		      <label class="select-box__option" for="3" aria-hidden="aria-hidden">FAQs</label>
		    </li>
		  </ul>
		</div>
		<button id="nav_button">Go</button>
		
		<?php
	}
	
?>
<header id="masthead" class="page-header" data-scroll-show data-scroll-slide="home">
	<div class="grid-container">
		<div class="row collapse">
			<div class="column xsmall-12">
				<div class="row">
					<div class="column xsmall-12">
						<h1 class=""><?php the_papi_field('h1_title'); ?></h1>
						<div class="headline">
							<span class="line1">
								<span class="intro"><?php the_papi_field('intro_title'); ?></span>
								<span class="keywords">
								<?php 
									$keywords = papi_get_field('keywords');
									foreach($keywords as $id => $key):
								?>
									<span class="keyword" id="keyword_<?php echo $id; ?>">
										<span><?php echo $key['keyword']; ?></span>
									</span>
								<?php endforeach;?>
								</span>
							</span>
							<span class="line2"><?php the_papi_field('intro_title2'); ?></span>
						</div>
						</div>
				</div>
				<div class="row video"><div class="column medium-7">
					<ul>
					 	<li>We are a U.S. contract manufacturer of animal pharmaceuticals, nutraceuticals and medicated feed products.</li>
					 	<li>We create custom solutions for global partners.</li>
					 	<li>We consider every detail — so you don’t have to.</li>
						<li>Learn more about our <?php echo capabilities_dropdown(); ?></li>
					</ul>
				    <button class="btn btn-mint open-video">Watch our Video</button>				
				</div></div>
				<div class="row logos"><div class="column medium-12">
					<img alt="FDA logo" src="<?php echo get_template_directory_uri();?>/dist/img/fda.png"  style="height:21px !important;" />
					<img alt="European Medicines Agency logo" src="<?php echo get_template_directory_uri();?>/dist/img/ema.png"  style="height:53px !important;"/>
					<img alt="Health Canada logo" src="<?php echo get_template_directory_uri();?>/dist/img/healthcanada.png" style="height:26px !important;"/><img alt="CGMP logo" src="<?php echo get_template_directory_uri();?>/dist/img/cgmp.png" style="height:25px !important;"/>
					<img alt="APHIS logo" src="<?php echo get_template_directory_uri();?>/dist/img/aphis.png"  style="height:46px !important;"/>
					<img alt="NAISC logo" src="<?php echo get_template_directory_uri();?>/dist/img/naisc.png" style="height:53px !important;"/>
					<img alt="USDA Organic logo" src="<?php echo get_template_directory_uri();?>/dist/img/usdaorganic-gray.png" style="height:53px !important;"/>
				</div></div>
			</div>
		</div>
	</div>
	<div class="background_video">
		<video autoplay muted loop  poster="/app/media/ps_video_background.png">
		  <source src="/app/media/ps_video_background.mp4" type="video/mp4">
		</video>
	</div>
</header>
<script>
	//Dropdown controls
	document.getElementById('nav_button').onclick = function () {
	    sel = document.querySelector('input[name="nav_select"]:checked').value;
	    console.log(sel);
        window.location = 'https://precisionscience.com/capabilities/'+sel; 
    }
    //Background video
    var iOS = /iPad|iPhone|iPod/.test(navigator.platform);
	if( iOS ) {
	    var background_videos = document.querySelectorAll('.background_video');
	    for( i=0; i<background_videos.length; i++ ) {
	        background_videos[i].parentNode.removeChild(background_videos[i]);
	    }
	}
 
</script>