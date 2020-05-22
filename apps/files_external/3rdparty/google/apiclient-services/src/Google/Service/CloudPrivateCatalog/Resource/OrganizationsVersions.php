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
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudprivatecatalogService = new Google_Service_CloudPrivateCatalog(...);
 *   $versions = $cloudprivatecatalogService->versions;
 *  </code>
 */
class Google_Service_CloudPrivateCatalog_Resource_OrganizationsVersions extends Google_Service_Resource
{
  /**
   * Search Version resources that consumers have access to, within the scope of
   * the consumer cloud resource hierarchy context. (versions.search)
   *
   * @param string $resource Required. The name of the resource context. See
   * SearchCatalogsRequest.resource for details.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A pagination token returned from a previous call
   * to SearchVersions that indicates where this listing should continue from.
   * This field is optional.
   * @opt_param int pageSize The maximum number of entries that are requested.
   * @opt_param string query The query to filter the versions. Required.
   *
   * The supported queries are: * List versions under a product:
   * `parent=catalogs/{catalog_id}/products/{product_id}` * Get a version by name:
   * `name=catalogs/{catalog_id}/products/{product_id}/versions/{version_id}`
   * @return Google_Service_CloudPrivateCatalog_GoogleCloudPrivatecatalogV1beta1SearchVersionsResponse
   */
  public function search($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_CloudPrivateCatalog_GoogleCloudPrivatecatalogV1beta1SearchVersionsResponse");
  }
}
