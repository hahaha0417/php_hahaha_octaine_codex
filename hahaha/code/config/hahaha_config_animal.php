<?php

namespace hahaha\config;

use hahaha\enum\hahaha_enum_animal;
use hahaha\hahaha_instance;

class hahaha_config_animal
{
    use hahaha_instance;

    public $Animal_ = [];

    public $Animal2_ = [];

    public $Animal2_Type_ = null;

    public function Initial($type = '1')
    {
        if (count($this->Animal_) === 0) {
            $this->Animal_ = $this->Initail_Animal();
        }

        if ($this->Animal2_Type_ != $type || count($this->Animal2_) === 0) {
            $this->Animal2_ = $this->Initail_Animal2($type);
            $this->Animal2_Type_ = $type;
        }

        return $this;
    }

    public function Initail_Animal()
    {
        $animal = [
            hahaha_enum_animal::CAT => '貓',
            hahaha_enum_animal::DOG => '狗',
            hahaha_enum_animal::RABBIT => '兔子',
            hahaha_enum_animal::HORSE => '馬',
            hahaha_enum_animal::COW => '牛',
            hahaha_enum_animal::SHEEP => '綿羊',
            hahaha_enum_animal::PIG => '豬',
            hahaha_enum_animal::CHICKEN => '雞',
            hahaha_enum_animal::DUCK => '鴨子',
            hahaha_enum_animal::FISH => '魚',
        ];

        return $animal;
    }

    public function Initail_Animal2($type = '1')
    {
        $animal2 = [];

        if ($type == '1') {
            // 陸上動物
            $animal2 = [
                hahaha_enum_animal::CAT => '貓',
                hahaha_enum_animal::DOG => '狗',
                hahaha_enum_animal::RABBIT => '兔子',
                hahaha_enum_animal::HORSE => '馬',
                hahaha_enum_animal::COW => '牛',
                hahaha_enum_animal::SHEEP => '綿羊',
                hahaha_enum_animal::PIG => '豬',
                hahaha_enum_animal::CHICKEN => '雞',
                hahaha_enum_animal::DUCK => '鴨子',
            ];
        } elseif ($type == '2') {
            // 海上動物
            $animal2 = [
                hahaha_enum_animal::FISH => '魚',
            ];
        }

        return $animal2;
    }
}
