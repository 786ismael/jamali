<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
   	use SoftDeletes;
	protected $table = 'documents';
	protected $primaryKey = 'document_id';
	
    protected $fillable = [
        'user_id' , 'type', 'document' , 'approve_status', 'rejected_reason',
    ];
}