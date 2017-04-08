<?php
/**
 * Created by PhpStorm.
 * User: Theophilus Omoregbee <theo4u@ymail.com>
 * Date: 10/25/16
 * Time: 12:10 AM
 */

include "Serialize.php";

/**
 * this handles the parents of the user
 */
class ParentTest
{
    protected $email;
    protected $password;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }
}

class State
{
    private $name;
    private $code;

    function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
}

class Country
{
    private $name;
    private $code;
    private $states = array();

    function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return State[]
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param State[] $states
     */
    public function setStates($states)
    {
        $this->states = $states;
    }

    /**
     * this is used to add state to our array if states
     * @param State $state
     */
    public function addState(State $state)
    {
        $this->states[] = $state;
    }

}

/**
 * Create a dummy user
 */
class User extends ParentTest
{
    private $firstname;
    private $lastname;
    private $states = array();
    private $country;
    private $dateCreated;
    private $roles = array();


    function __construct()
    {
        $this->dateCreated = time();
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param mixed $states
     */
    public function setStates($states)
    {
        $this->states = $states;
    }


    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param int $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

}

//done creating dummy objects
$user = new User();
$user->setFirstname("Theophilus");
$user->setLastname("Omoregbee");

$user->setStates(array(new State("Edo state", "ED"), new State("Lagos State", "LG")));
$user->setCountry(new Country("Nigeria", "NG"));

$user->getCountry()->setStates($user->getStates());

$user->setRoles(array("ADMIN", "DB MANAGER"));

$user->setEmail("theo4u@ymail.com");
$user->setPassword("1111");

//lets serialize our object now
header('Content-type: application/json');
echo json_encode(SerializeMe::serialize($user));

?>