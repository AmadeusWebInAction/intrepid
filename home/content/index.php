<div class="container content-box">
	<div class="heading-block border-bottom-0 my-4 text-center">
		<h3><?php echo variable('byline'); ?></h3>
	</div>
	<div class="grid-filter-wrap">
		<!-- Articles Filter
		============================================= -->
		<ul class="grid-filter" data-container="#articles">
			<li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
			<li><a href="#" data-filter=".art-introduction">Introduction</a></li>
			<li><a href="#" data-filter=".art-what-matters-most">What Matters Most</a></li>
		</ul><!-- .grid-filter end -->

		<div class="grid-shuffle rounded" data-container="#articles">
			<i class="uil uil-sync"></i>
		</div>

	</div>
</div>

<div class="container">
<div id="articles" class="portfolio row grid-container gutter-30">
<?php
$tpl = '<article class="portfolio-item col-md-4 col-sm-6 col-12 art-%type%">
	<div class="grid-inner content-box">
		<div class="portfolio-image">
			<b class="float-right"><i>%type_r%</i></b><br><br>
			<a class="art-img" href="%link%">
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
	$image = siteOrNetworkOrAppStatic('blocks/' . urlize($title) . '.jpg');

	$meta = parseMeta($item);
	$content = $meta ? $meta['rest-of-content'] : $titleBits[1];
	//$content .= '<b>' . urlize($title) . '</b>' . HRTAG . renderMarkdown('%latin-2paras-codesnippet%', ['echo' => false]);

	$link = pageUrl($meta && isset($meta['link']) ? $meta['link'] : '#missing');

	$type = urlize($title) == 'introduction-to-what-matters-most-(wmm)' ? 'what-matters-most' : 'introduction';
	$type_r = humanize($type);
	echo replaceItems($tpl, compact('type', 'type_r', 'title', 'image', 'content', 'link'), '%');
}

$items = disk_include(SITEPATH . '/what-matters-most/menu.php');
foreach ($items as $slug => $title) {
	$image = siteOrNetworkOrAppStatic('what-matters-most/' . (true ? 'wmm-default' : $slug) . '.jpg');
	$content = getCodeSnippet('latin-2paras');
	$link = pageUrl($slug);
	$type = 'what-matters-most';
	$type_r = humanize($type);
	echo replaceItems($tpl, compact('type', 'type_r', 'title', 'image', 'content', 'link'), '%');
}

?>
</div></div><!-- #portfolio -->