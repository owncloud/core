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

use Google\Service\AndroidPublisher\ExpansionFile;
use Google\Service\AndroidPublisher\ExpansionFilesUploadResponse;

/**
 * The "expansionfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $expansionfiles = $androidpublisherService->expansionfiles;
 *  </code>
 */
class EditsExpansionfiles extends \Google\Service\Resource
{
  /**
   * Fetches the expansion file configuration for the specified APK.
   * (expansionfiles.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param int $apkVersionCode The version code of the APK whose expansion file
   * configuration is being read or modified.
   * @param string $expansionFileType The file type of the file configuration
   * which is being read or modified.
   * @param array $optParams Optional parameters.
   * @return ExpansionFile
   */
  public function get($packageName, $editId, $apkVersionCode, $expansionFileType, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'expansionFileType' => $expansionFileType];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ExpansionFile::class);
  }
  /**
   * Patches the APK's expansion file configuration to reference another APK's
   * expansion file. To add a new expansion file use the Upload method.
   * (expansionfiles.patch)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param int $apkVersionCode The version code of the APK whose expansion file
   * configuration is being read or modified.
   * @param string $expansionFileType The file type of the expansion file
   * configuration which is being updated.
   * @param ExpansionFile $postBody
   * @param array $optParams Optional parameters.
   * @return ExpansionFile
   */
  public function patch($packageName, $editId, $apkVersionCode, $expansionFileType, ExpansionFile $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'expansionFileType' => $expansionFileType, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ExpansionFile::class);
  }
  /**
   * Updates the APK's expansion file configuration to reference another APK's
   * expansion file. To add a new expansion file use the Upload method.
   * (expansionfiles.update)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param int $apkVersionCode The version code of the APK whose expansion file
   * configuration is being read or modified.
   * @param string $expansionFileType The file type of the file configuration
   * which is being read or modified.
   * @param ExpansionFile $postBody
   * @param array $optParams Optional parameters.
   * @return ExpansionFile
   */
  public function update($packageName, $editId, $apkVersionCode, $expansionFileType, ExpansionFile $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'expansionFileType' => $expansionFileType, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ExpansionFile::class);
  }
  /**
   * Uploads a new expansion file and attaches to the specified APK.
   * (expansionfiles.upload)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param int $apkVersionCode The version code of the APK whose expansion file
   * configuration is being read or modified.
   * @param string $expansionFileType The file type of the expansion file
   * configuration which is being updated.
   * @param array $optParams Optional parameters.
   * @return ExpansionFilesUploadResponse
   */
  public function upload($packageName, $editId, $apkVersionCode, $expansionFileType, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'expansionFileType' => $expansionFileType];
    $params = array_merge($params, $optParams);
    return $this->call('upload', [$params], ExpansionFilesUploadResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditsExpansionfiles::class, 'Google_Service_AndroidPublisher_Resource_EditsExpansionfiles');
