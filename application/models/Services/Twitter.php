<?php

namespace Services;

class Twitter
{

	public static function tweetText($apocalypses=null, $includeLink=false)
	{
		$result = "How many &quot;apocalypses&quot; have you survived?";

		if($apocalypses != null && count($apocalypses)) {
			$result = "I've survived " . count($apocalypses) . " &quot;apocalypses!&quot; How about you?";
		}

		if($includeLink) {
			$result .= " http://thegoddamnapocalypse.com";
		}

		return $result;
	}

}
