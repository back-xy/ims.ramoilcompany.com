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
                    ->label('Place Name')
                    ->placeholder('Enter the business or place name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('owner_name')
                    ->label('Owner Name')
                    ->placeholder('Full name of the owner')
                    ->required()
                    ->maxLength(255),

                TextInput::make('profession')
                    ->label('Profession / Business Type')
                    ->placeholder('e.g., Restaurant, Retail Shop, Services')
                    ->maxLength(255),

                TextInput::make('primary_phone')
                    ->label('Primary Phone')
                    ->placeholder('+964 750 123 4567')
                    ->tel()
                    ->maxLength(255),

                TextInput::make('secondary_phone')
                    ->label('Secondary Phone')
                    ->placeholder('+964 751 987 6543')
                    ->tel()
                    ->maxLength(255),

                Grid::make()
                    ->columns(4)
                    ->schema([
                        ToggleButtons::make('social_apps')
                            ->label('Social Messaging Apps')
                            ->options([
                                'whatsapp' => 'WhatsApp',
                                'telegram' => 'Telegram',
                                'viber' => 'Viber',
                            ])
                            ->multiple()
                            ->inline()
                            ->columnSpan(2),

                        ToggleButtons::make('is_customer')
                            ->label('Is Customer')
                            ->boolean()
                            ->inline()
                            ->default(false),

                        TextInput::make('activity_percentage')
                            ->label('Activity Level')
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
                    ->label('City')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->placeholder('Select a city')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('City Name')
                            ->placeholder('Enter city name')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->editOptionForm([
                        TextInput::make('name')
                            ->label('City Name')
                            ->required()
                            ->maxLength(255),
                    ]),

                TextInput::make('gps')
                    ->label('GPS Coordinates')
                    ->placeholder('36.1914, 44.0095')
                    ->maxLength(255),

                Textarea::make('address')
                    ->label('Full Address')
                    ->placeholder('Street address, building number, district...')
                    ->rows(3)
                    ->maxLength(65535)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Business Image / Logo')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->maxSize(2048)
                    ->hint('Upload a photo or logo (max 2MB)')
                    ->columnSpanFull(),
            ]);
    }
}
