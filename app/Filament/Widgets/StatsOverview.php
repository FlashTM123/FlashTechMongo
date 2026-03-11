<?php

namespace App\Filament\Widgets;

use App\Models\Orders;
use App\Models\Product;
use App\Models\Customer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalOrders = Orders::count();
        $pendingOrders = Orders::where('order_status', 'pending')->count();
        $shippedOrders = Orders::where('order_status', 'shipped')->count();
        $deliveredOrders = Orders::where('order_status', 'delivered')->count();
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();

        return [
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
            Stat::make('Đã giao', $deliveredOrders)
                ->description('Giao thành công')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Sản phẩm', $totalProducts)
                ->description('Tổng sản phẩm')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),
            Stat::make('Khách hàng', $totalCustomers)
                ->description('Tổng khách hàng')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
        ];
    }
}
