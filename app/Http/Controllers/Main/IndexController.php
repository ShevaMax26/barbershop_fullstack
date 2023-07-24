<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rank;
use App\Services\Reports\RecordReport;
use function view;

class IndexController extends Controller
{
    public function __invoke(RecordReport $recordReport)
    {
        $popularServices = $recordReport->getPopularService();
        $orderCount = $recordReport->getOrderCount();
        $orderStatuses = $recordReport->getOrderStatuses();

        return view('admin.main.index', compact('popularServices', 'orderCount', 'orderStatuses'));
    }
}
