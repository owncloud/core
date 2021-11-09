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

use Google\Service\SecurityCommandCenter\Finding;
use Google\Service\SecurityCommandCenter\GroupFindingsRequest;
use Google\Service\SecurityCommandCenter\GroupFindingsResponse;
use Google\Service\SecurityCommandCenter\ListFindingsResponse;
use Google\Service\SecurityCommandCenter\SecurityMarks;
use Google\Service\SecurityCommandCenter\SetFindingStateRequest;

/**
 * The "findings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google\Service\SecurityCommandCenter(...);
 *   $findings = $securitycenterService->findings;
 *  </code>
 */
class ProjectsSourcesFindings extends \Google\Service\Resource
{
  /**
   * Filters an organization or source's findings and groups them by their
   * specified properties. To group across all sources provide a `-` as the source
   * id. Example: /v1/organizations/{organization_id}/sources/-/findings,
   * /v1/folders/{folder_id}/sources/-/findings,
   * /v1/projects/{project_id}/sources/-/findings (findings.group)
   *
   * @param string $parent Required. Name of the source to groupBy. Its format is
   * "organizations/[organization_id]/sources/[source_id]",
   * folders/[folder_id]/sources/[source_id], or
   * projects/[project_id]/sources/[source_id]. To groupBy across all sources
   * provide a source_id of `-`. For example:
   * organizations/{organization_id}/sources/-, folders/{folder_id}/sources/-, or
   * projects/{project_id}/sources/-
   * @param GroupFindingsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GroupFindingsResponse
   */
  public function group($parent, GroupFindingsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('group', [$params], GroupFindingsResponse::class);
  }
  /**
   * Lists an organization or source's findings. To list across all sources
   * provide a `-` as the source id. Example:
   * /v1/organizations/{organization_id}/sources/-/findings
   * (findings.listProjectsSourcesFindings)
   *
   * @param string $parent Required. Name of the source the findings belong to.
   * Its format is "organizations/[organization_id]/sources/[source_id],
   * folders/[folder_id]/sources/[source_id], or
   * projects/[project_id]/sources/[source_id]". To list across all sources
   * provide a source_id of `-`. For example:
   * organizations/{organization_id}/sources/-, folders/{folder_id}/sources/- or
   * projects/{projects_id}/sources/-
   * @param array $optParams Optional parameters.
   *
   * @opt_param string compareDuration When compare_duration is set, the
   * ListFindingsResult's "state_change" attribute is updated to indicate whether
   * the finding had its state changed, the finding's state remained unchanged, or
   * if the finding was added in any state during the compare_duration period of
   * time that precedes the read_time. This is the time between (read_time -
   * compare_duration) and read_time. The state_change value is derived based on
   * the presence and state of the finding at the two points in time. Intermediate
   * state changes between the two times don't affect the result. For example, the
   * results aren't affected if the finding is made inactive and then active
   * again. Possible "state_change" values when compare_duration is specified: *
   * "CHANGED": indicates that the finding was present and matched the given
   * filter at the start of compare_duration, but changed its state at read_time.
   * * "UNCHANGED": indicates that the finding was present and matched the given
   * filter at the start of compare_duration and did not change state at
   * read_time. * "ADDED": indicates that the finding did not match the given
   * filter or was not present at the start of compare_duration, but was present
   * at read_time. * "REMOVED": indicates that the finding was present and matched
   * the filter at the start of compare_duration, but did not match the filter at
   * read_time. If compare_duration is not specified, then the only possible
   * state_change is "UNUSED", which will be the state_change set for all findings
   * present at read_time.
   * @opt_param string fieldMask A field mask to specify the Finding fields to be
   * listed in the response. An empty field mask will list all fields.
   * @opt_param string filter Expression that defines the filter to apply across
   * findings. The expression is a list of one or more restrictions combined via
   * logical operators `AND` and `OR`. Parentheses are supported, and `OR` has
   * higher precedence than `AND`. Restrictions have the form ` ` and may have a
   * `-` character in front of them to indicate negation. Examples include: * name
   * * source_properties.a_property * security_marks.marks.marka The supported
   * operators are: * `=` for all value types. * `>`, `<`, `>=`, `<=` for integer
   * values. * `:`, meaning substring matching, for strings. The supported value
   * types are: * string literals in quotes. * integer literals without quotes. *
   * boolean literals `true` and `false` without quotes. The following field and
   * operator combinations are supported: * name: `=` * parent: `=`, `:` *
   * resource_name: `=`, `:` * state: `=`, `:` * category: `=`, `:` *
   * external_uri: `=`, `:` * event_time: `=`, `>`, `<`, `>=`, `<=` Usage: This
   * should be milliseconds since epoch or an RFC3339 string. Examples:
   * `event_time = "2019-06-10T16:07:18-07:00"` `event_time = 1560208038000` *
   * severity: `=`, `:` * workflow_state: `=`, `:` * security_marks.marks: `=`,
   * `:` * source_properties: `=`, `:`, `>`, `<`, `>=`, `<=` For example,
   * `source_properties.size = 100` is a valid filter string. Use a partial match
   * on the empty string to filter based on a property existing:
   * `source_properties.my_property : ""` Use a negated partial match on the empty
   * string to filter based on a property not existing:
   * `-source_properties.my_property : ""` * resource: * resource.name: `=`, `:` *
   * resource.parent_name: `=`, `:` * resource.parent_display_name: `=`, `:` *
   * resource.project_name: `=`, `:` * resource.project_display_name: `=`, `:` *
   * resource.type: `=`, `:` * resource.folders.resource_folder: `=`, `:` *
   * resource.display_name: `=`, `:`
   * @opt_param string orderBy Expression that defines what fields and order to
   * use for sorting. The string value should follow SQL syntax: comma separated
   * list of fields. For example: "name,resource_properties.a_property". The
   * default sorting order is ascending. To specify descending order for a field,
   * a suffix " desc" should be appended to the field name. For example: "name
   * desc,source_properties.a_property". Redundant space characters in the syntax
   * are insignificant. "name desc,source_properties.a_property" and " name desc ,
   * source_properties.a_property " are equivalent. The following fields are
   * supported: name parent state category resource_name event_time
   * source_properties security_marks.marks
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. Default is 10, minimum is 1, maximum is 1000.
   * @opt_param string pageToken The value returned by the last
   * `ListFindingsResponse`; indicates that this is a continuation of a prior
   * `ListFindings` call, and that the system should return the next page of data.
   * @opt_param string readTime Time used as a reference point when filtering
   * findings. The filter is limited to findings existing at the supplied time and
   * their values are those at that specific time. Absence of this field will
   * default to the API's version of NOW.
   * @return ListFindingsResponse
   */
  public function listProjectsSourcesFindings($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListFindingsResponse::class);
  }
  /**
   * Creates or updates a finding. The corresponding source must exist for a
   * finding creation to succeed. (findings.patch)
   *
   * @param string $name The relative resource name of this finding. See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name
   * Example:
   * "organizations/{organization_id}/sources/{source_id}/findings/{finding_id}"
   * @param Finding $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The FieldMask to use when updating the finding
   * resource. This field should not be specified when creating a finding. When
   * updating a finding, an empty mask is treated as updating all mutable fields
   * and replacing source_properties. Individual source_properties can be
   * added/updated by using "source_properties." in the field mask.
   * @return Finding
   */
  public function patch($name, Finding $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Finding::class);
  }
  /**
   * Updates the state of a finding. (findings.setState)
   *
   * @param string $name Required. The relative resource name of the finding. See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name
   * Example:
   * "organizations/{organization_id}/sources/{source_id}/finding/{finding_id}".
   * @param SetFindingStateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Finding
   */
  public function setState($name, SetFindingStateRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setState', [$params], Finding::class);
  }
  /**
   * Updates security marks. (findings.updateSecurityMarks)
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
   * SecurityMarks that are active immediately preceding this time.
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
class_alias(ProjectsSourcesFindings::class, 'Google_Service_SecurityCommandCenter_Resource_ProjectsSourcesFindings');
