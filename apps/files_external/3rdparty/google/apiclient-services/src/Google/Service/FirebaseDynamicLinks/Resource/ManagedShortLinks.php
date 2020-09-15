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
 * The "managedShortLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasedynamiclinksService = new Google_Service_FirebaseDynamicLinks(...);
 *   $managedShortLinks = $firebasedynamiclinksService->managedShortLinks;
 *  </code>
 */
class Google_Service_FirebaseDynamicLinks_Resource_ManagedShortLinks extends Google_Service_Resource
{
  /**
   * Creates a managed short Dynamic Link given either a valid long Dynamic Link
   * or details such as Dynamic Link domain, Android and iOS app information. The
   * created short Dynamic Link will not expire. This differs from
   * CreateShortDynamicLink in the following ways: - The request will also contain
   * a name for the link (non unique name for the front end). - The response must
   * be authenticated with an auth token (generated with the admin service
   * account). - The link will appear in the FDL list of links in the console
   * front end. The Dynamic Link domain in the request must be owned by
   * requester's Firebase project. (managedShortLinks.create)
   *
   * @param Google_Service_FirebaseDynamicLinks_CreateManagedShortLinkRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseDynamicLinks_CreateManagedShortLinkResponse
   */
  public function create(Google_Service_FirebaseDynamicLinks_CreateManagedShortLinkRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseDynamicLinks_CreateManagedShortLinkResponse");
  }
}
