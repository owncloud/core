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
 * The "attachments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $attachments = $apigeeService->attachments;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvgroupsAttachments extends Google_Service_Resource
{
  /**
   * Creates a new attachment of an environment to an environment group.
   * (attachments.create)
   *
   * @param string $parent Required. EnvironmentGroup under which to create the
   * attachment in the following format:
   * `organizations/{org}/envgroups/{envgroup}`.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1EnvironmentGroupAttachment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1EnvironmentGroupAttachment $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleLongrunningOperation");
  }
  /**
   * Deletes an environment group attachment. (attachments.delete)
   *
   * @param string $name Required. Name of the environment group attachment to
   * delete in the following format:
   * `organizations/{org}/envgroups/{envgroup}/attachments/{attachment}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleLongrunningOperation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleLongrunningOperation");
  }
  /**
   * Gets an environment group attachment. (attachments.get)
   *
   * @param string $name Required. Name of the environment group attachment in the
   * following format:
   * `organizations/{org}/envgroups/{envgroup}/attachments/{attachment}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1EnvironmentGroupAttachment
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1EnvironmentGroupAttachment");
  }
  /**
   * Lists all attachments of an environment group.
   * (attachments.listOrganizationsEnvgroupsAttachments)
   *
   * @param string $parent Required. Name of the organization in the following
   * format: `organizations/{org}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of environment group attachments to
   * return. The page size defaults to 25.
   * @opt_param string pageToken Page token, returned by a previous
   * ListEnvironmentGroupAttachments call, that you can use to retrieve the next
   * page.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListEnvironmentGroupAttachmentsResponse
   */
  public function listOrganizationsEnvgroupsAttachments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListEnvironmentGroupAttachmentsResponse");
  }
}
