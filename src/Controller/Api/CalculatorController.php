<?php

namespace App\Controller\Api;

use App\Services\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route('/api/calculator')]
    public function index(Request $request): JsonResponse
    {
        $payload = $request->getPayload();

        $operation = $payload->get('operation');
        $first = $payload->get('first');
        $second = $payload->get('second');

        /**
         * Знаю о жёсткой привязке к калькулятору, тут это сделано, чтобы просто показать
         * что умею пользоваться возможностями нового PHP
         * да и наверное с такой простой задачей
         * я бы даже не стал использовать симфони, а просто бы по-быстрому забабахал html-ку обычную.
         *
         * Не уверен, стоит ли хендлить енд-кейсы аля деления на ноль и когда не передаются никакие параметры,
         * поэтому предположим, что у нас идеальный случай.
         */
        $calculator = new Calculator($first, $second, $operation);

        return $this->json([
            'result' => $calculator->getResult(),
        ]);
    }
}