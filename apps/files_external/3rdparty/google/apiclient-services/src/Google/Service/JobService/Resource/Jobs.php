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
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $jobsService = new Google_Service_JobService(...);
 *   $jobs = $jobsService->jobs;
 *  </code>
 */
class Google_Service_JobService_Resource_Jobs extends Google_Service_Resource
{
  /**
   * Deletes a list of Job postings by filter. (jobs.batchDelete)
   *
   * @param Google_Service_JobService_BatchDeleteJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_JobService_JobsEmpty
   */
  public function batchDelete(Google_Service_JobService_BatchDeleteJobsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_JobService_JobsEmpty");
  }
  /**
   * Creates a new job.
   *
   * Typically, the job becomes searchable within 10 seconds, but it may take up
   * to 5 minutes. (jobs.create)
   *
   * @param Google_Service_JobService_CreateJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_JobService_Job
   */
  public function create(Google_Service_JobService_CreateJobRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_JobService_Job");
  }
  /**
   * Deletes the specified job.
   *
   * Typically, the job becomes unsearchable within 10 seconds, but it may take up
   * to 5 minutes. (jobs.delete)
   *
   * @param string $name Required.
   *
   * The resource name of the job to be deleted, such as "jobs/11111111".
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool disableFastProcess Deprecated. This field is not working
   * anymore.
   *
   * Optional.
   *
   * If set to true, this call waits for all processing steps to complete before
   * the job is cleaned up. Otherwise, the call returns while some steps are still
   * taking place asynchronously, hence faster.
   * @return Google_Service_JobService_JobsEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_JobService_JobsEmpty");
  }
  /**
   * Deprecated. Use BatchDeleteJobs instead.
   *
   * Deletes the specified job by filter. You can specify whether to synchronously
   * wait for validation, indexing, and general processing to be completed before
   * the response is returned. (jobs.deleteByFilter)
   *
   * @param Google_Service_JobService_DeleteJobsByFilterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_JobService_JobsEmpty
   */
  public function deleteByFilter(Google_Service_JobService_DeleteJobsByFilterRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deleteByFilter', array($params), "Google_Service_JobService_JobsEmpty");
  }
  /**
   * Retrieves the specified job, whose status is OPEN or recently EXPIRED within
   * the last 90 days. (jobs.get)
   *
   * @param string $name Required.
   *
   * The resource name of the job to retrieve, such as "jobs/11111111".
   * @param array $optParams Optional parameters.
   * @return Google_Service_JobService_Job
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_JobService_Job");
  }
  /**
   * Deprecated. Use SearchJobsRequest.histogram_facets instead to make a single
   * call with both search and histogram.
   *
   * Retrieves a histogram for the given GetHistogramRequest. This call provides a
   * structured count of jobs that match against the search query, grouped by
   * specified facets.
   *
   * This call constrains the visibility of jobs present in the database, and only
   * counts jobs the caller has permission to search against.
   *
   * For example, use this call to generate the number of jobs in the U.S. by
   * state. (jobs.histogram)
   *
   * @param Google_Service_JobService_GetHistogramRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_JobService_GetHistogramResponse
   */
  public function histogram(Google_Service_JobService_GetHistogramRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('histogram', array($params), "Google_Service_JobService_GetHistogramResponse");
  }
  /**
   * Lists jobs by filter. (jobs.listJobs)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Required.
   *
   * The filter string specifies the jobs to be enumerated.
   *
   * Supported operator: =, AND
   *
   * The fields eligible for filtering are:
   *
   * * `companyName` (Required) * `requisitionId` (Optional)
   *
   * Sample Query:
   *
   * * companyName = "companies/123" * companyName = "companies/123" AND
   * requisitionId = "req-1"
   * @opt_param string pageToken Optional.
   *
   * The starting point of a query result.
   * @opt_param int pageSize Optional.
   *
   * The maximum number of jobs to be returned per page of results.
   *
   * If ids_only is set to true, the maximum allowed page size is 1000. Otherwise,
   * the maximum allowed page size is 100.
   *
   * Default is 100 if empty or a number < 1 is specified.
   * @opt_param bool idsOnly Optional.
   *
   * If set to `true`, only Job.name, Job.requisition_id and Job.language_code
   * will be returned.
   *
   * A typical use case is to synchronize job repositories.
   *
   * Defaults to false.
   * @return Google_Service_JobService_ListJobsResponse
   */
  public function listJobs($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_JobService_ListJobsResponse");
  }
  /**
   * Updates specified job.
   *
   * Typically, updated contents become visible in search results within 10
   * seconds, but it may take up to 5 minutes. (jobs.patch)
   *
   * @param string $name Required during job update.
   *
   * Resource name assigned to a job by the API, for example, "/jobs/foo". Use of
   * this field in job queries and API calls is preferred over the use of
   * requisition_id since this value is unique.
   * @param Google_Service_JobService_UpdateJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_JobService_Job
   */
  public function patch($name, Google_Service_JobService_UpdateJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_JobService_Job");
  }
  /**
   * Searches for jobs using the provided SearchJobsRequest.
   *
   * This call constrains the visibility of jobs present in the database, and only
   * returns jobs that the caller has permission to search against. (jobs.search)
   *
   * @param Google_Service_JobService_SearchJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_JobService_SearchJobsResponse
   */
  public function search(Google_Service_JobService_SearchJobsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_JobService_SearchJobsResponse");
  }
  /**
   * Searches for jobs using the provided SearchJobsRequest.
   *
   * This API call is intended for the use case of targeting passive job seekers
   * (for example, job seekers who have signed up to receive email alerts about
   * potential job opportunities), and has different algorithmic adjustments that
   * are targeted to passive job seekers.
   *
   * This call constrains the visibility of jobs present in the database, and only
   * returns jobs the caller has permission to search against.
   * (jobs.searchForAlert)
   *
   * @param Google_Service_JobService_SearchJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_JobService_SearchJobsResponse
   */
  public function searchForAlert(Google_Service_JobService_SearchJobsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('searchForAlert', array($params), "Google_Service_JobService_SearchJobsResponse");
  }
}
