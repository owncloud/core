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
 * The "media" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google_Service_CloudSearch(...);
 *   $media = $cloudsearchService->media;
 *  </code>
 */
class Google_Service_CloudSearch_Resource_Media extends Google_Service_Resource
{
  /**
   * Uploads media for indexing. The upload endpoint supports direct and resumable
   * upload protocols and is intended for large items that can not be [inlined
   * during index requests](https://developers.google.com/cloud-
   * search/docs/reference/rest/v1/indexing.datasources.items#itemcontent). To
   * index large content: 1. Call indexing.datasources.items.upload with the item
   * name to begin an upload session and retrieve the UploadItemRef. 1. Call
   * media.upload to upload the content, as a streaming request, using the same
   * resource name from the UploadItemRef from step 1. 1. Call
   * indexing.datasources.items.index to index the item. Populate the [ItemContent
   * ](/cloud-
   * search/docs/reference/rest/v1/indexing.datasources.items#ItemContent) with
   * the UploadItemRef from step 1. For additional information, see [Create a
   * content connector using the REST API](https://developers.google.com/cloud-
   * search/docs/guides/content-connector#rest). **Note:** This API requires a
   * service account to execute. (media.upload)
   *
   * @param string $resourceName Name of the media that is being downloaded. See
   * ReadRequest.resource_name.
   * @param Google_Service_CloudSearch_Media $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSearch_Media
   */
  public function upload($resourceName, Google_Service_CloudSearch_Media $postBody, $optParams = array())
  {
    $params = array('resourceName' => $resourceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_CloudSearch_Media");
  }
}
