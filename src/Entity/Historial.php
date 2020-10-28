<?php

namespace App\Entity;

use App\Repository\HistorialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistorialRepository::class)
 */
class Historial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $temperatura;

    /**
     * @ORM\Column(type="float")
     */
    private $humedad;

    /**
     * @ORM\Column(type="integer")
     */
    private $presion;

    /**
     * @ORM\Column(type="float")
     */
    private $latitud;

    /**
     * @ORM\Column(type="float")
     */
    private $longitud;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $ciudad;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemperatura(): ?float
    {
        return $this->temperatura;
    }

    public function setTemperatura(float $temperatura): self
    {
        $this->temperatura = $temperatura;

        return $this;
    }

    public function getHumedad(): ?float
    {
        return $this->humedad;
    }

    public function setHumedad(float $humedad): self
    {
        $this->humedad = $humedad;

        return $this;
    }

    public function getPresion(): ?int
    {
        return $this->presion;
    }

    public function setPresion(int $presion): self
    {
        $this->presion = $presion;

        return $this;
    }

    public function getLatitud(): ?float
    {
        return $this->latitud;
    }

    public function setLatitud(float $latitud): self
    {
        $this->latitud = $latitud;

        return $this;
    }

    public function getLongitud(): ?float
    {
        return $this->longitud;
    }

    public function setLongitud(float $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
}
