<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
	<meta http-equiv='X-UA-Compatible' content='IE=9'/>
	<meta charset="utf-8" />
	<meta name="author" content="Ash White" />
	<meta name="copyright" content="Copyright <?= date("Y") ?>. All Rights Reserved." />

	<title>THE GODDAMN APOCALYPSE</title>

	<meta name="description" content="Find out how many apocalypses you've survived" />
	<meta name="keywords" content="apocalypse, end of the world" />

	<link rel="shortcut icon" type="image/png" href="<?= URL::to("favicon.png") ?>" />
	<?= HTML::style("css/style.css") ?>

	<?= HTML::script("http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js") ?>
	<?= HTML::script("js/master.js") ?>

	<!--[if lte IE 8]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<div id="container">
		<div id="info">
			<p>by <a href="http://ashic.us">ash white</a></p>
			<p>data from <a href="http://en.wikipedia.org/wiki/List_of_dates_predicted_for_apocalyptic_events">wikipedia</a></p>

			<div id="social">
				<div id="twitter">
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://thegoddamnapocalypse.com" data-text="<?= Services\Twitter::tweetText($past_apocalypses) ?>" data-dnt="true">Tweet</a>
				</div>
			</div>
		</div>

		<h1><a href="<?= URL::to_action("/") ?>">THE GODDAMN APOCALYPSE</a></h1>