<?php

namespace EthicalJobs\Foundation\Testing;

use Laravel\Passport\ClientRepository;
use Laravel\Passport\PersonalAccessClient;

/**
 * Authentication testing trait
 *
 * @author Andrew McLagan <andrew@ethicaljobs.com.au>
 */
trait InteractsWithAuthentication
{
    /**
     * Creates a password grant client
     *
     * @return PersonalAccessClient
     */
    public function createPasswordGrantClient()
    {
        $clients = app()->make(ClientRepository::class);
        $client = $clients->createPersonalAccessClient(null, 'test-client', 'http://localhost');

        $accessClient = new PersonalAccessClient();
        $accessClient->client_id = $client->id;
        $accessClient->save();

        return $accessClient;
    }
}