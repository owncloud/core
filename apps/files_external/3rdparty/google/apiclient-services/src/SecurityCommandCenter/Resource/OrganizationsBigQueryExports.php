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

namespace Google\Service\SecurityCommandCenter\Resource;

use Google\Service\SecurityCommandCenter\GoogleCloudSecuritycenterV1BigQueryExport;
use Google\Service\SecurityCommandCenter\ListBigQueryExportsResponse;
use Google\Service\SecurityCommandCenter\SecuritycenterEmpty;

/**
 * The "bigQueryExports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google\Service\SecurityCommandCenter(...);
 *   $bigQueryExports = $securitycenterService->bigQueryExports;
 *  </code>
 */
class OrganizationsBigQueryExports extends \Google\Service\Resource
{
  /**
   * Creates a big query export. (bigQueryExports.create)
   *
   * @param string $parent Required. Resource name of the new big query export's
   * parent. Its format is "organizations/[organization_id]",
   * "folders/[folder_id]", or "projects/[project_id]".
   * @param GoogleCloudSecuritycenterV1BigQueryExport $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string bigQueryExportId Required. Unique identifier provided by
   * the client within the parent scope. It must consist of lower case letters,
   * numbers, and hyphen, with the first character a letter, the last a letter or
   * a number, and a 63 character maximum.
   * @return GoogleCloudSecuritycenterV1BigQueryExport
   */
  public function create($parent, GoogleCloudSecuritycenterV1BigQueryExport $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudSecuritycenterV1BigQueryExport::class);
  }
  /**
   * Deletes an existing big query export. (bigQueryExports.delete)
   *
   * @param string $name Required. Name of the big query export to delete. Its
   * format is organizations/{organization}/bigQueryExports/{export_id},
   * folders/{folder}/bigQueryExports/{export_id}, or
   * projects/{project}/bigQueryExports/{export_id}
   * @param array $optParams Optional parameters.
   * @return SecuritycenterEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], SecuritycenterEmpty::class);
  }
  /**
   * Gets a big query export. (bigQueryExports.get)
   *
   * @param string $name Required. Name of the big query export to retrieve. Its
   * format is organizations/{organization}/bigQueryExports/{export_id},
   * folders/{folder}/bigQueryExports/{export_id}, or
   * projects/{project}/bigQueryExports/{export_id}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudSecuritycenterV1BigQueryExport
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudSecuritycenterV1BigQueryExport::class);
  }
  /**
   * Lists BigQuery exports. Note that when requesting BigQuery exports at a given
   * level all exports under that level are also returned e.g. if requesting
   * BigQuery exports under a folder, then all BigQuery exports immediately under
   * the folder plus the ones created under the projects within the folder are
   * returned. (bigQueryExports.listOrganizationsBigQueryExports)
   *
   * @param string $parent Required. The parent, which owns the collection of
   * BigQuery exports. Its format is "organizations/[organization_id]",
   * "folders/[folder_id]", "projects/[project_id]".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of configs to return. The service
   * may return fewer than this value. If unspecified, at most 10 configs will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListBigQueryExports` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListBigQueryExports` must
   * match the call that provided the page token.
   * @return ListBigQueryExportsResponse
   */
  public function listOrganizationsBigQueryExports($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBigQueryExportsResponse::class);
  }
  /**
   * Updates a BigQuery export. (bigQueryExports.patch)
   *
   * @param string $name The relative resource name of this export. See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name.
   * Example format: "organizations/{organization_id}/bigQueryExports/{export_id}"
   * Example format: "folders/{folder_id}/bigQueryExports/{export_id}" Example
   * format: "projects/{project_id}/bigQueryExports/{export_id}" This field is
   * provided in responses, and is ignored when provided in create requests.
   * @param GoogleCloudSecuritycenterV1BigQueryExport $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated. If empty all
   * mutable fields will be updated.
   * @return GoogleCloudSecuritycenterV1BigQueryExport
   */
  public function patch($name, GoogleCloudSecuritycenterV1BigQueryExport $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudSecuritycenterV1BigQueryExport::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsBigQueryExports::class, 'Google_Service_SecurityCommandCenter_Resource_OrganizationsBigQueryExports');
