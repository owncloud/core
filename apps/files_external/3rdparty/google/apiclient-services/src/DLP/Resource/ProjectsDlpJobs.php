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

namespace Google\Service\DLP\Resource;

use Google\Service\DLP\GooglePrivacyDlpV2CancelDlpJobRequest;
use Google\Service\DLP\GooglePrivacyDlpV2CreateDlpJobRequest;
use Google\Service\DLP\GooglePrivacyDlpV2DlpJob;
use Google\Service\DLP\GooglePrivacyDlpV2ListDlpJobsResponse;
use Google\Service\DLP\GoogleProtobufEmpty;

/**
 * The "dlpJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google\Service\DLP(...);
 *   $dlpJobs = $dlpService->dlpJobs;
 *  </code>
 */
class ProjectsDlpJobs extends \Google\Service\Resource
{
  /**
   * Starts asynchronous cancellation on a long-running DlpJob. The server makes a
   * best effort to cancel the DlpJob, but success is not guaranteed. See
   * https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
   * (dlpJobs.cancel)
   *
   * @param string $name Required. The name of the DlpJob resource to be
   * cancelled.
   * @param GooglePrivacyDlpV2CancelDlpJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function cancel($name, GooglePrivacyDlpV2CancelDlpJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Creates a new job to inspect storage or calculate risk metrics. See
   * https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more. When
   * no InfoTypes or CustomInfoTypes are specified in inspect jobs, the system
   * will automatically choose what detectors to run. By default this may be all
   * types, but may change over time as detectors are updated. (dlpJobs.create)
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
   * @param GooglePrivacyDlpV2CreateDlpJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2DlpJob
   */
  public function create($parent, GooglePrivacyDlpV2CreateDlpJobRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GooglePrivacyDlpV2DlpJob::class);
  }
  /**
   * Deletes a long-running DlpJob. This method indicates that the client is no
   * longer interested in the DlpJob result. The job will be canceled if possible.
   * See https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
   * (dlpJobs.delete)
   *
   * @param string $name Required. The name of the DlpJob resource to be deleted.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets the latest state of a long-running DlpJob. See
   * https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
   * (dlpJobs.get)
   *
   * @param string $name Required. The name of the DlpJob resource.
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2DlpJob
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GooglePrivacyDlpV2DlpJob::class);
  }
  /**
   * Lists DlpJobs that match the specified filter in the request. See
   * https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
   * (dlpJobs.listProjectsDlpJobs)
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
   * DATASTORE|CLOUD_STORAGE|BIGQUERY - `trigger_name` - The name of the trigger
   * that created the job. - 'end_time` - Corresponds to the time the job
   * finished. - 'start_time` - Corresponds to the time the job finished. *
   * Supported fields for risk analysis jobs: - `state` -
   * RUNNING|CANCELED|FINISHED|FAILED - 'end_time` - Corresponds to the time the
   * job finished. - 'start_time` - Corresponds to the time the job finished. *
   * The operator must be `=` or `!=`. Examples: * inspected_storage =
   * cloud_storage AND state = done * inspected_storage = cloud_storage OR
   * inspected_storage = bigquery * inspected_storage = cloud_storage AND (state =
   * done OR state = canceled) * end_time > \"2017-12-12T00:00:00+00:00\" The
   * length of this field should be no more than 500 characters.
   * @opt_param string locationId Deprecated. This field has no effect.
   * @opt_param string orderBy Comma separated list of fields to order by,
   * followed by `asc` or `desc` postfix. This list is case-insensitive, default
   * sorting order is ascending, redundant space characters are insignificant.
   * Example: `name asc, end_time asc, create_time desc` Supported fields are: -
   * `create_time`: corresponds to the time the job was created. - `end_time`:
   * corresponds to the time the job ended. - `name`: corresponds to the job's
   * name. - `state`: corresponds to `state`
   * @opt_param int pageSize The standard list page size.
   * @opt_param string pageToken The standard list page token.
   * @opt_param string type The type of job. Defaults to `DlpJobType.INSPECT`
   * @return GooglePrivacyDlpV2ListDlpJobsResponse
   */
  public function listProjectsDlpJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GooglePrivacyDlpV2ListDlpJobsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsDlpJobs::class, 'Google_Service_DLP_Resource_ProjectsDlpJobs');
