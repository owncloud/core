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

use Google\Service\CertificateManager\Certificate;
use Google\Service\CertificateManager\ListCertificatesResponse;
use Google\Service\CertificateManager\Operation;

/**
 * The "certificates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $certificatemanagerService = new Google\Service\CertificateManager(...);
 *   $certificates = $certificatemanagerService->certificates;
 *  </code>
 */
class ProjectsLocationsCertificates extends \Google\Service\Resource
{
  /**
   * Creates a new Certificate in a given project and location.
   * (certificates.create)
   *
   * @param string $parent Required. The parent resource of the certificate. Must
   * be in the format `projects/locations`.
   * @param Certificate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string certificateId Required. A user-provided name of the
   * certificate.
   * @return Operation
   */
  public function create($parent, Certificate $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single Certificate. (certificates.delete)
   *
   * @param string $name Required. A name of the certificate to delete. Must be in
   * the format `projects/locations/certificates`.
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
   * Gets details of a single Certificate. (certificates.get)
   *
   * @param string $name Required. A name of the certificate to describe. Must be
   * in the format `projects/locations/certificates`.
   * @param array $optParams Optional parameters.
   * @return Certificate
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Certificate::class);
  }
  /**
   * Lists Certificates in a given project and location.
   * (certificates.listProjectsLocationsCertificates)
   *
   * @param string $parent Required. The project and location from which the
   * certificate should be listed, specified in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter expression to restrict the Certificates
   * returned.
   * @opt_param string orderBy A list of Certificate field names used to specify
   * the order of the returned results. The default sorting order is ascending. To
   * specify descending order for a field, add a suffix " desc".
   * @opt_param int pageSize Maximum number of certificates to return per call.
   * @opt_param string pageToken The value returned by the last
   * `ListCertificatesResponse`. Indicates that this is a continuation of a prior
   * `ListCertificates` call, and that the system should return the next page of
   * data.
   * @return ListCertificatesResponse
   */
  public function listProjectsLocationsCertificates($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCertificatesResponse::class);
  }
  /**
   * Updates a Certificate. (certificates.patch)
   *
   * @param string $name A user-defined name of the certificate. Certificate names
   * must be unique globally and match pattern `projects/locations/certificates`.
   * @param Certificate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask.
   * @return Operation
   */
  public function patch($name, Certificate $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCertificates::class, 'Google_Service_CertificateManager_Resource_ProjectsLocationsCertificates');
