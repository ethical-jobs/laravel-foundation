<?php

namespace EthicalJobs\Foundation\Testing;

use Illuminate\Support\Collection;

/**
 * Mocks the elasticsearch client
 *
 * @author Andrew McLagan <andrew@ethicaljobs.com.au>
 */
trait ExtendsAssertions
{
    /**
     * Determine if two associative arrays are similar
     *
     * Both arrays must have the same indexes with identical values
     * without respect to key ordering
     *
     * @param iterable $expected
     * @param iterable $actual
     * @param null $message
     * @return void
     */
    function assertArrayEquals(iterable $expected, iterable $actual, $message = null)
    {
        if ($expected instanceof Collection) {
            $expected = $expected->toArray();
        }
        if ($actual instanceof Collection) {
            $actual = $actual->toArray();
        }

        ksort($expected);
        ksort($actual);

        $this->assertEquals($expected, $actual, $message);
    }

    /**
     * Determine if two associative arrays are similar
     *
     * Both arrays must have the same indexes with identical values
     * without respect to key ordering
     *
     * @param array $expected
     * @param array $actual
     * @param null $message
     * @return void
     */
    function assertArrayNotEquals(Array $expected, Array $actual, $message = null)
    {
        if ($expected instanceof Collection) {
            $expected = $expected->toArray();
        }
        if ($actual instanceof Collection) {
            $actual = $actual->toArray();
        }

        ksort($expected);
        ksort($actual);

        $this->assertNotEquals($expected, $actual, $message);
    }
}