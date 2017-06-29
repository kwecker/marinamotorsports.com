		<?php include('sidebar.php'); ?>
	</section>

	<footer id="main-footer">
		<div class="wrap">
			<nav id="footer-navigation">
				<ul class="menu">
					<?php makeNavItems($nav, $section); ?>
				</ul>
			</nav>

			<p class="copyright">&copy;<?=date('Y')?> Marina Motorsports, Inc. All Rights Reserved</p>
			<p class="contact"><a href="mailto:jam@redshift.com">jam@redshift.com</a></p>
			<p class="social-icons">
				<a href="https://www.facebook.com/MarinaMotorsports/" class="facebook" target="_blank"><img src="/images/facebook.png" alt="Facebook"></a>
			</p>
		</div>
	</footer>

</div>
<!-- build:js /js/jquery.app.min.js -->
<script src="../js/jquery.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/jquery.chocolat.min.js"></script>
<!-- endbuild -->
<script>
	$(document).ready(function() {
		$('.slideshow').slick({
			mobileFirst: true,
			autoplay: true,
			autoplaySpeed: 5000
		});

		$('.lightbox').Chocolat();

		var sum = 0;
		$(".charities .cost").each(function() {
			sum += parseInt(($(this).html()).replace(',', ''));
		});

		$(".charities-total .cost").html((sum.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
	});
</script>

</body>
</html>