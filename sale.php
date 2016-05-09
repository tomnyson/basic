<?php

/**
 * @copyright 2016
 */
class Sale
{
	public $expried_at;
	public $amount;
	public $never_expired;
	
	public function getAmount()
	{
		if($this->isExpired())
		{
			$this->getAmountWithInterest ();
		}
		else 
		{
			$this->getAmountWithDiscount ();
		}
		return $this->amount;
	}
  /**
 * 
 */private function getAmountWithDiscount() {
    $discount = 10;
    $this->amount = $this->amount -($this->amount / 100 * $discount);
  }

  /**
 * 
 */private function getAmountWithInterest() {
    $interest = 10;
    $this->amount = $this->amount + ($this->amount / 100 * $interest);
  }

  /**
 * 
 */
  private function isExpired()
  {
    return !is_null($this->expried_at) && $this->expried_at < time();
  }
  public function expiredAmount()
  {
    if ($this->isNotExpired()) return 0;
    
    return $this->amount / 100 * 10;
  }
/**
 * 
 */private function isNotExpired() {
    return $this->never_expired || is_null($this->expried_at) || $this->expried_at > time();
  }
  
  public function getRealAmount()
  {
   if ($this->isExpired())
   {
     $amount = $this->getAmount() + 10;
     $this->setAmount($amount);
     return $this->getAmount();
   }
   else
   {
     $amount = $this->getAmount() - 5;
     $this->setAmount($amount);
     return $this->getAmount();
   }
    
    return $this->amount;
  }
  
  public function setExpiredAt($expired_at)
  {
    $this->expried_at = $expired_at;
  }
  public  function setAmount($amount)
  {
    $this->amount = $amount;
  }

  
	
}
