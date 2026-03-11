<?php

namespace App\Filament\Resources\BrandResource\Pages;

use App\Filament\Resources\BrandResource;
use Filament\Resources\Pages\CreateRecord;

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
}
