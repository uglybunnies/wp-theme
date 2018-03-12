<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package SV-html5
 * @since SV-html5 0.1
 */
?>


</section>
<!-- end main section -->
<footer class="sitefoot layout">
<section class="col wide studios pad">
        <section class="footsection">
            <h2 class="brand">Departments</h2>
            <ul class="inlineList">
                <li><a href="/design">Design Studio</a></li>
                <li><a href="/art">Art Studio</a></li>
                <li><a href="/articles">Articles</a></li>
                <li><a href="/home/about">About</a></li>
                <li><a href="/home/links">Links</a></li>
                <li><a href="/home/contact">Contact</a></li>
            </ul>
        </section>
        <section class="footsection hilites">
            <h2 class="brand">The Design Studio Highlights</h2>
                <ul class="inlineList">
                    <li class="hilite"><a href="/design/erran-andrews-website"><img src="/Portfolio/erranAndrews/ea1_th.png" alt="Erran Andrews Website" /></a><br />
    <a href="/design/erran-andrews-website">Erran Andrews Website</a></li>
                    <li class="hilite"><a href="/design/ni-sa-bula-online-store"><img src="/Portfolio/niSaBula/nsbHome_th.gif" alt="Ni Sa Bula" /></a><br />
    <a href="/design/ni-sa-bula-online-store">Ni Sa Bula Onine Store</a></li>
                    <li class="hilite"><a href="/design/denali-software-webcast"><img src="/Portfolio/denaliWebcast/denaliWebcast1_th.png" alt="Denali Software" /></a><br /><a href="/design/denali-software-webcast">Denali Software Webcast</a></li>
                </ul>
                <p class="ralign"><a href="/design">More from the Design Studio &#187;</a></p>
        </section>
        <section class="footsection hilites">
            <h2 class="brand">The Art Studio Highlights</h2>
                <ul class="inlineList">
                    <li class="hilite"><a href="/art/cityscapes"><img src="/Art/Photography/Cityscapes/CoitAtNight_TH.jpg" alt="Cityscapes" /></a><br />
<a href="/art/cityscapes">Cityscapes</a></li>
                    <li class="hilite"><a href="/art/uniquely-creative"><img src="/Art/Photography/UC/ReflectionOnSecurity_TH.jpg" alt="Uniquely Creative" /></a><br />
<a href="/art/uniquely-creative">Uniquely Creative</a></li>
                    <li class="hilite"><a href="/art/through-windows-series"><img src="/Art/Photography/Windows/NineToSix_TH.jpg" alt="Through Windows Series" /></a><br />

<a href="/art/through-windows-series">Through Windows Series</a></li>
                </ul>
                <p class="ralign"><a href="/art/">More from the Art Studio  &#187;</a></p>
        </section>
    </section><section class="col narrow inspire pad">
        <h2 class="brand">Sponsor Space</h2>
		<div>
		<script type="text/javascript"><!--
		google_ad_client = "ca-pub-2602922710899329";
		/* Footer Ad */
		google_ad_slot = "5579377895";
		google_ad_width = 250;
		google_ad_height = 250;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
		</div>
    </section>
</footer>
<p class="credit pad">SerpentVenom Copyright &copy; 1996&#8211;<?php echo date('Y'); ?></p>
<?php wp_footer(); ?>
<?php if ( is_tree('520') || is_tree('516')) : ?>
	<script src="/js/projNav.js"></script>
	<script src="/js/galPop.js"></script>

<?php endif; ?>
</body>
</html>