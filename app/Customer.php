<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['user_id','account_name','description','category_id','income_amount','expense_amount','status','date'];
}
