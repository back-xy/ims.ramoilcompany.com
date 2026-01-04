<?php

namespace App\Filament\Widgets;

use App\Models\City;
use App\Models\Place;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PlacesStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('کۆی گشتی شوێنەکان', Place::count())
                ->description('کۆی هەموو شوێنە تۆمارکراوەکان')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('primary'),

            Stat::make('کڕیارەکان', Place::where('is_customer', true)->count())
                ->description('ژمارەی کڕیارە چالاکەکان')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),

            Stat::make('شارەکان', City::count())
                ->description('ژمارەی شارە بەردەستەکان')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('warning'),

            Stat::make('تێکڕای چالاکی', number_format(Place::avg('activity_percentage'), 1) . '%')
                ->description('تێکڕای ڕێژەی چالاکی')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('info'),
        ];
    }
}
