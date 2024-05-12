<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Employees as EmployeesResources;
use App\Http\Controllers\BaseController as BaseController;

class EmployeesController extends BaseController
{
    public function index()
    {
        // dd('hello world');
        $employees = Employees::all();
        return $this->sendResponse(
            EmployeesResources::collection($employees),
            'Posts fetched.'
        );
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'employeeNumber' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'extension' => 'required',
            'email' => 'required',
            'officeCode' => 'required',
            'reportsTo' => 'required',
            'jobTitle' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }


        DB::table('employees')->insertGetId($input);

        $employee = DB::table('employees')->where('employeeNumber', $input['employeeNumber'])->first();

        return $this->sendResponse(new EmployeesResources($employee), 'Post Created.');
    }

    public function show($employeeNumber)
    {
        $employee = DB::table('employees')->where('employeeNumber', $employeeNumber)->first();
        if (is_null($employee)) {
            return $this->sendError('Post does not exits.');
        }
        return $this->sendResponse(new EmployeesResources($employee), 'Post fetched.');
    }

    public function update(Request $request, $employeeNumber)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'employeeNumber' => 'required',
            'lastName' => 'nullable',
            'firstName' => 'nullable',
            'extension' => 'nullable',
            'email' => 'nullable',
            'officeCode' => 'nullable',
            'reportsTo' => 'nullable',
            'jobTitle' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        DB::table('employees')->where('employeeNumber', $employeeNumber)->update($input);
        $employee = DB::table('employees')->where('employeeNumber', $input['employeeNumber'])->first();
        return $this->sendResponse(new EmployeesResources($employee), 'Post Updated.');
    }

    public function destroy($employeeNumber)
    {
        // dd($employeeNumber);
        $employee = DB::table('employees')->where('employeeNumber', $employeeNumber)->first();

        if (is_null($employee)) {
            return $this->sendError('error employee.');
        }

        DB::table('employees')->where('employeeNumber', $employeeNumber)->delete();

        return $this->sendResponse([], 'Employee deleted.');
    }
}
