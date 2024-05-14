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
    print("boaelements ");




    foreach ($elements as $element){
      print("boalaco ");

        $id = $element -> getElementsByTagName('div') -> item(3) -> getElementsByTagName('div') -> item(1) -> textContent;
        print("boaid ");
        $title = $element->querySelector('h4')->textContent;
        print("boatitle ");

        $type = $element->querySelector('div:nth-child(2)')->textContent;
        print("boatype ");

        $author = $element->querySelector('div:first-child')->textContent;
        print("boaauthor");


        $paper = new Paper($id, $title, $type, $author);
        $papers[] = $paper;

        print("boa");
    }

    return $papers;
}


}
