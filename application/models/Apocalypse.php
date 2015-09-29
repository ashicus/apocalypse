<?php

class Apocalypse extends Eloquent
{

	public static function lookupByDate($date)
	{
		$dateText = $date->format("Y-m-d");
		$now = new DateTime();
		$now = $now->format("Y-m-d");

		return static::where("start_date", ">=", $dateText)->where("end_date", "<", $now)->order_by("start_date", "DESC");
	}

	public static function lookupForFuture()
	{
		$now = new DateTime();
		$now = $now->format("Y-m-d");

		return static::where("start_date", ">", $now)->order_by("start_date", "ASC");
	}

}
