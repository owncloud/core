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

use Google\Service\CertificateManager\CertificateMap;
use Google\Service\CertificateManager\ListCertificateMapsResponse;
use Google\Service\CertificateManager\Operation;

/**
 * The "certificateMaps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $certificatemanagerService = new Google\Service\CertificateManager(...);
 *   $certificateMaps = $certificatemanagerService->certificateMaps;
 *  </code>
 */
class ProjectsLocationsCertificateMaps extends \Google\Service\Resource
{
  /**
   * Creates a new CertificateMap in a given project and location.
   * (certificateMaps.create)
   *
   * @param string $parent Required. The parent resource of the certificate map.
   * Must be in the format `projects/locations`.
   * @param CertificateMap $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string certificateMapId Required. A user-provided name of the
   * certificate map.
   * @return Operation
   */
  public function create($parent, CertificateMap $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single CertificateMap. A Certificate Map can't be deleted if it
   * contains Certificate Map Entries. Remove all the entries from the map before
   * calling this method. (certificateMaps.delete)
   *
   * @param string $name Required. A name of the certificate map to delete. Must
   * be in the format `projects/locations/certificateMaps`.
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
   * Gets details of a single CertificateMap. (certificateMaps.get)
   *
   * @param string $name Required. A name of the certificate map to describe. Must
   * be in the format `projects/locations/certificateMaps`.
   * @param array $optParams Optional parameters.
   * @return CertificateMap
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CertificateMap::class);
  }
  /**
   * Lists CertificateMaps in a given project and location.
   * (certificateMaps.listProjectsLocationsCertificateMaps)
   *
   * @param string $parent Required. The project and location from which the
   * certificate maps should be listed, specified in the format
   * `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter expression to restrict the Certificates Maps
   * returned.
   * @opt_param string orderBy A list of Certificate Map field names used to
   * specify the order of the returned results. The default sorting order is
   * ascending. To specify descending order for a field, add a suffix " desc".
   * @opt_param int pageSize Maximum number of certificate maps to return per
   * call.
   * @opt_param string pageToken The value returned by the last
   * `ListCertificateMapsResponse`. Indicates that this is a continuation of a
   * prior `ListCertificateMaps` call, and that the system should return the next
   * page of data.
   * @return ListCertificateMapsResponse
   */
  public function listProjectsLocationsCertificateMaps($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCertificateMapsResponse::class);
  }
  /**
   * Updates a CertificateMap. (certificateMaps.patch)
   *
   * @param string $name A user-defined name of the Certificate Map. Certificate
   * Map names must be unique globally and match pattern
   * `projects/locations/certificateMaps`.
   * @param CertificateMap $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask.
   * @return Operation
   */
  public function patch($name, CertificateMap $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCertificateMaps::class, 'Google_Service_CertificateManager_Resource_ProjectsLocationsCertificateMaps');
