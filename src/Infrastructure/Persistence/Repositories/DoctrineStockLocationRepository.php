<?php

namespace dummyCompanyName\dummyApplicationName\Infrastructure\Persistence\Repositories;

use dummyCompanyName\dummyApplicationName\Domain\Entities\StockLocation;
use dummyCompanyName\dummyApplicationName\Domain\Repositories\StockLocationRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class DoctrineStockLocationRepository
 *
 * @package dummyCompanyName\dummyApplicationName\Infrastructure\Persistence\Repositories
 */
class DoctrineStockLocationRepository extends EntityRepository implements StockLocationRepositoryInterface
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(StockLocation::class));
    }
}