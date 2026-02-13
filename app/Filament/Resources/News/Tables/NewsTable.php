<?php

namespace App\Filament\Resources\News\Tables;

use App\Filament\Resources\News\NewsResource;
use App\Filament\Resources\News\Pages\DetailNews;
use App\Models\News;
use BladeUI\Icons\Components\Icon;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class NewsTable
{
   public static function configure(Table $table): Table
   {

      return $table
         ->columns([
            TextColumn::make('title')
               ->searchable(),
            TextColumn::make('writer')
               ->searchable(),
            TextColumn::make('created_at')
               ->dateTime()
               ->sortable()
               ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
               ->dateTime()
               ->sortable()
               ->toggleable(isToggledHiddenByDefault: true),
         ])
         ->filters([
            //
         ])
         ->recordActions([
            // ViewAction::make('view'),
            Action::make('view')->color('secondary')->icon(Heroicon::ListBullet)->label('')->tooltip('Detail')
               ->url(fn(News $record): string => NewsResource::getUrl('detail', [$record->id])),
            EditAction::make()->label('')->tooltip('Edit'),
            DeleteAction::make()->label('')->tooltip('Delete'),
         ])
         ->toolbarActions([
            BulkActionGroup::make([
               DeleteBulkAction::make(),
            ]),
         ]);
   }
}
