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

namespace Google\Service\Iam\Resource;

use Google\Service\Iam\CreateServiceAccountKeyRequest;
use Google\Service\Iam\DisableServiceAccountKeyRequest;
use Google\Service\Iam\EnableServiceAccountKeyRequest;
use Google\Service\Iam\IamEmpty;
use Google\Service\Iam\ListServiceAccountKeysResponse;
use Google\Service\Iam\ServiceAccountKey;
use Google\Service\Iam\UploadServiceAccountKeyRequest;

/**
 * The "keys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iamService = new Google\Service\Iam(...);
 *   $keys = $iamService->keys;
 *  </code>
 */
class ProjectsServiceAccountsKeys extends \Google\Service\Resource
{
  /**
   * Creates a ServiceAccountKey. (keys.create)
   *
   * @param string $name Required. The resource name of the service account in the
   * following format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using
   * `-` as a wildcard for the `PROJECT_ID` will infer the project from the
   * account. The `ACCOUNT` value can be the `email` address or the `unique_id` of
   * the service account.
   * @param CreateServiceAccountKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ServiceAccountKey
   */
  public function create($name, CreateServiceAccountKeyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ServiceAccountKey::class);
  }
  /**
   * Deletes a ServiceAccountKey. Deleting a service account key does not revoke
   * short-lived credentials that have been issued based on the service account
   * key. (keys.delete)
   *
   * @param string $name Required. The resource name of the service account key in
   * the following format:
   * `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}/keys/{key}`. Using `-` as a
   * wildcard for the `PROJECT_ID` will infer the project from the account. The
   * `ACCOUNT` value can be the `email` address or the `unique_id` of the service
   * account.
   * @param array $optParams Optional parameters.
   * @return IamEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], IamEmpty::class);
  }
  /**
   * Disable a ServiceAccountKey. A disabled service account key can be enabled
   * through EnableServiceAccountKey. (keys.disable)
   *
   * @param string $name Required. The resource name of the service account key in
   * the following format:
   * `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}/keys/{key}`. Using `-` as a
   * wildcard for the `PROJECT_ID` will infer the project from the account. The
   * `ACCOUNT` value can be the `email` address or the `unique_id` of the service
   * account.
   * @param DisableServiceAccountKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IamEmpty
   */
  public function disable($name, DisableServiceAccountKeyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('disable', [$params], IamEmpty::class);
  }
  /**
   * Enable a ServiceAccountKey. (keys.enable)
   *
   * @param string $name Required. The resource name of the service account key in
   * the following format:
   * `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}/keys/{key}`. Using `-` as a
   * wildcard for the `PROJECT_ID` will infer the project from the account. The
   * `ACCOUNT` value can be the `email` address or the `unique_id` of the service
   * account.
   * @param EnableServiceAccountKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IamEmpty
   */
  public function enable($name, EnableServiceAccountKeyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('enable', [$params], IamEmpty::class);
  }
  /**
   * Gets a ServiceAccountKey. (keys.get)
   *
   * @param string $name Required. The resource name of the service account key in
   * the following format:
   * `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}/keys/{key}`. Using `-` as a
   * wildcard for the `PROJECT_ID` will infer the project from the account. The
   * `ACCOUNT` value can be the `email` address or the `unique_id` of the service
   * account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string publicKeyType The output format of the public key
   * requested. X509_PEM is the default output format.
   * @return ServiceAccountKey
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ServiceAccountKey::class);
  }
  /**
   * Lists every ServiceAccountKey for a service account.
   * (keys.listProjectsServiceAccountsKeys)
   *
   * @param string $name Required. The resource name of the service account in the
   * following format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using
   * `-` as a wildcard for the `PROJECT_ID`, will infer the project from the
   * account. The `ACCOUNT` value can be the `email` address or the `unique_id` of
   * the service account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string keyTypes Filters the types of keys the user wants to
   * include in the list response. Duplicate key types are not allowed. If no key
   * type is provided, all keys are returned.
   * @return ListServiceAccountKeysResponse
   */
  public function listProjectsServiceAccountsKeys($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListServiceAccountKeysResponse::class);
  }
  /**
   * Creates a ServiceAccountKey, using a public key that you provide.
   * (keys.upload)
   *
   * @param string $name The resource name of the service account in the following
   * format: `projects/{PROJECT_ID}/serviceAccounts/{ACCOUNT}`. Using `-` as a
   * wildcard for the `PROJECT_ID` will infer the project from the account. The
   * `ACCOUNT` value can be the `email` address or the `unique_id` of the service
   * account.
   * @param UploadServiceAccountKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ServiceAccountKey
   */
  public function upload($name, UploadServiceAccountKeyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('upload', [$params], ServiceAccountKey::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsServiceAccountsKeys::class, 'Google_Service_Iam_Resource_ProjectsServiceAccountsKeys');
