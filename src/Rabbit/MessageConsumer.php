<?php

namespace App\Rabbit;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class MessageConsumer implements ConsumerInterface
{

    public function execute(AMQPMessage $msg)
    {
        $message = json_decode($msg->body, true);

        $myfile = fopen("ConsumedMessage.txt", "a") or die("Unable to open file!");
        fwrite($myfile,  '-Received a new message from '.$message['sender']);
        fclose($myfile);
        echo '-Received a new message from '.$message['sender'];
    }
}