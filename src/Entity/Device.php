<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="device")
 * @ORM\Entity(repositoryClass="App\Repository\DeviceRepository")
 */
class Device implements \Serializable
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
    private $deviceid;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    public function __construct()
    {
        $this->isActive = true;
    }
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->deviceid,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->deviceid
        ) = unserialize($serialized);
    }
    public function setDeviceid($deviceid)
    {
        $this->deviceid = $deviceid;
	return $this;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getDeviceid()
    {
        return $this->deviceid;
    }
    public function isActive()
    {
        return $this->isActive;
    }
    public function setActive($active)
    {
        $this->isActive = $active;
	return $this;
    }
}
