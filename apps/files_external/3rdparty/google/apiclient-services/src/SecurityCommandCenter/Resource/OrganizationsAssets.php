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

use Google\Service\SecurityCommandCenter\GroupAssetsRequest;
use Google\Service\SecurityCommandCenter\GroupAssetsResponse;
use Google\Service\SecurityCommandCenter\ListAssetsResponse;
use Google\Service\SecurityCommandCenter\Operation;
use Google\Service\SecurityCommandCenter\RunAssetDiscoveryRequest;
use Google\Service\SecurityCommandCenter\SecurityMarks;

/**
 * The "assets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google\Service\SecurityCommandCenter(...);
 *   $assets = $securitycenterService->assets;
 *  </code>
 */
class OrganizationsAssets extends \Google\Service\Resource
{
  /**
   * Filters an organization's assets and groups them by their specified
   * properties. (assets.group)
   *
   * @param string $parent Required. Name of the organization to groupBy. Its
   * format is "organizations/[organization_id], folders/[folder_id], or
   * projects/[project_id]".
   * @param GroupAssetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GroupAssetsResponse
   */
  public function group($parent, GroupAssetsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('group', [$params], GroupAssetsResponse::class);
  }
  /**
   * Lists an organization's assets. (assets.listOrganizationsAssets)
   *
   * @param string $parent Required. Name of the organization assets should belong
   * to. Its format is "organizations/[organization_id], folders/[folder_id], or
   * projects/[project_id]".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string compareDuration When compare_duration is set, the
   * ListAssetsResult's "state_change" attribute is updated to indicate whether
   * the asset was added, removed, or remained present during the compare_duration
   * period of time that precedes the read_time. This is the time between
   * (read_time - compare_duration) and read_time. The state_change value is
   * derived based on the presence of the asset at the two points in time.
   * Intermediate state changes between the two times don't affect the result. For
   * example, the results aren't affected if the asset is removed and re-created
   * again. Possible "state_change" values when compare_duration is specified: *
   * "ADDED": indicates that the asset was not present at the start of
   * compare_duration, but present at read_time. * "REMOVED": indicates that the
   * asset was present at the start of compare_duration, but not present at
   * read_time. * "ACTIVE": indicates that the asset was present at both the start
   * and the end of the time period defined by compare_duration and read_time. If
   * compare_duration is not specified, then the only possible state_change is
   * "UNUSED", which will be the state_change set for all assets present at
   * read_time.
   * @opt_param string fieldMask A field mask to specify the ListAssetsResult
   * fields to be listed in the response. An empty field mask will list all
   * fields.
   * @opt_param string filter Expression that defines the filter to apply across
   * assets. The expression is a list of zero or more restrictions combined via
   * logical operators `AND` and `OR`. Parentheses are supported, and `OR` has
   * higher precedence than `AND`. Restrictions have the form ` ` and may have a
   * `-` character in front of them to indicate negation. The fields map to those
   * defined in the Asset resource. Examples include: * name *
   * security_center_properties.resource_name * resource_properties.a_property *
   * security_marks.marks.marka The supported operators are: * `=` for all value
   * types. * `>`, `<`, `>=`, `<=` for integer values. * `:`, meaning substring
   * matching, for strings. The supported value types are: * string literals in
   * quotes. * integer literals without quotes. * boolean literals `true` and
   * `false` without quotes. The following are the allowed field and operator
   * combinations: * name: `=` * update_time: `=`, `>`, `<`, `>=`, `<=` Usage:
   * This should be milliseconds since epoch or an RFC3339 string. Examples:
   * `update_time = "2019-06-10T16:07:18-07:00"` `update_time = 1560208038000` *
   * create_time: `=`, `>`, `<`, `>=`, `<=` Usage: This should be milliseconds
   * since epoch or an RFC3339 string. Examples: `create_time =
   * "2019-06-10T16:07:18-07:00"` `create_time = 1560208038000` *
   * iam_policy.policy_blob: `=`, `:` * resource_properties: `=`, `:`, `>`, `<`,
   * `>=`, `<=` * security_marks.marks: `=`, `:` *
   * security_center_properties.resource_name: `=`, `:` *
   * security_center_properties.resource_display_name: `=`, `:` *
   * security_center_properties.resource_type: `=`, `:` *
   * security_center_properties.resource_parent: `=`, `:` *
   * security_center_properties.resource_parent_display_name: `=`, `:` *
   * security_center_properties.resource_project: `=`, `:` *
   * security_center_properties.resource_project_display_name: `=`, `:` *
   * security_center_properties.resource_owners: `=`, `:` For example,
   * `resource_properties.size = 100` is a valid filter string. Use a partial
   * match on the empty string to filter based on a property existing:
   * `resource_properties.my_property : ""` Use a negated partial match on the
   * empty string to filter based on a property not existing:
   * `-resource_properties.my_property : ""`
   * @opt_param string orderBy Expression that defines what fields and order to
   * use for sorting. The string value should follow SQL syntax: comma separated
   * list of fields. For example: "name,resource_properties.a_property". The
   * default sorting order is ascending. To specify descending order for a field,
   * a suffix " desc" should be appended to the field name. For example: "name
   * desc,resource_properties.a_property". Redundant space characters in the
   * syntax are insignificant. "name desc,resource_properties.a_property" and "
   * name desc , resource_properties.a_property " are equivalent. The following
   * fields are supported: name update_time resource_properties
   * security_marks.marks security_center_properties.resource_name
   * security_center_properties.resource_display_name
   * security_center_properties.resource_parent
   * security_center_properties.resource_parent_display_name
   * security_center_properties.resource_project
   * security_center_properties.resource_project_display_name
   * security_center_properties.resource_type
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. Default is 10, minimum is 1, maximum is 1000.
   * @opt_param string pageToken The value returned by the last
   * `ListAssetsResponse`; indicates that this is a continuation of a prior
   * `ListAssets` call, and that the system should return the next page of data.
   * @opt_param string readTime Time used as a reference point when filtering
   * assets. The filter is limited to assets existing at the supplied time and
   * their values are those at that specific time. Absence of this field will
   * default to the API's version of NOW.
   * @return ListAssetsResponse
   */
  public function listOrganizationsAssets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAssetsResponse::class);
  }
  /**
   * Runs asset discovery. The discovery is tracked with a long-running operation.
   * This API can only be called with limited frequency for an organization. If it
   * is called too frequently the caller will receive a TOO_MANY_REQUESTS error.
   * (assets.runDiscovery)
   *
   * @param string $parent Required. Name of the organization to run asset
   * discovery for. Its format is "organizations/[organization_id]".
   * @param RunAssetDiscoveryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function runDiscovery($parent, RunAssetDiscoveryRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('runDiscovery', [$params], Operation::class);
  }
  /**
   * Updates security marks. (assets.updateSecurityMarks)
   *
   * @param string $name The relative resource name of the SecurityMarks. See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name
   * Examples: "organizations/{organization_id}/assets/{asset_id}/securityMarks" "
   * organizations/{organization_id}/sources/{source_id}/findings/{finding_id}/sec
   * urityMarks".
   * @param SecurityMarks $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string startTime The time at which the updated SecurityMarks take
   * effect. If not set uses current server time. Updates will be applied to the
   * SecurityMarks that are active immediately preceding this time. Must be
   * earlier or equal to the server time.
   * @opt_param string updateMask The FieldMask to use when updating the security
   * marks resource. The field mask must not contain duplicate fields. If empty or
   * set to "marks", all marks will be replaced. Individual marks can be updated
   * using "marks.".
   * @return SecurityMarks
   */
  public function updateSecurityMarks($name, SecurityMarks $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateSecurityMarks', [$params], SecurityMarks::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsAssets::class, 'Google_Service_SecurityCommandCenter_Resource_OrganizationsAssets');
