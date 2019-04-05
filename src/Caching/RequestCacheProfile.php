<?php

namespace EthicalJobs\Foundation\Caching;

use Illuminate\Http\Request;
use Spatie\ResponseCache\CacheProfiles\CacheAllSuccessfulGetRequests;

/**
 * Caches requests when there is no JWT token present
 *
 * @author Andrew McLagan
 */
class RequestCacheProfile extends CacheAllSuccessfulGetRequests
{
    /**
     * Should request be cached.
     *
     * @param Request $request
     * @return boolean
     */
    public function shouldCacheRequest(Request $request): bool
    {
        if ($request->bearerToken()) {
            return false;
        }

        return parent::shouldCacheRequest($request);
    }
}
