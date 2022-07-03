<?php

namespace App\Jobs;

use App\Models\Cotacoes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Goutte\Client;

class ColetarCotacoes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data = array();
    private $results = array();

    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $urls = array(
            'nubank' => 'https://www.infomoney.com.br/cotacoes/b3/bdr/nubank-nubr33/grafico/',
            'gerdau' => 'https://www.infomoney.com.br/cotacoes/b3/acao/gerdau-ggbr4/',
            'magalu' =>'https://www.infomoney.com.br/cotacoes/b3/acao/magazine-luiza-mglu3/'           
        );

           
        $client = new Client();
       
        foreach ($urls as $key => $url) {
            
            $page = $client->request('GET',$url);
              
     
         $page->filter('.quotes-header-info')->each(function($item){
            $this->data['acao'] = $item->filter('.center')->text();
          
            $item->filter('.line-info')->each(function($item){

                $this->data['variacao'] = $item->filter('.percentage')->text();
                $this->data['min'] = $item->filter('.minimo')->text();
                $this->data['max'] = $item->filter('.maximo')->text();
                
                
            });

         });
       
       $cotacoes = Cotacoes::create($this->data);
       

        }
       
        
    }
}
