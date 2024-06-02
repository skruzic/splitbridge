<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use RyanChandler\FilamentNavigation\Models\Navigation;

class NavigationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::create([
            'name'   => 'Menu',
            'handle' => 'menu',
            'items'  => [
                [
                    "label"    => "Početna",
                    "type"     => "external-link",
                    "data"     => [
                        "url"    => "/",
                        "target" => null,
                    ],
                    "children" => [
                    ],
                ],
                [
                    "label"    => "O nama",
                    "type"     => "external-link",
                    "data"     => [
                        "url"    => "#",
                        "target" => null,
                    ],
                    "children" => [
                        [
                            "label"    => "Članovi",
                            "type"     => "external-link",
                            "data"     => [
                                "url"    => "/members",
                                "target" => null,
                            ],
                            "children" => [
                            ],
                        ],
                        [
                            "label"    => "Dokumenti",
                            "type"     => "external-link",
                            "data"     => [
                                "url"    => "/downloads",
                                "target" => null,
                            ],
                            "children" => [
                            ],
                        ],
                    ],
                ],
                [
                    "label"    => "Tečaj",
                    "type"     => "page",
                    "data"     => [
                        "url"     => null,
                        "target"  => "",
                        "page_id" => "tecaj",
                    ],
                    "children" => [
                    ],
                ],
                [
                    "label"    => "Turniri",
                    "type"     => "external-link",
                    "data"     => [
                        "url"    => "/tournaments",
                        "target" => null,
                    ],
                    "children" => [
                    ],
                ],
                [
                    "label"    => "Rang liste",
                    "type"     => "external-link",
                    "data"     => [
                        "url"    => "#",
                        "target" => null,
                    ],
                    "children" => [
                        [
                            "label"    => "Mjesečna",
                            "type"     => "external-link",
                            "data"     => [
                                "url"    => "/ranks/month",
                                "target" => null,
                            ],
                            "children" => [
                            ],
                        ],
                        [
                            "label"    => "Sezonska",
                            "type"     => "external-link",
                            "data"     => [
                                "url"    => "/ranks/list",
                                "target" => null,
                            ],
                            "children" => [
                            ],
                        ],
                        [
                            "label"    => "Arhiva",
                            "type"     => "external-link",
                            "data"     => [
                                "url"    => "/ranks/archive",
                                "target" => null,
                            ],
                            "children" => [
                            ],
                        ],
                    ],
                ],
                [
                    "label"    => "Info in English",
                    "type"     => "page",
                    "data"     => [
                        "page_id" => "info-in-english",
                    ],
                    "children" => [
                    ],
                ],
                [
                    "label"    => "Kontakt",
                    "type"     => "external-link",
                    "data"     => [
                        "url"    => "/contact",
                        "target" => null,
                    ],
                    "children" => [
                    ],
                ],
            ],
        ]);
    }
}
