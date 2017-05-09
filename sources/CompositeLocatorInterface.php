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
 * Interface for composite locator implementations.
 * Composite locators are used to combine multiple locators and use them as a single locator.
 */
interface CompositeLocatorInterface extends LocatorInterface
{

    /**
     * Adds a locator.
     *
     * @param LocatorInterface $locator
     *            The locator to add.
     * @return CompositeLocatorInterface Reference to this instance.
     */
    public function addLocator(LocatorInterface $locator): CompositeLocatorInterface;

    /**
     * Returns a list of all assigned locators.
     *
     * @return LocatorInterface[] List of all assigned locators.
     */
    public function getLocators(): array;
}
