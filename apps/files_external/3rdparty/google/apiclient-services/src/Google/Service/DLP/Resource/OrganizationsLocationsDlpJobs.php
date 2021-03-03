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
 * The "dlpJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google_Service_DLP(...);
 *   $dlpJobs = $dlpService->dlpJobs;
 *  </code>
 */
class Google_Service_DLP_Resource_OrganizationsLocationsDlpJobs extends Google_Service_Resource
{
  /**
   * Lists DlpJobs that match the specified filter in the request. See
   * https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
   * (dlpJobs.listOrganizationsLocationsDlpJobs)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID The following example `parent` string specifies a
   * parent project with the identifier `example-project`, and specifies the
   * `europe-west3` location for processing data: parent=projects/example-
   * project/locations/europe-west3
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering. Supported syntax: * Filter
   * expressions are made up of one or more restrictions. * Restrictions can be
   * combined by `AND` or `OR` logical operators. A sequence of restrictions
   * implicitly uses `AND`. * A restriction has the form of `{field} {operator}
   * {value}`. * Supported fields/values for inspect jobs: - `state` -
   * PENDING|RUNNING|CANCELED|FINISHED|FAILED - `inspected_storage` -
   * DATASTORE|CLOUD_STORAGE|BIGQUERY - `trigger_name` - The resource name of the
   * trigger that created job. - 'end_time` - Corresponds to time the job
   * finished. - 'start_time` - Corresponds to time the job finished. * Supported
   * fields for risk analysis jobs: - `state` - RUNNING|CANCELED|FINISHED|FAILED -
   * 'end_time` - Corresponds to time the job finished. - 'start_time` -
   * Corresponds to time the job finished. * The operator must be `=` or `!=`.
   * Examples: * inspected_storage = cloud_storage AND state = done *
   * inspected_storage = cloud_storage OR inspected_storage = bigquery *
   * inspected_storage = cloud_storage AND (state = done OR state = canceled) *
   * end_time > \"2017-12-12T00:00:00+00:00\" The length of this field should be
   * no more than 500 characters.
   * @opt_param string locationId Deprecated. This field has no effect.
   * @opt_param string orderBy Comma separated list of fields to order by,
   * followed by `asc` or `desc` postfix. This list is case-insensitive, default
   * sorting order is ascending, redundant space characters are insignificant.
   * Example: `name asc, end_time asc, create_time desc` Supported fields are: -
   * `create_time`: corresponds to time the job was created. - `end_time`:
   * corresponds to time the job ended. - `name`: corresponds to job's name. -
   * `state`: corresponds to `state`
   * @opt_param int pageSize The standard list page size.
   * @opt_param string pageToken The standard list page token.
   * @opt_param string type The type of job. Defaults to `DlpJobType.INSPECT`
   * @return Google_Service_DLP_GooglePrivacyDlpV2ListDlpJobsResponse
   */
  public function listOrganizationsLocationsDlpJobs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DLP_GooglePrivacyDlpV2ListDlpJobsResponse");
  }
}
