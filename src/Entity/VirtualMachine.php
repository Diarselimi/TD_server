<?php

namespace App\Entity;

class VirtualMachine
{
    private $id;

    private $servers;

    public function __construct()
    {
        $this->servers = []; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServers()
    {
        return $this->servers;
    }

    public function addServer(Server $server): self
    {
        $this->servers[] = $server;
        return $this;
    }

    public function popServer()
    {
        array_pop($this->servers);
        return $this;
    }

    public function removeServer(Server $server): self
    {
        if ($this->servers->contains($server)) {
            $this->servers->removeElement($server);
        }

        return $this;
    }
}
