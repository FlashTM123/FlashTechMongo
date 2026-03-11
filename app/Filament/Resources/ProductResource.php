<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\Brand;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Sản phẩm';

    protected static ?string $modelLabel = 'Sản phẩm';

    protected static ?string $pluralModelLabel = 'Sản phẩm';

    protected static \UnitEnum|string|null $navigationGroup = 'Quản lý cửa hàng';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $form): Schema
    {
        return $form
            ->schema([
                \Filament\Schemas\Components\Section::make('Thông tin cơ bản')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên sản phẩm')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('sku')
                            ->label('Mã SKU')
                            ->maxLength(50),
                        Forms\Components\Select::make('category')
                            ->label('Danh mục')
                            ->options([
                                'smartphone' => 'Smartphone',
                                'laptop' => 'Laptop',
                                'tablet' => 'Tablet',
                                'computer' => 'Computer',
                                'accessory' => 'Accessory',
                            ])
                            ->required(),
                        Forms\Components\Select::make('brand_id')
                            ->label('Thương hiệu')
                            ->options(fn () => Brand::all()->pluck('name', 'id'))
                            ->searchable(),
                        Forms\Components\TextInput::make('color')
                            ->label('Màu sắc'),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Giá & Kho')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->label('Giá gốc (₫)')
                            ->numeric()
                            ->required()
                            ->prefix('₫'),
                        Forms\Components\TextInput::make('sale_price')
                            ->label('Giá khuyến mãi (₫)')
                            ->numeric()
                            ->prefix('₫'),
                        Forms\Components\TextInput::make('stock_quantity')
                            ->label('Tồn kho')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('sales_count')
                            ->label('Đã bán')
                            ->numeric()
                            ->default(0)
                            ->disabled(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Hình ảnh')
                    ->schema([
                        Forms\Components\TextInput::make('image')
                            ->label('URL ảnh chính')
                            ->url()
                            ->maxLength(500),
                    ]),

                \Filament\Schemas\Components\Section::make('Mô tả')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Mô tả sản phẩm')
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                \Filament\Schemas\Components\Section::make('Trạng thái')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Hoạt động')
                            ->default(true),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Sản phẩm nổi bật')
                            ->default(false),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Ảnh')
                    ->circular()
                    ->size(50),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Danh mục')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'smartphone' => 'info',
                        'laptop' => 'success',
                        'tablet' => 'warning',
                        'computer' => 'danger',
                        'accessory' => 'gray',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('price')
                    ->label('Giá')
                    ->formatStateUsing(fn ($state) => number_format($state) . ' ₫')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sale_price')
                    ->label('Giá KM')
                    ->formatStateUsing(fn ($state) => $state ? number_format($state) . ' ₫' : '—'),
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label('Kho')
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state <= 0 => 'danger',
                        $state <= 10 => 'warning',
                        default => 'success',
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Nổi bật')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Danh mục')
                    ->options([
                        'smartphone' => 'Smartphone',
                        'laptop' => 'Laptop',
                        'tablet' => 'Tablet',
                        'computer' => 'Computer',
                        'accessory' => 'Accessory',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Trạng thái'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Nổi bật'),
            ])
            ->actions([
                \Filament\Actions\ViewAction::make(),
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
