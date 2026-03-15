<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Models\Coupon;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Mã giảm giá';

    protected static ?string $modelLabel = 'Mã giảm giá';

    protected static ?string $pluralModelLabel = 'Mã giảm giá';

    protected static \UnitEnum|string|null $navigationGroup = 'Quản lý cửa hàng';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $form): Schema
    {
        return $form
            ->schema([
                \Filament\Schemas\Components\Section::make('Thông tin mã giảm giá')
                    ->schema([
                        Forms\Components\TextInput::make('code')
                            ->label('Mã code')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('Mô tả')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Cấu hình giảm giá')
                    ->schema([
                        Forms\Components\Select::make('discount_type')
                            ->label('Loại giảm giá')
                            ->options([
                                'percentage' => 'Phần trăm (%)',
                                'fixed' => 'Số tiền cố định (đ)',
                            ])
                            ->required()
                            ->reactive()
                            ->native(false),
                        Forms\Components\TextInput::make('discount_value')
                            ->label('Giá trị giảm')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->helperText(fn ($get) => $get('discount_type') === 'percentage' ? 'Nhập phần trăm (0-100)' : 'Nhập số tiền'),
                        Forms\Components\TextInput::make('max_discount_amount')
                            ->label('Giảm giá tối đa (đ)')
                            ->numeric()
                            ->minValue(0)
                            ->helperText('Chỉ áp dụng cho giảm giá theo %')
                            ->nullable(),
                    ])->columns(3),

                \Filament\Schemas\Components\Section::make('Giới hạn sử dụng')
                    ->schema([
                        Forms\Components\TextInput::make('max_usage')
                            ->label('Số lần dùng tối đa')
                            ->numeric()
                            ->minValue(1)
                            ->nullable()
                            ->helperText('Để trống = không giới hạn'),
                        Forms\Components\TextInput::make('current_usage')
                            ->label('Số lần đã dùng')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->disabled(),
                        Forms\Components\TextInput::make('min_order_value')
                            ->label('Đơn hàng tối thiểu (đ)')
                            ->numeric()
                            ->minValue(0)
                            ->default(0),
                    ])->columns(3),

                \Filament\Schemas\Components\Section::make('Thời hạn')
                    ->schema([
                        Forms\Components\DateTimePicker::make('valid_from')
                            ->label('Ngày bắt đầu')
                            ->nullable(),
                        Forms\Components\DateTimePicker::make('valid_to')
                            ->label('Ngày kết thúc')
                            ->nullable(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Trạng thái')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Hoạt động')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã code')
                    ->badge()
                    ->color('primary')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Mô tả')
                    ->limit(50)
                    ->wrap(),
                Tables\Columns\TextColumn::make('discount_type')
                    ->label('Loại')
                    ->formatStateUsing(fn ($state) => $state === 'percentage' ? 'Phần trăm' : 'Cố định')
                    ->badge()
                    ->color(fn ($state) => $state === 'percentage' ? 'blue' : 'green'),
                Tables\Columns\TextColumn::make('discount_value')
                    ->label('Giá trị')
                    ->formatStateUsing(fn ($record) => $record->discount_type === 'percentage' ? $record->discount_value . '%' : number_format($record->discount_value, 0, ',', '.'). ' đ')
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_usage')
                    ->label('Đã dùng')
                    ->formatStateUsing(fn ($record) => $record->current_usage . ($record->max_usage ? ' / ' . $record->max_usage : ' / ∞'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('min_order_value')
                    ->label('Tối thiểu')
                    ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.') . ' đ')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('valid_from')
                    ->label('Từ ngày')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('valid_to')
                    ->label('Đến ngày')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Hoạt động')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Hoạt động'),
                Tables\Filters\SelectFilter::make('discount_type')
                    ->label('Loại giảm giá')
                    ->options([
                        'percentage' => 'Phần trăm',
                        'fixed' => 'Cố định',
                    ]),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
