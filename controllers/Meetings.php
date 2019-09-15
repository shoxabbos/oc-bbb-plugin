<?php namespace Shohabbos\Bigbluebutton\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Meetings extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController'    ];
    
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Shohabbos.Bigbluebutton', 'metings');
    }
}
