<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use \Spatie\Activitylog\Traits\LogsActivity;
class invoices extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
     public function Section()
    {
        return $this->belongsTo(sections::class,"section_id");
    }
	public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()->logOnly(['id',"invoice_number","updated_at","product","invoice_Date","section_id"
            ]) ->dontLogIfAttributesChangedOnly([
                'updated_at','invoice_number'])->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")->useLogName('invoices');
	}
}