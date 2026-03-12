<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Specifications;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load specs từ collection riêng vào form
        $specs = Specifications::where('product_id', $this->record->id)
            ->orderBy('order')
            ->get()
            ->map(fn ($s) => [
                'label' => $s->label,
                'value' => $s->value,
                'unit' => $s->unit,
            ])
            ->toArray();

        $data['specs'] = $specs;
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->specsData = $data['specs'] ?? [];
        unset($data['specs']);
        return $data;
    }

    protected array $specsData = [];

    protected function afterSave(): void
    {
        // Xóa specs cũ và tạo lại
        Specifications::where('product_id', $this->record->id)->delete();

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

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('Xóa'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
