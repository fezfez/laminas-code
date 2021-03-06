<?php

/**
 * @see       https://github.com/laminasframwork/laminas-code for the canonical source repository
 * @copyright https://github.com/laminasframwork/laminas-code/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminasframwork/laminas-code/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Code\Reflection\TestAsset;

class TestSampleClass12
{
    /**
     *
     * @param  int    $one
     * @param  int    $two
     * @return string
     */
    protected function doSomething(&$one, $two)
    {
        return 'mixedValue';
    }
}
