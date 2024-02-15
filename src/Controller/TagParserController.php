<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/*
 * Controller for solving and inputting the test task.
 */

class TagParserController extends AbstractController
{
    /**
     * @Route("/parse-tags", name="parse_tags")
     */
    public function parseTags(): Response
    {
        $text = 'Lorem Ipsum is simply [tag1 description="Some value"]dummy text[/tag1] of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the [tag2]1500s[/tag2], when an unknown printer took...';

        $firstArray = [];
        $secondArray = [];

        $pattern = '/\[([^\s\]]+)(?:\s+description\s*=\s*"([^"]*)")?\]([^\]]+)\[\/\1\]/';

        preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $tagName = $match[1];
            $description = isset($match[2]) ? $match[2] : '';
            $data = $match[3];

            $firstArray[$tagName] = $data;
            if (!empty($description)) {
                $secondArray[$tagName] = $description;
            }
        }

        $output = "First Array:\n" . print_r($firstArray, true) . "\n\nSecond Array:\n" . print_r($secondArray, true);

        return new Response($output);
    }
}