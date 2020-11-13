<?php

namespace App\Repositories;

use App\Models\Companies;

class CompanyRepository
{

    protected $company;

    public function __construct(Companies $company)
	{
		$this->company = $company;
	}

	private function save(Companies $company, Array $inputs)
	{
		$company->name = $inputs['name'];
		$company->email = $inputs['email'];	
		$company->save();
	}

	public function getPaginate($n)
	{
		return $this->company->paginate($n);
	}

	public function store(Array $inputs)
	{
		$company = new $this->company;		
		$this->save($company, $inputs);

		return $company;
	}

	public function getById($id)
	{
		return $this->company->findOrFail($id);
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