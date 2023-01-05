<?php
interface LoggerInterface
{
    public function logError(string $message);
}

class DatabaseLogger implements LoggerInterface
{
    public function logError(string $message)
    {
        // ..
    }
}

class MailerService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function sendEmail()
    {
        try {
            // ..
        } catch (SomeException $exception) {
            $this->logger->logError($exception->getMessage());
        }
    }
}