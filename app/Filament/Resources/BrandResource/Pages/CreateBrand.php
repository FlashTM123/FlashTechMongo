<?php

namespace App\Filament\Resources\BrandResource\Pages;

use App\Filament\Resources\BrandResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

    protected function getRedirectUrl(): string
    {
        return BrandResource::getUrl('index');
    }

    protected function getRedirectUrlParameters(): array
    {
        return ['record' => $this->getRecord()?->getKey()];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Auto-generate slug from name if empty
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        return $data;
    }
}
