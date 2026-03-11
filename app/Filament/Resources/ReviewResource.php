<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Reviews;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ReviewResource extends Resource
{
    protected static ?string $model = Reviews::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationLabel = 'Đánh giá';

    protected static ?string $modelLabel = 'Đánh giá';

    protected static ?string $pluralModelLabel = 'Đánh giá';

    protected static \UnitEnum|string|null $navigationGroup = 'Quản lý cửa hàng';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $form): Schema
    {
        return $form
            ->schema([
                \Filament\Schemas\Components\Section::make('Thông tin đánh giá')
                    ->schema([
                        Forms\Components\TextInput::make('rating')
                            ->label('Số sao')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5)
                            ->required(),
                        Forms\Components\Textarea::make('comment')
                            ->label('Nội dung')
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_approved')
                            ->label('Đã duyệt')
                            ->default(true),
                        Forms\Components\Toggle::make('is_verified')
                            ->label('Đã xác minh'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Sản phẩm')
                    ->limit(25)
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer.full_name')
                    ->label('Khách hàng')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label('Sao')
                    ->formatStateUsing(fn (int $state) => str_repeat('⭐', $state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment')
                    ->label('Nội dung')
                    ->limit(40),
                Tables\Columns\TextColumn::make('helpful_count')
                    ->label('Hữu ích')
                    ->sortable()
                    ->default(0),
                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Duyệt')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('rating')
                    ->label('Số sao')
                    ->options([
                        1 => '1 sao',
                        2 => '2 sao',
                        3 => '3 sao',
                        4 => '4 sao',
                        5 => '5 sao',
                    ]),
                Tables\Filters\TernaryFilter::make('is_approved')
                    ->label('Đã duyệt'),
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
            'index' => Pages\ListReviews::route('/'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
