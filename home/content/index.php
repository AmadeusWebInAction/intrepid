<div class="container">
	<div class="heading-block border-bottom-0 my-4 text-center">
		<h3><?php echo variable('byline'); ?></h3>
	</div>
</div>
<div class="container">
<div class="grid-filter-wrap">
	<!-- Articles Filter
	============================================= -->
	<ul class="grid-filter" data-container="#articles">
		<li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
		<li><a href="#" data-filter=".art-intro">Introduction</a></li>
		<li><a href="#" class="btn disabled" data-filter=".art-wmm">WMM</a></li>
		<li><a href="#" class="btn disabled" data-filter=".art-general">General</a></li>
		<li><a href="#" class="btn disabled" data-filter=".art-listing">Listings</a></li>
	</ul><!-- .grid-filter end -->

	<div class="grid-shuffle rounded" data-container="#articles">
		<i class="uil uil-sync"></i>
	</div>

</div>
<div id="articles" class="portfolio row grid-container gutter-30">
<?php
$tpl = '<article class="portfolio-item col-md-4 col-sm-6 col-12 art-%type%">
	<div class="grid-inner content-box">
		<div class="portfolio-image">
			<a href="%link%">
				<img src="%image%" alt="%title%">
			</a>
		</div>
		<div class="portfolio-desc">
			<h3><a href="%link%">%title%</a></h3>
			<span>%content%</span>
		</div>
	</div>
</article>
';

$boxes = explode('## ', disk_file_get_contents(__DIR__ . '/index.md'));
$first = true;
foreach ($boxes as $ix => $item) {
	if ($first) {
		$first = false;
		continue;
	}

	$titleBits = explode(SAFENEWLINE, $item, 2);
	$title = $titleBits[0];
	$image = siteOrNetworkOrAppStatic('blocks/' . urlize ($title) . '.jpg');

	$meta = parseMeta($item);
	$content = $meta ? $meta['rest-of-content'] : $titleBits[1];
	//$content .= '<b>' . urlize($title) . '</b>' . HRTAG . renderMarkdown('%latin-2paras-codesnippet%', ['echo' => false]);

	$link = $meta && isset($meta['link']) ? $meta['link'] : '#missing';

	$type = 'intro';
	echo replaceItems($tpl, compact('type', 'title', 'image', 'content', 'link'), '%');
}



?>
</div></div><!-- #portfolio -->
