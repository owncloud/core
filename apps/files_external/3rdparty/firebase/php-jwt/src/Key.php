<?php

namespace Firebase\JWT;

use OpenSSLAsymmetricKey;
use OpenSSLCertificate;
use TypeError;
<<<<<<< HEAD
=======
use InvalidArgumentException;
>>>>>>> Upgrading firebase/php-jwt (v5.5.1 => v6.1.2)

class Key
{
    /** @var string|resource|OpenSSLAsymmetricKey|OpenSSLCertificate */
    private $keyMaterial;
    /** @var string */
    private $algorithm;

    /**
     * @param string|resource|OpenSSLAsymmetricKey|OpenSSLCertificate $keyMaterial
     * @param string $algorithm
     */
    public function __construct(
        $keyMaterial,
        string $algorithm
    ) {
        if (
<<<<<<< HEAD
            !\is_string($keyMaterial)
            && !$keyMaterial instanceof OpenSSLAsymmetricKey
            && !$keyMaterial instanceof OpenSSLCertificate
            && !\is_resource($keyMaterial)
=======
            !is_string($keyMaterial)
            && !$keyMaterial instanceof OpenSSLAsymmetricKey
            && !$keyMaterial instanceof OpenSSLCertificate
            && !is_resource($keyMaterial)
>>>>>>> Upgrading firebase/php-jwt (v5.5.1 => v6.1.2)
        ) {
            throw new TypeError('Key material must be a string, resource, or OpenSSLAsymmetricKey');
        }

        if (empty($keyMaterial)) {
            throw new InvalidArgumentException('Key material must not be empty');
        }

        if (empty($algorithm)) {
            throw new InvalidArgumentException('Algorithm must not be empty');
        }

        // TODO: Remove in PHP 8.0 in favor of class constructor property promotion
        $this->keyMaterial = $keyMaterial;
        $this->algorithm = $algorithm;
    }

    /**
     * Return the algorithm valid for this key
     *
     * @return string
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * @return string|resource|OpenSSLAsymmetricKey|OpenSSLCertificate
     */
    public function getKeyMaterial()
    {
        return $this->keyMaterial;
    }
}
