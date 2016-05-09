<?php
require_once('CreditCardRepository.php');
class CreditCardRepositoryTest extends PHPUnit_Framework_TestCase
{
  public function testCheckAmount()
  {
    $card_repository = new CreditCardRepository();
    $this->assertFalse((boolean) $card_repository->card_blocked);
    
    $card_repository->transations = array('100', '11000');
    $card_repository->checkAmount();
    $this->assertTrue((boolean) $card_repository->card_blocked);
    
    $card_repository = new CreditCardRepository();
    $this->assertFalse((boolean) $card_repository->card_blocked);
    
    $card_repository->transations = array('100', '200');
    $card_repository->checkAmount();
    $this->assertFalse((boolean) $card_repository->card_blocked);
  }
}