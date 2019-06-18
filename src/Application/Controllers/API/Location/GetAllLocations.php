<?php


namespace dummyCompanyName\dummyApplicationName\Application\Controllers\API\Location;

use dummyCompanyName\dummyApplicationName\Application\Handlers\Location\GetAllLocationsHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use dummyCompanyName\dummyApplicationName\Domain\Entities\StockLocation;

class GetAllLocations
{
    /**
     * List the Stock Locations without Places.
     *
     * This call lists all the Stock Locations from database. Places are not included.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the list of Stock Locations without Places",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=StockLocation::class, groups={"location"}))
     *     )
     * )
     *
     * @SWG\Tag(name="locations")
     *
     * @param Request                $request
     * @param GetAllLocationsHandler $handler
     * @return JsonResponse
     * @throws \dummyCompanyName\dummyApplicationName\Application\Exceptions\LocationNotFoundException
     */
    public function __invoke(
        Request $request,
        GetAllLocationsHandler $handler
    ) {
        //TODO - catch exceptions

        return new JsonResponse($handler->handle());
    }
}
