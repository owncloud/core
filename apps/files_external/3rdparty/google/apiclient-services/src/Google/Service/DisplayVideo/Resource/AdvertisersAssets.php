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
 * The "assets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $assets = $displayvideoService->assets;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_AdvertisersAssets extends Google_Service_Resource
{
  /**
   * Uploads an asset. Returns the ID of the newly uploaded asset if successful.
   * The asset file size should be no more than 10 MB for images, 200 MB for ZIP
   * files, and 1 GB for videos. (assets.upload)
   *
   * @param string $advertiserId Required. The ID of the advertiser this asset
   * belongs to.
   * @param Google_Service_DisplayVideo_CreateAssetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_CreateAssetResponse
   */
  public function upload($advertiserId, Google_Service_DisplayVideo_CreateAssetRequest $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_DisplayVideo_CreateAssetResponse");
  }
}
