<?php
abstract class MasterPlan {
    protected array $features = [];

    abstract public function getRate(): int;

    public function getFeatures()
    {
        return $this->features;
    }
}

class FreePlan extends MasterPlan {
    private const RATE = 0;
    protected array $features = ['50 emails', '50 contacts', 'No support'];

    public function getRate(): int
    {
        return self::RATE;
    }
}

class ProPlan extends MasterPlan {
    private const RATE = 150;
    protected array $features = ['Unlimited emails', 'Unlimited contacts', '24/7 support'];

    public function getRate(): int
    {
        return self::RATE;
    }
}

class PlanFactory {

    public function createPlan($plan = 'free'): MasterPlan
    {
        $planName = ucwords($plan).'Plan';
        if(!class_exists($planName)) {
            throw new Exception('Class with '.$planName.' could not be found');
        }
        return new $planName();
    }
}

$planFactory = new PlanFactory();
$plan = $planFactory->createPlan('free');
echo $plan->getRate().PHP_EOL;
echo implode(PHP_EOL, $plan->getFeatures()).PHP_EOL;