<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductoRepository")
 */
class Producto {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="bateria", type="string", length=50)
     */
    private $bateria;

    /**
     * @var string
     *
     * @ORM\Column(name="ram", type="string", length=5)
     */
    private $ram;

    /**
     * @var string
     *
     * @ORM\Column(name="rom", type="string", length=50)
     */
    private $rom;

    /**
     * @var string
     *
     * @ORM\Column(name="sistema", type="string", length=50)
     */
    private $sistema;

    /**
     * @var float
     *
     * @ORM\Column(name="pulgadas", type="float")
     */
    private $pulgadas;

    /**
     * @var string
     *
     * @ORM\Column(name="resolucion", type="string", length=50)
     */
    private $resolucion;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Producto
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set bateria
     *
     * @param string $bateria
     *
     * @return Producto
     */
    public function setBateria($bateria) {
        $this->bateria = $bateria;

        return $this;
    }

    /**
     * Get bateria
     *
     * @return string
     */
    public function getBateria() {
        return $this->bateria;
    }

    /**
     * Set ram
     *
     * @param string $ram
     *
     * @return Producto
     */
    public function setRam($ram) {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return string
     */
    public function getRam() {
        return $this->ram;
    }

    /**
     * Set rom
     *
     * @param string $rom
     *
     * @return Producto
     */
    public function setRom($rom) {
        $this->rom = $rom;

        return $this;
    }

    /**
     * Get rom
     *
     * @return string
     */
    public function getRom() {
        return $this->rom;
    }

    /**
     * Set sistema
     *
     * @param string $sistema
     *
     * @return Producto
     */
    public function setSistema($sistema) {
        $this->sistema = $sistema;

        return $this;
    }

    /**
     * Get sistema
     *
     * @return string
     */
    public function getSistema() {
        return $this->sistema;
    }

    /**
     * Set pulgadas
     *
     * @param float $pulgadas
     *
     * @return Producto
     */
    public function setPulgadas($pulgadas) {
        $this->pulgadas = $pulgadas;

        return $this;
    }

    /**
     * Get pulgadas
     *
     * @return float
     */
    public function getPulgadas() {
        return $this->pulgadas;
    }

    /**
     * Set resolucion
     *
     * @param string $resolucion
     *
     * @return Producto
     */
    public function setResolucion($resolucion) {
        $this->resolucion = $resolucion;

        return $this;
    }

    /**
     * Get resolucion
     *
     * @return string
     */
    public function getResolucion() {
        return $this->resolucion;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Marca", inversedBy="products")
     * @ORM\JoinColumn("marca_id", referencedColumnName="id")
     * @var type 
     */
    private $marca;
    
    public function getMarca() {
        return $this->marca;
    }

    public function setMarca(Marca $marca) {
        $this->marca = $marca;
    }

    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="products")
     * @ORM\JoinColumn("user_id", referencedColumnName="id")
     * @var type 
     */
    private $user;
    
    
    
    public function getUser() {
        return $this->user;
    }

    public function setUser(User $user) {
        $this->user = $user;
    }

    public function __toString() {
        return $this->nombre;
    }


}
