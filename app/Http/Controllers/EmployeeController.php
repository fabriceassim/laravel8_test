<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\employeeRequest;
use App\Repositories\EmployeeRepository;
use App\Models\Employees;
class EmployeeController extends Controller
{
    protected $employeeRepository;
    protected $nbrPerPage = 10;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employeeRepository->getPaginate($this->nbrPerPage);
        $links = $employees->setPath('')->render();

        return view('employee.index', compact('employees', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(employeeRequest $request)
    {

        $employee = $this->employeeRepository->store($request->all());
        return redirect('employee')->withOk("La companie " . $employee->name . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $employee = $this->employeeRepository->getById($id);                       
        return view('employee/edit',  compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->employeeRepository->update($id, $request->all());
        return redirect('employee')->withOk("La companie " . $request->input('name') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeeRepository->destroy($id);

        return redirect()->back();
    }

    public function getById($id)
    {
        return $this->employeeRepository->findOrFail($id);
    }
}
