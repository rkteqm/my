<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\MyComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\MyComponent Test Case
 */
class MyComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\MyComponent
     */
    protected $MyComponent;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->MyComponent = new MyComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MyComponent);

        parent::tearDown();
    }
}
