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

/**
 * The "certificates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $privatecaService = new Google_Service_CertificateAuthorityService(...);
 *   $certificates = $privatecaService->certificates;
 *  </code>
 */
class Google_Service_CertificateAuthorityService_Resource_ProjectsLocationsCertificateAuthoritiesCertificates extends Google_Service_Resource
{
  /**
   * Create a new Certificate in a given Project, Location from a particular
   * CertificateAuthority. (certificates.create)
   *
   * @param string $parent Required. The resource name of the location and
   * CertificateAuthority associated with the Certificate, in the format
   * `projects/locations/certificateAuthorities`.
   * @param Google_Service_CertificateAuthorityService_Certificate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string certificateId Optional. It must be unique within a location
   * and match the regular expression `[a-zA-Z0-9_-]{1,63}`. This field is
   * required when using a CertificateAuthority in the Enterprise
   * CertificateAuthority.Tier, but is optional and its value is ignored
   * otherwise.
   * @opt_param string requestId Optional. An ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_CertificateAuthorityService_Certificate
   */
  public function create($parent, Google_Service_CertificateAuthorityService_Certificate $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CertificateAuthorityService_Certificate");
  }
  /**
   * Returns a Certificate. (certificates.get)
   *
   * @param string $name Required. The name of the Certificate to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_Certificate
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CertificateAuthorityService_Certificate");
  }
  /**
   * Lists Certificates.
   * (certificates.listProjectsLocationsCertificateAuthoritiesCertificates)
   *
   * @param string $parent Required. The resource name of the location associated
   * with the Certificates, in the format
   * `projects/locations/certificateauthorities`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Only include resources that match the
   * filter in the response. For details on supported filters and syntax, see
   * [Certificates Filtering documentation](https://cloud.google.com/certificate-
   * authority-service/docs/sorting-filtering-certificates#filtering_support).
   * @opt_param string orderBy Optional. Specify how the results should be sorted.
   * For details on supported fields and syntax, see [Certificates Sorting
   * documentation](https://cloud.google.com/certificate-authority-service/docs
   * /sorting-filtering-certificates#sorting_support).
   * @opt_param int pageSize Optional. Limit on the number of Certificates to
   * include in the response. Further Certificates can subsequently be obtained by
   * including the ListCertificatesResponse.next_page_token in a subsequent
   * request. If unspecified, the server will pick an appropriate default.
   * @opt_param string pageToken Optional. Pagination token, returned earlier via
   * ListCertificatesResponse.next_page_token.
   * @return Google_Service_CertificateAuthorityService_ListCertificatesResponse
   */
  public function listProjectsLocationsCertificateAuthoritiesCertificates($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CertificateAuthorityService_ListCertificatesResponse");
  }
  /**
   * Update a Certificate. Currently, the only field you can update is the labels
   * field. (certificates.patch)
   *
   * @param string $name Output only. The resource path for this Certificate in
   * the format `projects/locations/certificateAuthorities/certificates`.
   * @param Google_Service_CertificateAuthorityService_Certificate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. An ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Required. A list of fields to be updated in this
   * request.
   * @return Google_Service_CertificateAuthorityService_Certificate
   */
  public function patch($name, Google_Service_CertificateAuthorityService_Certificate $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CertificateAuthorityService_Certificate");
  }
  /**
   * Revoke a Certificate. (certificates.revoke)
   *
   * @param string $name Required. The resource name for this Certificate in the
   * format `projects/locations/certificateAuthorities/certificates`.
   * @param Google_Service_CertificateAuthorityService_RevokeCertificateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_Certificate
   */
  public function revoke($name, Google_Service_CertificateAuthorityService_RevokeCertificateRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('revoke', array($params), "Google_Service_CertificateAuthorityService_Certificate");
  }
}
