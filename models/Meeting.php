<?php namespace Shohabbos\Bigbluebutton\Models;

use Model;

/**
 * Model
 */
class Meeting extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'shohabbos_bigbluebutton_meetings';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $guarded = ['id'];
}
