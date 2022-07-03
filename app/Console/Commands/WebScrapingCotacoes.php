<?php

namespace App\Console\Commands;

use App\Jobs\ColetarCotacoes;
use Illuminate\Console\Command;

class WebScrapingCotacoes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:cotacoes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando ativa o web scraping de cotações';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       ColetarCotacoes::dispatch();
    }
}
