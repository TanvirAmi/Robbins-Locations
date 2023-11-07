<?php /* Template Name:  Venue Page */ ?>
<?php get_header(); ?>
	
	<style>
	*{margin:0px; padding:0px;}
	img{ max-width:100%;}
	ul li{ list-style:none;}
	.full-width-container {    padding: 0 60px;}

.full-width-row {
    display: flex;
}

.venue-sid-bar {
    width: 25%;
    padding: 0 15px;
}

.venue-content-sec {
    padding: 0 15px;
     
}

.content-row {
    display: flex;
    margin-left: -15px;
    margin-right: -15px;
	width: 75%;
}

.content-col {
    width: 50%;
    padding: 0 15px;
    margin: 0 0 60px;
}

.content-col .post-name {
    font-size: 40px;
    line-height: 40px;
    font-weight: 700;
}

.content-col .catagory-name {
    font-size: 20px;
}

.content-col .img-col {
    margin: 0 0 40px;
}

.catagory-section {
    border-bottom: 1px solid #000;
    margin-bottom: 60px;
	display:flex;
}

.catagory-list ul li a {
    color: #000;
    font-size: 28px;
    text-decoration: none;
    display: block;
    margin: 5px 0;
	position:relative;
}

.venue-sid-bar .catagory-title {
    font-size: 50px;
}

.catagory-list ul li.active a:before {
    content: "";
    height: 2px;
    width: 25px;
    background: #000;
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
}
</style>


<main class="page-venue">
		<div class="full-width-container">
			
				
					<div class="venue-content-sec">
						
						<div class="catagory-section" id="nyc">
							<div class="venue-sid-bar">
								<div class="catagory-title">NYC</div>
								<div class="catagory-list">
									<ul>
										<li class="active"><a href="#nyc">NYC</a></li>
										<li><a href="#mi">MI</a></li>
										<li><a href="#la">LA</a></li>
									
									</ul>
								
								</div>
				
							</div>
							<div class="content-row">
								<div class="content-col">
									<div class="img-col"><img src="https://media.dmbk.io/skylight/wp-content/uploads/2021/05/12152058/IMG_1329-scaled-e1622819543491.jpg?" alt=""/></div>
									<div class="catagory-name">NYC</div>
									<div class="post-name">Skylight Modern</div>
								
								</div>
								<div class="content-col">
									<div class="img-col"><img src="https://media.dmbk.io/skylight/wp-content/uploads/2021/05/12152058/IMG_1329-scaled-e1622819543491.jpg?" alt=""/></div>
									<div class="catagory-name">NYC</div>
									<div class="post-name">Skylight Modern</div>
								
								</div>
							
							</div>
						</div>
						<div class="catagory-section" id="mi">
							<div class="venue-sid-bar">
								<div class="catagory-title">MI</div>
								<div class="catagory-list">
									<ul>
										<li><a href="#nyc">NYC</a></li>
										<li class="active"><a href="#mi">MI</a></li>
										<li><a href="#la">LA</a></li>
									
									</ul>
								
								</div>
				
							</div>
							<div class="content-row">
								<div class="content-col">
									<div class="img-col"><img src="https://media.dmbk.io/skylight/wp-content/uploads/2021/05/12152058/IMG_1329-scaled-e1622819543491.jpg?" alt=""/></div>
									<div class="catagory-name">MI</div>
									<div class="post-name">MI Skylight Modern</div>
								
								</div>
								<div class="content-col">
									<div class="img-col"><img src="https://media.dmbk.io/skylight/wp-content/uploads/2021/05/12152058/IMG_1329-scaled-e1622819543491.jpg?" alt=""/></div>
									<div class="catagory-name">MI</div>
									<div class="post-name">MI Skylight Modern</div>
								
								</div>
							
							</div>
						 </div>
						 
						 <div class="catagory-section" id="la">
							<div class="venue-sid-bar">
								<div class="catagory-title">LA</div>
								<div class="catagory-list">
									<ul>
										<li><a href="#nyc">NYC</a></li>
										<li><a href="#mi">MI</a></li>
										<li class="active"><a href="#la">LA</a></li>
									
									</ul>
								
								</div>
				
							</div>
							<div class="content-row">
								<div class="content-col">
									<div class="img-col"><img src="https://media.dmbk.io/skylight/wp-content/uploads/2021/05/12152058/IMG_1329-scaled-e1622819543491.jpg?" alt=""/></div>
									<div class="catagory-name">LA</div>
									<div class="post-name">LA Skylight Modern</div>
								
								</div>
								<div class="content-col">
									<div class="img-col"><img src="https://media.dmbk.io/skylight/wp-content/uploads/2021/05/12152058/IMG_1329-scaled-e1622819543491.jpg?" alt=""/></div>
									<div class="catagory-name">LA</div>
									<div class="post-name">LA Skylight Modern</div>
								
								</div>
							
							</div>
						 </div>
						</div>
					
					
				</div>
		
		
		
	
	
	
	
	
	</main>




<?php get_footer(); ?>