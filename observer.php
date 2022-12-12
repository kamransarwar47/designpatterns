<?php
interface Subscriber {
    public function update($context);
}

class Publisher {
    public array $subscriber = [];
    public $mainState = 0;

    public function subscribe(Subscriber $subscriber)
    {
        $this->subscriber[get_class($subscriber)] = $subscriber;
    }

    public function unsubscribe(Subscriber $subscriber)
    {
        unset($this->subscriber[get_class($subscriber)]);
    }

    public function notifySubscriber()
    {
        foreach ($this->subscriber as $subscriber) {
            $subscriber->update($this);
        }
    }

    public function mainBusinessLogic()
    {
        $this->mainState = rand(0, 10);
        $this->notifySubscriber();
    }
}

class ObserverA implements Subscriber {

    public function update($context)
    {
        echo "ObserverA --> Price Updated --> ".$context->mainState.PHP_EOL;
    }
}

class ObserverB implements Subscriber {

    public function update($context)
    {
        echo "ObserverB --> Price Updated --> ".$context->mainState.PHP_EOL;
    }
}

class ObserverC implements Subscriber {

    public function update($context)
    {
        echo "ObserverC --> Price Updated --> ".$context->mainState.PHP_EOL;
    }
}

$pub = new Publisher();

$obA = new ObserverA();
$obB = new ObserverB();

$pub->subscribe($obA);
$pub->subscribe($obB);

$pub->unsubscribe($obA);

$obC = new ObserverC();
$pub->subscribe($obC);
$pub->subscribe($obA);

$pub->mainBusinessLogic();