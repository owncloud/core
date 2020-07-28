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
 * The "v1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudassetService = new Google_Service_CloudAsset(...);
 *   $v1 = $cloudassetService->v1;
 *  </code>
 */
class Google_Service_CloudAsset_Resource_V1 extends Google_Service_Resource
{
  /**
   * Batch gets the update history of assets that overlap a time window. For
   * IAM_POLICY content, this API outputs history when the asset and its attached
   * IAM POLICY both exist. This can create gaps in the output history. Otherwise,
   * this API outputs history with asset in both non-delete or deleted status. If
   * a specified asset does not exist, this API returns an INVALID_ARGUMENT error.
   * (v1.batchGetAssetsHistory)
   *
   * @param string $parent Required. The relative name of the root asset. It can
   * only be an organization number (such as "organizations/123"), a project ID
   * (such as "projects/my-project-id")", or a project number (such as
   * "projects/12345").
   * @param array $optParams Optional parameters.
   *
   * @opt_param string readTimeWindow.startTime Start time of the time window
   * (exclusive).
   * @opt_param string readTimeWindow.endTime End time of the time window
   * (inclusive). If not specified, the current timestamp is used instead.
   * @opt_param string assetNames A list of the full names of the assets. See:
   * https://cloud.google.com/asset-inventory/docs/resource-name-format Example:
   *
   * `//compute.googleapis.com/projects/my_project_123/zones/zone1/instances/insta
   * nce1`.
   *
   * The request becomes a no-op if the asset name list is empty, and the max size
   * of the asset name list is 100 in one request.
   * @opt_param string contentType Optional. The content type.
   * @return Google_Service_CloudAsset_BatchGetAssetsHistoryResponse
   */
  public function batchGetAssetsHistory($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('batchGetAssetsHistory', array($params), "Google_Service_CloudAsset_BatchGetAssetsHistoryResponse");
  }
  /**
   * Exports assets with time and resource types to a given Cloud Storage
   * location/BigQuery table. For Cloud Storage location destinations, the output
   * format is newline-delimited JSON. Each line represents a
   * google.cloud.asset.v1.Asset in the JSON format; for BigQuery table
   * destinations, the output table stores the fields in asset proto as columns.
   * This API implements the google.longrunning.Operation API , which allows you
   * to keep track of the export. We recommend intervals of at least 2 seconds
   * with exponential retry to poll the export operation result. For regular-size
   * resource parent, the export operation usually finishes within 5 minutes.
   * (v1.exportAssets)
   *
   * @param string $parent Required. The relative name of the root asset. This can
   * only be an organization number (such as "organizations/123"), a project ID
   * (such as "projects/my-project-id"), or a project number (such as
   * "projects/12345"), or a folder number (such as "folders/123").
   * @param Google_Service_CloudAsset_ExportAssetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudAsset_Operation
   */
  public function exportAssets($parent, Google_Service_CloudAsset_ExportAssetsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('exportAssets', array($params), "Google_Service_CloudAsset_Operation");
  }
  /**
   * Searches all the IAM policies within the given accessible scope (e.g., a
   * project, a folder or an organization). Callers should have
   * `cloud.assets.SearchAllIamPolicies` permission upon the requested scope,
   * otherwise the request will be rejected. (v1.searchAllIamPolicies)
   *
   * @param string $scope Required. A scope can be a project, a folder or an
   * organization. The search is limited to the IAM policies within the `scope`.
   *
   * The allowed values are:
   *
   * * projects/{PROJECT_ID} * projects/{PROJECT_NUMBER} * folders/{FOLDER_NUMBER}
   * * organizations/{ORGANIZATION_NUMBER}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string query Optional. The query statement. An empty query can be
   * specified to search all the IAM policies within the given `scope`.
   *
   * Examples:
   *
   * * `policy : "amy@gmail.com"` to find Cloud IAM policy bindings that   specify
   * user "amy@gmail.com". * `policy : "roles/compute.admin"` to find Cloud IAM
   * policy bindings that   specify the Compute Admin role. *
   * `policy.role.permissions : "storage.buckets.update"` to find Cloud IAM
   * policy bindings that specify a role containing "storage.buckets.update"
   * permission. * `resource : "organizations/123"` to find Cloud IAM policy
   * bindings that   are set on "organizations/123". * `(resource :
   * ("organizations/123" OR "folders/1234") AND policy : "amy")`   to find Cloud
   * IAM policy bindings that are set on "organizations/123" or   "folders/1234",
   * and also specify user "amy".
   *
   * See [how to construct a query](https://cloud.google.com/asset-inventory/docs
   * /searching-iam-policies#how_to_construct_a_query) for more details.
   * @opt_param int pageSize Optional. The page size for search result pagination.
   * Page size is capped at 500 even if a larger value is given. If set to zero,
   * server will pick an appropriate default. Returned results may be fewer than
   * requested. When this happens, there could be more results as long as
   * `next_page_token` is returned.
   * @opt_param string pageToken Optional. If present, retrieve the next batch of
   * results from the preceding call to this method. `page_token` must be the
   * value of `next_page_token` from the previous response. The values of all
   * other method parameters must be identical to those in the previous call.
   * @return Google_Service_CloudAsset_SearchAllIamPoliciesResponse
   */
  public function searchAllIamPolicies($scope, $optParams = array())
  {
    $params = array('scope' => $scope);
    $params = array_merge($params, $optParams);
    return $this->call('searchAllIamPolicies', array($params), "Google_Service_CloudAsset_SearchAllIamPoliciesResponse");
  }
  /**
   * Searches all the resources within the given accessible scope (e.g., a
   * project, a folder or an organization). Callers should have
   * `cloud.assets.SearchAllResources` permission upon the requested scope,
   * otherwise the request will be rejected. (v1.searchAllResources)
   *
   * @param string $scope Required. A scope can be a project, a folder or an
   * organization. The search is limited to the resources within the `scope`.
   *
   * The allowed values are:
   *
   * * projects/{PROJECT_ID} * projects/{PROJECT_NUMBER} * folders/{FOLDER_NUMBER}
   * * organizations/{ORGANIZATION_NUMBER}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. If present, then retrieve the next
   * batch of results from the preceding call to this method. `page_token` must be
   * the value of `next_page_token` from the previous response. The values of all
   * other method parameters, must be identical to those in the previous call.
   * @opt_param string query Optional. The query statement. An empty query can be
   * specified to search all the resources of certain `asset_types` within the
   * given `scope`.
   *
   * Examples:
   *
   * * `name : "Important"` to find Cloud resources whose name contains
   * "Important" as a word. * `displayName : "Impor*"` to find Cloud resources
   * whose display name   contains "Impor" as a word prefix. * `description :
   * "*por*"` to find Cloud resources whose description   contains "por" as a
   * substring. * `location : "us-west*"` to find Cloud resources whose location
   * is   prefixed with "us-west". * `labels : "prod"` to find Cloud resources
   * whose labels contain "prod" as   a key or value. * `labels.env : "prod"` to
   * find Cloud resources which have a label "env"   and its value is "prod". *
   * `labels.env : *` to find Cloud resources which have a label "env". *
   * `"Important"` to find Cloud resources which contain "Important" as a word
   * in any of the searchable fields. * `"Impor*"` to find Cloud resources which
   * contain "Impor" as a word prefix   in any of the searchable fields. *
   * `"*por*"` to find Cloud resources which contain "por" as a substring in   any
   * of the searchable fields. * `("Important" AND location : ("us-west1" OR
   * "global"))` to find Cloud   resources which contain "Important" as a word in
   * any of the searchable   fields and are also located in the "us-west1" region
   * or the "global"   location.
   *
   * See [how to construct a query](https://cloud.google.com/asset-inventory/docs
   * /searching-resources#how_to_construct_a_query) for more details.
   * @opt_param int pageSize Optional. The page size for search result pagination.
   * Page size is capped at 500 even if a larger value is given. If set to zero,
   * server will pick an appropriate default. Returned results may be fewer than
   * requested. When this happens, there could be more results as long as
   * `next_page_token` is returned.
   * @opt_param string orderBy Optional. A comma separated list of fields
   * specifying the sorting order of the results. The default order is ascending.
   * Add " DESC" after the field name to indicate descending order. Redundant
   * space characters are ignored. Example: "location DESC, name". Only string
   * fields in the response are sortable, including `name`, `displayName`,
   * `description`, `location`. All the other fields such as repeated fields
   * (e.g., `networkTags`), map fields (e.g., `labels`) and struct fields (e.g.,
   * `additionalAttributes`) are not supported.
   * @opt_param string assetTypes Optional. A list of asset types that this
   * request searches for. If empty, it will search all the [searchable asset
   * types](https://cloud.google.com/asset-inventory/docs/supported-asset-
   * types#searchable_asset_types).
   * @return Google_Service_CloudAsset_SearchAllResourcesResponse
   */
  public function searchAllResources($scope, $optParams = array())
  {
    $params = array('scope' => $scope);
    $params = array_merge($params, $optParams);
    return $this->call('searchAllResources', array($params), "Google_Service_CloudAsset_SearchAllResourcesResponse");
  }
}
