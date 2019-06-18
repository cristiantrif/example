<?php declare(strict_types=1);


namespace dummyCompanyName\dummyApplicationName\Application\Transformers;

use dummyCompanyName\dummyApplicationName\Domain\Entities\StockLocation;

class LocationTransformer
{
    /**
     * @var PlaceTransformer
     */
    private $placeTransformer;

    public function __construct(PlaceTransformer $placeTransformer)
    {

        $this->placeTransformer = $placeTransformer;
    }

    public function transform(StockLocation $location)
    {
        return [
            'id'              => $location->getId(),
            'name'            => $location->getName(),
            'city'            => $location->getCity(),
            'address'         => $location->getAddress(),
            'country'         => $location->getCountry(),
            'zipcode'         => $location->getZipcode(),
            'isAllowedOnline' => (bool)$location->isAllowedOnline()
        ];
    }

    public function transformAll(array $locations): array
    {
        $response = [];

        foreach ($locations as $location) {
            if (!$location instanceof StockLocation) {
                continue;
            }

            $response[] = $this->transform($location);
        }

        return $response;
    }

    public function transformWithPlaces(StockLocation $location)
    {
        $result = $this->transform($location);
        $result['places'] = $this->placeTransformer->transformAll($location->getStockPlaces());

        return $result;
    }
}
