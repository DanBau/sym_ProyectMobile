<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RolesRepository")
 */
class Roles {

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
     * @ORM\Column(name="rol", type="string", length=255)
     */
    private $rol;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set rol
     *
     * @param string $rol
     *
     * @return Roles
     */
    public function setRol($rol) {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string
     */
    public function getRol() {
        return $this->rol;
    }

    /**
     *
     * @ORM\OneToMany(targetEntity="User", mappedBy="roles") 
     */
    private $users;

    function __construct() {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->rol;
    }

}
