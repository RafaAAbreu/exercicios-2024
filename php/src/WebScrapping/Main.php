<?php

namespace Chuva\Php\WebScrapping;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {


  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {

    ini_set('display-errors', 'off');
    error_reporting(0);
    libxml_use_internal_errors(TRUE);
    
    print("dps dos errps");
    $dom = new \DOMDocument();
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');
    print("dps do arquivo");
    $data = (new Scrapper())->scrap($dom);

    print("dps do scrap");

    //print_r($data);
  }

}
