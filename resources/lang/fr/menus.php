<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Gestion des accès',

            'roles' => [
                'all'        => 'Tous les rôles',
                'create'     => 'Créer un rôle',
                'edit'       => 'Éditer un rôle',
                'management' => 'Gestion des rôles',
                'main'       => 'Rôles',
            ],

            'users' => [
                'all'             => 'Tous les utilisateurs',
                'change-password' => 'Changer le mot de passe',
                'create'          => 'Créer un utilisateur',
                'deactivated'     => 'Utilisateurs désactivés',
                'deleted'         => 'Utilisateurs supprimés',
                'edit'            => 'Éditer un utilisateur',
                'main'            => 'Utilisateurs',
                'view'            => 'Voir un utilisateur',
            ],
        ],

        'administration' => [
            'title' => 'Administration',

            'machines' => [
                'all'        => 'Toutes les machines',
                'create'     => 'Créer une machine',
                'edit'       => 'Éditer une machine',
                'management' => 'Gestion des machines',
                'main'       => 'Machines',
            ],
            'exercices' => [
                'all'        => 'Toutes les exercices',
                'create'     => 'Créer une exercice',
                'edit'       => 'Éditer une exercice',
                'management' => 'Gestion des exercices',
                'main'       => 'Exercices',
            ],    
            'seances' => [
                'all'        => 'Toutes les séances',
                'create'     => 'Créer une séance',
                'edit'       => 'Éditer une séance',
                'management' => 'Gestion des séances',
                'main'       => 'Séances',
            ],                      
            'programmes_sportifs' => [
                'all'        => 'Tous les programmes sportifs',
                'create'     => 'Créer un programme sportif',
                'edit'       => 'Éditer un programme sportif',
                'management' => 'Gestion des programmes sportifs',
                'main'       => 'Programmes sportifs',
            ],
            'programmes_dietetiques' => [
                'all'        => 'Tous les programmes dietetiques',
                'create'     => 'Créer un programme dietetique',
                'edit'       => 'Éditer un programme dietetique',
                'management' => 'Gestion des programmes dietetiques',
                'main'       => 'Programmes dietetiques',
            ],                      
        ],        

        'log-viewer' => [
            'main'      => 'Consulter les logs',
            'dashboard' => 'Tableau de bord',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Tableau de bord',
            'machines' => 'Machines',
            'exercices' => 'Exercices',
            'seances' => 'Séances',
            'programmes_sportifs' => 'Programmes sportifs',
            'programmes_dietetiques' => 'Programmes dietetiques',
            'general'   => 'Général',
            'history'   => 'History',
            'system'    => 'Système',
        ],
    ],

    'language-picker' => [
        'language' => 'Langue',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'العربية (Arabic)',
            'zh'    => 'Chinois simplifié (Chinese Simplified)',
            'zh-TW' => 'Chinois traditionnel (Chinese Traditional)',
            'da'    => 'Danois (Danish)',
            'de'    => 'Allemand (German)',
            'el'    => 'Grec (Greek)',
            'en'    => 'Anglais (English)',
            'es'    => 'Espagnol (Spanish)',
            'fa'    => 'Persan (Persian)',
            'fr'    => 'Français (French)',
            'he'    => 'Hébreu (Hebrew)',
            'id'    => 'Indonésien (Indonesian)',
            'it'    => 'Italien (Italian)',
            'ja'    => 'Japonais (Japanese)',
            'nl'    => 'Hollandais (Dutch)',
            'no'    => 'Norvégien (Norwegian)',
            'pt_BR' => 'Portugais (Brazilian Portuguese)',
            'ru'    => 'Russe (Russian)',
            'sv'    => 'Suédois (Swedish)',
            'th'    => 'Thaïlandais (Thai)',
            'tr'    => 'Turc (Turkish)',
        ],
    ],
];
