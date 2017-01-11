<?php 
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model{
	protected $table='user_roles';
	protected $fillable=[
				'id',
				'user_id',
				'role_id',
			];
	protected $hidden=[
	];
}