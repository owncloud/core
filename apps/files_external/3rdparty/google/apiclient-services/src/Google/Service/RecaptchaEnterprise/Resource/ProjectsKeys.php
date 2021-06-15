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
 * The "keys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recaptchaenterpriseService = new Google_Service_RecaptchaEnterprise(...);
 *   $keys = $recaptchaenterpriseService->keys;
 *  </code>
 */
class Google_Service_RecaptchaEnterprise_Resource_ProjectsKeys extends Google_Service_Resource
{
  /**
   * Creates a new reCAPTCHA Enterprise key. (keys.create)
   *
   * @param string $parent Required. The name of the project in which the key will
   * be created, in the format "projects/{project}".
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key
   */
  public function create($parent, Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key");
  }
  /**
   * Deletes the specified key. (keys.delete)
   *
   * @param string $name Required. The name of the key to be deleted, in the
   * format "projects/{project}/keys/{key}".
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecaptchaEnterprise_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_RecaptchaEnterprise_GoogleProtobufEmpty");
  }
  /**
   * Returns the specified key. (keys.get)
   *
   * @param string $name Required. The name of the requested key, in the format
   * "projects/{project}/keys/{key}".
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key");
  }
  /**
   * Get some aggregated metrics for a Key. This data can be used to build
   * dashboards. (keys.getMetrics)
   *
   * @param string $name Required. The name of the requested metrics, in the
   * format "projects/{project}/keys/{key}/metrics".
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Metrics
   */
  public function getMetrics($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getMetrics', array($params), "Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Metrics");
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
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ListKeysResponse
   */
  public function listProjectsKeys($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ListKeysResponse");
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
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1MigrateKeyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key
   */
  public function migrate($name, Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1MigrateKeyRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('migrate', array($params), "Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key");
  }
  /**
   * Updates the specified key. (keys.patch)
   *
   * @param string $name The resource name for the Key in the format
   * "projects/{project}/keys/{key}".
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. The mask to control which fields of
   * the key get updated. If the mask is not present, all fields will be updated.
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key
   */
  public function patch($name, Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Key");
  }
}
