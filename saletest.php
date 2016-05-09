<?php
/**
 * class test sale
 */
require_once('sale.php');
class SaleTest extends PHPUnit_Framework_TestCase
{
	public function testAmount()
	{
		$sale = new Sale();
		$sale->amount = 10;
		$sale->expried_at = strtotime('-10 days');
		$this->assertEquals(10 + (10 / 100 * 10), $sale->getAmount());
		
		$sale = new Sale();
		$sale->amount = 10;
		$sale->expried_at = strtotime('+10 days');
		$this->assertEquals(10 - (10 / 100 * 10), $sale->getAmount());
	}
	
	public function testExpiredAmount()
	{
	  $sale = new Sale();
	  $sale->amount = 10;
	  $this->assertEquals(0, $sale->expiredAmount());
	  
	  $sale->never_expired = true;
	  $this->assertEquals(0, $sale->expiredAmount());
	  
	  $sale->never_expired = false;
	  $sale->expried_at = strtotime('+10 days');
	  $this->assertEquals(0, $sale->expiredAmount());
	  
	  $sale->never_expired = false;
	  $sale->expried_at = strtotime('-10 days');
	  $this->assertEquals(1, $sale->expiredAmount());
	}
	public  function testSaleExpiredAmount()
	{
	  $sale = new Sale();
	  $sale->setExpiredAt(strtotime('tomorrow'));
	  $this->assertEquals(-5, $sale->getRealAmount());
	  
	  $sale->setAmount(10);
	  $this->assertEquals(5, $sale->getRealAmount());
	}
}