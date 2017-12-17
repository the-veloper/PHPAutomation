<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="automation")
 * @ORM\Entity(repositoryClass="App\Repository\AutomationRepository")
 */
class Automation
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
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
