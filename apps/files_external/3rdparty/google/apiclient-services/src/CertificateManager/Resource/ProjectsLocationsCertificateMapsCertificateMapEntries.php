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

use Google\Service\CertificateManager\CertificateMapEntry;
use Google\Service\CertificateManager\ListCertificateMapEntriesResponse;
use Google\Service\CertificateManager\Operation;

/**
 * The "certificateMapEntries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $certificatemanagerService = new Google\Service\CertificateManager(...);
 *   $certificateMapEntries = $certificatemanagerService->certificateMapEntries;
 *  </code>
 */
class ProjectsLocationsCertificateMapsCertificateMapEntries extends \Google\Service\Resource
{
  /**
   * Creates a new CertificateMapEntry in a given project and location.
   * (certificateMapEntries.create)
   *
   * @param string $parent Required. The parent resource of the certificate map
   * entry. Must be in the format `projects/locations/certificateMaps`.
   * @param CertificateMapEntry $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string certificateMapEntryId Required. A user-provided name of the
   * certificate map entry.
   * @return Operation
   */
  public function create($parent, CertificateMapEntry $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single CertificateMapEntry. (certificateMapEntries.delete)
   *
   * @param string $name Required. A name of the certificate map entry to delete.
   * Must be in the format
   * `projects/locations/certificateMaps/certificateMapEntries`.
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
   * Gets details of a single CertificateMapEntry. (certificateMapEntries.get)
   *
   * @param string $name Required. A name of the certificate map entry to
   * describe. Must be in the format
   * `projects/locations/certificateMaps/certificateMapEntries`.
   * @param array $optParams Optional parameters.
   * @return CertificateMapEntry
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CertificateMapEntry::class);
  }
  /**
   * Lists CertificateMapEntries in a given project and location. (certificateMapE
   * ntries.listProjectsLocationsCertificateMapsCertificateMapEntries)
   *
   * @param string $parent Required. The project, location and certificate map
   * from which the certificate map entries should be listed, specified in the
   * format `projects/locations/certificateMaps`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter expression to restrict the returned
   * Certificate Map Entries.
   * @opt_param string orderBy A list of Certificate Map Entry field names used to
   * specify the order of the returned results. The default sorting order is
   * ascending. To specify descending order for a field, add a suffix " desc".
   * @opt_param int pageSize Maximum number of certificate map entries to return.
   * The service may return fewer than this value. If unspecified, at most 50
   * certificate map entries will be returned. The maximum value is 1000; values
   * above 1000 will be coerced to 1000.
   * @opt_param string pageToken The value returned by the last
   * `ListCertificateMapEntriesResponse`. Indicates that this is a continuation of
   * a prior `ListCertificateMapEntries` call, and that the system should return
   * the next page of data.
   * @return ListCertificateMapEntriesResponse
   */
  public function listProjectsLocationsCertificateMapsCertificateMapEntries($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCertificateMapEntriesResponse::class);
  }
  /**
   * Updates a CertificateMapEntry. (certificateMapEntries.patch)
   *
   * @param string $name A user-defined name of the Certificate Map Entry.
   * Certificate Map Entry names must be unique globally and match pattern
   * `projects/locations/certificateMaps/certificateMapEntries`.
   * @param CertificateMapEntry $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask.
   * @return Operation
   */
  public function patch($name, CertificateMapEntry $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCertificateMapsCertificateMapEntries::class, 'Google_Service_CertificateManager_Resource_ProjectsLocationsCertificateMapsCertificateMapEntries');
