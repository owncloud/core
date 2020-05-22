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
 * The "sql" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $sql = $dataflowService->sql;
 *  </code>
 */
class Google_Service_Dataflow_Resource_ProjectsLocationsSql extends Google_Service_Resource
{
  /**
   * Validates a GoogleSQL query for Cloud Dataflow syntax. Will always confirm
   * the given query parses correctly, and if able to look up schema information
   * from DataCatalog, will validate that the query analyzes properly as well.
   * (sql.validate)
   *
   * @param string $projectId Required. The ID of the Cloud Platform project that
   * the job belongs to.
   * @param string $location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) to which
   * to direct the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string query The sql query to validate.
   * @return Google_Service_Dataflow_ValidateResponse
   */
  public function validate($projectId, $location, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'location' => $location);
    $params = array_merge($params, $optParams);
    return $this->call('validate', array($params), "Google_Service_Dataflow_ValidateResponse");
  }
}
