<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductViews;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Request as _Request;
use Carbon\Carbon;

class CoreController extends Controller
{
    public function index_view()
    {
        return view('core.index');
    }
}
