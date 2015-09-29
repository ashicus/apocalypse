@layout("master")

@section("content")

<div id="error"><?= Session::get("error") ?></div>
<form id="lookup" action="<?= URL::to_action("/") ?>" method="get">
	<label for="birthday">Enter your fucking birthday:</label>
	<input type="text" id="birthday" name="birthday" defaultValue="mm/dd/yyyy" value="<?= Input::get("birthday") ?>" tabindex="1" />
	<input type="submit" value="Go!" />
</form>

<? if(isset($past_apocalypses) && count($past_apocalypses)) { ?>
	<h2>YOU'VE SURVIVED <?= count($past_apocalypses) ?> FUCKING APOCALYPSES...</h2>

	<p class="tweet">
		<a href="http://twitter.com/home/?status=<?= Services\Twitter::tweetText($past_apocalypses, true) ?>">Tweet that shit!</a>
	</p>

	<ol>
		<? foreach($past_apocalypses as $apocalypse) { ?>
			<li class="apocalypse">
				<span class="date"><?= $apocalypse->readable_date ?></span>
				<span class="claimant"><?= utf8_decode($apocalypse->claimant) ?></span>
				<span class="description"><?= utf8_decode($apocalypse->description) ?></span>
			</li>
		<? } ?>
	</ol>
<? } ?>

<? if(isset($future_apocalypses) && count($future_apocalypses)) { ?>
	<h2>AND YOU'VE GOT MORE TO FUCKING LOOKING FORWARD TO...</h2>
	<ol>
		<? foreach($future_apocalypses as $apocalypse) { ?>
			<li class="apocalypse">
				<span class="date"><?= $apocalypse->readable_date ?></span>
				<span class="claimant"><?= utf8_decode($apocalypse->claimant) ?></span>
				<span class="description"><?= utf8_decode($apocalypse->description) ?></span>
			</li>
		<? } ?>
	</ol>
<? } ?>

@endsection