<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Server
{
    private $id;

    private $cpu;
   
    private $ram;
    
    private $hdd;
    
    private $createdAt;

    public function __construct($cpu, $ram, $hdd)
    {
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->hdd = $hdd;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCpu(): ?int
    {
        return $this->cpu;
    }

    public function setCpu(int $cpu): self
    {
        $this->cpu = $cpu;

        return $this;
    }

    public function getRam(): ?int
    {
        return $this->ram;
    }

    public function setRam(int $ram): self
    {
        $this->ram = $ram;

        return $this;
    }

    public function getHdd(): ?int
    {
        return $this->hdd;
    }

    public function setHdd(int $hdd): self
    {
        $this->hdd = $hdd;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
