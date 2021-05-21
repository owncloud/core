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
 *   $chromepolicyService = new Google_Service_ChromePolicy(...);
 *   $media = $chromepolicyService->media;
 *  </code>
 */
class Google_Service_ChromePolicy_Resource_Media extends Google_Service_Resource
{
  /**
   * Creates an enterprise file from the content provided by user. Returns a
   * public download url for end user. (media.upload)
   *
   * @param string $customer Required. The customer for which the file upload will
   * apply.
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1UploadPolicyFileRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1UploadPolicyFileResponse
   */
  public function upload($customer, Google_Service_ChromePolicy_GoogleChromePolicyV1UploadPolicyFileRequest $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_ChromePolicy_GoogleChromePolicyV1UploadPolicyFileResponse");
  }
}
