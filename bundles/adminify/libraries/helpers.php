<?php namespace Adminify\Libraries;

use Laravel\Config as Config,
Laravel\Str as Str,
Laravel\Bundle as Bundle,
Laravel\URL as URL,
Laravel\File as File;

class Helpers{

	public static function getModels(){

		$models = scandir(path('app').'models');

		$exclude = Config::get('Adminify::settings.exclude');
		$exclude = array_merge($exclude, array('.', '..', '.gitignore'));

		$return = array();

		foreach($models as $model){
			$model = ucwords(str_replace('.php', '', $model));
			if(!in_array($model, $exclude)) $return[] = Str::plural($model);
		}

		return $return;

	}

	public static function getModel($model){

		$models = static::getModels();
		if(!in_array($model, $models)) return false;

		$model = Str::singular($model);

		return $model;

	}

	public static function getFields($model){

		$excluded = Config::get('Adminify::settings.fields');

		if(!isset($excluded[$model])) return $excluded['all'];

		return array_merge($excluded['all'], $excluded[$model]);

	}

	public static function handle(){
		return Bundle::$bundles['adminify']['handles'];
	}

	public static function url($url){
		$url = trim($url, '/');
		return URL::to(static::handle().'/'.$url);
	}

	public static function logfiles(){

		$files = array_reverse(scandir(path('storage').'/logs'));
		$return = array();

		foreach($files as $file) if(stristr($file, '.log')) $return[] = str_replace('.log', '', $file);

		return $return;

	}

	public static function logs($logfile){

		$file = File::get(path('storage').'/logs/'.$logfile.'.log');
		$array =  array_reverse(explode("\n", $file));
		unset($array[0]);

		return $array;

	}

}