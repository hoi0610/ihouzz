<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskProject extends Model
{
    protected $table = 'task_projects';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'id',
                            'name',
                            'date_start',
                            'date_end',
                            'description',
                            'status',
                            'is_deleted',
                            'created_by',
                            'updated_by'];
}
