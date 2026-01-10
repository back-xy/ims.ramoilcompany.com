<?php

namespace App\Filament\Resources\Places\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PlacesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('کۆد')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),

                TextColumn::make('place_name')
                    ->label('ناوی شوێن')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('owner_name')
                    ->label('ناوی خاوەن')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('profession')
                    ->label('پیشە')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('primary_phone')
                    ->label('مۆبایلی سەرەکی')
                    ->searchable()
                    ->sortable()
                    ->alignment('right')
                    ->extraAttributes(['dir' => 'ltr']),

                TextColumn::make('secondary_phone')
                    ->label('مۆبایلی لاوەکی')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->alignment('right')
                    ->extraAttributes(['dir' => 'ltr']),

                TextColumn::make('social_apps')
                    ->label('تۆڕی پەیوەندی')
                    ->badge()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'whatsapp' => 'واتساپ',
                        'telegram' => 'تێلیگرام',
                        'viber' => 'ڤایبەر',
                        default => $state,
                    })
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_customer')
                    ->label('کڕیار')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('activity_percentage')
                    ->label('چالاکی %')
                    ->suffix('%')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->extraAttributes(['dir' => 'ltr']),

                TextColumn::make('city.name')
                    ->label('شار')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('address')
                    ->label('ناونیشان')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('gps')
                    ->label('GPS')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->extraAttributes(['dir' => 'ltr']),

                ImageColumn::make('image')
                    ->label('وێنە')
                    ->disk('public')
                    ->visibility('public')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('بەرواری دروستکردن')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('بەرواری نوێکردنەوە')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('city')
                    ->label('شار')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('دەستکاری'),
                DeleteAction::make()
                    ->label('سڕینەوە'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('سڕینەوە'),
                ]),
            ]);
    }
}
