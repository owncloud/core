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
 * The "hmacKeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $hmacKeys = $storageService->hmacKeys;
 *  </code>
 */
class Google_Service_Storage_Resource_ProjectsHmacKeys extends Google_Service_Resource
{
  /**
   * Creates a new HMAC key for the specified service account. (hmacKeys.create)
   *
   * @param string $projectId Project ID owning the service account.
   * @param string $serviceAccountEmail Email address of the service account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * @return Google_Service_Storage_HmacKey
   */
  public function create($projectId, $serviceAccountEmail, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'serviceAccountEmail' => $serviceAccountEmail);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Storage_HmacKey");
  }
  /**
   * Deletes an HMAC key. (hmacKeys.delete)
   *
   * @param string $projectId Project ID owning the requested key
   * @param string $accessId Name of the HMAC key to be deleted.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   */
  public function delete($projectId, $accessId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'accessId' => $accessId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves an HMAC key's metadata (hmacKeys.get)
   *
   * @param string $projectId Project ID owning the service account of the
   * requested key.
   * @param string $accessId Name of the HMAC key.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * @return Google_Service_Storage_HmacKeyMetadata
   */
  public function get($projectId, $accessId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'accessId' => $accessId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Storage_HmacKeyMetadata");
  }
  /**
   * Retrieves a list of HMAC keys matching the criteria.
   * (hmacKeys.listProjectsHmacKeys)
   *
   * @param string $projectId Name of the project in which to look for HMAC keys.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of items to return in a single
   * page of responses. The service uses this parameter or 250 items, whichever is
   * smaller. The max number of items per page will also be limited by the number
   * of distinct service accounts in the response. If the number of service
   * accounts in a single response is too high, the page will truncated and a next
   * page token will be returned.
   * @opt_param string pageToken A previously-returned page token representing
   * part of the larger set of results to view.
   * @opt_param string serviceAccountEmail If present, only keys for the given
   * service account are returned.
   * @opt_param bool showDeletedKeys Whether or not to show keys in the DELETED
   * state.
   * @opt_param string userProject The project to be billed for this request.
   * @return Google_Service_Storage_HmacKeysMetadata
   */
  public function listProjectsHmacKeys($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Storage_HmacKeysMetadata");
  }
  /**
   * Updates the state of an HMAC key. See the HMAC Key resource descriptor for
   * valid states. (hmacKeys.update)
   *
   * @param string $projectId Project ID owning the service account of the updated
   * key.
   * @param string $accessId Name of the HMAC key being updated.
   * @param Google_Service_Storage_HmacKeyMetadata $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * @return Google_Service_Storage_HmacKeyMetadata
   */
  public function update($projectId, $accessId, Google_Service_Storage_HmacKeyMetadata $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'accessId' => $accessId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Storage_HmacKeyMetadata");
  }
}
