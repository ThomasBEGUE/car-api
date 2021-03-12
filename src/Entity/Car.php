<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"list_car"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"list_car", "show_car"})
     */
    private $brands;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"list_car", "show_car"})
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_car"})
     */
    private $registration;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"list_car", "show_car"})
     */
    private $fuel;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"show_car"})
     * @Assert\GreaterThanOrEqual(2)
     */
    private $numberOfPlaces = 2;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"show_car"})
     * @Assert\GreaterThanOrEqual(1)
     */
    private $numberOfDoors = 2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_car"})
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"list_car", "show_car"})
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"list_car"})
     * @Assert\GreaterThanOrEqual(0)
     * @Assert\LessThanOrEqual(5)
     */
    private $stars;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrands(): ?string
    {
        return $this->brands;
    }

    public function setBrands(?string $brands): self
    {
        $this->brands = $brands;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    public function setRegistration(string $registration): self
    {
        $this->registration = $registration;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(?string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getNumberOfPlaces(): ?int
    {
        return $this->numberOfPlaces;
    }

    public function setNumberOfPlaces(int $numberOfPlaces): self
    {
        $this->numberOfPlaces = $numberOfPlaces;

        return $this;
    }

    public function getNumberOfDoors(): ?int
    {
        return $this->numberOfDoors;
    }

    public function setNumberOfDoors(int $numberOfDoors): self
    {
        $this->numberOfDoors = $numberOfDoors;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStars(): ?int
    {
        return $this->stars;
    }

    public function setStars(?int $stars): self
    {
        $this->stars = $stars;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
