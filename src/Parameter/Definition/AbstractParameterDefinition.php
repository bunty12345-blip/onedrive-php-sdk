<?php

/**
 * This file is part of Krizalys' OneDrive SDK for PHP.
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @author    Christophe Vidal
 * @copyright 2008-2019 Christophe Vidal (http://www.krizalys.com)
 * @license   https://opensource.org/licenses/BSD-3-Clause 3-Clause BSD License
 * @link      https://github.com/krizalys/onedrive-php-sdk
 */

namespace Krizalys\Onedrive\Parameter\Definition;

use Krizalys\Onedrive\Serializer\SerializerInterface;

/**
 * An abstract implementation for a parameter definition.
 *
 * @since 2.3.0
 */
abstract class AbstractParameterDefinition implements ParameterDefinitionInterface
{
    /**
     * @var string
     *      The name.
     */
    protected $name;

    /**
     * @var SerializerInterface
     *      The serializer.
     */
    private $serializer;

    /**
     * Constructor.
     *
     * @param string $name
     *        The name.
     * @param SerializerInterface $serializer
     *        The serializer.
     *
     * @since 2.3.0
     */
    public function __construct($name, SerializerInterface $serializer)
    {
        $this->name       = $name;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     *         The serialized key.
     *
     * @since 2.3.0
     */
    abstract public function serializeKey();

    /**
     * {@inheritDoc}
     *
     * @param mixed $value
     *        The value to serialize.
     *
     * @return string
     *         The serialized value.
     *
     * @since 2.3.0
     */
    public function serializeValue($value)
    {
        return $this->serializer->serialize($value);
    }
}
