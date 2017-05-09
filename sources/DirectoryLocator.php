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
 * Locator using a directory to search for resources.
 */
class DirectoryLocator implements LocatorInterface
{

    /**
     * The directory which contains resources.
     *
     * @var string
     */
    private $directory = null;

    /**
     * Constructor.
     *
     * @param string $directory
     *            The directory which contains resources.
     */
    public function __construct(string $directory)
    {
        $this->directory = rtrim($directory, '/');
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

        $path = $this->directory . '/' . ltrim($name, '/');

        if (is_file($path)) {
            $result[] = $path;
        }

        return $result;
    }
}
