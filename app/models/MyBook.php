<?php

class MyBook extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'mybooks';

    public $timestamps = false;

    public function title()
    {
        return $this->belongsTo('Title', 'titleid');
    }

    public function getIssueAttribute()
    {
        return str_pad($this->attributes['issue'], 3, '0', STR_PAD_LEFT);
    }

    public function getReleasedAttribute()
    {
        //return date('m/d/Y', strtotime($this->attributes['released']));
        return $this->attributes['released'];
    }

    public function getConditionAttribute()
    {
        return ucwords($this->attributes['condition']);
    }
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
