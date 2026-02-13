<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Actions\CreateAction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

class NewsForm
{
   public static function configure(Schema $schema): Schema
   {

      return $schema
         ->components([
            TextInput::make('title')
               ->required(),
            RichEditor::make('description')->required()
               ->columnSpanFull(),
            TextInput::make('writer')
               ->required(),

         ]);
   }
}
