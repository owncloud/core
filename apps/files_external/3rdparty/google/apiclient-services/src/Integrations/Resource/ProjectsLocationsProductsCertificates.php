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

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaCertificate;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaListCertificatesResponse;
use Google\Service\Integrations\GoogleProtobufEmpty;

/**
 * The "certificates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $certificates = $integrationsService->certificates;
 *  </code>
 */
class ProjectsLocationsProductsCertificates extends \Google\Service\Resource
{
  /**
   * Creates a new certificate. The certificate will be registered to the trawler
   * service and will be encrypted using cloud KMS and stored in Spanner Returns
   * the certificate. (certificates.create)
   *
   * @param string $parent Required. "projects/{project}/locations/{location}"
   * format.
   * @param GoogleCloudIntegrationsV1alphaCertificate $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaCertificate
   */
  public function create($parent, GoogleCloudIntegrationsV1alphaCertificate $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudIntegrationsV1alphaCertificate::class);
  }
  /**
   * Delete a certificate (certificates.delete)
   *
   * @param string $name Required. The name that is associated with the
   * Certificate.
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
   * Get a certificates in the specified project. (certificates.get)
   *
   * @param string $name Required. The certificate to retrieve. Format:
   * projects/{project}/locations/{location}/certificates/{certificate}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaCertificate
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudIntegrationsV1alphaCertificate::class);
  }
  /**
   * List all the certificates that match the filter. Restrict to certificate of
   * current client only. (certificates.listProjectsLocationsProductsCertificates)
   *
   * @param string $parent Required. The client, which owns this collection of
   * Certificates.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filtering as supported in
   * https://developers.google.com/authorized-buyers/apis/guides/v2/list-filters.
   * @opt_param int pageSize The size of entries in the response. If unspecified,
   * defaults to 100.
   * @opt_param string pageToken The token returned in the previous response.
   * @opt_param string readMask The mask which specifies fields that need to be
   * returned in the Certificate's response.
   * @return GoogleCloudIntegrationsV1alphaListCertificatesResponse
   */
  public function listProjectsLocationsProductsCertificates($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudIntegrationsV1alphaListCertificatesResponse::class);
  }
  /**
   * Updates the certificate by id. If new certificate file is updated, it will
   * register with the trawler service, re-encrypt with cloud KMS and update the
   * Spanner record. Other fields will directly update the Spanner record. Returns
   * the Certificate. (certificates.patch)
   *
   * @param string $name Output only. Auto generated primary key
   * @param GoogleCloudIntegrationsV1alphaCertificate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask specifying the fields in the above
   * Certificate that have been modified and need to be updated.
   * @return GoogleCloudIntegrationsV1alphaCertificate
   */
  public function patch($name, GoogleCloudIntegrationsV1alphaCertificate $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudIntegrationsV1alphaCertificate::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProductsCertificates::class, 'Google_Service_Integrations_Resource_ProjectsLocationsProductsCertificates');
