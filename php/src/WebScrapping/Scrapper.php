<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {
    $papers = [];
    
    // Use querySelectorAll para obter todos os elementos <a> com a classe 'paper-card'
    $elements = $dom->getElementsByTagName('a');
    $I = 0;
    foreach ($elements as $element){
      
        print("\n[" . ++$I . "]:\n");

        $idElement = $element->getElementsByTagName('div')->item(1)->getElementsByTagName('div')->item(1);
        $id = $idElement->textContent;

        $titleElement = $element->getElementsByTagName('h4')->item(0);
        $title = $titleElement->textContent;

        $authorsElement = $element->getElementsByTagName('div')->item(0);
        $authors = $authorsElement->textContent;

        $typeElement = $element->getElementsByTagName('div')->item(2)->getElementsByTagName('div')->item(0);
        $type = $typeElement->textContent;

        $paper = new Paper($id, $title, $type, $authors);
        
        $papers[] = $paper;
    }

    return $papers;
  }
}