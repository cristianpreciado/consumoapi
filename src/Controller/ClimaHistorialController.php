<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Historial;

class ClimaHistorialController extends AbstractController
{
    public function index(): Response
    {
        $historial = $this->getDoctrine()
        ->getRepository(Historial::class)
        ->findAll();

        return $this->render('clima_historial/index.html.twig', [
            'historial' => $historial,
        ]);
    }

    public function create(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $getData=json_decode($request->getContent(), true);
        $historial = new Historial();
        $historial->setTemperatura($getData['temperatura']);
        $historial->setHumedad($getData['humedad']);
        $historial->setPresion($getData['presion']);
        $historial->setLatitud($getData['latitud']);
        $historial->setLongitud($getData['longitud']);
        $historial->setCiudad($getData['ciudad']);
        $historial->setFecha(new \DateTime());
        $em->persist($historial);
        $em->flush();
        return $this->json(['id' => $historial->getId()]);
    }
}
