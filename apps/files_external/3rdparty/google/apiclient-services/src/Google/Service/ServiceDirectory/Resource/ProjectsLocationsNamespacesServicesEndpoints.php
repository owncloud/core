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
 * The "endpoints" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicedirectoryService = new Google_Service_ServiceDirectory(...);
 *   $endpoints = $servicedirectoryService->endpoints;
 *  </code>
 */
class Google_Service_ServiceDirectory_Resource_ProjectsLocationsNamespacesServicesEndpoints extends Google_Service_Resource
{
  /**
   * Creates a endpoint, and returns the new Endpoint. (endpoints.create)
   *
   * @param string $parent Required. The resource name of the service that this
   * endpoint provides.
   * @param Google_Service_ServiceDirectory_Endpoint $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endpointId Required. The Resource ID must be 1-63
   * characters long, and comply with RFC1035. Specifically, the name must be 1-63
   * characters long and match the regular expression
   * `[a-z](?:[-a-z0-9]{0,61}[a-z0-9])?` which means the first character must be a
   * lowercase letter, and all following characters must be a dash, lowercase
   * letter, or digit, except the last character, which cannot be a dash.
   * @return Google_Service_ServiceDirectory_Endpoint
   */
  public function create($parent, Google_Service_ServiceDirectory_Endpoint $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ServiceDirectory_Endpoint");
  }
  /**
   * Deletes a endpoint. (endpoints.delete)
   *
   * @param string $name Required. The name of the endpoint to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceDirectory_ServicedirectoryEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ServiceDirectory_ServicedirectoryEmpty");
  }
  /**
   * Gets a endpoint. (endpoints.get)
   *
   * @param string $name Required. The name of the endpoint to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceDirectory_Endpoint
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ServiceDirectory_Endpoint");
  }
  /**
   * Lists all endpoints.
   * (endpoints.listProjectsLocationsNamespacesServicesEndpoints)
   *
   * @param string $parent Required. The resource name of the service whose
   * endpoints we'd like to list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to list result by.
   *
   * General filter string syntax:    ()  can be "name", "address", "port" or
   * "metadata." for map field.  can be "<, >, <=, >=, !=, =, :". Of which ":"
   * means HAS, and is roughly the same as "=".  must be the same data type as
   * field.  can be "AND, OR, NOT".
   *
   * Examples of valid filters: * "metadata.owner" returns Endpoints that have a
   * label with the key "owner"   this is the same as "metadata:owner". *
   * "metadata.protocol=gRPC" returns Endpoints that have key/value
   * "protocol=gRPC". * "address=192.108.1.105" returns Endpoints that have this
   * address. * "port>8080" returns Endpoints that have port number larger than
   * 8080. * "name>projects/my-project/locations/us-east/namespaces/my-
   * namespace/services/my-service/endpoints/endpoint-c"   returns Endpoints that
   * have name that is alphabetically later than the   string, so "endpoint-e"
   * will be returned but "endpoint-a" will not be. * "metadata.owner!=sd AND
   * metadata.foo=bar" returns Endpoints that have   "owner" in label key but
   * value is not "sd" AND have key/value foo=bar. * "doesnotexist.foo=bar"
   * returns an empty list. Note that Endpoint doesn't   have a field called
   * "doesnotexist". Since the filter does not match any   Endpoints, it returns
   * no results.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @opt_param string orderBy Optional. The order to list result by.
   * @opt_param int pageSize Optional. The maximum number of items to return.
   * @return Google_Service_ServiceDirectory_ListEndpointsResponse
   */
  public function listProjectsLocationsNamespacesServicesEndpoints($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ServiceDirectory_ListEndpointsResponse");
  }
  /**
   * Updates a endpoint. (endpoints.patch)
   *
   * @param string $name Immutable. The resource name for the endpoint in the
   * format 'projects/locations/namespaces/services/endpoints'.
   * @param Google_Service_ServiceDirectory_Endpoint $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. List of fields to be updated in this
   * request.
   * @return Google_Service_ServiceDirectory_Endpoint
   */
  public function patch($name, Google_Service_ServiceDirectory_Endpoint $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ServiceDirectory_Endpoint");
  }
}
