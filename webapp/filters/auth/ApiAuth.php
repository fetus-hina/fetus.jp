<?php
namespace app\filters\auth;

use app\models\Sensor;
use yii\filters\auth\AuthMethod;

class ApiAuth extends AuthMethod
{
    public $realm = 'api';

    public $algos = [
        'sha256',
        'sha512',
        'sha3-256',
        'sha3-512',
    ];

    public function authenticate($user, $request, $response)
    {
        $authHeader = $request->getHeaders()->get('Authorization');
        if ($authHeader === null) {
            return null;
        }
        // Sensor sha3-512 2af5e746-9a81-455d-a0bb-7b578aa3981a 1234567890 b64-nonce b64-hash
        $regex = sprintf('/^%s$/', implode('\s+', [
            'Sensor',
            '(?P<algo>[a-z0-9,-]+)',        // hash algo
            '(?P<key>[0-9a-f-]+)',          // auth key
            '(?P<time>[0-9]+)',             // timestamp
            '(?P<nonce>[a-zA-Z0-9\/+]+=*)', // nonce
            '(?P<hash>[a-zA-Z0-9\/+]+=*)',  // hash
        ]));
        if (!preg_match($regex, trim($authHeader), $match)) {
            return null;
        }
        if (!$this->isValidAlgo($match['algo'])) {
            return null;
        }
        if (\abs((int)$match['time'] - time()) > 120) {
            return null;
        }
        $sensor = Sensor::findOne(['auth_key' => $match['key']]);
        if (!$sensor) {
            return null;
        }
        $calcedHash = $this->calcHash(
            $match['algo'],
            $sensor,
            $match['time'],
            $match['nonce']
        );
        if ($match['hash'] !== $calcedHash) {
            $this->handleFailure($response);
            return null;
        }
        return $sensor;
    }

    public function challenge($response)
    {
        $response->getHeaders()->set('WWW-Authenticate', "Sensor realm=\"{$this->realm}\"");
    }

    protected function isValidAlgo(string $algo) : bool
    {
        $ret = true;
        $ret &= \in_array($algo, \hash_algos(), true);
        $ret &= \in_array($algo, $this->algos, true);
        return $ret;
    }

    protected function calcHash(string $algo, Sensor $sensor, string $time, string $nonce) : string
    {
        return \base64_encode(
            \hash_hmac(
                $algo,
                \implode('&', [
                    $sensor->auth_key,
                    $time,
                    $nonce,
                ]),
                $sensor->auth_secret,
                true
            )
        );
    }
}
