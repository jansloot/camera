<?php
/**
 * Camera
 *
 * PHP Version 7.0
 *
 * @link      https://github.com/jansloot/camera
 * @copyright Copyright (c) 2018
 * @license   GNU General Public License v2.0
 */

declare(strict_types=1);

namespace Application\Controller;

use Application\Repository\RepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class CameraController extends AbstractActionController
{
    /** @var RepositoryInterface */
    private $repository;

    /**
     * CameraController constructor.
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return ViewModel
     */
    public function indexAction(): ViewModel
    {
        return new ViewModel();
    }

    /**
     * @return JsonModel
     */
    public function listAction(): JsonModel
    {
        return new JsonModel([
            'cameras' => $this->repository->findAll()
        ]);
    }
}
