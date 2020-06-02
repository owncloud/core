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
 * The "serviceLevelObjectives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $serviceLevelObjectives = $monitoringService->serviceLevelObjectives;
 *  </code>
 */
class Google_Service_Monitoring_Resource_ServicesServiceLevelObjectives extends Google_Service_Resource
{
  /**
   * Create a ServiceLevelObjective for the given Service.
   * (serviceLevelObjectives.create)
   *
   * @param string $parent Required. Resource name of the parent Service. The
   * format is: projects/[PROJECT_ID_OR_NUMBER]/services/[SERVICE_ID]
   * @param Google_Service_Monitoring_ServiceLevelObjective $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string serviceLevelObjectiveId Optional. The ServiceLevelObjective
   * id to use for this ServiceLevelObjective. If omitted, an id will be generated
   * instead. Must match the pattern [a-z0-9\-]+
   * @return Google_Service_Monitoring_ServiceLevelObjective
   */
  public function create($parent, Google_Service_Monitoring_ServiceLevelObjective $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_ServiceLevelObjective");
  }
  /**
   * Delete the given ServiceLevelObjective. (serviceLevelObjectives.delete)
   *
   * @param string $name Required. Resource name of the ServiceLevelObjective to
   * delete. The format is: projects/[PROJECT_ID_OR_NUMBER]/services/[SERVICE_ID]/
   * serviceLevelObjectives/[SLO_NAME]
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_MonitoringEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Monitoring_MonitoringEmpty");
  }
  /**
   * Get a ServiceLevelObjective by name. (serviceLevelObjectives.get)
   *
   * @param string $name Required. Resource name of the ServiceLevelObjective to
   * get. The format is: projects/[PROJECT_ID_OR_NUMBER]/services/[SERVICE_ID]/ser
   * viceLevelObjectives/[SLO_NAME]
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view View of the ServiceLevelObjective to return. If
   * DEFAULT, return the ServiceLevelObjective as originally defined. If EXPLICIT
   * and the ServiceLevelObjective is defined in terms of a BasicSli, replace the
   * BasicSli with a RequestBasedSli spelling out how the SLI is computed.
   * @return Google_Service_Monitoring_ServiceLevelObjective
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Monitoring_ServiceLevelObjective");
  }
  /**
   * List the ServiceLevelObjectives for the given Service.
   * (serviceLevelObjectives.listServicesServiceLevelObjectives)
   *
   * @param string $parent Required. Resource name of the parent containing the
   * listed SLOs, either a project or a Monitoring Workspace. The formats are:
   * projects/[PROJECT_ID_OR_NUMBER]/services/[SERVICE_ID]
   * workspaces/[HOST_PROJECT_ID_OR_NUMBER]/services/-
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view View of the ServiceLevelObjectives to return. If
   * DEFAULT, return each ServiceLevelObjective as originally defined. If EXPLICIT
   * and the ServiceLevelObjective is defined in terms of a BasicSli, replace the
   * BasicSli with a RequestBasedSli spelling out how the SLI is computed.
   * @opt_param string filter A filter specifying what ServiceLevelObjectives to
   * return.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @opt_param int pageSize A non-negative number that is the maximum number of
   * results to return. When 0, use default page size.
   * @return Google_Service_Monitoring_ListServiceLevelObjectivesResponse
   */
  public function listServicesServiceLevelObjectives($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Monitoring_ListServiceLevelObjectivesResponse");
  }
  /**
   * Update the given ServiceLevelObjective. (serviceLevelObjectives.patch)
   *
   * @param string $name Resource name for this ServiceLevelObjective. The format
   * is: projects/[PROJECT_ID_OR_NUMBER]/services/[SERVICE_ID]/serviceLevelObjecti
   * ves/[SLO_NAME]
   * @param Google_Service_Monitoring_ServiceLevelObjective $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A set of field paths defining which fields to
   * use for the update.
   * @return Google_Service_Monitoring_ServiceLevelObjective
   */
  public function patch($name, Google_Service_Monitoring_ServiceLevelObjective $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Monitoring_ServiceLevelObjective");
  }
}
