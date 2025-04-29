<?php

namespace App\Controllers;

use App\Model\Ticket;
use Generator;

class GeneratorExampleController 
{
    public function __construct(private Ticket $ticketModel)
    {

    }

    public function index()
    {
        foreach($this->ticketModel->all() as $ticket) {
            echo $ticket['id'] . ': ' . substr($ticket['content'], 0, 15) . '<br />';
        }
    }

    // public function index()
    // {
    //     $numbers = $this->lazyRange(1, 10);

    //     // echo $numbers->current();

    //     foreach($numbers as $key => $number) {
    //         echo $key . ': ' . $number . '<br />';
    //     }
    // }   

    // private function lazyRange(int $start, int $end): Generator
    // {
    //     for ($i = $start; $i <= $end; $i++) {
    //         yield $i; 
    //     }
    // }
}