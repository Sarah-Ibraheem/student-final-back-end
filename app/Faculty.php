<?php

namespace App;

class Faculty extends BaseModel
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'university_id'
	];

	/**
	 * One-to-many relationship to the moderators.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 *
	 */
	public function moderators()
	{
		return $this->hasMany(ModeratorProfile::class);
	}

	/**
	 * Many-to-one relationship to the university.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
	public function university()
	{
		return $this->belongsTo(University::class);
	}

	/**
	 * Many-to-many relationship to the departments.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 *
	 */
	public function departments()
	{
		return $this->belongsToMany(Department::class, 'department_faculties')->withTimestamps();
	}

	/**
	 * One-to-many relationship to the courseDepartmentFaculties.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 *
	 */
	public function courseDepartmentFaculties()
	{
		return $this->hasManyThrough(CourseDepartmentFaculty::class, DepartmentFaculty::class);
	}
}