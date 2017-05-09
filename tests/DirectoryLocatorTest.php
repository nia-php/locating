<?php
/*
 * This file is part of the nia framework architecture.
 *
 * (c) Patrick Ullmann <patrick.ullmann@nat-software.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types = 1);
namespace Test\Nia\Locating;

use PHPUnit\Framework\TestCase;
use Nia\Locating\DirectoryLocator;

/**
 * Unit test for \Nia\Locating\DirectoryLocator.
 */
class DirectoryLocatorTest extends TestCase
{

    /**
     * @covers \Nia\Locating\DirectoryLocator::locate
     */
    public function testLocate()
    {
        $locator = new DirectoryLocator(__DIR__);
        $this->assertSame((array) __FILE__, $locator->locate('DirectoryLocatorTest.php'));
        $this->assertSame([], $locator->locate('NotExistingFile'));

        $locator = new DirectoryLocator(realpath(__DIR__ . '/../'));
        $this->assertSame((array) __FILE__, $locator->locate('/tests/DirectoryLocatorTest.php'));
        $this->assertSame([], $locator->locate('NotExistingFile'));
    }
}
