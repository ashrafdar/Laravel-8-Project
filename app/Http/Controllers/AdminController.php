<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function index()
  {
    return view('admin.dashboard');
  }
 
  public function dashboard()
  {   
    return view('admin.dashboard');
  }    

  public function packages()
  {   
    return view('admin.packages');
  }
  public function flights()
  {   
    return view('admin.flights');
  }
  public function customers()
  {   
    return view('admin.customers');
  }

  public function sales()
  {   
    return view('admin.sales');
  }
  public function purchase()
  {   
    return view('admin.purchase');
  }

}
