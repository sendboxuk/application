<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Template;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $results = DB::select( DB::raw('SELECT COUNT(id) AS total, DATE(created_at) AS stat_date FROM  email_audits GROUP BY DATE(created_at) ORDER BY date(created_at) desc limit 7'));

        $count_templates = Template::count();
        $count_products = Product::count();
        $count_emails = DB::table('email_audits')->count();

        $labels = [];
        $data = [];
        foreach($results as $result){
            $labels[] = date('d/M', strtotime($result->stat_date));
            $data[] = $result->total;
        }

        sort($labels);
        sort($data);

        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 100])
        ->labels($labels)
        ->datasets([
            [
                "label" => "Daily Email Traffic",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $data,
            ],

        ])
        ->options([]);

        return view('dashboard', compact('chartjs', 'count_templates', 'count_products', 'count_emails'));
    }
}