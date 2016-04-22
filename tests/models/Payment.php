<?php

namespace tests\models;

class Payment extends \yii\base\Model
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 20;

    public static $statuses = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    public $created_at;
    public $amount;
    public $address;
    public $status_id;
    public $description;
}
