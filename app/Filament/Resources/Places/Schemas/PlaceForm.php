<?php

namespace App\Filament\Resources\Places\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class PlaceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                TextInput::make('place_name')
                    ->label('ناوی شوێن')
                    ->placeholder('ناوی کار یان شوێنەکە بنووسە')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('owner_name')
                    ->label('ناوی خاوەن')
                    ->placeholder('ناوی تەواوی خاوەنەکە')
                    ->required()
                    ->maxLength(255),

                TextInput::make('profession')
                    ->label('پیشە / جۆری کار')
                    ->placeholder('بۆ نموونە: چێشتخانە، فرۆشگا، خزمەتگوزاری')
                    ->maxLength(255),

                TextInput::make('primary_phone')
                    ->label('ژمارەی مۆبایلی سەرەکی')
                    ->placeholder('+964 750 123 4567')
                    ->tel()
                    ->maxLength(255),

                TextInput::make('secondary_phone')
                    ->label('ژمارەی مۆبایلی لاوەکی')
                    ->placeholder('+964 770 987 6543')
                    ->tel()
                    ->maxLength(255),

                Grid::make()
                    ->columns(4)
                    ->schema([
                        ToggleButtons::make('social_apps')
                            ->label('تۆڕی پەیوەندی')
                            ->options([
                                'whatsapp' => 'واتساپ',
                                'telegram' => 'تێلیگرام',
                                'viber' => 'ڤایبەر',
                            ])
                            ->multiple()
                            ->inline()
                            ->columnSpan(2),

                        ToggleButtons::make('is_customer')
                            ->label('کڕیارە؟')
                            ->boolean('بەڵێ', 'نەخێر')
                            ->inline()
                            ->default(false),

                        TextInput::make('activity_percentage')
                            ->label('ڕێژەی چالاکی')
                            ->placeholder('0-100')
                            ->suffix('%')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->default(0)
                            ->required(),
                    ])
                    ->columnSpanFull(),



                Select::make('city_id')
                    ->label('شار')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->placeholder('شارێک هەڵبژێرە')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('ناوی شار')
                            ->placeholder('ناوی شارەکە بنووسە')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->editOptionForm([
                        TextInput::make('name')
                            ->label('ناوی شار')
                            ->required()
                            ->maxLength(255),
                    ]),

                TextInput::make('gps')
                    ->label('GPS')
                    ->placeholder('36.1914, 44.0095')
                    ->maxLength(255),

                Textarea::make('address')
                    ->label('ناونیشانی تەواو')
                    ->placeholder('ناونیشانی شەقام، ژمارەی بینا، گەڕەک...')
                    ->rows(3)
                    ->maxLength(65535)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('وێنەی شوێن / لۆگۆ')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->openable()
                    ->downloadable()
                    ->maxSize(4096)
                    ->hint('(زۆرترین قەبارە 4MB)')
                    ->columnSpanFull(),
            ]);
    }
}
