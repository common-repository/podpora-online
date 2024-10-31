<?php

    // Funkce pro vytvoření widgetu na nástěnce
    function UP_wCP(){
		wp_add_dashboard_widget('widget_podpora_online', 'Reklama podpora online', 'UP_ZobrazwCP');
	}

	// Funkce pro zobrazení widgetu na nástěnce
	function UP_ZobrazwCP(){
		?>
		<div class="podpora-online-widget">
		  <p><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- web zákazníci -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-8881781121147805"
     data-ad-slot="8827790416"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></p>
		</div>
		<?php
	}
	
	// Spuštění funkce pro vytvoření widgetu na nástěnce
    	add_action('wp_dashboard_setup', 'UP_wCP');

?>