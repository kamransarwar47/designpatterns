<?php

// An abstract vehicle class that defines a common interface for all vehicles
abstract class Vehicle
{
    // An abstract method that starts the vehicle
    abstract public function start();
}

// A class that represents a car
class Car extends Vehicle
{
    // An implementation of the start() method that starts the car's engine
    public function start()
    {
        // Start the car's engine
    }
}

// A class that represents a truck
class Truck extends Vehicle
{
    // An implementation of the start() method that starts the truck's engine
    public function start()
    {
        // Start the truck's engine
    }
}

// A class that controls a vehicle
class VehicleController
{
    private $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    // A method that starts the vehicle
    public function startVehicle()
    {
        $this->vehicle->start();
    }
}

// Create a car and a truck, and control them
$car = new Car();
$truck = new Truck();

$carController = new VehicleController($car);
$truckController = new VehicleController($truck);

$carController->startVehicle();
$truckController->startVehicle();
