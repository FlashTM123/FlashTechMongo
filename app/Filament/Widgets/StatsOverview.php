<?php

namespace App\Filament\Widgets;

use App\Models\Orders;
use App\Models\Product;
use App\Models\Customer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalOrders = Orders::count();
        $pendingOrders = Orders::where('order_status', 'pending')->count();
        $shippedOrders = Orders::where('order_status', 'shipping')->count();
        $completedOrders = Orders::where('order_status', 'completed')->count();
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();

        // Tính tổng doanh thu (chỉ tính đơn hàng đã hoàn thành, đang giao, đang xử lý)
        $totalRevenue = (float) (string) Orders::whereIn('order_status', ['completed', 'shipping', 'processing'])
            ->sum('total');

        // Doanh thu tháng này
        $monthRevenue = (float) (string) Orders::whereIn('order_status', ['completed', 'shipping', 'processing'])
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');

        // Doanh thu tháng trước
        $lastMonthRevenue = (float) (string) Orders::whereIn('order_status', ['completed', 'shipping', 'processing'])
            ->whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('total');

        // Tính % tăng trưởng
        $revenueGrowth = 0;
        if ($lastMonthRevenue > 0) {
            $revenueGrowth = (($monthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100;
        }

        return [
            Stat::make('Tổng doanh thu', number_format($totalRevenue, 0, ',', '.') . ' ₫')
                ->description('Tất cả đơn hàng')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
            Stat::make('Doanh thu tháng này', number_format($monthRevenue, 0, ',', '.') . ' ₫')
                ->description(($revenueGrowth >= 0 ? '+' : '') . number_format($revenueGrowth, 1) . '% so với tháng trước')
                ->descriptionIcon($revenueGrowth >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($revenueGrowth >= 0 ? 'success' : 'danger'),
            Stat::make('Tổng đơn hàng', $totalOrders)
                ->description('Tất cả đơn hàng')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('primary'),
            Stat::make('Chờ xử lý', $pendingOrders)
                ->description('Đơn hàng mới')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('Đang giao', $shippedOrders)
                ->description('Đang vận chuyển')
                ->descriptionIcon('heroicon-m-truck')
                ->color('info'),
            Stat::make('Đã giao', $completedOrders)
                ->description('Giao thành công')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
        ];
    }
}
