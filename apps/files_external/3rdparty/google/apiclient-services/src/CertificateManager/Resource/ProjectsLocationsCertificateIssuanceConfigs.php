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

namespace Google\Service\CertificateManager\Resource;

use Google\Service\CertificateManager\CertificateIssuanceConfig;
use Google\Service\CertificateManager\ListCertificateIssuanceConfigsResponse;
use Google\Service\CertificateManager\Operation;

/**
 * The "certificateIssuanceConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $certificatemanagerService = new Google\Service\CertificateManager(...);
 *   $certificateIssuanceConfigs = $certificatemanagerService->certificateIssuanceConfigs;
 *  </code>
 */
class ProjectsLocationsCertificateIssuanceConfigs extends \Google\Service\Resource
{
  /**
   * Creates a new CertificateIssuanceConfig in a given project and location.
   * (certificateIssuanceConfigs.create)
   *
   * @param string $parent Required. The parent resource of the certificate
   * issuance config. Must be in the format `projects/locations`.
   * @param CertificateIssuanceConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string certificateIssuanceConfigId Required. A user-provided name
   * of the certificate config.
   * @return Operation
   */
  public function create($parent, CertificateIssuanceConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single CertificateIssuanceConfig.
   * (certificateIssuanceConfigs.delete)
   *
   * @param string $name Required. A name of the certificate issuance config to
   * delete. Must be in the format
   * `projects/locations/certificateIssuanceConfigs`.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single CertificateIssuanceConfig.
   * (certificateIssuanceConfigs.get)
   *
   * @param string $name Required. A name of the certificate issuance config to
   * describe. Must be in the format
   * `projects/locations/certificateIssuanceConfigs`.
   * @param array $optParams Optional parameters.
   * @return CertificateIssuanceConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CertificateIssuanceConfig::class);
  }
  /**
   * Lists CertificateIssuanceConfigs in a given project and location.
   * (certificateIssuanceConfigs.listProjectsLocationsCertificateIssuanceConfigs)
   *
   * @param string $parent Required. The project and location from which the
   * certificate should be listed, specified in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter expression to restrict the Certificates
   * Configs returned.
   * @opt_param string orderBy A list of Certificate Config field names used to
   * specify the order of the returned results. The default sorting order is
   * ascending. To specify descending order for a field, add a suffix " desc".
   * @opt_param int pageSize Maximum number of certificate configs to return per
   * call.
   * @opt_param string pageToken The value returned by the last
   * `ListCertificateIssuanceConfigsResponse`. Indicates that this is a
   * continuation of a prior `ListCertificateIssuanceConfigs` call, and that the
   * system should return the next page of data.
   * @return ListCertificateIssuanceConfigsResponse
   */
  public function listProjectsLocationsCertificateIssuanceConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCertificateIssuanceConfigsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCertificateIssuanceConfigs::class, 'Google_Service_CertificateManager_Resource_ProjectsLocationsCertificateIssuanceConfigs');
