<?php

use Laravel\Str as Str,
Adminify\Libraries\Helpers as Helpers;

class Adminify_Models_Controller extends Adminify_Base_Controller {

	public function get_index($model=null){

		if(is_null($model)) return Redirect::to(Adminify\Libraries\Helpers::handle());

		$model = Adminify\Libraries\Helpers::getModel($model);
		if(is_null($model)) return Redirect::to(Adminify\Libraries\Helpers::handle());

		$table = property_exists($model, 'table') && !is_null($model::$table) ? $model::$table : strtolower(Str::plural($model));
		$structure = DB::query("SHOW COLUMNS FROM `".$table."`");
		$excluded = Helpers::getFields($model);

		$entries = DB::table($table)->paginate(Config::get('adminify::settings.perpage'));

		$this->layout->title = $model;
		$this->layout->nest('content', 'adminify::models.index', array(
			'name' => Str::plural($model),
			'model' => $model,
			'entries' => $entries,
			'structure' => $structure,
			'excluded' => $excluded,
		));

	}

	public function get_add($model=null){

		if(is_null($model)) return Redirect::to(Adminify\Libraries\Helpers::url('/'));

		$model = Adminify\Libraries\Helpers::getModel($model);
		if(is_null($model)) return Redirect::to(Adminify\Libraries\Helpers::url('/'));

		$table = property_exists($model, 'table') && !is_null($model::$table) ? $model::$table : strtolower(Str::plural($model));
		$structure = DB::query("SHOW COLUMNS FROM `".$table."`");
		$excluded = Helpers::getFields($model);

		$this->layout->title = 'Add '.$model;
		$this->layout->nest('content', 'adminify::models.add', array(
			'name' => Str::plural($model),
			'model' => $model,
			'structure' => $structure,
			'excluded' => $excluded,
		));

	}

	public function post_add($model){

		$name = $model;

		$input = Input::all();
		unset($input['csrf_token']);

		$rules = Config::get('Adminify::settings.validation');
		$messages = Config::get('Adminify::settings.messages');
		$validation = Validator::make($input, $rules, $messages);

		if($validation->fails()){
			return Redirect::back()->with_errors($validation)->with_input();
		}

		if(isset($input['password'])){
			$input['password'] = Hash::make($input['password']);
		}

		$model = Adminify\Libraries\Helpers::getModel($model);
		$model::create($input);

		return Redirect::to(Adminify\Libraries\Helpers::url('/models/'.$name))->with('added', true);

	}

	public function get_delete($model=null, $id=null){

		if(is_null($model) || is_null($id)) return Redirect::to(Adminify\Libraries\Helpers::url('/'));

		$this->layout->title = 'Delete Entry';
		$this->layout->nest('content', 'adminify::models.delete', array(
			'model' => Str::singular($model),
			'name' => $model, 
		));

	}

	public function delete_delete($model=null, $id=null){

		$name = $model;

		$model = Helpers::getModel($model);

		if(is_null($model)) return Redirect::to(Adminify\Libraries\Helpers::url('/'));

		$entry = $model::find($id);
		$entry->delete();

		return Redirect::to(Adminify\Libraries\Helpers::url('/models/'.$name))->with('deleted', true);

	}

	public function get_edit($model=null, $id=null){

		$name = $model;

		if(is_null($model) || is_null($id)) return Redirect::to(Adminify\Libraries\Helpers::url('/'));

		$model = Helpers::getModel($model);

		if(is_null($model)) return Redirect::to(Adminify\Libraries\Helpers::url('/'));

		$entry = $model::find($id);
		$table = property_exists($model, 'table') && !is_null($model::$table) ? $model::$table : strtolower(Str::plural($model));
		$structure = DB::query("SHOW COLUMNS FROM `".$table."`");
		$excluded = Helpers::getFields($model);

		$this->layout->title = 'Edit '.$model;
		$this->layout->nest('content', 'adminify::models.edit', array(
			'entry' => $entry,
			'model' => $model,
			'name' => $name,
			'structure' => $structure,
			'excluded' => $excluded,
		));

	}

	public function put_edit($model, $id){

		$name = $model;

		$input = Input::all();
		unset($input['csrf_token']);

		$rules = Config::get('Adminify::settings.validation');
		$messages = Config::get('Adminify::settings.messages');
		$validation = Validator::make($input, $rules, $messages);

		if($validation->fails()){
			return Redirect::back()->with_errors($validation)->with_input();
		}

		if(isset($input['password'])){
			$input['password'] = Hash::make($input['password']);
		}

		$model = Helpers::getModel($model);
		$model = $model::find($id);

		foreach ($input as $key => $i) {
			$model->$key = $i;
		}

		$model->save();

		return Redirect::back()->with('updated', true);

	}

}