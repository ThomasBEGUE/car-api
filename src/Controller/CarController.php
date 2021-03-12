<?php

namespace App\Controller;

use App\Repository\CarRepository;
use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


class CarController extends AbstractController
{

    /**
     * @var CarRepository $carRepository
     */
    private $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * @Route("/car/list", methods={"GET"})
     */
    public function list(SerializerInterface $serializer): Response
    {
        $cars = $this->carRepository->findAll();
        return JsonResponse::fromJsonString(
            $serializer->serialize(
                $cars,
                'json',
                ['groups' => 'list_car']
            )
        );
    }

    /**
     * @Route("/car/{id<\d+>}", methods={"GET"})
     */
    public function show(Car $car, SerializerInterface $serializer): Response
    {
        return JsonResponse::fromJsonString(
            $serializer->serialize(
                $car,
                'json',
                ['groups' => 'show_car']
            )
        );
    }
}
