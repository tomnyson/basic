<?php
/**
 * class CreditCardRepository
 */
class CreditCardRepository
{
  public $transations = array();
  public $max_amount = 10000;
  public $card_blocked = false;
  
  public function checkAmount()
  {
    $transaction = $this->maxTransaction();
    $this->setMaxTransaction($transaction);
  }
  
  private function maxTransaction()
  {
    foreach ($this->transations as $transaction)
    {
        if($transaction > $this->max_amount)
        {
          $this->blockCreditCardForOneMonth(time());
         return $transaction;
        }
    }
  }
  public function blockCreditCardForOneMonth($time)
  {
    $this->card_blocked = $time;
  }
  public function setMaxTransaction($transaction)
  {
    $this->transations = $transaction;  
  }
  
}