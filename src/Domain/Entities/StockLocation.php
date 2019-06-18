<?php declare(strict_types=1);

namespace dummyCompanyName\dummyApplicationName\Domain\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\Serializer\Annotation\Groups;

class StockLocation
{
    /**
     * @var int $id
     * @Groups({"location"})
     * @SWG\Property(example=1)
     */
    private $id;

    /**
     * @var string $name
     * @Groups({"location"})
     * @SWG\Property(example="Room 1")
     */
    private $name;

    /**
     * @var string $address
     * @Groups({"location"})
     * @SWG\Property(example="Warehouse 1")
     */
    private $address;

    /**
     * @var string $city
     * @Groups({"location"})
     * @SWG\Property(example="Paris")
     */
    private $city;

    /**
     * @var string $zipcode
     * @Groups({"location"})
     * @SWG\Property(example="1111")
     */
    private $zipcode;

    /**
     * @var int $country
     * @Groups({"location"})
     * @SWG\Property(description="country id", example="57")
     */
    private $country;

    /**
     * @var bool $allowedOnline
     * @Groups({"location"})
     * @SWG\Property(description="", example="true")
     */
    private $allowedOnline;

    /**
     * @var StockPlace[]
     * @Groups({"place"})
     * @SWG\Property(description="list of assigned places",
     *     example={@SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=StockPlace::class, groups={"place"}))
     *     )})
     * )
     */
    private $stockPlaces;

    /**
     * constructor.
     *
     * @param $name
     * @param $address
     * @param $city
     * @param $zipcode
     * @param $country
     * @param $allowedOnline
     */
    public function __construct(

        $name,
        $address,
        $city,
        $zipcode,
        $country,
        $allowedOnline
    ) {
        $this->name          = $name;
        $this->address       = $address;
        $this->city          = $city;
        $this->zipcode       = $zipcode;
        $this->country       = $country;
        $this->allowedOnline = $allowedOnline;
        $this->stockPlaces   = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @return int
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * @return bool
     */
    public function isAllowedOnline(): bool
    {
        return $this->allowedOnline;
    }

    /**
     * @return StockPlace[]|null
     */
    public function getStockPlaces(): ?array
    {
        return $this->stockPlaces->toArray();
    }
}
