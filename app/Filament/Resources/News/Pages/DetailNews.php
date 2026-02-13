<?php

namespace App\Filament\Resources\News\Pages;

use App\Filament\Resources\News\NewsResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;

class DetailNews extends Page
{
   use InteractsWithRecord;

   protected static string $resource = NewsResource::class;
   protected string $view = 'filament.resources.news.pages.detail-news';
   protected string $label = 'test';

   public function mount(int|string $record): void
   {
      $this->record = $this->resolveRecord($record);
   }
}
