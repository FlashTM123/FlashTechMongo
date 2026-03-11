<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Orders;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Orders::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Đơn hàng';

    protected static ?string $modelLabel = 'Đơn hàng';

    protected static ?string $pluralModelLabel = 'Đơn hàng';

    protected static \UnitEnum|string|null $navigationGroup = 'Quản lý cửa hàng';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $form): Schema
    {
        return $form
            ->schema([
                \Filament\Schemas\Components\Section::make('Thông tin đơn hàng')
                    ->schema([
                        Forms\Components\TextInput::make('order_code')
                            ->label('Mã đơn hàng')
                            ->disabled()
                            ->dehydrated(),
                        Forms\Components\TextInput::make('full_name')
                            ->label('Họ tên người nhận')
                            ->disabled(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->disabled(),
                        Forms\Components\TextInput::make('phone_number')
                            ->label('SĐT')
                            ->disabled(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Địa chỉ giao hàng')
                    ->schema([
                        Forms\Components\Textarea::make('shipping_address')
                            ->label('Địa chỉ')
                            ->disabled()
                            ->rows(2)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('notes')
                            ->label('Ghi chú')
                            ->disabled()
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                \Filament\Schemas\Components\Section::make('Trạng thái & Thanh toán')
                    ->schema([
                        Forms\Components\Select::make('order_status')
                            ->label('Trạng thái đơn hàng')
                            ->options([
                                'pending' => 'Chờ xử lý',
                                'processing' => 'Đang xử lý',
                                'shipped' => 'Đang giao hàng',
                                'delivered' => 'Đã giao',
                                'cancelled' => 'Đã hủy',
                            ])
                            ->required(),
                        Forms\Components\Select::make('payment_status')
                            ->label('Trạng thái thanh toán')
                            ->options([
                                'unpaid' => 'Chưa thanh toán',
                                'paid' => 'Đã thanh toán',
                                'failed' => 'Thất bại',
                                'refunded' => 'Đã hoàn tiền',
                            ])
                            ->required(),
                        Forms\Components\Select::make('payment_method')
                            ->label('Phương thức TT')
                            ->options([
                                'cod' => 'COD',
                                'bank_transfer' => 'Chuyển khoản',
                                'momo' => 'MoMo',
                                'vnpay' => 'VNPay',
                            ])
                            ->disabled(),
                    ])->columns(3),

                \Filament\Schemas\Components\Section::make('Tổng tiền')
                    ->schema([
                        Forms\Components\TextInput::make('subtotal')
                            ->label('Tạm tính')
                            ->disabled()
                            ->prefix('₫'),
                        Forms\Components\TextInput::make('discount')
                            ->label('Giảm giá')
                            ->disabled()
                            ->prefix('₫'),
                        Forms\Components\TextInput::make('total')
                            ->label('Tổng cộng')
                            ->disabled()
                            ->prefix('₫'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_code')
                    ->label('Mã đơn')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->color('primary'),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Khách hàng')
                    ->searchable()
                    ->limit(20),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('SĐT')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->label('Tổng tiền')
                    ->formatStateUsing(fn ($state) => number_format($state) . ' ₫')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Thanh toán')
                    ->formatStateUsing(fn (?string $state) => match ($state) {
                        'cod' => 'COD',
                        'bank_transfer' => 'Chuyển khoản',
                        'momo' => 'MoMo',
                        'vnpay' => 'VNPay',
                        default => $state,
                    })
                    ->badge(),
                Tables\Columns\TextColumn::make('order_status')
                    ->label('Trạng thái')
                    ->formatStateUsing(fn (?string $state) => match ($state) {
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'shipped' => 'Đang giao',
                        'delivered' => 'Đã giao',
                        'cancelled' => 'Đã hủy',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'shipped' => 'primary',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Thanh toán')
                    ->formatStateUsing(fn (?string $state) => match ($state) {
                        'unpaid' => 'Chưa TT',
                        'paid' => 'Đã TT',
                        'failed' => 'Thất bại',
                        'refunded' => 'Hoàn tiền',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'unpaid' => 'warning',
                        'paid' => 'success',
                        'failed' => 'danger',
                        'refunded' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày đặt')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('order_status')
                    ->label('Trạng thái đơn')
                    ->options([
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'shipped' => 'Đang giao',
                        'delivered' => 'Đã giao',
                        'cancelled' => 'Đã hủy',
                    ]),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('Thanh toán')
                    ->options([
                        'unpaid' => 'Chưa thanh toán',
                        'paid' => 'Đã thanh toán',
                        'failed' => 'Thất bại',
                        'refunded' => 'Hoàn tiền',
                    ]),
                Tables\Filters\SelectFilter::make('payment_method')
                    ->label('Phương thức')
                    ->options([
                        'cod' => 'COD',
                        'bank_transfer' => 'Chuyển khoản',
                        'momo' => 'MoMo',
                        'vnpay' => 'VNPay',
                    ]),
            ])
            ->actions([
                \Filament\Actions\ViewAction::make(),
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            OrderResource\RelationManagers\OrderDetailsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
