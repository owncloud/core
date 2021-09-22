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

namespace Google\Service\CloudAsset\Resource;

use Google\Service\CloudAsset\AnalyzeIamPolicyLongrunningRequest;
use Google\Service\CloudAsset\AnalyzeIamPolicyResponse;
use Google\Service\CloudAsset\AnalyzeMoveResponse;
use Google\Service\CloudAsset\BatchGetAssetsHistoryResponse;
use Google\Service\CloudAsset\ExportAssetsRequest;
use Google\Service\CloudAsset\Operation;
use Google\Service\CloudAsset\SearchAllIamPoliciesResponse;
use Google\Service\CloudAsset\SearchAllResourcesResponse;

/**
 * The "v1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudassetService = new Google\Service\CloudAsset(...);
 *   $v1 = $cloudassetService->v1;
 *  </code>
 */
class V1 extends \Google\Service\Resource
{
  /**
   * Analyzes IAM policies to answer which identities have what accesses on which
   * resources. (v1.analyzeIamPolicy)
   *
   * @param string $scope Required. The relative name of the root asset. Only
   * resources and IAM policies within the scope will be analyzed. This can only
   * be an organization number (such as "organizations/123"), a folder number
   * (such as "folders/123"), a project ID (such as "projects/my-project-id"), or
   * a project number (such as "projects/12345"). To know how to get organization
   * id, visit [here ](https://cloud.google.com/resource-manager/docs/creating-
   * managing-organization#retrieving_your_organization_id). To know how to get
   * folder or project id, visit [here ](https://cloud.google.com/resource-
   * manager/docs/creating-managing-
   * folders#viewing_or_listing_folders_and_projects).
   * @param array $optParams Optional parameters.
   *
   * @opt_param string analysisQuery.accessSelector.permissions Optional. The
   * permissions to appear in result.
   * @opt_param string analysisQuery.accessSelector.roles Optional. The roles to
   * appear in result.
   * @opt_param string analysisQuery.conditionContext.accessTime The hypothetical
   * access timestamp to evaluate IAM conditions. Note that this value must not be
   * earlier than the current time; otherwise, an INVALID_ARGUMENT error will be
   * returned.
   * @opt_param string analysisQuery.identitySelector.identity Required. The
   * identity appear in the form of members in [IAM policy
   * binding](https://cloud.google.com/iam/reference/rest/v1/Binding). The
   * examples of supported forms are: "user:mike@example.com",
   * "group:admins@example.com", "domain:google.com", "serviceAccount:my-project-
   * id@appspot.gserviceaccount.com". Notice that wildcard characters (such as *
   * and ?) are not supported. You must give a specific identity.
   * @opt_param bool analysisQuery.options.analyzeServiceAccountImpersonation
   * Optional. If true, the response will include access analysis from identities
   * to resources via service account impersonation. This is a very expensive
   * operation, because many derived queries will be executed. We highly recommend
   * you use AssetService.AnalyzeIamPolicyLongrunning rpc instead. For example, if
   * the request analyzes for which resources user A has permission P, and there's
   * an IAM policy states user A has iam.serviceAccounts.getAccessToken permission
   * to a service account SA, and there's another IAM policy states service
   * account SA has permission P to a GCP folder F, then user A potentially has
   * access to the GCP folder F. And those advanced analysis results will be
   * included in AnalyzeIamPolicyResponse.service_account_impersonation_analysis.
   * Another example, if the request analyzes for who has permission P to a GCP
   * folder F, and there's an IAM policy states user A has
   * iam.serviceAccounts.actAs permission to a service account SA, and there's
   * another IAM policy states service account SA has permission P to the GCP
   * folder F, then user A potentially has access to the GCP folder F. And those
   * advanced analysis results will be included in
   * AnalyzeIamPolicyResponse.service_account_impersonation_analysis. Default is
   * false.
   * @opt_param bool analysisQuery.options.expandGroups Optional. If true, the
   * identities section of the result will expand any Google groups appearing in
   * an IAM policy binding. If IamPolicyAnalysisQuery.identity_selector is
   * specified, the identity in the result will be determined by the selector, and
   * this flag is not allowed to set. Default is false.
   * @opt_param bool analysisQuery.options.expandResources Optional. If true and
   * IamPolicyAnalysisQuery.resource_selector is not specified, the resource
   * section of the result will expand any resource attached to an IAM policy to
   * include resources lower in the resource hierarchy. For example, if the
   * request analyzes for which resources user A has permission P, and the results
   * include an IAM policy with P on a GCP folder, the results will also include
   * resources in that folder with permission P. If true and
   * IamPolicyAnalysisQuery.resource_selector is specified, the resource section
   * of the result will expand the specified resource to include resources lower
   * in the resource hierarchy. Only project or lower resources are supported.
   * Folder and organization resource cannot be used together with this option.
   * For example, if the request analyzes for which users have permission P on a
   * GCP project with this option enabled, the results will include all users who
   * have permission P on that project or any lower resource. Default is false.
   * @opt_param bool analysisQuery.options.expandRoles Optional. If true, the
   * access section of result will expand any roles appearing in IAM policy
   * bindings to include their permissions. If
   * IamPolicyAnalysisQuery.access_selector is specified, the access section of
   * the result will be determined by the selector, and this flag is not allowed
   * to set. Default is false.
   * @opt_param bool analysisQuery.options.outputGroupEdges Optional. If true, the
   * result will output group identity edges, starting from the binding's group
   * members, to any expanded identities. Default is false.
   * @opt_param bool analysisQuery.options.outputResourceEdges Optional. If true,
   * the result will output resource edges, starting from the policy attached
   * resource, to any expanded resources. Default is false.
   * @opt_param string analysisQuery.resourceSelector.fullResourceName Required.
   * The [full resource name] (https://cloud.google.com/asset-inventory/docs
   * /resource-name-format) of a resource of [supported resource
   * types](https://cloud.google.com/asset-inventory/docs/supported-asset-
   * types#analyzable_asset_types).
   * @opt_param string executionTimeout Optional. Amount of time executable has to
   * complete. See JSON representation of [Duration](https://developers.google.com
   * /protocol-buffers/docs/proto3#json). If this field is set with a value less
   * than the RPC deadline, and the execution of your query hasn't finished in the
   * specified execution timeout, you will get a response with partial result.
   * Otherwise, your query's execution will continue until the RPC deadline. If
   * it's not finished until then, you will get a DEADLINE_EXCEEDED error. Default
   * is empty.
   * @return AnalyzeIamPolicyResponse
   */
  public function analyzeIamPolicy($scope, $optParams = [])
  {
    $params = ['scope' => $scope];
    $params = array_merge($params, $optParams);
    return $this->call('analyzeIamPolicy', [$params], AnalyzeIamPolicyResponse::class);
  }
  /**
   * Analyzes IAM policies asynchronously to answer which identities have what
   * accesses on which resources, and writes the analysis results to a Google
   * Cloud Storage or a BigQuery destination. For Cloud Storage destination, the
   * output format is the JSON format that represents a AnalyzeIamPolicyResponse.
   * This method implements the google.longrunning.Operation, which allows you to
   * track the operation status. We recommend intervals of at least 2 seconds with
   * exponential backoff retry to poll the operation result. The metadata contains
   * the metadata for the long-running operation. (v1.analyzeIamPolicyLongrunning)
   *
   * @param string $scope Required. The relative name of the root asset. Only
   * resources and IAM policies within the scope will be analyzed. This can only
   * be an organization number (such as "organizations/123"), a folder number
   * (such as "folders/123"), a project ID (such as "projects/my-project-id"), or
   * a project number (such as "projects/12345"). To know how to get organization
   * id, visit [here ](https://cloud.google.com/resource-manager/docs/creating-
   * managing-organization#retrieving_your_organization_id). To know how to get
   * folder or project id, visit [here ](https://cloud.google.com/resource-
   * manager/docs/creating-managing-
   * folders#viewing_or_listing_folders_and_projects).
   * @param AnalyzeIamPolicyLongrunningRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function analyzeIamPolicyLongrunning($scope, AnalyzeIamPolicyLongrunningRequest $postBody, $optParams = [])
  {
    $params = ['scope' => $scope, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('analyzeIamPolicyLongrunning', [$params], Operation::class);
  }
  /**
   * Analyze moving a resource to a specified destination without kicking off the
   * actual move. The analysis is best effort depending on the user's permissions
   * of viewing different hierarchical policies and configurations. The policies
   * and configuration are subject to change before the actual resource migration
   * takes place. (v1.analyzeMove)
   *
   * @param string $resource Required. Name of the resource to perform the
   * analysis against. Only GCP Project are supported as of today. Hence, this can
   * only be Project ID (such as "projects/my-project-id") or a Project Number
   * (such as "projects/12345").
   * @param array $optParams Optional parameters.
   *
   * @opt_param string destinationParent Required. Name of the GCP Folder or
   * Organization to reparent the target resource. The analysis will be performed
   * against hypothetically moving the resource to this specified desitination
   * parent. This can only be a Folder number (such as "folders/123") or an
   * Organization number (such as "organizations/123").
   * @opt_param string view Analysis view indicating what information should be
   * included in the analysis response. If unspecified, the default view is FULL.
   * @return AnalyzeMoveResponse
   */
  public function analyzeMove($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('analyzeMove', [$params], AnalyzeMoveResponse::class);
  }
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
   * @opt_param string assetNames A list of the full names of the assets. See:
   * https://cloud.google.com/asset-inventory/docs/resource-name-format Example: `
   * //compute.googleapis.com/projects/my_project_123/zones/zone1/instances/instan
   * ce1`. The request becomes a no-op if the asset name list is empty, and the
   * max size of the asset name list is 100 in one request.
   * @opt_param string contentType Optional. The content type.
   * @opt_param string readTimeWindow.endTime End time of the time window
   * (inclusive). If not specified, the current timestamp is used instead.
   * @opt_param string readTimeWindow.startTime Start time of the time window
   * (exclusive).
   * @opt_param string relationshipTypes Optional. A list of relationship types to
   * output, for example: `INSTANCE_TO_INSTANCEGROUP`. This field should only be
   * specified if content_type=RELATIONSHIP. * If specified: it outputs specified
   * relationships' history on the [asset_names]. It returns an error if any of
   * the [relationship_types] doesn't belong to the supported relationship types
   * of the [asset_names] or if any of the [asset_names]'s types doesn't belong to
   * the source types of the [relationship_types]. * Otherwise: it outputs the
   * supported relationships' history on the [asset_names] or returns an error if
   * any of the [asset_names]'s types has no relationship support. See
   * [Introduction to Cloud Asset Inventory](https://cloud.google.com/asset-
   * inventory/docs/overview) for all supported asset types and relationship
   * types.
   * @return BatchGetAssetsHistoryResponse
   */
  public function batchGetAssetsHistory($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('batchGetAssetsHistory', [$params], BatchGetAssetsHistoryResponse::class);
  }
  /**
   * Exports assets with time and resource types to a given Cloud Storage
   * location/BigQuery table. For Cloud Storage location destinations, the output
   * format is newline-delimited JSON. Each line represents a
   * google.cloud.asset.v1.Asset in the JSON format; for BigQuery table
   * destinations, the output table stores the fields in asset Protobuf as
   * columns. This API implements the google.longrunning.Operation API, which
   * allows you to keep track of the export. We recommend intervals of at least 2
   * seconds with exponential retry to poll the export operation result. For
   * regular-size resource parent, the export operation usually finishes within 5
   * minutes. (v1.exportAssets)
   *
   * @param string $parent Required. The relative name of the root asset. This can
   * only be an organization number (such as "organizations/123"), a project ID
   * (such as "projects/my-project-id"), or a project number (such as
   * "projects/12345"), or a folder number (such as "folders/123").
   * @param ExportAssetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function exportAssets($parent, ExportAssetsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exportAssets', [$params], Operation::class);
  }
  /**
   * Searches all IAM policies within the specified scope, such as a project,
   * folder, or organization. The caller must be granted the
   * `cloudasset.assets.searchAllIamPolicies` permission on the desired scope,
   * otherwise the request will be rejected. (v1.searchAllIamPolicies)
   *
   * @param string $scope Required. A scope can be a project, a folder, or an
   * organization. The search is limited to the IAM policies within the `scope`.
   * The caller must be granted the
   * [`cloudasset.assets.searchAllIamPolicies`](https://cloud.google.com/asset-
   * inventory/docs/access-control#required_permissions) permission on the desired
   * scope. The allowed values are: * projects/{PROJECT_ID} (e.g., "projects/foo-
   * bar") * projects/{PROJECT_NUMBER} (e.g., "projects/12345678") *
   * folders/{FOLDER_NUMBER} (e.g., "folders/1234567") *
   * organizations/{ORGANIZATION_NUMBER} (e.g., "organizations/123456")
   * @param array $optParams Optional parameters.
   *
   * @opt_param string assetTypes Optional. A list of asset types that the IAM
   * policies are attached to. If empty, it will search the IAM policies that are
   * attached to all the [searchable asset types](https://cloud.google.com/asset-
   * inventory/docs/supported-asset-types#searchable_asset_types). Regular
   * expressions are also supported. For example: * "compute.googleapis.com.*"
   * snapshots IAM policies attached to asset type starts with
   * "compute.googleapis.com". * ".*Instance" snapshots IAM policies attached to
   * asset type ends with "Instance". * ".*Instance.*" snapshots IAM policies
   * attached to asset type contains "Instance". See
   * [RE2](https://github.com/google/re2/wiki/Syntax) for all supported regular
   * expression syntax. If the regular expression does not match any supported
   * asset type, an INVALID_ARGUMENT error will be returned.
   * @opt_param string orderBy Optional. A comma-separated list of fields
   * specifying the sorting order of the results. The default order is ascending.
   * Add " DESC" after the field name to indicate descending order. Redundant
   * space characters are ignored. Example: "assetType DESC, resource". Only
   * singular primitive fields in the response are sortable: * resource *
   * assetType * project All the other fields such as repeated fields (e.g.,
   * `folders`) and non-primitive fields (e.g., `policy`) are not supported.
   * @opt_param int pageSize Optional. The page size for search result pagination.
   * Page size is capped at 500 even if a larger value is given. If set to zero,
   * server will pick an appropriate default. Returned results may be fewer than
   * requested. When this happens, there could be more results as long as
   * `next_page_token` is returned.
   * @opt_param string pageToken Optional. If present, retrieve the next batch of
   * results from the preceding call to this method. `page_token` must be the
   * value of `next_page_token` from the previous response. The values of all
   * other method parameters must be identical to those in the previous call.
   * @opt_param string query Optional. The query statement. See [how to construct
   * a query](https://cloud.google.com/asset-inventory/docs/searching-iam-
   * policies#how_to_construct_a_query) for more information. If not specified or
   * empty, it will search all the IAM policies within the specified `scope`. Note
   * that the query string is compared against each Cloud IAM policy binding,
   * including its members, roles, and Cloud IAM conditions. The returned Cloud
   * IAM policies will only contain the bindings that match your query. To learn
   * more about the IAM policy structure, see [IAM policy
   * doc](https://cloud.google.com/iam/docs/policies#structure). Examples: *
   * `policy:amy@gmail.com` to find IAM policy bindings that specify user
   * "amy@gmail.com". * `policy:roles/compute.admin` to find IAM policy bindings
   * that specify the Compute Admin role. * `policy:comp*` to find IAM policy
   * bindings that contain "comp" as a prefix of any word in the binding. *
   * `policy.role.permissions:storage.buckets.update` to find IAM policy bindings
   * that specify a role containing "storage.buckets.update" permission. Note that
   * if callers don't have `iam.roles.get` access to a role's included
   * permissions, policy bindings that specify this role will be dropped from the
   * search results. * `policy.role.permissions:upd*` to find IAM policy bindings
   * that specify a role containing "upd" as a prefix of any word in the role
   * permission. Note that if callers don't have `iam.roles.get` access to a
   * role's included permissions, policy bindings that specify this role will be
   * dropped from the search results. * `resource:organizations/123456` to find
   * IAM policy bindings that are set on "organizations/123456". *
   * `resource=//cloudresourcemanager.googleapis.com/projects/myproject` to find
   * IAM policy bindings that are set on the project named "myproject". *
   * `Important` to find IAM policy bindings that contain "Important" as a word in
   * any of the searchable fields (except for the included permissions). *
   * `resource:(instance1 OR instance2) policy:amy` to find IAM policy bindings
   * that are set on resources "instance1" or "instance2" and also specify user
   * "amy". * `roles:roles/compute.admin` to find IAM policy bindings that specify
   * the Compute Admin role. * `memberTypes:user` to find IAM policy bindings that
   * contain the "user" member type.
   * @return SearchAllIamPoliciesResponse
   */
  public function searchAllIamPolicies($scope, $optParams = [])
  {
    $params = ['scope' => $scope];
    $params = array_merge($params, $optParams);
    return $this->call('searchAllIamPolicies', [$params], SearchAllIamPoliciesResponse::class);
  }
  /**
   * Searches all Cloud resources within the specified scope, such as a project,
   * folder, or organization. The caller must be granted the
   * `cloudasset.assets.searchAllResources` permission on the desired scope,
   * otherwise the request will be rejected. (v1.searchAllResources)
   *
   * @param string $scope Required. A scope can be a project, a folder, or an
   * organization. The search is limited to the resources within the `scope`. The
   * caller must be granted the
   * [`cloudasset.assets.searchAllResources`](https://cloud.google.com/asset-
   * inventory/docs/access-control#required_permissions) permission on the desired
   * scope. The allowed values are: * projects/{PROJECT_ID} (e.g., "projects/foo-
   * bar") * projects/{PROJECT_NUMBER} (e.g., "projects/12345678") *
   * folders/{FOLDER_NUMBER} (e.g., "folders/1234567") *
   * organizations/{ORGANIZATION_NUMBER} (e.g., "organizations/123456")
   * @param array $optParams Optional parameters.
   *
   * @opt_param string assetTypes Optional. A list of asset types that this
   * request searches for. If empty, it will search all the [searchable asset
   * types](https://cloud.google.com/asset-inventory/docs/supported-asset-
   * types#searchable_asset_types). Regular expressions are also supported. For
   * example: * "compute.googleapis.com.*" snapshots resources whose asset type
   * starts with "compute.googleapis.com". * ".*Instance" snapshots resources
   * whose asset type ends with "Instance". * ".*Instance.*" snapshots resources
   * whose asset type contains "Instance". See
   * [RE2](https://github.com/google/re2/wiki/Syntax) for all supported regular
   * expression syntax. If the regular expression does not match any supported
   * asset type, an INVALID_ARGUMENT error will be returned.
   * @opt_param string orderBy Optional. A comma-separated list of fields
   * specifying the sorting order of the results. The default order is ascending.
   * Add " DESC" after the field name to indicate descending order. Redundant
   * space characters are ignored. Example: "location DESC, name". Only singular
   * primitive fields in the response are sortable: * name * assetType * project *
   * displayName * description * location * kmsKey * createTime * updateTime *
   * state * parentFullResourceName * parentAssetType All the other fields such as
   * repeated fields (e.g., `networkTags`), map fields (e.g., `labels`) and struct
   * fields (e.g., `additionalAttributes`) are not supported.
   * @opt_param int pageSize Optional. The page size for search result pagination.
   * Page size is capped at 500 even if a larger value is given. If set to zero,
   * server will pick an appropriate default. Returned results may be fewer than
   * requested. When this happens, there could be more results as long as
   * `next_page_token` is returned.
   * @opt_param string pageToken Optional. If present, then retrieve the next
   * batch of results from the preceding call to this method. `page_token` must be
   * the value of `next_page_token` from the previous response. The values of all
   * other method parameters, must be identical to those in the previous call.
   * @opt_param string query Optional. The query statement. See [how to construct
   * a query](https://cloud.google.com/asset-inventory/docs/searching-
   * resources#how_to_construct_a_query) for more information. If not specified or
   * empty, it will search all the resources within the specified `scope`.
   * Examples: * `name:Important` to find Cloud resources whose name contains
   * "Important" as a word. * `name=Important` to find the Cloud resource whose
   * name is exactly "Important". * `displayName:Impor*` to find Cloud resources
   * whose display name contains "Impor" as a prefix of any word in the field. *
   * `location:us-west*` to find Cloud resources whose location contains both "us"
   * and "west" as prefixes. * `labels:prod` to find Cloud resources whose labels
   * contain "prod" as a key or value. * `labels.env:prod` to find Cloud resources
   * that have a label "env" and its value is "prod". * `labels.env:*` to find
   * Cloud resources that have a label "env". * `kmsKey:key` to find Cloud
   * resources encrypted with a customer-managed encryption key whose name
   * contains the word "key". * `state:ACTIVE` to find Cloud resources whose state
   * contains "ACTIVE" as a word. * `NOT state:ACTIVE` to find Cloud resources
   * whose state doesn't contain "ACTIVE" as a word. * `createTime<1609459200` to
   * find Cloud resources that were created before "2021-01-01 00:00:00 UTC".
   * 1609459200 is the epoch timestamp of "2021-01-01 00:00:00 UTC" in seconds. *
   * `updateTime>1609459200` to find Cloud resources that were updated after
   * "2021-01-01 00:00:00 UTC". 1609459200 is the epoch timestamp of "2021-01-01
   * 00:00:00 UTC" in seconds. * `Important` to find Cloud resources that contain
   * "Important" as a word in any of the searchable fields. * `Impor*` to find
   * Cloud resources that contain "Impor" as a prefix of any word in any of the
   * searchable fields. * `Important location:(us-west1 OR global)` to find Cloud
   * resources that contain "Important" as a word in any of the searchable fields
   * and are also located in the "us-west1" region or the "global" location.
   * @opt_param string readMask Optional. A comma-separated list of fields
   * specifying which fields to be returned in ResourceSearchResult. Only '*' or
   * combination of top level fields can be specified. Field names of both
   * snake_case and camelCase are supported. Examples: `"*"`, `"name,location"`,
   * `"name,versionedResources"`. The read_mask paths must be valid field paths
   * listed but not limited to (both snake_case and camelCase are supported): *
   * name * assetType * project * displayName * description * location * labels *
   * networkTags * kmsKey * createTime * updateTime * state * additionalAttributes
   * * versionedResources If read_mask is not specified, all fields except
   * versionedResources will be returned. If only '*' is specified, all fields
   * including versionedResources will be returned. Any invalid field path will
   * trigger INVALID_ARGUMENT error.
   * @return SearchAllResourcesResponse
   */
  public function searchAllResources($scope, $optParams = [])
  {
    $params = ['scope' => $scope];
    $params = array_merge($params, $optParams);
    return $this->call('searchAllResources', [$params], SearchAllResourcesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V1::class, 'Google_Service_CloudAsset_Resource_V1');
