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
 * The "jobTriggers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google_Service_DLP(...);
 *   $jobTriggers = $dlpService->jobTriggers;
 *  </code>
 */
class Google_Service_DLP_Resource_ProjectsLocationsJobTriggers extends Google_Service_Resource
{
  /**
   * Activate a job trigger. Causes the immediate execute of a trigger instead of
   * waiting on the trigger event to occur. (jobTriggers.activate)
   *
   * @param string $name Required. Resource name of the trigger to activate, for
   * example `projects/dlp-test-project/jobTriggers/53234423`.
   * @param Google_Service_DLP_GooglePrivacyDlpV2ActivateJobTriggerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2DlpJob
   */
  public function activate($name, Google_Service_DLP_GooglePrivacyDlpV2ActivateJobTriggerRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('activate', array($params), "Google_Service_DLP_GooglePrivacyDlpV2DlpJob");
  }
  /**
   * Creates a job trigger to run DLP actions such as scanning storage for
   * sensitive information on a set schedule. See
   * https://cloud.google.com/dlp/docs/creating-job-triggers to learn more.
   * (jobTriggers.create)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on whether you have [specified a processing
   * location](/dlp/docs/specifying-location): + Projects scope, location
   * specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID + Projects scope, no
   * location specified (defaults to global): `projects/`PROJECT_ID The following
   * example `parent` string specifies a parent project with the identifier
   * `example-project`, and specifies the `europe-west3` location for processing
   * data: parent=projects/example-project/locations/europe-west3
   * @param Google_Service_DLP_GooglePrivacyDlpV2CreateJobTriggerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2JobTrigger
   */
  public function create($parent, Google_Service_DLP_GooglePrivacyDlpV2CreateJobTriggerRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DLP_GooglePrivacyDlpV2JobTrigger");
  }
  /**
   * Deletes a job trigger. See https://cloud.google.com/dlp/docs/creating-job-
   * triggers to learn more. (jobTriggers.delete)
   *
   * @param string $name Required. Resource name of the project and the
   * triggeredJob, for example `projects/dlp-test-project/jobTriggers/53234423`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DLP_GoogleProtobufEmpty");
  }
  /**
   * Gets a job trigger. See https://cloud.google.com/dlp/docs/creating-job-
   * triggers to learn more. (jobTriggers.get)
   *
   * @param string $name Required. Resource name of the project and the
   * triggeredJob, for example `projects/dlp-test-project/jobTriggers/53234423`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2JobTrigger
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DLP_GooglePrivacyDlpV2JobTrigger");
  }
  /**
   * Inspect hybrid content and store findings to a trigger. The inspection will
   * be processed asynchronously. To review the findings monitor the jobs within
   * the trigger. Early access feature is in a pre-release state and might change
   * or have limited support. For more information, see
   * https://cloud.google.com/products#product-launch-stages.
   * (jobTriggers.hybridInspect)
   *
   * @param string $name Required. Resource name of the trigger to execute a
   * hybrid inspect on, for example `projects/dlp-test-
   * project/jobTriggers/53234423`.
   * @param Google_Service_DLP_GooglePrivacyDlpV2HybridInspectJobTriggerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2HybridInspectResponse
   */
  public function hybridInspect($name, Google_Service_DLP_GooglePrivacyDlpV2HybridInspectJobTriggerRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('hybridInspect', array($params), "Google_Service_DLP_GooglePrivacyDlpV2HybridInspectResponse");
  }
  /**
   * Lists job triggers. See https://cloud.google.com/dlp/docs/creating-job-
   * triggers to learn more. (jobTriggers.listProjectsLocationsJobTriggers)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on whether you have [specified a processing
   * location](/dlp/docs/specifying-location): + Projects scope, location
   * specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID + Projects scope, no
   * location specified (defaults to global): `projects/`PROJECT_ID The following
   * example `parent` string specifies a parent project with the identifier
   * `example-project`, and specifies the `europe-west3` location for processing
   * data: parent=projects/example-project/locations/europe-west3
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Size of the page, can be limited by a server.
   * @opt_param string filter Allows filtering. Supported syntax: * Filter
   * expressions are made up of one or more restrictions. * Restrictions can be
   * combined by `AND` or `OR` logical operators. A sequence of restrictions
   * implicitly uses `AND`. * A restriction has the form of `{field} {operator}
   * {value}`. * Supported fields/values for inspect jobs: - `status` -
   * HEALTHY|PAUSED|CANCELLED - `inspected_storage` -
   * DATASTORE|CLOUD_STORAGE|BIGQUERY - 'last_run_time` - RFC 3339 formatted
   * timestamp, surrounded by quotation marks. Nanoseconds are ignored. -
   * 'error_count' - Number of errors that have occurred while running. * The
   * operator must be `=` or `!=` for status and inspected_storage. Examples: *
   * inspected_storage = cloud_storage AND status = HEALTHY * inspected_storage =
   * cloud_storage OR inspected_storage = bigquery * inspected_storage =
   * cloud_storage AND (state = PAUSED OR state = HEALTHY) * last_run_time >
   * \"2017-12-12T00:00:00+00:00\" The length of this field should be no more than
   * 500 characters.
   * @opt_param string pageToken Page token to continue retrieval. Comes from
   * previous call to ListJobTriggers. `order_by` field must not change for
   * subsequent calls.
   * @opt_param string locationId Deprecated. This field has no effect.
   * @opt_param string orderBy Comma separated list of triggeredJob fields to
   * order by, followed by `asc` or `desc` postfix. This list is case-insensitive,
   * default sorting order is ascending, redundant space characters are
   * insignificant. Example: `name asc,update_time, create_time desc` Supported
   * fields are: - `create_time`: corresponds to time the JobTrigger was created.
   * - `update_time`: corresponds to time the JobTrigger was last updated. -
   * `last_run_time`: corresponds to the last time the JobTrigger ran. - `name`:
   * corresponds to JobTrigger's name. - `display_name`: corresponds to
   * JobTrigger's display name. - `status`: corresponds to JobTrigger's status.
   * @return Google_Service_DLP_GooglePrivacyDlpV2ListJobTriggersResponse
   */
  public function listProjectsLocationsJobTriggers($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DLP_GooglePrivacyDlpV2ListJobTriggersResponse");
  }
  /**
   * Updates a job trigger. See https://cloud.google.com/dlp/docs/creating-job-
   * triggers to learn more. (jobTriggers.patch)
   *
   * @param string $name Required. Resource name of the project and the
   * triggeredJob, for example `projects/dlp-test-project/jobTriggers/53234423`.
   * @param Google_Service_DLP_GooglePrivacyDlpV2UpdateJobTriggerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2JobTrigger
   */
  public function patch($name, Google_Service_DLP_GooglePrivacyDlpV2UpdateJobTriggerRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DLP_GooglePrivacyDlpV2JobTrigger");
  }
}
