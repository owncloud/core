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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\Apk;
use Google\Service\AndroidPublisher\ApksAddExternallyHostedRequest;
use Google\Service\AndroidPublisher\ApksAddExternallyHostedResponse;
use Google\Service\AndroidPublisher\ApksListResponse;

/**
 * The "apks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $apks = $androidpublisherService->apks;
 *  </code>
 */
class EditsApks extends \Google\Service\Resource
{
  /**
   * Creates a new APK without uploading the APK itself to Google Play, instead
   * hosting the APK at a specified URL. This function is only available to
   * organizations using Managed Play whose application is configured to restrict
   * distribution to the organizations. (apks.addexternallyhosted)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param ApksAddExternallyHostedRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ApksAddExternallyHostedResponse
   */
  public function addexternallyhosted($packageName, $editId, ApksAddExternallyHostedRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addexternallyhosted', [$params], ApksAddExternallyHostedResponse::class);
  }
  /**
   * Lists all current APKs of the app and edit. (apks.listEditsApks)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return ApksListResponse
   */
  public function listEditsApks($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ApksListResponse::class);
  }
  /**
   * Uploads an APK and adds to the current edit. (apks.upload)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return Apk
   */
  public function upload($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('upload', [$params], Apk::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditsApks::class, 'Google_Service_AndroidPublisher_Resource_EditsApks');
