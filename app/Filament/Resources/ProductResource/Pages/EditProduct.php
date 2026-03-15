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

        // Strip /storage/ prefix từ images để Filament FileUpload nhận dạng
        if (isset($data['images']) && is_array($data['images'])) {
            $data['images'] = array_map(function($image) {
                if (is_string($image) && str_starts_with($image, '/storage/')) {
                    return substr($image, 9); // Bỏ "/storage/"
                }
                return $image;
            }, $data['images']);
        }

        // Cũng strip /storage/ từ image chính
        if (isset($data['image']) && is_string($data['image']) && str_starts_with($data['image'], '/storage/')) {
            $data['image'] = substr($data['image'], 9);
        }

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
