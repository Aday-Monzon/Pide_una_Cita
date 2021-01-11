<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpresaRepository::class)
 */
class Empresa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion;

    /**
     * @ORM\Column(type="time")
     */
    private $horario;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Citas", mappedBy="empresa")
     */
    private $citas;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="empresa")
     */
    private $user;

    /**
     * Empresa constructor.
     */
    public function __construct()
    {
        $this->horario= new \DateTime();
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCitas()
    {
        return $this->citas;
    }

    /**
     * @param mixed $citas
     */
    public function setCitas($citas): void
    {
        $this->citas = $citas;
    }

    /**
     * @return mixed
     */
    public function getTrabaja()
    {
        return $this->trabaja;
    }

    /**
     * @param mixed $trabaja
     */
    public function setTrabaja($trabaja): void
    {
        $this->trabaja = $trabaja;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trabaja", mappedBy="empresa")
     */
    private $trabaja;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCif(): ?string
    {
        return $this->cif;
    }

    public function setCif(string $cif): self
    {
        $this->cif = $cif;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getHorario(): ?\DateTimeInterface
    {
        return $this->horario;
    }

    public function setHorario(\DateTimeInterface $horario): self
    {
        $this->horario = $horario;

        return $this;
    }
}
