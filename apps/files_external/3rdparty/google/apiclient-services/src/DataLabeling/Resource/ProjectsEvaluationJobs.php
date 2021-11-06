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

use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1CreateEvaluationJobRequest;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1EvaluationJob;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1ListEvaluationJobsResponse;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1PauseEvaluationJobRequest;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1ResumeEvaluationJobRequest;
use Google\Service\DataLabeling\GoogleProtobufEmpty;

/**
 * The "evaluationJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google\Service\DataLabeling(...);
 *   $evaluationJobs = $datalabelingService->evaluationJobs;
 *  </code>
 */
class ProjectsEvaluationJobs extends \Google\Service\Resource
{
  /**
   * Creates an evaluation job. (evaluationJobs.create)
   *
   * @param string $parent Required. Evaluation job resource parent. Format:
   * "projects/{project_id}"
   * @param GoogleCloudDatalabelingV1beta1CreateEvaluationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatalabelingV1beta1EvaluationJob
   */
  public function create($parent, GoogleCloudDatalabelingV1beta1CreateEvaluationJobRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDatalabelingV1beta1EvaluationJob::class);
  }
  /**
   * Stops and deletes an evaluation job. (evaluationJobs.delete)
   *
   * @param string $name Required. Name of the evaluation job that is going to be
   * deleted. Format: "projects/{project_id}/evaluationJobs/{evaluation_job_id}"
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
   * Gets an evaluation job by resource name. (evaluationJobs.get)
   *
   * @param string $name Required. Name of the evaluation job. Format:
   * "projects/{project_id} /evaluationJobs/{evaluation_job_id}"
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatalabelingV1beta1EvaluationJob
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatalabelingV1beta1EvaluationJob::class);
  }
  /**
   * Lists all evaluation jobs within a project with possible filters. Pagination
   * is supported. (evaluationJobs.listProjectsEvaluationJobs)
   *
   * @param string $parent Required. Evaluation job resource parent. Format:
   * "projects/{project_id}"
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. You can filter the jobs to list by
   * model_id (also known as model_name, as described in
   * EvaluationJob.modelVersion) or by evaluation job state (as described in
   * EvaluationJob.state). To filter by both criteria, use the `AND` operator or
   * the `OR` operator. For example, you can use the following string for your
   * filter: "evaluation_job.model_id = {model_name} AND evaluation_job.state =
   * {evaluation_job_state}"
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer results than requested. Default value is 100.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * for the server to return. Typically obtained by the nextPageToken in the
   * response to the previous request. The request returns the first page if this
   * is empty.
   * @return GoogleCloudDatalabelingV1beta1ListEvaluationJobsResponse
   */
  public function listProjectsEvaluationJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDatalabelingV1beta1ListEvaluationJobsResponse::class);
  }
  /**
   * Updates an evaluation job. You can only update certain fields of the job's
   * EvaluationJobConfig: `humanAnnotationConfig.instruction`, `exampleCount`, and
   * `exampleSamplePercentage`. If you want to change any other aspect of the
   * evaluation job, you must delete the job and create a new one.
   * (evaluationJobs.patch)
   *
   * @param string $name Output only. After you create a job, Data Labeling
   * Service assigns a name to the job with the following format:
   * "projects/{project_id}/evaluationJobs/ {evaluation_job_id}"
   * @param GoogleCloudDatalabelingV1beta1EvaluationJob $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Mask for which fields to update. You
   * can only provide the following fields: *
   * `evaluationJobConfig.humanAnnotationConfig.instruction` *
   * `evaluationJobConfig.exampleCount` *
   * `evaluationJobConfig.exampleSamplePercentage` You can provide more than one
   * of these fields by separating them with commas.
   * @return GoogleCloudDatalabelingV1beta1EvaluationJob
   */
  public function patch($name, GoogleCloudDatalabelingV1beta1EvaluationJob $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDatalabelingV1beta1EvaluationJob::class);
  }
  /**
   * Pauses an evaluation job. Pausing an evaluation job that is already in a
   * `PAUSED` state is a no-op. (evaluationJobs.pause)
   *
   * @param string $name Required. Name of the evaluation job that is going to be
   * paused. Format: "projects/{project_id}/evaluationJobs/{evaluation_job_id}"
   * @param GoogleCloudDatalabelingV1beta1PauseEvaluationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function pause($name, GoogleCloudDatalabelingV1beta1PauseEvaluationJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('pause', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Resumes a paused evaluation job. A deleted evaluation job can't be resumed.
   * Resuming a running or scheduled evaluation job is a no-op.
   * (evaluationJobs.resume)
   *
   * @param string $name Required. Name of the evaluation job that is going to be
   * resumed. Format: "projects/{project_id}/evaluationJobs/{evaluation_job_id}"
   * @param GoogleCloudDatalabelingV1beta1ResumeEvaluationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function resume($name, GoogleCloudDatalabelingV1beta1ResumeEvaluationJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resume', [$params], GoogleProtobufEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsEvaluationJobs::class, 'Google_Service_DataLabeling_Resource_ProjectsEvaluationJobs');
