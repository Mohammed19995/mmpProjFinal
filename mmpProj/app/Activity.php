<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = ['mosque_id', 'content', 'title'];

    public function addActivity($title, $mosque_id, $content)
    {
        $this::create([
            'title' => $title,
            'mosque_id' => $mosque_id,
            'content' => $content
        ]);
    }

    public function getAllActivity()
    {
        return $this::all();
    }

    public function updateActivity($id, $title, $mosque_id, $content)
    {
        $getActivity = $this::findOrFail($id);
        $getActivity->update([
            'title' => $title,
            'mosque_id' => $mosque_id,
            'content' => $content
        ]);
    }

    public function deleteActivity($id)
    {
        $this::find($id)->delete();
    }
}
