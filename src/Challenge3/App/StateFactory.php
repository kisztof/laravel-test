<?php

namespace Interview\Challenge3\App;

use DomainException;
use Interview\Challenge3\Vendor\StateRequest;
use Interview\Challenge3\Vendor\StateRequestFactoryInterface;
use Interview\Challenge3\Vendor\StateRequestInterface;

class StateFactory implements StateRequestFactoryInterface
{
    /**
     * @var \Interview\Challenge3\App\AvailableStateRepositoryInterface
     */
    private AvailableStateRepositoryInterface $availableStateRepository;

    public function __construct(AvailableStateRepositoryInterface $availableStateRepository)
    {
        $this->availableStateRepository = $availableStateRepository;
    }

    public function createFromGET(): StateRequestInterface
    {
        $request = (new StateRequest)->createFromGET();

        if (!in_array($request->getState(), $this->availableStateRepository->all())) {
            throw new DomainException;
        }

        return $request;
    }
}
