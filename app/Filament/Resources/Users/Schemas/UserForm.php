<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('ناو')
                            ->placeholder('ناوی بەکارهێنەر')
                            ->required()
                            ->maxLength(255),

                        Select::make('role')
                            ->label('ڕۆل')
                            ->options([
                                'admin' => 'بەڕێوەبەر',
                                'user' => 'بەکارهێنەر',
                            ])
                            ->required()
                            ->default('user'),
                    ])
                    ->columnSpanFull(),

                Grid::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('email')
                            ->label('ئیمەیل')
                            ->placeholder('example@ramoilsystem.com')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->rule('regex:/^[a-zA-Z0-9._%+-]+@ramoilsystem\.com$/')
                            ->helperText('ئیمەیل دەبێت لە دۆمەینی سیستەم بێت (ramoilsystem.com@)')
                            ->validationMessages([
                                'regex' => 'ئیمەیل دەبێت بە ramoilsystem.com@ کۆتایی بێت',
                            ]),

                        TextInput::make('password')
                            ->label('وشەی نهێنی')
                            ->password()
                            ->revealable()
                            ->required()
                            ->minLength(6)
                            ->maxLength(255)
                            ->visibleOn('create'),


                        TextInput::make('phone')
                            ->label('ژمارەی مۆبایل')
                            ->placeholder('0750 123 4567')
                            ->tel()
                            ->maxLength(255)
                            ->extraInputAttributes(['dir' => 'ltr', 'style' => 'text-align: right;']),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
