<?php

namespace App\Utils;

use App\Entity\Server;
use App\Entity\VirtualMachine;

class ServerCalculator
{
    /**
     * var $server Server
	 * var $virtualMachine VirtualMachine
     */
    public function calculate(Server $server, VirtualMachine $virtualMachine) :int
    {
		$totalServers = 0;
	    foreach($virtualMachine->getServers() as $sr)
        {
			$server->setCpu($server->getCpu() - $sr->getCpu());
			$server->setRam($server->getRam() - $sr->getRam());
			$server->setHdd($server->getHdd() - $sr->getHdd());

			if ($server->getCpu() < 0 || $server->getRam() < 0 || $server->getHdd() < 0) 
			{
				return $totalServers;
			}	
			
			
			$totalServers ++;
		}
		return $totalServers;
    }
}