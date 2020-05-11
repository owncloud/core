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
 * The "sdfdownloadtasks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $sdfdownloadtasks = $displayvideoService->sdfdownloadtasks;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_Sdfdownloadtasks extends Google_Service_Resource
{
  /**
   * Creates an SDF Download Task. Returns an Operation.
   *
   * An SDF Download Task is a long-running, asynchronous operation. The metadata
   * type of this operation is SdfDownloadTaskMetadata. If the request is
   * successful, the response type of the operation is SdfDownloadTask. The
   * response will not include the download files, which must be retrieved with
   * media.download. The state of operation can be retrieved with
   * sdfdownloadtask.operations.get.
   *
   * Any errors can be found in the error.message. Note that error.details is
   * expected to be empty. (sdfdownloadtasks.create)
   *
   * @param Google_Service_DisplayVideo_CreateSdfDownloadTaskRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_Operation
   */
  public function create(Google_Service_DisplayVideo_CreateSdfDownloadTaskRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DisplayVideo_Operation");
  }
}
