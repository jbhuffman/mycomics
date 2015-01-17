<?php
class Title extends Eloquent
{
    public $timestamps = false;

    public function publisher()
    {
        return $this->belongsTo('Publisher');
    }

    public function mybooks()
    {
        return $this->hasMany('MyBook', 'titleid', 'id');
    }

    public function getSeriesTypeAttribute()
    {
        return ucfirst($this->attributes['series_type']);
    }

    public function getIsActiveAttribute()
    {
        return $this->attributes['is_active'] ? 'Yes' : 'No';
    }

    public function getIsCompleteAttribute()
    {
        return $this->attributes['is_complete'] ? 'Yes' : 'No';
    }

    public function getIsSubscribedAttribute()
    {
        return $this->attributes['is_subscribed'] ? 'Yes' : 'No';
    }

    public function getIsDeletedAttribute()
    {
        return $this->attributes['is_deleted'] ? 'Yes' : 'No';
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
