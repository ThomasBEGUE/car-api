<?php

namespace App\Controller;

use App\Repository\CarRepository;
use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\CarType;

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

    /** 
     * @Route("/car", methods={"POST"})
     */
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {

        $form = $this->createForm(CarType::class);
        $form->submit($request->request->all());
        if ($form->isSubmitted() && $form->isValid()) {

            $car = $form->getData();

            // persist in database
            $entityManager->persist($car);
            $entityManager->flush();
        } else {
            return new JsonResponse(CarType::getErrors($form), Response::HTTP_BAD_REQUEST);
        }
        
        return new JsonResponse([
            "status" => "Create success", 
            "statusCode" => 0
        ], Response::HTTP_CREATED);

    }
}
