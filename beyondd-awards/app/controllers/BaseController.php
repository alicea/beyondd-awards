<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$names = Names::all();
			$this->layout = View::make($this->layout)->with('names', $names);
		}
	}

}