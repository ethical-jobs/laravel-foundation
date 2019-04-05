<?php

namespace EthicalJobs\Foundation\Testing;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Test Factory interface
 *
 * @author Andrew McLagan <andrew@ethicaljobs.com.au>
 */

interface TestFactoryInterface
{
    /**
     * Creates a model
     *
     * @param array $attributes
     * @return Collection|Model
     */
    public function create($attributes = []);

    /**
     * How many models to create
     *
     * @param Integer $numberOfModels
     * @return self
     */
    public function times($numberOfModels);
}
