<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Actions\SSHCommand;

class SSHActionController extends Controller
{
    /**
     * @Route("/action_ssh/{id}/run", name="app_run_ssh")
     */
    public function run(SSHCommand $cmd)
    {
	if ($cmd) {
		$em = $this->getDoctrine()->getManager();
		$cmd->execute();
		$em->persist($cmd);
		$em->flush();
        	return new Response('Ran.');
        }
        return new Response('Not Found.');
    }
}
