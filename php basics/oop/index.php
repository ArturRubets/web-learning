<?php
abstract class Customer
{
    public $id = 1;
    public $name;
    protected $email;
    public $balance;

    public function __construct($id, $name, $email, $balance)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->balance = $balance;
    }

    abstract public function getEmail();
}


class Subscriber extends Customer
{
    public $plan;

    public function __construct($id, $name, $email, $balance, $plan)
    {
        parent::__construct($id, $name, $email, $balance);
        $this->plan = $plan;
    }


    public function getEmail()
    {
        return $this->email;
    }
}

$subscriber = new Subscriber(1, 'Artur Rubets', 'example@gmail.com', 1000, 'Pro');
echo $subscriber->getEmail();


class User {
    public $username;
    public $password;
    public static $passwordLength = 5;

    public static function getPasswordLength() {
        return self::$passwordLength;
    }
}

echo User::getPasswordLength();