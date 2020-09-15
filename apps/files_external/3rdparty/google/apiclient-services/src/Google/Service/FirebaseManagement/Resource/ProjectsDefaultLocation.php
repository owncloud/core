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
 * The "defaultLocation" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google_Service_FirebaseManagement(...);
 *   $defaultLocation = $firebaseService->defaultLocation;
 *  </code>
 */
class Google_Service_FirebaseManagement_Resource_ProjectsDefaultLocation extends Google_Service_Resource
{
  /**
   * Sets the default Google Cloud Platform (GCP) resource location for the
   * specified FirebaseProject. This method creates an App Engine application with
   * a [default Cloud Storage bucket](https://cloud.google.com/appengine/docs/stan
   * dard/python/googlecloudstorageclient/setting-up-cloud-
   * storage#activating_a_cloud_storage_bucket), located in the specified
   * [`locationId`](#body.request_body.FIELDS.location_id). This location must be
   * one of the available [GCP resource
   * locations](https://firebase.google.com/docs/projects/locations). After the
   * default GCP resource location is finalized, or if it was already set, it
   * cannot be changed. The default GCP resource location for the specified
   * `FirebaseProject` might already be set because either the underlying GCP
   * `Project` already has an App Engine application or `FinalizeDefaultLocation`
   * was previously called with a specified `locationId`. Any new calls to
   * `FinalizeDefaultLocation` with a *different* specified `locationId` will
   * return a 409 error. The result of this call is an
   * [`Operation`](../../v1beta1/operations), which can be used to track the
   * provisioning process. The
   * [`response`](../../v1beta1/operations#Operation.FIELDS.response) type of the
   * `Operation` is google.protobuf.Empty. The `Operation` can be polled by its
   * `name` using GetOperation until `done` is true. When `done` is true, the
   * `Operation` has either succeeded or failed. If the `Operation` has succeeded,
   * its [`response`](../../v1beta1/operations#Operation.FIELDS.response) will be
   * set to a google.protobuf.Empty; if the `Operation` has failed, its `error`
   * will be set to a google.rpc.Status. The `Operation` is automatically deleted
   * after completion, so there is no need to call DeleteOperation. All fields
   * listed in the [request body](#request-body) are required. To call
   * `FinalizeDefaultLocation`, a member must be an Owner of the Project.
   * (defaultLocation.finalize)
   *
   * @param string $parent The resource name of the FirebaseProject for which the
   * default GCP resource location will be set, in the format:
   * projects/PROJECT_IDENTIFIER Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param Google_Service_FirebaseManagement_FinalizeDefaultLocationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_Operation
   */
  public function finalize($parent, Google_Service_FirebaseManagement_FinalizeDefaultLocationRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('finalize', array($params), "Google_Service_FirebaseManagement_Operation");
  }
}
