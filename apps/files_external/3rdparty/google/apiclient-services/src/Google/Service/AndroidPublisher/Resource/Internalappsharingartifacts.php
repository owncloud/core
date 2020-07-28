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
 * The "internalappsharingartifacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $internalappsharingartifacts = $androidpublisherService->internalappsharingartifacts;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_Internalappsharingartifacts extends Google_Service_Resource
{
  /**
   * Uploads an APK to internal app sharing. If you are using the Google API
   * client libraries, please increase the timeout of the http request before
   * calling this endpoint (a timeout of 2 minutes is recommended).
   *
   * See [Timeouts and Errors](https://developers.google.com/api-client-
   * library/java/google-api-java-client/errors) for an example in java.
   * (internalappsharingartifacts.uploadapk)
   *
   * @param string $packageName Package name of the app.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_InternalAppSharingArtifact
   */
  public function uploadapk($packageName, $optParams = array())
  {
    $params = array('packageName' => $packageName);
    $params = array_merge($params, $optParams);
    return $this->call('uploadapk', array($params), "Google_Service_AndroidPublisher_InternalAppSharingArtifact");
  }
  /**
   * Uploads an app bundle to internal app sharing. If you are using the Google
   * API client libraries, please increase the timeout of the http request before
   * calling this endpoint (a timeout of 2 minutes is recommended).
   *
   * See [Timeouts and Errors](https://developers.google.com/api-client-
   * library/java/google-api-java-client/errors) for an example in java.
   * (internalappsharingartifacts.uploadbundle)
   *
   * @param string $packageName Package name of the app.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_InternalAppSharingArtifact
   */
  public function uploadbundle($packageName, $optParams = array())
  {
    $params = array('packageName' => $packageName);
    $params = array_merge($params, $optParams);
    return $this->call('uploadbundle', array($params), "Google_Service_AndroidPublisher_InternalAppSharingArtifact");
  }
}
