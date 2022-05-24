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

namespace Google\Service\RecaptchaEnterprise\Resource;

use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1Key;
use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1ListKeysResponse;
use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1Metrics;
use Google\Service\RecaptchaEnterprise\GoogleCloudRecaptchaenterpriseV1MigrateKeyRequest;
use Google\Service\RecaptchaEnterprise\GoogleProtobufEmpty;

/**
 * The "keys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recaptchaenterpriseService = new Google\Service\RecaptchaEnterprise(...);
 *   $keys = $recaptchaenterpriseService->keys;
 *  </code>
 */
class ProjectsKeys extends \Google\Service\Resource
{
  /**
   * Creates a new reCAPTCHA Enterprise key. (keys.create)
   *
   * @param string $parent Required. The name of the project in which the key will
   * be created, in the format "projects/{project}".
   * @param GoogleCloudRecaptchaenterpriseV1Key $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecaptchaenterpriseV1Key
   */
  public function create($parent, GoogleCloudRecaptchaenterpriseV1Key $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudRecaptchaenterpriseV1Key::class);
  }
  /**
   * Deletes the specified key. (keys.delete)
   *
   * @param string $name Required. The name of the key to be deleted, in the
   * format "projects/{project}/keys/{key}".
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Returns the specified key. (keys.get)
   *
   * @param string $name Required. The name of the requested key, in the format
   * "projects/{project}/keys/{key}".
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecaptchaenterpriseV1Key
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRecaptchaenterpriseV1Key::class);
  }
  /**
   * Get some aggregated metrics for a Key. This data can be used to build
   * dashboards. (keys.getMetrics)
   *
   * @param string $name Required. The name of the requested metrics, in the
   * format "projects/{project}/keys/{key}/metrics".
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecaptchaenterpriseV1Metrics
   */
  public function getMetrics($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getMetrics', [$params], GoogleCloudRecaptchaenterpriseV1Metrics::class);
  }
  /**
   * Returns the list of all keys that belong to a project.
   * (keys.listProjectsKeys)
   *
   * @param string $parent Required. The name of the project that contains the
   * keys that will be listed, in the format "projects/{project}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of keys to return.
   * Default is 10. Max limit is 1000.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous. ListKeysRequest, if any.
   * @return GoogleCloudRecaptchaenterpriseV1ListKeysResponse
   */
  public function listProjectsKeys($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRecaptchaenterpriseV1ListKeysResponse::class);
  }
  /**
   * Migrates an existing key from reCAPTCHA to reCAPTCHA Enterprise. Once a key
   * is migrated, it can be used from either product. SiteVerify requests are
   * billed as CreateAssessment calls. You must be authenticated as one of the
   * current owners of the reCAPTCHA Site Key, and your user must have the
   * reCAPTCHA Enterprise Admin IAM role in the destination project.
   * (keys.migrate)
   *
   * @param string $name Required. The name of the key to be migrated, in the
   * format "projects/{project}/keys/{key}".
   * @param GoogleCloudRecaptchaenterpriseV1MigrateKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecaptchaenterpriseV1Key
   */
  public function migrate($name, GoogleCloudRecaptchaenterpriseV1MigrateKeyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('migrate', [$params], GoogleCloudRecaptchaenterpriseV1Key::class);
  }
  /**
   * Updates the specified key. (keys.patch)
   *
   * @param string $name The resource name for the Key in the format
   * "projects/{project}/keys/{key}".
   * @param GoogleCloudRecaptchaenterpriseV1Key $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. The mask to control which fields of
   * the key get updated. If the mask is not present, all fields will be updated.
   * @return GoogleCloudRecaptchaenterpriseV1Key
   */
  public function patch($name, GoogleCloudRecaptchaenterpriseV1Key $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudRecaptchaenterpriseV1Key::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsKeys::class, 'Google_Service_RecaptchaEnterprise_Resource_ProjectsKeys');
