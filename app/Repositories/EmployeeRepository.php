<?php

namespace App\Repositories;

use App\Models\Employees;

class EmployeeRepository
{

    protected $employee;

    public function __construct(Employees $employee)
	{
		$this->employee = $employee;
	}

	private function save(Employees $employee, Array $inputs)
	{
		$employee->first_name = $inputs['first_name'];
		$employee->last_name = $inputs['last_name'];
		$employee->save();
	}

	public function getPaginate($n)
	{
		return $this->employee->paginate($n);
	}

	public function store(Array $inputs)
	{
		$employee = new $this->employee;		
		$this->save($employee, $inputs);

		return $employee;
	}

	public function getById($id)
	{
		return $this->employee->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}