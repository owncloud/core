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

namespace Google\Service\DataLabeling\Resource;

use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1SearchEvaluationsResponse;

/**
 * The "evaluations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google\Service\DataLabeling(...);
 *   $evaluations = $datalabelingService->evaluations;
 *  </code>
 */
class ProjectsEvaluations extends \Google\Service\Resource
{
  /**
   * Searches evaluations within a project. (evaluations.search)
   *
   * @param string $parent Required. Evaluation search parent (project ID).
   * Format: "projects/ {project_id}"
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. To search evaluations, you can filter by
   * the following: * evaluation_job.evaluation_job_id (the last part of
   * EvaluationJob.name) * evaluation_job.model_id (the {model_name} portion of
   * EvaluationJob.modelVersion) * evaluation_job.evaluation_job_run_time_start
   * (Minimum threshold for the evaluationJobRunTime that created the evaluation)
   * * evaluation_job.evaluation_job_run_time_end (Maximum threshold for the
   * evaluationJobRunTime that created the evaluation) * evaluation_job.job_state
   * (EvaluationJob.state) * annotation_spec.display_name (the Evaluation contains
   * a metric for the annotation spec with this displayName) To filter by multiple
   * critiera, use the `AND` operator or the `OR` operator. The following examples
   * shows a string that filters by several critiera:
   * "evaluation_job.evaluation_job_id = {evaluation_job_id} AND
   * evaluation_job.model_id = {model_name} AND
   * evaluation_job.evaluation_job_run_time_start = {timestamp_1} AND
   * evaluation_job.evaluation_job_run_time_end = {timestamp_2} AND
   * annotation_spec.display_name = {display_name}"
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer results than requested. Default value is 100.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * for the server to return. Typically obtained by the nextPageToken of the
   * response to a previous search request. If you don't specify this field, the
   * API call requests the first page of the search.
   * @return GoogleCloudDatalabelingV1beta1SearchEvaluationsResponse
   */
  public function search($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], GoogleCloudDatalabelingV1beta1SearchEvaluationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsEvaluations::class, 'Google_Service_DataLabeling_Resource_ProjectsEvaluations');
