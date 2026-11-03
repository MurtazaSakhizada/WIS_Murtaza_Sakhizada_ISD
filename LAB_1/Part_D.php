<?php
// PART D
class BankAcc
{
    
    public $ownerName;
    private $balance;
    function __construct($ownerName, $balance)
    {
        $this->ownerName = $ownerName;
        $this->balance = $balance;
    }
    function showBalance()
    {
        echo "Balance: " . $this->balance . "<br>";
    }
}
$account1 = new BankAcc("Nader", 900);
echo "Owner: " . $account1->ownerName . "<br>";
$account1->showBalance();



/* 
   Q: Does echo $account1->balance; work?
   A: No.

   Q: Why?
   A: Because $balance is declared as 'private'. Private properties can only be accessed from inside the 
      BankAccount class itself.
      They cannot be accessed from outside the class.
 */

?>