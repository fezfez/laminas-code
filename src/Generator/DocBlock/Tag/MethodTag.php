<?php

/**
 * @see       https://github.com/laminasframwork/laminas-code for the canonical source repository
 * @copyright https://github.com/laminasframwork/laminas-code/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminasframwork/laminas-code/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\Code\Generator\DocBlock\Tag;

use function rtrim;

class MethodTag extends AbstractTypeableTag implements TagInterface
{
    /**
     * @var string
     */
    protected $methodName;

    /**
     * @var bool
     */
    protected $isStatic = false;

    /**
     * @param string $methodName
     * @param array $types
     * @param string $description
     * @param bool $isStatic
     */
    public function __construct($methodName = null, $types = [], $description = null, $isStatic = false)
    {
        if (! empty($methodName)) {
            $this->setMethodName($methodName);
        }

        $this->setIsStatic((bool) $isStatic);

        parent::__construct($types, $description);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'method';
    }

    /**
     * @param bool $isStatic
     * @return MethodTag
     */
    public function setIsStatic($isStatic)
    {
        $this->isStatic = $isStatic;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStatic()
    {
        return $this->isStatic;
    }

    /**
     * @param string $methodName
     * @return MethodTag
     */
    public function setMethodName($methodName)
    {
        $this->methodName = rtrim($methodName, ')(');
        return $this;
    }

    /**
     * @return string
     */
    public function getMethodName()
    {
        return $this->methodName;
    }

    /**
     * @return string
     */
    public function generate()
    {
        $output = '@method'
            . ($this->isStatic ? ' static' : '')
            . (! empty($this->types) ? ' ' . $this->getTypesAsString() : '')
            . (! empty($this->methodName) ? ' ' . $this->methodName . '()' : '')
            . (! empty($this->description) ? ' ' . $this->description : '');

        return $output;
    }
}
