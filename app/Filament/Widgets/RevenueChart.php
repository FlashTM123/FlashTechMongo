<?php

namespace App\Filament\Widgets;

use App\Models\Orders;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class RevenueChart extends ChartWidget
{
    protected ?string $heading = 'Doanh thu theo tháng';
    protected static ?int $sort = 2;
    protected ?string $maxHeight = '300px';

    public ?string $filter = 'year';

    protected function getFilters(): ?array
    {
        return [
            'week' => 'Tuần này',
            'month' => 'Tháng này',
            'quarter' => 'Quý này',
            'year' => 'Năm này',
        ];
    }

    protected function getData(): array
    {
        $filter = $this->filter;

        switch ($filter) {
            case 'week':
                return $this->getWeekData();
            case 'month':
                return $this->getMonthData();
            case 'quarter':
                return $this->getQuarterData();
            case 'year':
            default:
                return $this->getYearData();
        }
    }

    protected function getWeekData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('d/m');

            $revenue = Orders::whereDate('created_at', $date->toDateString())
                ->whereIn('order_status', ['completed', 'shipping', 'processing'])
                ->sum('total');

            $data[] = $revenue;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Doanh thu (₫)',
                    'data' => $data,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getMonthData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('d/m');

            $revenue = Orders::whereDate('created_at', $date->toDateString())
                ->whereIn('order_status', ['completed', 'shipping', 'processing'])
                ->sum('total');

            $data[] = $revenue;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Doanh thu (₫)',
                    'data' => $data,
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'borderColor' => 'rgb(16, 185, 129)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getQuarterData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subWeeks($i);
            $labels[] = 'Tuần ' . $date->weekOfYear;

            $startOfWeek = $date->startOfWeek();
            $endOfWeek = $date->copy()->endOfWeek();

            $revenue = Orders::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->whereIn('order_status', ['completed', 'shipping', 'processing'])
                ->sum('total');

            $data[] = $revenue;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Doanh thu (₫)',
                    'data' => $data,
                    'backgroundColor' => 'rgba(245, 158, 11, 0.1)',
                    'borderColor' => 'rgb(245, 158, 11)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getYearData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->format('M Y');

            $revenue = Orders::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->whereIn('order_status', ['completed', 'shipping', 'processing'])
                ->sum('total');

            $data[] = $revenue;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Doanh thu (₫)',
                    'data' => $data,
                    'backgroundColor' => 'rgba(139, 92, 246, 0.1)',
                    'borderColor' => 'rgb(139, 92, 246)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
