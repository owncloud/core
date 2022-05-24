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

namespace Google\Service\SQLAdmin\Resource;

use Google\Service\SQLAdmin\Operation;
use Google\Service\SQLAdmin\SslCert;
use Google\Service\SQLAdmin\SslCertsCreateEphemeralRequest;
use Google\Service\SQLAdmin\SslCertsInsertRequest;
use Google\Service\SQLAdmin\SslCertsInsertResponse;
use Google\Service\SQLAdmin\SslCertsListResponse;

/**
 * The "sslCerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google\Service\SQLAdmin(...);
 *   $sslCerts = $sqladminService->sslCerts;
 *  </code>
 */
class SslCerts extends \Google\Service\Resource
{
  /**
   * Generates a short-lived X509 certificate containing the provided public key
   * and signed by a private key specific to the target instance. Users may use
   * the certificate to authenticate as themselves when connecting to the
   * database. (sslCerts.createEphemeral)
   *
   * @param string $project Project ID of the Cloud SQL project.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param SslCertsCreateEphemeralRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SslCert
   */
  public function createEphemeral($project, $instance, SslCertsCreateEphemeralRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createEphemeral', [$params], SslCert::class);
  }
  /**
   * Deletes the SSL certificate. For First Generation instances, the certificate
   * remains valid until the instance is restarted. (sslCerts.delete)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param string $sha1Fingerprint Sha1 FingerPrint.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($project, $instance, $sha1Fingerprint, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'sha1Fingerprint' => $sha1Fingerprint];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieves a particular SSL certificate. Does not include the private key
   * (required for usage). The private key must be saved from the response to
   * initial creation. (sslCerts.get)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param string $sha1Fingerprint Sha1 FingerPrint.
   * @param array $optParams Optional parameters.
   * @return SslCert
   */
  public function get($project, $instance, $sha1Fingerprint, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'sha1Fingerprint' => $sha1Fingerprint];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SslCert::class);
  }
  /**
   * Creates an SSL certificate and returns it along with the private key and
   * server certificate authority. The new certificate will not be usable until
   * the instance is restarted. (sslCerts.insert)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param SslCertsInsertRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SslCertsInsertResponse
   */
  public function insert($project, $instance, SslCertsInsertRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], SslCertsInsertResponse::class);
  }
  /**
   * Lists all of the current SSL certificates for the instance.
   * (sslCerts.listSslCerts)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param array $optParams Optional parameters.
   * @return SslCertsListResponse
   */
  public function listSslCerts($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SslCertsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SslCerts::class, 'Google_Service_SQLAdmin_Resource_SslCerts');
