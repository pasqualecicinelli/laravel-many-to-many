<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ["name_prog", "repo", "link", "description", "type_id"];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function getTechBadges()
    {
        $badges_html = "";
        foreach ($this->technologies as $technology) {
            $badges_html .= "<span class='badge rouded-pill mx-1' style='background-color:{$technology->color}'>{$technology->label}</span>";
        }
        return $badges_html;
    }
}