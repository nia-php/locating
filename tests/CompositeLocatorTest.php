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
use Nia\Locating\CompositeLocator;
use Nia\Locating\DirectoryLocator;

/**
 * Unit test for \Nia\Locating\CompositeLocator.
 */
class CompositeLocatorTest extends TestCase
{

    /**
     * @covers \Nia\Locating\DirectoryLocator::locate
     */
    public function testLocate()
    {
        $directoryLocator1 = new DirectoryLocator(__DIR__);
        $directoryLocator2 = new DirectoryLocator(realpath(__DIR__ . '/../'));
        $locator = new CompositeLocator([
            $directoryLocator1
        ]);

        $this->assertSame((array) __FILE__, $locator->locate('CompositeLocatorTest.php'));
        $this->assertSame([], $locator->locate('NotExistingFile'));

        $this->assertSame($locator, $locator->addLocator($directoryLocator2));
        $this->assertSame((array) __FILE__, $locator->locate('/tests/CompositeLocatorTest.php'));
        $this->assertSame([], $locator->locate('NotExistingFile'));

        $this->assertSame([
            $directoryLocator1,
            $directoryLocator2
        ], $locator->getLocators());

        $locator = new CompositeLocator([
            new DirectoryLocator('/path/to/common/directory'),
            new DirectoryLocator('/path/to/another/directory'),
            new DirectoryLocator('/path/to/customer/directory/')
        ]);

        $locations = $locator->locate('/images/logos/summer.png');
        // array(2) {
        //    [0]=>
        //    string(..) "/path/to/common/directory/images/logos/summer.png"
        //    [1]=>
        //    string(..) "/path/to/customer/directory/images/logos/summer.png"
        // }
    }
}
