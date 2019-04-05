<?php

namespace EthicalJobs\Foundation\Exceptions;

use EthicalJobs\Utilities\Arrays;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Handles exceptions & transforms into JSON
 *
 * @author Andrew McLagan <andrew@ethicaljobs.com.au>
 */
class Handler extends \Illuminate\Foundation\Exceptions\Handler
{
    /**
     * Convert a validation exception into a JSON response.
     *
     * @param Request $request
     * @param ValidationException $exception
     * @return JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        $jsonResponse = parent::invalidJson($request, $exception);

        $original = (array)$jsonResponse->getData();

        $jsonResponse->setData(array_merge($original, [
            'statusCode' => $exception->status,
            'errors' => Arrays::expandDotNotationKeys((array)$original['errors']),
        ]));

        return $jsonResponse;
    }
}
