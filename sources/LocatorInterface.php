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
namespace Nia\Locating;

/**
 * Interface for locator implementations.
 * Locators are used to locate a resource by name over several places.
 */
interface LocatorInterface
{

    /**
     * Locates a resource by name and returns all found occurrences as a list.
     *
     * @param string $name
     *            Name of the resource to locate.
     * @return string[] All found occurrences as a list.
     */
    public function locate(string $name): array;
}
