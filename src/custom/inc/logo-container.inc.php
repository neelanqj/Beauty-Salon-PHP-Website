<div id="logo-container" class="text-center">
        <span id="main-title">Mila Laser & Skin Care Clinic</span>
        <br />
        <img src="src/custom/img/phone-icon.png" width="16" height="16" /> 
        <a href="tel:6477796452">647-779-6452</a>
        &nbsp;&nbsp;&nbsp; <br class="rwd-break" />
        <img src="src/custom/img/phone-icon.png" width="16" height="16" /> 
        <a href="tel:6479385941">905-237-6452</a><br/>
        <img src="src/custom/img/email-icon.png" width="16" height="16" /> 
        <a href="mailto:info@milalaserclinic.ca?Subject=Mila%20Clinic%20Inquiry">info@milalaserclinic.com</a>
        <a href="https://www.facebook.com/pages/Mila-Laser-Skin-Care-Clinic/639819212733661" target="_blank">
        <div id="fb-share">
        <br/><br/>
        </div>
        </a>
        Mon - Fri 11:00 AM - 6:00 PM (By Appointment Only)<br/>
        Sat 11:00 AM - 3:00 PM (By Appointment Only)<br/><br/>
        
        10376 Yonge St, Unit 207, 
        Richmond Hill, L4C 3B8, 
        ON<br/><br/>
                    
        <a id="services_btn" href="services.php">
        <?php
			if (basename($_SERVER['PHP_SELF']) == "services.php") {
				echo "<b class='menu-selected'>Services</b>";
			} else {
				echo "Services";
			}
		?>
		</a><br class="rwd-break"/> 
        <span class="black-circle break" style="margin-left:10px;margin-right:6px">●</span>
        <a id="deals_btn" href="specials.php">
        <?php
			if (basename($_SERVER['PHP_SELF']) == "specials.php") {
				echo "<b class='menu-selected'>Specials</b>";
			} else {
				echo "Specials";
			}
		?>
        </a><br class="rwd-break"/>       
        <span class="black-circle break" style="margin-left:10px;margin-right:6px">●</span>
        <a id="products_btn" href="products.php">
        <?php
			if (basename($_SERVER['PHP_SELF']) == "products.php") {
				echo "<b class='menu-selected'>Products</b>";
			} else {
				echo "Products";
			}
		?>
        </a>
        <br/><br class="break"/>       
        
        <a id="about_btn" href="about.php">
        <?php
			if (basename($_SERVER['PHP_SELF']) == "about.php") {
				echo "<b class='menu-selected'>About</b>";
			} else {
				echo "About";
			}
		?>
        </a><br class="rwd-break"/> 
        <span class="black-circle break" style="margin-left:10px;margin-right:6px">●</span>
        <a id="location_btn" href="contact.php">
        <?php
			if (basename($_SERVER['PHP_SELF']) == "contact.php") {
				echo "<b class='menu-selected'>Contact</b>";
			} else {
				echo "Contact";
			}
		?>
        </a>        
    	<br/><br/>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58934364-1', 'auto');
  ga('send', 'pageview');

</script>