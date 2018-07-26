<?php

class Student extends Eloquent{

	protected $fillable = array('student_id','first_name','last_name','approved','roll_num','branch');

    public $timestamps = false;

	protected $table = 'students';
	protected $primaryKey = 'student_id';

	protected $hidden = array();

}
