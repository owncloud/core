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

namespace Google\Service\DisplayVideo\Resource;

use Google\Service\DisplayVideo\GoogleBytestreamMedia;

/**
 * The "media" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $media = $displayvideoService->media;
 *  </code>
 */
class Media extends \Google\Service\Resource
{
  /**
   * Downloads media. Download is supported on the URI
   * `/download/{resource_name=**}?alt=media.` **Note**: Download requests will
   * not be successful without including `alt=media` query string.
   * (media.download)
   *
   * @param string $resourceName Name of the media that is being downloaded. See
   * ReadRequest.resource_name.
   * @param array $optParams Optional parameters.
   * @return GoogleBytestreamMedia
   */
  public function download($resourceName, $optParams = [])
  {
    $params = ['resourceName' => $resourceName];
    $params = array_merge($params, $optParams);
    return $this->call('download', [$params], GoogleBytestreamMedia::class);
  }
  /**
   * Uploads media. Upload is supported on the URI
   * `/upload/media/{resource_name=**}?upload_type=media.` **Note**: Upload
   * requests will not be successful without including `upload_type=media` query
   * string. (media.upload)
   *
   * @param string $resourceName Name of the media that is being downloaded. See
   * ReadRequest.resource_name.
   * @param GoogleBytestreamMedia $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleBytestreamMedia
   */
  public function upload($resourceName, GoogleBytestreamMedia $postBody, $optParams = [])
  {
    $params = ['resourceName' => $resourceName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('upload', [$params], GoogleBytestreamMedia::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Media::class, 'Google_Service_DisplayVideo_Resource_Media');
