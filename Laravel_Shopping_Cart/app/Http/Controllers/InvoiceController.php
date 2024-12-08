<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
public function invoiceGenerate(){
$order_number='1733635799';

$order =DB::table('orders')->where('order_number' ,'=', $order_number)->get();
$orderdetails =
DB::table('orders_details')
->join('books', 'books.id' , '=', 'orders_details.book_id')
->where('orders_details.order_number',  $order_number)
 ->get();
//return view('productInvoice',compact('order','order_number','orderdetails'));

$data = [

    'title' => 'Welcome to ItSolutionStuff.com',
    'orderdetails' => $orderdetails,
    'order' => $order,
    'order_number'=>$order_number



];
$pdf = PDF::loadView('productInvoice', $data);
//return $pdf->download('invoice.pdf');
return $pdf->stream('invoice.pdf');
 }
}
