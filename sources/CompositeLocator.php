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
 * Composite locator implementation.
 */
class CompositeLocator implements CompositeLocatorInterface
{

    /**
     * List of all assigned locators.
     *
     * @var LocatorInterface
     */
    private $locators = [];

    /**
     * Constructor.
     *
     * @param LocatorInterface[] $locators
     *            List of locators to assign.
     */
    public function __construct(array $locators)
    {
        foreach ($locators as $locator) {
            $this->addLocator($locator);
        }
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Nia\Locating\LocatorInterface::locate()
     */
    public function locate(string $name): array
    {
        $result = [];

        foreach ($this->locators as $locator) {
            $result = array_merge($result, $locator->locate($name));
        }

        return array_unique($result);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Nia\Locating\CompositeLocatorInterface::addLocator()
     */
    public function addLocator(LocatorInterface $locator): CompositeLocatorInterface
    {
        $this->locators[] = $locator;

        return $this;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Nia\Locating\CompositeLocatorInterface::getLocators()
     */
    public function getLocators(): array
    {
        return $this->locators;
    }
}
