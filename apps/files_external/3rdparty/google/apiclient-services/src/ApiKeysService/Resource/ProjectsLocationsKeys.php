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

namespace Google\Service\ApiKeysService\Resource;

use Google\Service\ApiKeysService\Operation;
use Google\Service\ApiKeysService\V2CloneKeyRequest;
use Google\Service\ApiKeysService\V2GetKeyStringResponse;
use Google\Service\ApiKeysService\V2Key;
use Google\Service\ApiKeysService\V2ListKeysResponse;
use Google\Service\ApiKeysService\V2UndeleteKeyRequest;

/**
 * The "keys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apikeysService = new Google\Service\ApiKeysService(...);
 *   $keys = $apikeysService->keys;
 *  </code>
 */
class ProjectsLocationsKeys extends \Google\Service\Resource
{
  /**
   * DEPRECATED: API customers can call `GetKey` and then `CreateKey` methods to
   * create a copy of an existing key. Retire `CloneKey` method to eliminate the
   * unnessary method from API Keys API. Clones the existing key's restriction and
   * display name to a new API key. The service account must have the
   * `apikeys.keys.get` and `apikeys.keys.create` permissions in the project.
   * NOTE: Key is a global resource; hence the only supported value for location
   * is `global`. (keys.cloneProjectsLocationsKeys)
   *
   * @param string $name Required. The resource name of the API key to be cloned
   * in the same project.
   * @param V2CloneKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function cloneProjectsLocationsKeys($name, V2CloneKeyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('clone', [$params], Operation::class);
  }
  /**
   * Creates a new API key. NOTE: Key is a global resource; hence the only
   * supported value for location is `global`. (keys.create)
   *
   * @param string $parent Required. The project in which the API key is created.
   * @param V2Key $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string keyId User specified key id (optional). If specified, it
   * will become the final component of the key resource name. The id must be
   * unique within the project, must conform with RFC-1034, is restricted to
   * lower-cased letters, and has a maximum length of 63 characters. In another
   * word, the id must match the regular expression:
   * `[a-z]([a-z0-9-]{0,61}[a-z0-9])?`. The id must NOT be a UUID-like string.
   * @return Operation
   */
  public function create($parent, V2Key $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes an API key. Deleted key can be retrieved within 30 days of deletion.
   * Afterward, key will be purged from the project. NOTE: Key is a global
   * resource; hence the only supported value for location is `global`.
   * (keys.delete)
   *
   * @param string $name Required. The resource name of the API key to be deleted.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Optional. The etag known to the client for the
   * expected state of the key. This is to be used for optimistic concurrency.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets the metadata for an API key. The key string of the API key isn't
   * included in the response. NOTE: Key is a global resource; hence the only
   * supported value for location is `global`. (keys.get)
   *
   * @param string $name Required. The resource name of the API key to get.
   * @param array $optParams Optional parameters.
   * @return V2Key
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], V2Key::class);
  }
  /**
   * Get the key string for an API key. NOTE: Key is a global resource; hence the
   * only supported value for location is `global`. (keys.getKeyString)
   *
   * @param string $name Required. The resource name of the API key to be
   * retrieved.
   * @param array $optParams Optional parameters.
   * @return V2GetKeyStringResponse
   */
  public function getKeyString($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getKeyString', [$params], V2GetKeyStringResponse::class);
  }
  /**
   * Lists the API keys owned by a project. The key string of the API key isn't
   * included in the response. NOTE: Key is a global resource; hence the only
   * supported value for location is `global`. (keys.listProjectsLocationsKeys)
   *
   * @param string $parent Required. Lists all API keys associated with this
   * project.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Deprecated: Use `show_deleted` instead.
   * Only list keys that conform to the specified filter. The allowed filter
   * strings are `state:ACTIVE` and `state:DELETED`. By default, ListKeys returns
   * only active keys.
   * @opt_param int pageSize Optional. Specifies the maximum number of results to
   * be returned at a time.
   * @opt_param string pageToken Optional. Requests a specific page of results.
   * @opt_param bool showDeleted Optional. Indicate that keys deleted in the past
   * 30 days should also be returned.
   * @return V2ListKeysResponse
   */
  public function listProjectsLocationsKeys($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], V2ListKeysResponse::class);
  }
  /**
   * Patches the modifiable fields of an API key. The key string of the API key
   * isn't included in the response. NOTE: Key is a global resource; hence the
   * only supported value for location is `global`. (keys.patch)
   *
   * @param string $name Output only. The resource name of the key. The `name` has
   * the form: `projects//locations/global/keys/`. For example:
   * `projects/123456867718/locations/global/keys/b7ff1f9f-8275-410a-94dd-
   * 3855ee9b5dd2` NOTE: Key is a global resource; hence the only supported value
   * for location is `global`.
   * @param V2Key $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The field mask specifies which fields to be
   * updated as part of this request. All other fields are ignored. Mutable fields
   * are: `display_name` and `restrictions`. If an update mask is not provided,
   * the service treats it as an implied mask equivalent to all allowed fields
   * that are set on the wire. If the field mask has a special value "*", the
   * service treats it equivalent to replace all allowed mutable fields.
   * @return Operation
   */
  public function patch($name, V2Key $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Undeletes an API key which was deleted within 30 days. NOTE: Key is a global
   * resource; hence the only supported value for location is `global`.
   * (keys.undelete)
   *
   * @param string $name Required. The resource name of the API key to be
   * undeleted.
   * @param V2UndeleteKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function undelete($name, V2UndeleteKeyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsKeys::class, 'Google_Service_ApiKeysService_Resource_ProjectsLocationsKeys');
