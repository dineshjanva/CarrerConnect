<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
//   use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserStatsController extends Controller
{
    //

    public function userGrowth($period)
    {
        $labels = [];
        $values = [];

        $startOfWeek = Carbon::now()->startOfWeek()->utc();
        $endOfWeek = Carbon::now()->endOfWeek()->utc();

        if ($period === 'week') {
            // Sunday = 1 to Saturday = 7
            $labels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            $weeklyData = User::select(DB::raw('DAYOFWEEK(created_at) as day'), DB::raw('COUNT(*) as total'))
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->groupBy(DB::raw('DAYOFWEEK(created_at)'))
                ->pluck('total', 'day');

            foreach (range(1, 7) as $d) {
                $values[] = $weeklyData[$d] ?? 0;
            }
        } elseif ($period === 'month') {
            $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            $monthlyData = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
                ->whereYear('created_at', Carbon::now()->year)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('total', 'month');

            foreach (range(1, 12) as $m) {
                $values[] = $monthlyData[$m] ?? 0;
            }
        } elseif ($period === 'year') {
            $currentYear = Carbon::now()->year;
            $startYear = $currentYear - 4;

            $labels = [];
            $yearlyData = User::select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as total'))
                ->whereBetween('created_at', [
                    Carbon::create($startYear, 1, 1)->utc(),
                    Carbon::create($currentYear, 12, 31)->utc()
                ])
                ->groupBy(DB::raw('YEAR(created_at)'))
                ->pluck('total', 'year');

            foreach (range($startYear, $currentYear) as $y) {
                $labels[] = (string) $y;
                $values[] = $yearlyData[$y] ?? 0;
            }
        }

        return response()->json(['labels' => $labels, 'values' => $values]);
    }


    public function userTypes($period)
    {
        $companycount = Company::count();
        $userCount = User::role('jobseeker')->count();
        $quarterCounts = [];

        $year = now()->year;

        $quarters = [
            'Q1' => [Carbon::create($year, 1, 1), Carbon::create($year, 3, 31)],
            'Q2' => [Carbon::create($year, 4, 1), Carbon::create($year, 6, 30)],
            'Q3' => [Carbon::create($year, 7, 1), Carbon::create($year, 9, 30)],
            'Q4' => [Carbon::create($year, 10, 1), Carbon::create($year, 12, 31)],
        ];
        $quarterCounts = [];

        foreach ($quarters as $label => [$start, $end]) {
            $count = User::role('jobseeker')
                ->whereBetween('created_at', [$start, $end])
                ->count();

            $quarterCounts[$label] = $count;
        }

        $data = match ($period) {
            'month' => ['Admin' => 1, 'Company' => $companycount, 'Seekers' => $userCount],
            'quarter' => [
                'Q1' => 12,
                'Q2' => 95,
                'Q3' => 110,
                'Q4' => 87
            ],
            'year' => [],
            default => []
        };

        return response()->json($data);
    }


}