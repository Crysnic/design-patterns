<?php

declare(strict_types=1);

namespace App\Util\Exception;

class LoadConfigException extends \Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message, 0);
    }
}
