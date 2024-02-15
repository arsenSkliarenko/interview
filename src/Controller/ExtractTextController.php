<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/*
 * Controller for solving and inputting the test task.
 */
class ExtractTextController extends AbstractController
{
    /**
     * @Route("/test/extract", name="extract_text", methods={"POST"})
     */
    public function extractText(): Response
    {
        $text = "Lorem Ipsum is simply one: dummy text of the printing and  two: typesetting industry. Lorem Ipsum has been the industry's  one: standard dummy text ever since the three: 1500s.";

        $result = $this->parseText($text);

        echo "<pre>";
        print_r($result);
        echo "</pre>";

        return new Response();
    }

    private function parseText($text): array
    {
        $result = [];
        $pattern = '/(one:|two:|three:)\s*(.*?)(?=(one:|two:|three:)|$)/s';
        preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $key = rtrim($match[1], ':');
            $value = trim($match[2]);
            $result[$key] = $value;
        }

        return $result;
    }
}