<?php

namespace App\Controller\Api;

use App\Modules\Travel\Discounter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TravelController extends AbstractController
{
    #[Route('/api/travel/calculator')]
    public function calculate(Request $request): Response
    {
        $payload = $request->getPayload();

        /*
         * Возможно имеет смысл передавать
         * age & sum в метод, а сам дискаунтер забирать с помощью DI
         * но в целом решил уже не мудрить тут.
         */
        $discounter = new Discounter($payload->get('age'));

        return $this->json([
            'result' => $discounter->calculate($payload->get('sum'))
        ]);
    }
}