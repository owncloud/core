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
 *   $keepService = new Google_Service_Keep(...);
 *   $media = $keepService->media;
 *  </code>
 */
class Google_Service_Keep_Resource_Media extends Google_Service_Resource
{
  /**
   * Gets an attachment. To download attachment media via REST requires the
   * alt=media query parameter. Returns a 400 bad request error if attachment
   * media is not available in the requested MIME type. (media.download)
   *
   * @param string $name Required. The name of the attachment.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string mimeType The IANA MIME type format requested. The requested
   * MIME type must be one specified in the attachment.mime_type. Required when
   * downloading attachment media and ignored otherwise.
   * @return Google_Service_Keep_Attachment
   */
  public function download($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('download', array($params), "Google_Service_Keep_Attachment");
  }
}
