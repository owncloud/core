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
 * The "certificateAuthorities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $privatecaService = new Google_Service_CertificateAuthorityService(...);
 *   $certificateAuthorities = $privatecaService->certificateAuthorities;
 *  </code>
 */
class Google_Service_CertificateAuthorityService_Resource_ProjectsLocationsCaPoolsCertificateAuthorities extends Google_Service_Resource
{
  /**
   * Activate a CertificateAuthority that is in state AWAITING_USER_ACTIVATION and
   * is of type SUBORDINATE. After the parent Certificate Authority signs a
   * certificate signing request from FetchCertificateAuthorityCsr, this method
   * can complete the activation process. (certificateAuthorities.activate)
   *
   * @param string $name Required. The resource name for this CertificateAuthority
   * in the format `projects/locations/caPools/certificateAuthorities`.
   * @param Google_Service_CertificateAuthorityService_ActivateCertificateAuthorityRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function activate($name, Google_Service_CertificateAuthorityService_ActivateCertificateAuthorityRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('activate', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
  /**
   * Create a new CertificateAuthority in a given Project and Location.
   * (certificateAuthorities.create)
   *
   * @param string $parent Required. The resource name of the CaPool associated
   * with the CertificateAuthorities, in the format `projects/locations/caPools`.
   * @param Google_Service_CertificateAuthorityService_CertificateAuthority $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string certificateAuthorityId Required. It must be unique within a
   * location and match the regular expression `[a-zA-Z0-9_-]{1,63}`
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
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function create($parent, Google_Service_CertificateAuthorityService_CertificateAuthority $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
  /**
   * Delete a CertificateAuthority. (certificateAuthorities.delete)
   *
   * @param string $name Required. The resource name for this CertificateAuthority
   * in the format `projects/locations/caPools/certificateAuthorities`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool ignoreActiveCertificates Optional. This field allows the CA
   * to be deleted even if the CA has active certs. Active certs include both
   * unrevoked and unexpired certs.
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
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
  /**
   * Disable a CertificateAuthority. (certificateAuthorities.disable)
   *
   * @param string $name Required. The resource name for this CertificateAuthority
   * in the format `projects/locations/caPools/certificateAuthorities`.
   * @param Google_Service_CertificateAuthorityService_DisableCertificateAuthorityRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function disable($name, Google_Service_CertificateAuthorityService_DisableCertificateAuthorityRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('disable', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
  /**
   * Enable a CertificateAuthority. (certificateAuthorities.enable)
   *
   * @param string $name Required. The resource name for this CertificateAuthority
   * in the format `projects/locations/caPools/certificateAuthorities`.
   * @param Google_Service_CertificateAuthorityService_EnableCertificateAuthorityRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function enable($name, Google_Service_CertificateAuthorityService_EnableCertificateAuthorityRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('enable', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
  /**
   * Fetch a certificate signing request (CSR) from a CertificateAuthority that is
   * in state AWAITING_USER_ACTIVATION and is of type SUBORDINATE. The CSR must
   * then be signed by the desired parent Certificate Authority, which could be
   * another CertificateAuthority resource, or could be an on-prem certificate
   * authority. See also ActivateCertificateAuthority.
   * (certificateAuthorities.fetch)
   *
   * @param string $name Required. The resource name for this CertificateAuthority
   * in the format `projects/locations/caPools/certificateAuthorities`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_FetchCertificateAuthorityCsrResponse
   */
  public function fetch($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('fetch', array($params), "Google_Service_CertificateAuthorityService_FetchCertificateAuthorityCsrResponse");
  }
  /**
   * Returns a CertificateAuthority. (certificateAuthorities.get)
   *
   * @param string $name Required. The name of the CertificateAuthority to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_CertificateAuthority
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CertificateAuthorityService_CertificateAuthority");
  }
  /**
   * Lists CertificateAuthorities.
   * (certificateAuthorities.listProjectsLocationsCaPoolsCertificateAuthorities)
   *
   * @param string $parent Required. The resource name of the CaPool associated
   * with the CertificateAuthorities, in the format `projects/locations/caPools`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Only include resources that match the
   * filter in the response.
   * @opt_param string orderBy Optional. Specify how the results should be sorted.
   * @opt_param int pageSize Optional. Limit on the number of
   * CertificateAuthorities to include in the response. Further
   * CertificateAuthorities can subsequently be obtained by including the
   * ListCertificateAuthoritiesResponse.next_page_token in a subsequent request.
   * If unspecified, the server will pick an appropriate default.
   * @opt_param string pageToken Optional. Pagination token, returned earlier via
   * ListCertificateAuthoritiesResponse.next_page_token.
   * @return Google_Service_CertificateAuthorityService_ListCertificateAuthoritiesResponse
   */
  public function listProjectsLocationsCaPoolsCertificateAuthorities($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CertificateAuthorityService_ListCertificateAuthoritiesResponse");
  }
  /**
   * Update a CertificateAuthority. (certificateAuthorities.patch)
   *
   * @param string $name Output only. The resource name for this
   * CertificateAuthority in the format
   * `projects/locations/caPools/certificateAuthorities`.
   * @param Google_Service_CertificateAuthorityService_CertificateAuthority $postBody
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
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function patch($name, Google_Service_CertificateAuthorityService_CertificateAuthority $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
  /**
   * Undelete a CertificateAuthority that has been deleted.
   * (certificateAuthorities.undelete)
   *
   * @param string $name Required. The resource name for this CertificateAuthority
   * in the format `projects/locations/caPools/certificateAuthorities`.
   * @param Google_Service_CertificateAuthorityService_UndeleteCertificateAuthorityRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function undelete($name, Google_Service_CertificateAuthorityService_UndeleteCertificateAuthorityRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
}
