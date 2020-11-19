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
 * The "domainmappings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google_Service_CloudRun(...);
 *   $domainmappings = $runService->domainmappings;
 *  </code>
 */
class Google_Service_CloudRun_Resource_NamespacesDomainmappings extends Google_Service_Resource
{
  /**
   * Create a new domain mapping. (domainmappings.create)
   *
   * @param string $parent The namespace in which the domain mapping should be
   * created. For Cloud Run (fully managed), replace {namespace_id} with the
   * project ID or number.
   * @param Google_Service_CloudRun_DomainMapping $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRun_DomainMapping
   */
  public function create($parent, Google_Service_CloudRun_DomainMapping $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudRun_DomainMapping");
  }
  /**
   * Delete a domain mapping. (domainmappings.delete)
   *
   * @param string $name The name of the domain mapping to delete. For Cloud Run
   * (fully managed), replace {namespace_id} with the project ID or number.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string propagationPolicy Specifies the propagation policy of
   * delete. Cloud Run currently ignores this setting, and deletes in the
   * background. Please see kubernetes.io/docs/concepts/workloads/controllers
   * /garbage-collection/ for more information.
   * @opt_param string kind Cloud Run currently ignores this parameter.
   * @opt_param string apiVersion Cloud Run currently ignores this parameter.
   * @return Google_Service_CloudRun_Status
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudRun_Status");
  }
  /**
   * Get information about a domain mapping. (domainmappings.get)
   *
   * @param string $name The name of the domain mapping to retrieve. For Cloud Run
   * (fully managed), replace {namespace_id} with the project ID or number.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRun_DomainMapping
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudRun_DomainMapping");
  }
  /**
   * List domain mappings. (domainmappings.listNamespacesDomainmappings)
   *
   * @param string $parent The namespace from which the domain mappings should be
   * listed. For Cloud Run (fully managed), replace {namespace_id} with the
   * project ID or number.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string labelSelector Allows to filter resources based on a label.
   * Supported operations are =, !=, exists, in, and notIn.
   * @opt_param int limit The maximum number of records that should be returned.
   * @opt_param bool watch Flag that indicates that the client expects to watch
   * this resource as well. Not currently used by Cloud Run.
   * @opt_param string fieldSelector Allows to filter resources based on a
   * specific value for a field name. Send this in a query string format. i.e.
   * 'metadata.name%3Dlorem'. Not currently used by Cloud Run.
   * @opt_param string resourceVersion The baseline resource version from which
   * the list or watch operation should start. Not currently used by Cloud Run.
   * @opt_param bool includeUninitialized Not currently used by Cloud Run.
   * @opt_param string continue Optional encoded string to continue paging.
   * @return Google_Service_CloudRun_ListDomainMappingsResponse
   */
  public function listNamespacesDomainmappings($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudRun_ListDomainMappingsResponse");
  }
}
