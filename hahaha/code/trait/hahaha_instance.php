<?php

namespace hahaha;

trait hahaha_instance
{
    public static $Instance_ = null;

    public static function Instance()
    {
        if (self::$Instance_ == null) {
            self::$Instance_ = new self;

        }

        return self::$Instance_;
    }
}
