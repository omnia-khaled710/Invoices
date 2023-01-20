<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use \Spatie\Activitylog\Traits\LogsActivity;

class products extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $fillable = [
        'productName',
        'sectionID',
        'description',
    ];
    public function Section()
    {
        return $this->belongsTo(sections::class,"sectionID");
    }
    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()->logOnly(['productName',
        'sectionID',
        'description'])->useLogName('Products');
	}
}
