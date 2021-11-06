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

namespace Google\Service\CloudShell\Resource;

use Google\Service\CloudShell\AddPublicKeyRequest;
use Google\Service\CloudShell\AuthorizeEnvironmentRequest;
use Google\Service\CloudShell\Environment;
use Google\Service\CloudShell\Operation;
use Google\Service\CloudShell\RemovePublicKeyRequest;
use Google\Service\CloudShell\StartEnvironmentRequest;

/**
 * The "environments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudshellService = new Google\Service\CloudShell(...);
 *   $environments = $cloudshellService->environments;
 *  </code>
 */
class UsersEnvironments extends \Google\Service\Resource
{
  /**
   * Adds a public SSH key to an environment, allowing clients with the
   * corresponding private key to connect to that environment via SSH. If a key
   * with the same content already exists, this will error with ALREADY_EXISTS.
   * (environments.addPublicKey)
   *
   * @param string $environment Environment this key should be added to, e.g.
   * `users/me/environments/default`.
   * @param AddPublicKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function addPublicKey($environment, AddPublicKeyRequest $postBody, $optParams = [])
  {
    $params = ['environment' => $environment, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addPublicKey', [$params], Operation::class);
  }
  /**
   * Sends OAuth credentials to a running environment on behalf of a user. When
   * this completes, the environment will be authorized to run various Google
   * Cloud command line tools without requiring the user to manually authenticate.
   * (environments.authorize)
   *
   * @param string $name Name of the resource that should receive the credentials,
   * for example `users/me/environments/default` or
   * `users/someone@example.com/environments/default`.
   * @param AuthorizeEnvironmentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function authorize($name, AuthorizeEnvironmentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('authorize', [$params], Operation::class);
  }
  /**
   * Gets an environment. Returns NOT_FOUND if the environment does not exist.
   * (environments.get)
   *
   * @param string $name Required. Name of the requested resource, for example
   * `users/me/environments/default` or
   * `users/someone@example.com/environments/default`.
   * @param array $optParams Optional parameters.
   * @return Environment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Environment::class);
  }
  /**
   * Removes a public SSH key from an environment. Clients will no longer be able
   * to connect to the environment using the corresponding private key. If a key
   * with the same content is not present, this will error with NOT_FOUND.
   * (environments.removePublicKey)
   *
   * @param string $environment Environment this key should be removed from, e.g.
   * `users/me/environments/default`.
   * @param RemovePublicKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function removePublicKey($environment, RemovePublicKeyRequest $postBody, $optParams = [])
  {
    $params = ['environment' => $environment, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removePublicKey', [$params], Operation::class);
  }
  /**
   * Starts an existing environment, allowing clients to connect to it. The
   * returned operation will contain an instance of StartEnvironmentMetadata in
   * its metadata field. Users can wait for the environment to start by polling
   * this operation via GetOperation. Once the environment has finished starting
   * and is ready to accept connections, the operation will contain a
   * StartEnvironmentResponse in its response field. (environments.start)
   *
   * @param string $name Name of the resource that should be started, for example
   * `users/me/environments/default` or
   * `users/someone@example.com/environments/default`.
   * @param StartEnvironmentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function start($name, StartEnvironmentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('start', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersEnvironments::class, 'Google_Service_CloudShell_Resource_UsersEnvironments');
