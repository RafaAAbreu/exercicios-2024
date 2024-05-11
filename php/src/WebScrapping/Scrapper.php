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

    $xpath = new \DOMXPath($dom);
    $elements = $xpath -> query('//a[contains(@class, "paper-card")]');

    foreach ($elements as $element){
      if (strpos($element->GetAttribute('class'), "paper-card") == true){

        $id = $element -> getElementsByTagName('div') -> item(3) -> getElementsByTagName('div') -> item(1) -> textContent;
        $title = $element -> getElementsByTagName('h4') -> item(0) -> textContent;
        $type = $element -> getElementsByTagName('div') -> item(1) -> textContent;
        $author = $element  -> getElementsByTagName('div') -> item(0) -> textContent;

      }

      $paper = new Paper($id, $title, $type, $authors);
      $papers[] = $paper;

    }

    return $papers;
  }

}
