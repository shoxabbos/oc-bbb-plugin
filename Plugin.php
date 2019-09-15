<?php namespace Shohabbos\Bigbluebutton;

use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use Shohabbos\Bigbluebutton\Models\Meeting as MeetingModel;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return [
    		\Shohabbos\Bigbluebutton\Components\Meeting::class     => 'meeting',
    	];
    }

    public function registerSettings()
    {

    }


    public function boot() {
	    UserModel::extend(function($model) {
			$model->hasMany['meetings'] = MeetingModel::class;
		});
    }



}
