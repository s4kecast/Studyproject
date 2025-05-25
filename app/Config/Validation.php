<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $tasksbearbeiten = [
        'Bezeichnung'  => 'required',
    ];

    public $spaltenbearbeiten = [
        'Spalte'                => 'required',
        'Spaltenbeschreibung'   => 'required',
        'Sortid'                => 'numeric',
    ];

    public $boardsbearbeiten = [
        'Board' => 'required',
    ];

    public $tasksbearbeiten_errors = [
        'Bezeichnung' => [
            'required' => 'Bitte geben Sie eine Bezeichnung für die Task ein.'],
    ];

    public $spaltenbearbeiten_errors = [
        'Spalte' => [
            'required' => 'Bitte geben Sie eine Bezeichnung für die Spalte ein.'],
        'Spaltenbeschreibung' => [
            'required' => 'Bitte geben Sie eine Beschreibung für die Spalte ein.'],
        'Sortid' => [
            'numeric' => 'Bitte geben Sie eine Zahl ein.'],
    ];

    public $boardsbearbeiten_errors = [
        'Board' => [
            'required' => 'Bitte geben Sie eine Bezeichnung für das Board ein.'],
    ];
}
