
	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.php">
					<!-- <img src="./img/logo-light.png" alt=""> -->
					<p>Pikup</p>
				</a>
			</div>
			<div class="row ipad_footer_responsive">
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p class="about_us_text">Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Gallery</h2>
						<br>
						<div class="footer_ipad_center">
							
						<!-- <ul>
							<li><a href="#!">About Us</a></li>
							<li><a href="#!">Returns</a></li>
							
							
						</ul>
						<ul>
							
							<li><a href="#!">Terms of Use</a></li>
						</ul> -->
						<div class="row ml-0 mr-0 ipad_footer_gallery">
							<div class="col-md-3 col-3 pl-1 pr-1">
								<div class="gallery_image_footer">
									<img src="img/car_wash.jpg">
								</div>
							</div>
							<div class="col-md-3 col-3 pl-1 pr-1">
								<div class="gallery_image_footer">
									<img src="img/plumber.jpg">
								</div>
							</div>
							<div class="col-md-3 col-3 pl-1 pr-1">
								<div class="gallery_image_footer">
									<img src="img/Mugaritz_San_Sebastian.jpg">
								</div>
							</div>
							<div class="col-md-3 col-3 pl-1 pr-1"></div>
						</div>
						<div class="row ml-0 mr-0 ipad_footer_gallery" style="margin-top: 10px;">
							<div class="col-md-3 col-3 pl-1 pr-1">
								<div class="gallery_image_footer">
									<img src="img/carpenter.jpg">
								</div>
							</div>
							<div class="col-md-3 col-3 pl-1 pr-1">
								<div class="gallery_image_footer">
									<img src="img/noma.jpg">
								</div>
							</div>
							<div class="col-md-3 col-3 pl-1 pr-1">
								<div class="gallery_image_footer">
									<img src="img/SM_Mall_of_Asia.jpg">
								</div>
							</div>
							<div class="col-md-3 col-3 pl-1 pr-1"></div>
						</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Contact Us</h2>
						<div class="con-info">
							
							<p><span>C.</span> Your Company Ltd </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+53 345 7953 32453</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp" data-aos="fade-up">
			<div class="container">
				<div class="social-links">
					<a href="#!" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="#!" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="#!" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="#!" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="#!" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="#!" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="#!" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by Pikup<!-- | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> --></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('/')}}pickupjs/jquery-3.2.1.min.js"></script>

	<script src="{{asset('/')}}pickupjs/bootstrap.min.js"></script>
	<script src="{{asset('/')}}pickupjs/jquery.slicknav.min.js"></script>
	<script src="{{asset('/')}}pickupjs/owl.carousel.min.js"></script>
	<script src="{{asset('/')}}pickupjs/jquery.nicescroll.min.js"></script>
	<script src="{{asset('/')}}pickupjs/jquery.zoom.min.js"></script>
	<script src="{{asset('/')}}pickupjs/jquery-ui.min.js"></script>
	<script src="{{asset('/')}}pickupjs/main.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/aos/3.0.0-beta.5/aos.js"></script>
<script type="text/javascript">
		AOS.init({
  duration: 2000,
})
	</script>
	<script type="text/javascript">
		$(window).on("scroll",  function(){
			if($(window).scrollTop()){
				// $('.header-top').css('padding','0px 0 0px');
				// $('.site-logo img').css('height','40px');
				// $('.site-logo img').css('margin','5px 0');
				// $('.up-item').css('margin-top','5px');
				$('header').addClass('header-section-1');

			}
			else{
				
				$('header').removeClass('header-section-1');
			}
		})
	
	</script>
	<!-- <script type="text/javascript">
		if ($(window).width() < 768) {
      $('.full-width-content').removeClass('col-md-8');
      $('.full-width-content').addClass('col-md-12');
      $('.full-width-content').removeClass('col-md-4');
      $('.full-width-content').addClass('col-md-0');

      $('.full-width-content-2').removeClass('col-md-6');
      $('.full-width-content-2').addClass('col-md-0');
      $('.full-width-content-3').removeClass('col-md-6');
      $('.full-width-content-3').addClass('col-md-12');
  }
	</script> -->
	<script type="text/javascript">
		$('#hoverrr').mouseover(function(){
			$('#show_on_hover').css('display','block');
			$('#hide_on_hover').css('display','none');
		});
		$('#hoverrr').mouseleave(function(){
			$('#show_on_hover').css('display','none');
			$('#hide_on_hover').css('display','block');
		});

		$('#hoverrr1').mouseover(function(){
			$('#show_on_hover1').css('display','block');
			$('#hide_on_hover1').css('display','none');
		});
		$('#hoverrr1').mouseleave(function(){
			$('#show_on_hover1').css('display','none');
			$('#hide_on_hover1').css('display','block');
		});

		$('#hoverrr2').mouseover(function(){
			$('#show_on_hover2').css('display','block');
			$('#hide_on_hover2').css('display','none');
		});
		$('#hoverrr2').mouseleave(function(){
			$('#show_on_hover2').css('display','none');
			$('#hide_on_hover2').css('display','block');
		});

		$('#hoverrr3').mouseover(function(){
			$('#show_on_hover3').css('display','block');
			$('#hide_on_hover3').css('display','none');
		});
		$('#hoverrr3').mouseleave(function(){
			$('#show_on_hover3').css('display','none');
			$('#hide_on_hover3').css('display','block');
		});
	</script>

	</body>
</html>
