<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Contracts as mContracts;
use App\Repositories\admin\contracts\ContractsContract as rContracts;
class Contracts extends Controller
{
    private $rContracts;

    public function __construct(rContracts $rContracts)
    {
        $this->rContracts=$rContracts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {



        $aFilterParams=$request;
        $oResults=$this->rContracts->getByFilter($aFilterParams);

        return view('admin.contracts.index', compact('oResults'), compact('aFilterParams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {


        $oResults=$this->rContracts->create($request->all());

        return redirect('admin/contracts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {


        $contracts=$this->rContracts->show($id);


        return view('admin.contracts.show', compact('contracts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {


        $contracts=$this->rContracts->show($id);

        return view('admin.contracts.edit', compact('contracts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {

        $result=$this->rContracts->update($id,$request);



        return redirect('admin/contracts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        $contracts=$this->rContracts->destroy($id);
        return redirect('admin/contracts');
    }


}
