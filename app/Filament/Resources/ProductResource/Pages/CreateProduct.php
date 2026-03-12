<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Specifications;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Tách specs ra khỏi data trước khi tạo product
        $this->specsData = $data['specs'] ?? [];
        unset($data['specs']);
        return $data;
    }

    protected array $specsData = [];

    protected function afterCreate(): void
    {
        // Lưu specifications vào collection riêng
        if (!empty($this->specsData)) {
            foreach ($this->specsData as $index => $spec) {
                if (!empty($spec['label']) && !empty($spec['value'])) {
                    Specifications::create([
                        'product_id' => $this->record->id,
                        'key' => \Illuminate\Support\Str::slug($spec['label'], '_'),
                        'label' => $spec['label'],
                        'value' => $spec['value'],
                        'unit' => $spec['unit'] ?? null,
                        'order' => $index,
                    ]);
                }
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return ProductResource::getUrl('index');
    }

    protected function getRedirectUrlParameters(): array
    {
        return ['record' => $this->getRecord()?->getKey()];
    }
}
