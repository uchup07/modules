<?php

namespace Uchup07\Modules\Tests\Commands\Commands;

use Uchup07\Modules\Tests\BaseTestCase;

class CommandModuleEnableTest extends BaseTestCase
{
    protected $finder;

    public function setUp(): void
    {
        parent::setUp();

        $this->finder = $this->app['files'];

        $this->artisan('make:module', ['slug' => 'enable', '--quick' => 'quick']);
    }

    /** @test */
    public function it_can_enable_an_disabled_module()
    {
        $this->artisan('module:disable', ['slug' => 'enable']);

        $cached = \Module::where('slug', 'enable');

        $this->assertFalse($cached->toArray()['enabled']);

        $this->artisan('module:enable', ['slug' => 'enable']);

        $cached = \Module::where('slug', 'enable');

        $this->assertTrue($cached->toArray()['enabled']);
    }

    /** @test */
    public function it_can_disable_a_enabled_module()
    {
        $this->artisan('module:enable', ['slug' => 'enable']);

        $cached = \Module::where('slug', 'enable');

        $this->assertTrue($cached->toArray()['enabled']);

        $this->artisan('module:disable', ['slug' => 'enable']);

        $cached = \Module::where('slug', 'enable');

        $this->assertFalse($cached->toArray()['enabled']);
    }

    public function tearDown(): void
    {
        $this->finder->deleteDirectory(module_path('enable'));

        parent::tearDown();
    }
}