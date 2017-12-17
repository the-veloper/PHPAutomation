<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Interfaces\ActionInterface;

abstract class Action implements ActionInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    protected $name;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    protected $isActive;

   
    public function __construct()
    {
        $this->isActive = true;
    }
    public function getId()
    {
        return $this->id;
    }
    public function isActive()
    {
        return $this->isActive;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setActive($active)
    {
        $this->active = $active;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
}
