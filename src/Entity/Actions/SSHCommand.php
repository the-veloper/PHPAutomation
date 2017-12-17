<?php
namespace App\Entity\Actions;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Action;

/**
 * @ORM\Entity
 * @ORM\Table(name="action_ssh_commands")
 */
class SSHCommand Extends Action
{
    /**
     * @ORM\Column(type="string", length=255)
     */ 
    private $command;
   /**
     * @ORM\Column(type="string", length=255)
     */
    private $hostname;
   /**
     * @ORM\Column(type="integer")
     */
    private $port;
   /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;
   /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;
    public function getCommand()
    {
        return $this->command;
    }
    public function setCommand($command)
    {
        $this->command = $command;
        return $this;
    }

    public function __construct()
    {
        parent::__construct();
	$this->port = 22;
    }
    public function getHostname()
    {
        return $this->hostname;
    }
    public function getPort()
    {
        return $this->port;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
	return $this;
    }
    public function setPort($port)
    {
        $this->port = $port;
	return $this;
    }
    public function setUsername($username)
    {
        $this->username = $username;
	return $this;
    }
    public function setPassword($password)
    {
        $this->password = $password;
	return $this;
    }

    public function execute()
    {
	$configuration = new \Ssh\Configuration($this->hostname, $this->port);
	$authentication = new \Ssh\Authentication\Password($this->username, $this->password);

	$session = new \Ssh\Session($configuration, $authentication);
	$exec = $session->getExec();
	$exec->run($this->command);
        return true;
    }
}
