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
				<a href="https://www.facebook.com/MarinaMotorsports/" class="facebook" target="_blank">Facebook</a>
			</p>
		</div>
	</footer>

</div>

</body>
</html>