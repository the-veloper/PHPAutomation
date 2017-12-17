<?php
namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{

    public function executeAction()
    {
        $id = $this->request->query->get('id');
        $entity_type = $this->request->query->get('entity');
	$entity = $this->em->getRepository("App:Actions\\" . $entity_type)->find($id);
        $entity->execute();

        // redirect to the 'list' view of the given entity
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'list',
            'entity' => $this->request->query->get('entity'),
        ));
    }
}
