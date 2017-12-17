<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Device;

class DeviceController extends Controller
{
    /**
     * @Route("/device/add/{hwid}", name="app_device_add")
     */
    public function add($hwid)
    {
	$repository = $this->getDoctrine()->getRepository(Device::class);
	$device = $repository->findOneBy(['deviceid' => $hwid]);
	if (!$device) {
		$em = $this->getDoctrine()->getManager();
		$device = new Device();
		$device->setDeviceid($hwid);
		$em->persist($device);
		$em->flush();
        	return new Response('Added.');
        }
        return new Response('Existed.');
    }
}
