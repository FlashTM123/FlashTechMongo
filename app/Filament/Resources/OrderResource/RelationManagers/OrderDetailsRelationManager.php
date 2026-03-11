<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class OrderDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'orderDetails';

    protected static ?string $title = 'Sản phẩm trong đơn';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('product_image')
                    ->label('Ảnh')
                    ->circular()
                    ->size(40),
                Tables\Columns\TextColumn::make('product_name')
                    ->label('Sản phẩm')
                    ->limit(40),
                Tables\Columns\TextColumn::make('price')
                    ->label('Giá gốc')
                    ->formatStateUsing(fn ($state) => number_format($state) . ' ₫'),
                Tables\Columns\TextColumn::make('sale_price')
                    ->label('Giá KM')
                    ->formatStateUsing(fn ($state) => $state ? number_format($state) . ' ₫' : '—'),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('SL')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('total')
                    ->label('Thành tiền')
                    ->formatStateUsing(fn ($state) => number_format($state) . ' ₫')
                    ->weight('bold'),
            ]);
    }
}
