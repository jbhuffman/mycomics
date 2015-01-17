<?php

class Publisher extends \Eloquent
{
	protected $fillable = [];

    public $timestamps = false;

    public function titles()
    {
        return $this->hasMany('Title');
    }
}