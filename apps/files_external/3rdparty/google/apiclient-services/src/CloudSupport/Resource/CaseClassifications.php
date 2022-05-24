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

namespace Google\Service\CloudSupport\Resource;

use Google\Service\CloudSupport\SearchCaseClassificationsResponse;

/**
 * The "caseClassifications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsupportService = new Google\Service\CloudSupport(...);
 *   $caseClassifications = $cloudsupportService->caseClassifications;
 *  </code>
 */
class CaseClassifications extends \Google\Service\Resource
{
  /**
   * Retrieve valid classifications to be used when creating a support case. The
   * classications are hierarchical, with each classification containing all
   * levels of the hierarchy, separated by " > ". For example "Technical Issue >
   * Compute > Compute Engine". (caseClassifications.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of cases fetched with each
   * request.
   * @opt_param string pageToken A token identifying the page of results to
   * return. If unspecified, the first page is retrieved.
   * @opt_param string query An expression written in the Cloud filter language.
   * If non-empty, then only cases whose fields match the filter are returned. If
   * empty, then no messages are filtered out.
   * @return SearchCaseClassificationsResponse
   */
  public function search($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchCaseClassificationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CaseClassifications::class, 'Google_Service_CloudSupport_Resource_CaseClassifications');
