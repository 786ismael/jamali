<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    protected $table = 'pages';
	protected $primaryKey = 'page_id';

    protected $fillable = [
        'type',
        'content',
        'content_es',
    ];
}
