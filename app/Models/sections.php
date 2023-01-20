<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use \Spatie\Activitylog\Traits\LogsActivity;
class sections extends Model
{
    use HasFactory;
    use LogsActivity;
        protected $fillable = [
        'sectionName',
        'description',
        'createdBy',
    ];
    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()->logOnly(['id','sectionName','createdBy'])->useLogName('sections');
	}
}