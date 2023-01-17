<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\RahulComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\RahulComponent Test Case
 */
class RahulComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\RahulComponent
     */
    protected $Rahul;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Rahul = new RahulComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Rahul);

        parent::tearDown();
    }
}
