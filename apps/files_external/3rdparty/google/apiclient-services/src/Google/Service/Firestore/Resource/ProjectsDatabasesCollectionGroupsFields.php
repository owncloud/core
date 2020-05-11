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
 * The "fields" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firestoreService = new Google_Service_Firestore(...);
 *   $fields = $firestoreService->fields;
 *  </code>
 */
class Google_Service_Firestore_Resource_ProjectsDatabasesCollectionGroupsFields extends Google_Service_Resource
{
  /**
   * Gets the metadata and configuration for a Field. (fields.get)
   *
   * @param string $name Required. A name of the form `projects/{project_id}/datab
   * ases/{database_id}/collectionGroups/{collection_id}/fields/{field_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_GoogleFirestoreAdminV1Field
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Firestore_GoogleFirestoreAdminV1Field");
  }
  /**
   * Lists the field configuration and metadata for this database.
   *
   * Currently, FirestoreAdmin.ListFields only supports listing fields that have
   * been explicitly overridden. To issue this query, call
   * FirestoreAdmin.ListFields with the filter set to
   * `indexConfig.usesAncestorConfig:false`.
   * (fields.listProjectsDatabasesCollectionGroupsFields)
   *
   * @param string $parent Required. A parent name of the form `projects/{project_
   * id}/databases/{database_id}/collectionGroups/{collection_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter to apply to list results. Currently,
   * FirestoreAdmin.ListFields only supports listing fields that have been
   * explicitly overridden. To issue this query, call FirestoreAdmin.ListFields
   * with the filter set to `indexConfig.usesAncestorConfig:false`.
   * @opt_param string pageToken A page token, returned from a previous call to
   * FirestoreAdmin.ListFields, that may be used to get the next page of results.
   * @opt_param int pageSize The number of results to return.
   * @return Google_Service_Firestore_GoogleFirestoreAdminV1ListFieldsResponse
   */
  public function listProjectsDatabasesCollectionGroupsFields($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Firestore_GoogleFirestoreAdminV1ListFieldsResponse");
  }
  /**
   * Updates a field configuration. Currently, field updates apply only to single
   * field index configuration. However, calls to FirestoreAdmin.UpdateField
   * should provide a field mask to avoid changing any configuration that the
   * caller isn't aware of. The field mask should be specified as: `{ paths:
   * "index_config" }`.
   *
   * This call returns a google.longrunning.Operation which may be used to track
   * the status of the field update. The metadata for the operation will be the
   * type FieldOperationMetadata.
   *
   * To configure the default field settings for the database, use the special
   * `Field` with resource name: `projects/{project_id}/databases/{database_id}/co
   * llectionGroups/__default__/fields`. (fields.patch)
   *
   * @param string $name A field name of the form `projects/{project_id}/databases
   * /{database_id}/collectionGroups/{collection_id}/fields/{field_path}`
   *
   * A field path may be a simple field name, e.g. `address` or a path to fields
   * within map_value , e.g. `address.city`, or a special field path. The only
   * valid special field is `*`, which represents any field.
   *
   * Field paths may be quoted using ` (backtick). The only character that needs
   * to be escaped within a quoted field path is the backtick character itself,
   * escaped using a backslash. Special characters in field paths that must be
   * quoted include: `*`, `.`, ``` (backtick), `[`, `]`, as well as any ascii
   * symbolic characters.
   *
   * Examples: (Note: Comments here are written in markdown syntax, so there is an
   * additional layer of backticks to represent a code block) `\`address.city\``
   * represents a field named `address.city`, not the map key `city` in the field
   * `address`. `\`*\`` represents a field named `*`, not any field.
   *
   * A special `Field` contains the default indexing settings for all fields. This
   * field's resource name is: `projects/{project_id}/databases/{database_id}/coll
   * ectionGroups/__default__/fields` Indexes defined on this `Field` will be
   * applied to all fields which do not have their own `Field` index
   * configuration.
   * @param Google_Service_Firestore_GoogleFirestoreAdminV1Field $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A mask, relative to the field. If specified,
   * only configuration specified by this field_mask will be updated in the field.
   * @return Google_Service_Firestore_GoogleLongrunningOperation
   */
  public function patch($name, Google_Service_Firestore_GoogleFirestoreAdminV1Field $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Firestore_GoogleLongrunningOperation");
  }
}
