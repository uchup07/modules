<?php

namespace Uchup07\Modules\Tests;

use PHPUnit\Framework\Attributes\Test;
use Module;

class FacadeTest extends BaseTestCase
{
    /** @test */
    #[Test]
    public function it_can_work_with_container()
    {
        $this->assertInstanceOf(\Uchup07\Modules\RepositoryManager::class, $this->app['modules']);
    }

    /** @test */
    #[Test]
    public function it_can_work_with_facade()
    {
        $this->assertSame('Uchup07\Modules\Facades\Module', (new \ReflectionClass(Module::class))->getName());
    }
}