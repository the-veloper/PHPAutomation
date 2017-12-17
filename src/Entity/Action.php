<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Interfaces\ActionInterface;

/**
 * @ORM\Table(name="action")
 * @ORM\Entity(repositoryClass="App\Repository\ActionRepository")
 */
abstract class Action implements ActionInterface
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
}
