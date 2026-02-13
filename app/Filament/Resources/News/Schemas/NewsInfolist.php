<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NewsInfolist
{
   public static function configure(Schema $schema): Schema
   {
      return $schema
         ->components([
            TextEntry::make('title')->maxWidth(10),
            TextEntry::make('description')->html(),
            TextEntry::make('writer'),
            TextEntry::make('created_at')
               ->dateTime(),
            TextEntry::make('updated_at')
               ->dateTime(),
         ]);
   }
}
