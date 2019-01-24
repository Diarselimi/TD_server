<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Utils\ServerCalculator;
use App\Entity\Server;
use App\Entity\VirtualMachine;

class ServerCalculatorTest extends TestCase
{
    public function testCalculateTwoMachines()
    {
        $serverCalculator = new ServerCalculator();
        
        $server = new Server(2, 4, 50);
        $tooBigServer = new Server(1, 2, 200);


        $virtualMachines = new VirtualMachine();
        $virtualMachines->addServer($server);
        $virtualMachines->addServer($server);
        $virtualMachines->addServer($tooBigServer); // this is skiped
        
        $this->assertEquals($serverCalculator->calculate(new Server(6, 10, 300), $virtualMachines), 3);
        $virtualMachines->popServer();

        $this->assertEquals($serverCalculator->calculate(new Server(8, 10, 400), $virtualMachines), 2); 

        $virtualMachines->popServer();
        $this->assertEquals($serverCalculator->calculate(new Server(4, 8, 200), $virtualMachines), 1); 
    }

    public function testCalculateForTenMachines()
    {
        $host = new Server(200,400,1000);

        $machine = new Server(8,16,100);
        $virtualMachines = new VirtualMachine();
        $virtualMachines->addServer($machine);
        $virtualMachines->addServer($machine);
        $virtualMachines->addServer($machine);
        $virtualMachines->addServer($machine);
        $virtualMachines->addServer($machine);
        $virtualMachines->addServer($machine);
        $virtualMachines->addServer($machine);
        $virtualMachines->addServer(new Server(100, 400, 500)); //this is skipped

        $serverCalculator = new ServerCalculator();

        $this->assertEquals(7, $serverCalculator->calculate($host, $virtualMachines));
    }
}
