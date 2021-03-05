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
 * The "functions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudfunctionsService = new Google_Service_CloudFunctions(...);
 *   $functions = $cloudfunctionsService->functions;
 *  </code>
 */
class Google_Service_CloudFunctions_Resource_ProjectsLocationsFunctions extends Google_Service_Resource
{
  /**
   * Synchronously invokes a deployed Cloud Function. To be used for testing
   * purposes as very limited traffic is allowed. For more information on the
   * actual limits, refer to [Rate
   * Limits](https://cloud.google.com/functions/quotas#rate_limits).
   * (functions.callProjectsLocationsFunctions)
   *
   * @param string $name Required. The name of the function to be called.
   * @param Google_Service_CloudFunctions_CallFunctionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFunctions_CallFunctionResponse
   */
  public function callProjectsLocationsFunctions($name, Google_Service_CloudFunctions_CallFunctionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('call', array($params), "Google_Service_CloudFunctions_CallFunctionResponse");
  }
  /**
   * Creates a new function. If a function with the given name already exists in
   * the specified project, the long running operation will return
   * `ALREADY_EXISTS` error. (functions.create)
   *
   * @param string $location Required. The project and location in which the
   * function should be created, specified in the format `projects/locations`
   * @param Google_Service_CloudFunctions_CloudFunction $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFunctions_Operation
   */
  public function create($location, Google_Service_CloudFunctions_CloudFunction $postBody, $optParams = array())
  {
    $params = array('location' => $location, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudFunctions_Operation");
  }
  /**
   * Deletes a function with the given name from the specified project. If the
   * given function is used by some trigger, the trigger will be updated to remove
   * this function. (functions.delete)
   *
   * @param string $name Required. The name of the function which should be
   * deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFunctions_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudFunctions_Operation");
  }
  /**
   * Returns a signed URL for downloading deployed function source code. The URL
   * is only valid for a limited period and should be used within minutes after
   * generation. For more information about the signed URL usage see:
   * https://cloud.google.com/storage/docs/access-control/signed-urls
   * (functions.generateDownloadUrl)
   *
   * @param string $name The name of function for which source code Google Cloud
   * Storage signed URL should be generated.
   * @param Google_Service_CloudFunctions_GenerateDownloadUrlRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFunctions_GenerateDownloadUrlResponse
   */
  public function generateDownloadUrl($name, Google_Service_CloudFunctions_GenerateDownloadUrlRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('generateDownloadUrl', array($params), "Google_Service_CloudFunctions_GenerateDownloadUrlResponse");
  }
  /**
   * Returns a signed URL for uploading a function source code. For more
   * information about the signed URL usage see:
   * https://cloud.google.com/storage/docs/access-control/signed-urls. Once the
   * function source code upload is complete, the used signed URL should be
   * provided in CreateFunction or UpdateFunction request as a reference to the
   * function source code. When uploading source code to the generated signed URL,
   * please follow these restrictions: * Source file type should be a zip file. *
   * Source file size should not exceed 100MB limit. * No credentials should be
   * attached - the signed URLs provide access to the target bucket using internal
   * service identity; if credentials were attached, the identity from the
   * credentials would be used, but that identity does not have permissions to
   * upload files to the URL. When making a HTTP PUT request, these two headers
   * need to be specified: * `content-type: application/zip` * `x-goog-content-
   * length-range: 0,104857600` And this header SHOULD NOT be specified: *
   * `Authorization: Bearer YOUR_TOKEN` (functions.generateUploadUrl)
   *
   * @param string $parent The project and location in which the Google Cloud
   * Storage signed URL should be generated, specified in the format
   * `projects/locations`.
   * @param Google_Service_CloudFunctions_GenerateUploadUrlRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFunctions_GenerateUploadUrlResponse
   */
  public function generateUploadUrl($parent, Google_Service_CloudFunctions_GenerateUploadUrlRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('generateUploadUrl', array($params), "Google_Service_CloudFunctions_GenerateUploadUrlResponse");
  }
  /**
   * Returns a function with the given name from the requested project.
   * (functions.get)
   *
   * @param string $name Required. The name of the function which details should
   * be obtained.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFunctions_CloudFunction
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudFunctions_CloudFunction");
  }
  /**
   * Gets the IAM access control policy for a function. Returns an empty policy if
   * the function exists and does not have a policy set. (functions.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected. Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset. To learn which
   * resources support conditions in their IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Google_Service_CloudFunctions_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudFunctions_Policy");
  }
  /**
   * Returns a list of functions that belong to the requested project.
   * (functions.listProjectsLocationsFunctions)
   *
   * @param string $parent The project and location from which the function should
   * be listed, specified in the format `projects/locations` If you want to list
   * functions in all locations, use "-" in place of a location. When listing
   * functions in all locations, if one or more location(s) are unreachable, the
   * response will contain functions from all reachable locations along with the
   * names of any unreachable locations.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of functions to return per call.
   * @opt_param string pageToken The value returned by the last
   * `ListFunctionsResponse`; indicates that this is a continuation of a prior
   * `ListFunctions` call, and that the system should return the next page of
   * data.
   * @return Google_Service_CloudFunctions_ListFunctionsResponse
   */
  public function listProjectsLocationsFunctions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudFunctions_ListFunctionsResponse");
  }
  /**
   * Updates existing function. (functions.patch)
   *
   * @param string $name A user-defined name of the function. Function names must
   * be unique globally and match pattern `projects/locations/functions`
   * @param Google_Service_CloudFunctions_CloudFunction $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required list of fields to be updated in this
   * request.
   * @return Google_Service_CloudFunctions_Operation
   */
  public function patch($name, Google_Service_CloudFunctions_CloudFunction $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudFunctions_Operation");
  }
  /**
   * Sets the IAM access control policy on the specified function. Replaces any
   * existing policy. (functions.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudFunctions_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFunctions_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudFunctions_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudFunctions_Policy");
  }
  /**
   * Tests the specified permissions against the IAM access control policy for a
   * function. If the function does not exist, this will return an empty set of
   * permissions, not a NOT_FOUND error. (functions.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudFunctions_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudFunctions_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudFunctions_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudFunctions_TestIamPermissionsResponse");
  }
}
