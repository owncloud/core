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
