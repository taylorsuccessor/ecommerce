<?php
namespace App\Repositories\client\contracts;

use Session;
use App\Models\Contracts;
use App\Repositories\client\contracts\ContractsContract;

class EloquentContractsRepository implements ContractsContract
{

    public function getByFilter($data)
    {

        $oResults =Contracts::with('company','products');

        if (isset($data->id) && !empty($data->id)) {
            $oResults = $oResults->where('id', '=', $data['id']);
        }
        if (isset($data->company_id) && !empty($data->company_id)) {
            $oResults = $oResults->where('company_id', '=', $data['company_id']);
        }
        if (isset($data->products_id) && !empty($data->products_id)) {
            $oResults = $oResults->where('products_id', '=', $data['products_id'] );
        }
        if (isset($data->description) && !empty($data->description)) {
            $oResults = $oResults->where('description', 'like', '%' . $data['description'] . '%');
        }
        if (isset($data->order) && !empty($data->order)) {
            $sort = (isset($data->sort) && !empty($data->sort)) ? $data->sort : 'desc';
            $oResults = $oResults->orderBy($data->order, $sort);
        }



        if(isset($data->getAllRecords) && !empty($data->getAllRecords)){
            $oResults = $oResults->get();
        }
        elseif (isset($data->page_name) && !empty($data->page_name)) {
            $oResults = $oResults->paginate(config('mycp.pagination_size'), ['*'], $data->page_name);
        }else{
            $oResults = $oResults->paginate(config('mycp.pagination_size'));
        }
        return $oResults;
    }

    public function create($data)
    {

        $result = Contracts::create($data);

        if ($result) {
            Session::flash('flash_message', 'contracts added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$contracts = Contracts::findOrFail($id);

        return $contracts;
    }

    public function destroy($id)
    {

        $result =  Contracts::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'contracts deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$contracts = Contracts::findOrFail($id);
       $result= $contracts->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'contracts updated!');
            return true;
        } else {
            return false;
        }

    }

}