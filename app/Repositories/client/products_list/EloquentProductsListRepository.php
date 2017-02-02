<?php
namespace App\Repositories\client\products_list;

use Session;
use App\Models\ProductsList;
use App\Repositories\client\products_list\ProductsListContract;

class EloquentProductsListRepository implements ProductsListContract
{

    public function getByFilter($data)
    {

        $oResults = new ProductsList();

        if (isset($data->id) && !empty($data->id)) {
            $oResults = $oResults->where('id', 'like', '%' . $data['id'] . '%');
        }
        if (isset($data->name) && !empty($data->name)) {
            $oResults = $oResults->where('name', 'like', '%' . $data['name'] . '%');
        }
        if (isset($data->type) && !empty($data->type)) {
            $oResults = $oResults->where('type', 'like', '%' . $data['type'] . '%');
        }
        if (isset($data->description) && !empty($data->description)) {
            $oResults = $oResults->where('description', 'like', '%' . $data['description'] . '%');
        }
        if (isset($data->order) && !empty($data->order)) {
            $sort = (isset($data->sort) && !empty($data->sort)) ? $data->sort : 'desc';
            $oResults = $oResults->orderBy($data->order, $sort);
        }

        $oResults = $oResults->paginate(15);
        return $oResults;
    }

    public function create($data)
    {

        $result = ProductsList::create($data);

        if ($result) {
            Session::flash('flash_message', 'products_list added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$products_list = ProductsList::findOrFail($id);

        return $products_list;
    }

    public function destroy($id)
    {

        $result =  ProductsList::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'products_list deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$products_list = ProductsList::findOrFail($id);
       $result= $products_list->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'products_list updated!');
            return true;
        } else {
            return false;
        }

    }

}
