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
 * The "submissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webriskService = new Google_Service_WebRisk(...);
 *   $submissions = $webriskService->submissions;
 *  </code>
 */
class Google_Service_WebRisk_Resource_ProjectsSubmissions extends Google_Service_Resource
{
  /**
   * Creates a Submission of a URI suspected of containing phishing content to be
   * reviewed. If the result verifies the existence of malicious phishing content,
   * the site will be added to the [Google's Social Engineering
   * lists](https://support.google.com/webmasters/answer/6350487/) in order to
   * protect users that could get exposed to this threat in the future. Only
   * allowlisted projects can use this method during Early Access. Please reach
   * out to Sales or your customer engineer to obtain access. (submissions.create)
   *
   * @param string $parent Required. The name of the project that is making the
   * submission. This string is in the format "projects/{project_number}".
   * @param Google_Service_WebRisk_GoogleCloudWebriskV1Submission $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1Submission
   */
  public function create($parent, Google_Service_WebRisk_GoogleCloudWebriskV1Submission $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_WebRisk_GoogleCloudWebriskV1Submission");
  }
}
