<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    
    public function getCreatedAttribute()
    {
        return date('m/d/Y H:i', strtotime($this->attributes['created']));
    }

    public function getModifiedAttribute()
    {
        $output = null;
        $date = substr($this->attributes['modified'], 0, 10);
        $date = explode('-', $date);
        if (checkdate($date[0], $date[1], $date[2])) {
            echo strtotime($this->attributes['modified']);
            $output = date('m/d/Y H:i', strtotime($this->attributes['modified']));
        }
        return $output;
    }
}
