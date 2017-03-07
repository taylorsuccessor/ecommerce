<?php

namespace App\Http\Controllers\client;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\client\invoice\createRequest;
use App\Http\Requests\client\invoice\editRequest;
use Session;
use Carbon\Carbon;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Invoice as mInvoice;
use App\Repositories\client\invoice\InvoiceContract as rInvoice;
use App\Repositories\client\contracts_renewal_invoice\ContractsRenewalInvoiceContract as rContractsRenewalInvoice;
use App\Repositories\client\payment\PaymentContract as rPayment;
use App\Repositories\client\company\CompanyContract as rCompany;
class Invoice extends Controller
{
    private $rInvoice;

    public function __construct(rInvoice $rInvoice)
    {
        $this->rInvoice=$rInvoice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {



        $aFilterParams=$request;
        $oResults=$this->rInvoice->getByFilter($aFilterParams);

        return view('client.invoice.index', compact('oResults'), compact('aFilterParams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request,rCompany $rCompany)
    {

        $companyList=$rCompany->getAllList();

        $request->merge(['due_date'=>Carbon::now()->format('Y-m-d')]);
        return view('client.invoice.create',compact('request','companyList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(createRequest $request)
    {

        $request->merge(['create_date'=>Carbon::now()->format('Y-m-d')]);
        $oResults=$this->rInvoice->create($request->all());

        return redirect('client/invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id,Request $request,rContractsRenewalInvoice $rContractsRenewalInvoice,rPayment $rPayment)
    {


        $invoice=$this->rInvoice->show($id);


        $request->merge(['invoice_id'=>$id,'page_name'=>'page']);

        $request->page_name='page_payment';
        $oPaymentResults=$rPayment->getByFilter($request);


        $request->page_name='page_contracts_renewal_invoice';
        $request->merge(['getAllRecords'=>1]);
        $oContractsRenewalInvoiceResults=$rContractsRenewalInvoice->getByFilter($request);

        return view('client.invoice.show', compact('invoice','request','oContractsRenewalInvoiceResults','oPaymentResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id,rCompany $rCompany)
    {

        $invoice=$this->rInvoice->show($id);

        $companyList=$rCompany->getAllList();


        return view('client.invoice.edit', compact('invoice','companyList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, editRequest $request)
    {

        $result=$this->rInvoice->update($id,$request);



        return redirect('client/invoice');
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
        $invoice=$this->rInvoice->destroy($id);
        return redirect('client/invoice');
    }


}