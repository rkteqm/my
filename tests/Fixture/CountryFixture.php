<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CountryFixture
 */
class CountryFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'country';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'country' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2023-01-23 11:58:41',
            ],
        ];
        parent::init();
    }
}
