<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportProvinciasMunicipios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:provincias-municipios';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creacion de las tablas de las provincias y de los municipios asi como su info';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::unprepared(file_get_contents('database/outside/lista_provincias.sql'));
        DB::unprepared(file_get_contents('database/outside/lista_municipios.sql'));
    }
}
