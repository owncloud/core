<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Integrations\Resource;

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaAuthConfig;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaListAuthConfigsResponse;
use Google\Service\Integrations\GoogleProtobufEmpty;

/**
 * The "authConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $authConfigs = $integrationsService->authConfigs;
 *  </code>
 */
class ProjectsLocationsProductsAuthConfigs extends \Google\Service\Resource
{
  /**
   * Creates an auth config record. Fetch corresponding credentials for specific
   * auth types, e.g. access token for OAuth 2.0, JWT token for JWT. Encrypt the
   * auth config with Cloud KMS and store the encrypted credentials in Spanner.
   * Returns the encrypted auth config. (authConfigs.create)
   *
   * @param string $parent Required. "projects/{project}/locations/{location}"
   * format.
   * @param GoogleCloudIntegrationsV1alphaAuthConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientCertificate.encryptedPrivateKey The ssl certificate
   * encoded in PEM format. This string must include the begin header and end
   * footer lines. For example, -----BEGIN CERTIFICATE-----
   * MIICTTCCAbagAwIBAgIJAPT0tSKNxan/MA0GCSqGSIb3DQEBCwUAMCoxFzAVBgNV
   * BAoTDkdvb2dsZSBURVNUSU5HMQ8wDQYDVQQDEwZ0ZXN0Q0EwHhcNMTUwMTAxMDAw
   * MDAwWhcNMjUwMTAxMDAwMDAwWjAuMRcwFQYDVQQKEw5Hb29nbGUgVEVTVElORzET
   * MBEGA1UEAwwKam9lQGJhbmFuYTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEA
   * vDYFgMgxi5W488d9J7UpCInl0NXmZQpJDEHE4hvkaRlH7pnC71H0DLt0/3zATRP1
   * JzY2+eqBmbGl4/sgZKYv8UrLnNyQNUTsNx1iZAfPUflf5FwgVsai8BM0pUciq1NB
   * xD429VFcrGZNucvFLh72RuRFIKH8WUpiK/iZNFkWhZ0CAwEAAaN3MHUwDgYDVR0P
   * AQH/BAQDAgWgMB0GA1UdJQQWMBQGCCsGAQUFBwMBBggrBgEFBQcDAjAMBgNVHRMB
   * Af8EAjAAMBkGA1UdDgQSBBCVgnFBCWgL/iwCqnGrhTPQMBsGA1UdIwQUMBKAEKey
   * Um2o4k2WiEVA0ldQvNYwDQYJKoZIhvcNAQELBQADgYEAYK986R4E3L1v+Q6esBtW
   * JrUwA9UmJRSQr0N5w3o9XzarU37/bkjOP0Fw0k/A6Vv1n3vlciYfBFaBIam1qRHr
   * 5dMsYf4CZS6w50r7hyzqyrwDoyNxkLnd2PdcHT/sym1QmflsjEs7pejtnohO6N2H
   * wQW6M0H7Zt8claGRla4fKkg= -----END CERTIFICATE-----
   * @opt_param string clientCertificate.passphrase 'passphrase' should be left
   * unset if private key is not encrypted. Note that 'passphrase' is not the
   * password for web server, but an extra layer of security to protected private
   * key.
   * @opt_param string clientCertificate.sslCertificate The ssl certificate
   * encoded in PEM format. This string must include the begin header and end
   * footer lines. For example, -----BEGIN CERTIFICATE-----
   * MIICTTCCAbagAwIBAgIJAPT0tSKNxan/MA0GCSqGSIb3DQEBCwUAMCoxFzAVBgNV
   * BAoTDkdvb2dsZSBURVNUSU5HMQ8wDQYDVQQDEwZ0ZXN0Q0EwHhcNMTUwMTAxMDAw
   * MDAwWhcNMjUwMTAxMDAwMDAwWjAuMRcwFQYDVQQKEw5Hb29nbGUgVEVTVElORzET
   * MBEGA1UEAwwKam9lQGJhbmFuYTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEA
   * vDYFgMgxi5W488d9J7UpCInl0NXmZQpJDEHE4hvkaRlH7pnC71H0DLt0/3zATRP1
   * JzY2+eqBmbGl4/sgZKYv8UrLnNyQNUTsNx1iZAfPUflf5FwgVsai8BM0pUciq1NB
   * xD429VFcrGZNucvFLh72RuRFIKH8WUpiK/iZNFkWhZ0CAwEAAaN3MHUwDgYDVR0P
   * AQH/BAQDAgWgMB0GA1UdJQQWMBQGCCsGAQUFBwMBBggrBgEFBQcDAjAMBgNVHRMB
   * Af8EAjAAMBkGA1UdDgQSBBCVgnFBCWgL/iwCqnGrhTPQMBsGA1UdIwQUMBKAEKey
   * Um2o4k2WiEVA0ldQvNYwDQYJKoZIhvcNAQELBQADgYEAYK986R4E3L1v+Q6esBtW
   * JrUwA9UmJRSQr0N5w3o9XzarU37/bkjOP0Fw0k/A6Vv1n3vlciYfBFaBIam1qRHr
   * 5dMsYf4CZS6w50r7hyzqyrwDoyNxkLnd2PdcHT/sym1QmflsjEs7pejtnohO6N2H
   * wQW6M0H7Zt8claGRla4fKkg= -----END CERTIFICATE-----
   * @return GoogleCloudIntegrationsV1alphaAuthConfig
   */
  public function create($parent, GoogleCloudIntegrationsV1alphaAuthConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudIntegrationsV1alphaAuthConfig::class);
  }
  /**
   * Deletes an auth config. (authConfigs.delete)
   *
   * @param string $name Required. The name that is associated with the
   * AuthConfig.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a complete auth config. If the auth config doesn't exist, Code.NOT_FOUND
   * exception will be thrown. Returns the decrypted auth config.
   * (authConfigs.get)
   *
   * @param string $name Required. The name that is associated with the
   * AuthConfig.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaAuthConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudIntegrationsV1alphaAuthConfig::class);
  }
  /**
   * Lists all auth configs that match the filter. Restrict to auth configs belong
   * to the current client only.
   * (authConfigs.listProjectsLocationsProductsAuthConfigs)
   *
   * @param string $parent Required. The client, which owns this collection of
   * AuthConfigs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filtering as supported in
   * https://developers.google.com/authorized-buyers/apis/guides/v2/list-filters.
   * @opt_param int pageSize The size of entries in the response. If unspecified,
   * defaults to 100.
   * @opt_param string pageToken The token returned in the previous response.
   * @opt_param string readMask The mask which specifies fields that need to be
   * returned in the AuthConfig's response.
   * @return GoogleCloudIntegrationsV1alphaListAuthConfigsResponse
   */
  public function listProjectsLocationsProductsAuthConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudIntegrationsV1alphaListAuthConfigsResponse::class);
  }
  /**
   * Updates an auth config. If credential is updated, fetch the encrypted auth
   * config from Spanner, decrypt with Cloud KMS key, update the credential
   * fields, re-encrypt with Cloud KMS key and update the Spanner record. For
   * other fields, directly update the Spanner record. Returns the encrypted auth
   * config. (authConfigs.patch)
   *
   * @param string $name Resource name of the SFDC instance
   * projects/{project}/locations/{location}/authConfigs/{authConfig}.
   * @param GoogleCloudIntegrationsV1alphaAuthConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientCertificate.encryptedPrivateKey The ssl certificate
   * encoded in PEM format. This string must include the begin header and end
   * footer lines. For example, -----BEGIN CERTIFICATE-----
   * MIICTTCCAbagAwIBAgIJAPT0tSKNxan/MA0GCSqGSIb3DQEBCwUAMCoxFzAVBgNV
   * BAoTDkdvb2dsZSBURVNUSU5HMQ8wDQYDVQQDEwZ0ZXN0Q0EwHhcNMTUwMTAxMDAw
   * MDAwWhcNMjUwMTAxMDAwMDAwWjAuMRcwFQYDVQQKEw5Hb29nbGUgVEVTVElORzET
   * MBEGA1UEAwwKam9lQGJhbmFuYTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEA
   * vDYFgMgxi5W488d9J7UpCInl0NXmZQpJDEHE4hvkaRlH7pnC71H0DLt0/3zATRP1
   * JzY2+eqBmbGl4/sgZKYv8UrLnNyQNUTsNx1iZAfPUflf5FwgVsai8BM0pUciq1NB
   * xD429VFcrGZNucvFLh72RuRFIKH8WUpiK/iZNFkWhZ0CAwEAAaN3MHUwDgYDVR0P
   * AQH/BAQDAgWgMB0GA1UdJQQWMBQGCCsGAQUFBwMBBggrBgEFBQcDAjAMBgNVHRMB
   * Af8EAjAAMBkGA1UdDgQSBBCVgnFBCWgL/iwCqnGrhTPQMBsGA1UdIwQUMBKAEKey
   * Um2o4k2WiEVA0ldQvNYwDQYJKoZIhvcNAQELBQADgYEAYK986R4E3L1v+Q6esBtW
   * JrUwA9UmJRSQr0N5w3o9XzarU37/bkjOP0Fw0k/A6Vv1n3vlciYfBFaBIam1qRHr
   * 5dMsYf4CZS6w50r7hyzqyrwDoyNxkLnd2PdcHT/sym1QmflsjEs7pejtnohO6N2H
   * wQW6M0H7Zt8claGRla4fKkg= -----END CERTIFICATE-----
   * @opt_param string clientCertificate.passphrase 'passphrase' should be left
   * unset if private key is not encrypted. Note that 'passphrase' is not the
   * password for web server, but an extra layer of security to protected private
   * key.
   * @opt_param string clientCertificate.sslCertificate The ssl certificate
   * encoded in PEM format. This string must include the begin header and end
   * footer lines. For example, -----BEGIN CERTIFICATE-----
   * MIICTTCCAbagAwIBAgIJAPT0tSKNxan/MA0GCSqGSIb3DQEBCwUAMCoxFzAVBgNV
   * BAoTDkdvb2dsZSBURVNUSU5HMQ8wDQYDVQQDEwZ0ZXN0Q0EwHhcNMTUwMTAxMDAw
   * MDAwWhcNMjUwMTAxMDAwMDAwWjAuMRcwFQYDVQQKEw5Hb29nbGUgVEVTVElORzET
   * MBEGA1UEAwwKam9lQGJhbmFuYTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEA
   * vDYFgMgxi5W488d9J7UpCInl0NXmZQpJDEHE4hvkaRlH7pnC71H0DLt0/3zATRP1
   * JzY2+eqBmbGl4/sgZKYv8UrLnNyQNUTsNx1iZAfPUflf5FwgVsai8BM0pUciq1NB
   * xD429VFcrGZNucvFLh72RuRFIKH8WUpiK/iZNFkWhZ0CAwEAAaN3MHUwDgYDVR0P
   * AQH/BAQDAgWgMB0GA1UdJQQWMBQGCCsGAQUFBwMBBggrBgEFBQcDAjAMBgNVHRMB
   * Af8EAjAAMBkGA1UdDgQSBBCVgnFBCWgL/iwCqnGrhTPQMBsGA1UdIwQUMBKAEKey
   * Um2o4k2WiEVA0ldQvNYwDQYJKoZIhvcNAQELBQADgYEAYK986R4E3L1v+Q6esBtW
   * JrUwA9UmJRSQr0N5w3o9XzarU37/bkjOP0Fw0k/A6Vv1n3vlciYfBFaBIam1qRHr
   * 5dMsYf4CZS6w50r7hyzqyrwDoyNxkLnd2PdcHT/sym1QmflsjEs7pejtnohO6N2H
   * wQW6M0H7Zt8claGRla4fKkg= -----END CERTIFICATE-----
   * @opt_param string updateMask Field mask specifying the fields in the above
   * AuthConfig that have been modified and need to be updated.
   * @return GoogleCloudIntegrationsV1alphaAuthConfig
   */
  public function patch($name, GoogleCloudIntegrationsV1alphaAuthConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudIntegrationsV1alphaAuthConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProductsAuthConfigs::class, 'Google_Service_Integrations_Resource_ProjectsLocationsProductsAuthConfigs');
