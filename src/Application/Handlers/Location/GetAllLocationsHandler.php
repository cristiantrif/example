<?php declare(strict_types=1);

namespace dummyCompanyName\dummyApplicationName\Application\Handlers\Location;

use dummyCompanyName\dummyApplicationName\Application\Exceptions\LocationNotFoundException;
use dummyCompanyName\dummyApplicationName\Application\Transformers\LocationTransformer;
use dummyCompanyName\dummyApplicationName\Domain\Repositories\StockLocationRepositoryInterface;
use dummyCompanyName\dummyApplicationName\Infrastructure\Persistence\Repositories\DoctrineStockLocationRepository;

class GetAllLocationsHandler
{
    /**
     * @var DoctrineStockLocationRepository
     */
    private $locationRepository;
    /**
     * @var LocationTransformer
     */
    private $locationTransformer;

    public function __construct(
        StockLocationRepositoryInterface $locationRepository,
        LocationTransformer $locationTransformer
    ) {

        $this->locationRepository = $locationRepository;
        $this->locationTransformer = $locationTransformer;
    }

    public function handle(): array
    {
        $obj = $this->locationRepository->findAll();

        if (!$obj) {
            throw new LocationNotFoundException();
        }

        return $this->locationTransformer->transformAll($obj);
    }

    public function handleById($id): array
    {
        $obj = $this->locationRepository->find($id);

        if (!$obj) {
            throw new LocationNotFoundException();
        }

        return $this->locationTransformer->transform($obj);
    }

    public function handleByIdWithPlaces($id): array
    {
        $obj = $this->locationRepository->find($id);

        if (!$obj) {
            throw new LocationNotFoundException();
        }

        return $this->locationTransformer->transformWithPlaces($obj);
    }
}
