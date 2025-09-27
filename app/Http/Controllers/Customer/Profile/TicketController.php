<?php

namespace App\Http\Controllers\Customer\Profile;

use view;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index()
    {
       return view('customer.profile.my-tickets');
    }
}
