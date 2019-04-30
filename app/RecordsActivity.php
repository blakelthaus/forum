<?php
/**
 * Created by PhpStorm.
 * User: cody
 * Date: 4/30/19
 * Time: 10:02 AM
 */

namespace App;


trait RecordsActivity
{
    //if your model is using this Class, this will automatically register as a boot() method on that model.
    //Naming Convention: "boot" + ClassName (Works for all trait classes)
    protected static function bootRecordsActivity()
    {
        if (auth()->guest()) return;

        foreach (static::getActivitiesToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }
    }

    protected static function getActivitiesToRecord()
    {
        return ['created'];
    }

    protected function recordActivity($event)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event),
        ]);
    }

    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }

    public function getActivityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());
        return $event . '_' . $type;
    }
}
