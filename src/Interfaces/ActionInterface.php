<?php
namespace App\Interfaces;

interface ActionInterface
{
    /**
     * @return string
     */
    public function getName();
    /**
     * @return boolean
     */
    public function execute();
}
