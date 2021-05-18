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
 * The "schemas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $schemas = $pubsubService->schemas;
 *  </code>
 */
class Google_Service_Pubsub_Resource_ProjectsSchemas extends Google_Service_Resource
{
  /**
   * Creates a schema. (schemas.create)
   *
   * @param string $parent Required. The name of the project in which to create
   * the schema. Format is `projects/{project-id}`.
   * @param Google_Service_Pubsub_Schema $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string schemaId The ID to use for the schema, which will become
   * the final component of the schema's resource name. See
   * https://cloud.google.com/pubsub/docs/admin#resource_names for resource name
   * constraints.
   * @return Google_Service_Pubsub_Schema
   */
  public function create($parent, Google_Service_Pubsub_Schema $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Pubsub_Schema");
  }
  /**
   * Deletes a schema. (schemas.delete)
   *
   * @param string $name Required. Name of the schema to delete. Format is
   * `projects/{project}/schemas/{schema}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PubsubEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Pubsub_PubsubEmpty");
  }
  /**
   * Gets a schema. (schemas.get)
   *
   * @param string $name Required. The name of the schema to get. Format is
   * `projects/{project}/schemas/{schema}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view The set of fields to return in the response. If not
   * set, returns a Schema with `name` and `type`, but not `definition`. Set to
   * `FULL` to retrieve all fields.
   * @return Google_Service_Pubsub_Schema
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Pubsub_Schema");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (schemas.getIamPolicy)
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
   * @return Google_Service_Pubsub_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Pubsub_Policy");
  }
  /**
   * Lists schemas in a project. (schemas.listProjectsSchemas)
   *
   * @param string $parent Required. The name of the project in which to list
   * schemas. Format is `projects/{project-id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of schemas to return.
   * @opt_param string pageToken The value returned by the last
   * `ListSchemasResponse`; indicates that this is a continuation of a prior
   * `ListSchemas` call, and that the system should return the next page of data.
   * @opt_param string view The set of Schema fields to return in the response. If
   * not set, returns Schemas with `name` and `type`, but not `definition`. Set to
   * `FULL` to retrieve all fields.
   * @return Google_Service_Pubsub_ListSchemasResponse
   */
  public function listProjectsSchemas($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Pubsub_ListSchemasResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (schemas.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Pubsub_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Policy
   */
  public function setIamPolicy($resource, Google_Service_Pubsub_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Pubsub_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (schemas.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Pubsub_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Pubsub_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Pubsub_TestIamPermissionsResponse");
  }
  /**
   * Validates a schema. (schemas.validate)
   *
   * @param string $parent Required. The name of the project in which to validate
   * schemas. Format is `projects/{project-id}`.
   * @param Google_Service_Pubsub_ValidateSchemaRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_ValidateSchemaResponse
   */
  public function validate($parent, Google_Service_Pubsub_ValidateSchemaRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('validate', array($params), "Google_Service_Pubsub_ValidateSchemaResponse");
  }
  /**
   * Validates a message against a schema. (schemas.validateMessage)
   *
   * @param string $parent Required. The name of the project in which to validate
   * schemas. Format is `projects/{project-id}`.
   * @param Google_Service_Pubsub_ValidateMessageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_ValidateMessageResponse
   */
  public function validateMessage($parent, Google_Service_Pubsub_ValidateMessageRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('validateMessage', array($params), "Google_Service_Pubsub_ValidateMessageResponse");
  }
}
