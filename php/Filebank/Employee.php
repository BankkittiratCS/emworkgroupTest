<?php

class Employee
{
    private $id;
    public $name;
    private $salary;
    public $jobs;
    protected $companyname = "บริษัททดลองงาน จำกัด";

    function __construct($name, $salary, $jobs)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->jobs = $jobs;
    }

    public function Setempname($nameParam)
    {
        $this->name = $nameParam;
    }
    public function setJobs($jobsParam)
    {
        $this->jobs = $jobsParam;
    }
    public function ShowData()
    {
        echo "ชื่อพนักงาน : " . $this->name . "<br/> ";
        echo "งานที่รับผิดชอบ : " . $this->jobs . "<br/>";
        echo "เงินเดือน : " . $this->salary . "<br/>";
        echo "ทำงานที่บริษัท" . $this->companyname . "<br/>";
    }
    public function Setslary($salaryParam)
    {
        $this->salary = $salaryParam;
    }
}
class Programmer extends Employee
{
    function __construct($name, $salary)
    {
        parent::__construct($name, $salary, "Programmer");
    }

    function skill()
    {
        $args = func_get_args(); // รับอาร์กิวเมนต์ทั้งหมดเป็นอาร์เรย์
        if (count($args) == 1) {
            echo "ภาษาที่เขียนได้: " . $args[0] . "<br/><hr/>";
        } elseif (count($args) >= 2) {
            echo "ภาษาที่เขียนได้: " . implode(", ", $args) . "<br/><hr/>";
        }
            elseif(count($args)==0){
                echo "ไม่มีความสามารถ<br/><hr/>";
        }
    }
}
class Manager extends Employee
{
    function __construct($name, $salary,)
    {
        parent::__construct($name, $salary, "manager");
    }
}

$pro1 = new Programmer("Konner", 30000);

$man1 = new Manager("marisa", 50000);

$pro2 = new Programmer("Bank", 40000);

$pro3 = new Programmer("Boat", 60000);

// $emp1 = new Employee("Kittirat", 20000, "Programmers");
// // $emp1->Setempname("Konner");
// // $emp1->setJobs("Programmmer");
// // $emp1->Setslary(20000);


// $emp2 = new Employee("Worawit", 300000, "Programmer");
// // $emp2->Setempname("Worawit");
// // $emp2->setJobs("Programmmer");


// $emp3 = new Employee("Marisa", 30000, "Manager");
