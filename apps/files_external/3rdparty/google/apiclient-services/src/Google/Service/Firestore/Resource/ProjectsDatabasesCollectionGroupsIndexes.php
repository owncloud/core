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
 * The "indexes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firestoreService = new Google_Service_Firestore(...);
 *   $indexes = $firestoreService->indexes;
 *  </code>
 */
class Google_Service_Firestore_Resource_ProjectsDatabasesCollectionGroupsIndexes extends Google_Service_Resource
{
  /**
   * Creates a composite index. This returns a google.longrunning.Operation which
   * may be used to track the status of the creation. The metadata for the
   * operation will be the type IndexOperationMetadata. (indexes.create)
   *
   * @param string $parent Required. A parent name of the form `projects/{project_
   * id}/databases/{database_id}/collectionGroups/{collection_id}`
   * @param Google_Service_Firestore_GoogleFirestoreAdminV1Index $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_Firestore_GoogleFirestoreAdminV1Index $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Firestore_GoogleLongrunningOperation");
  }
  /**
   * Deletes a composite index. (indexes.delete)
   *
   * @param string $name Required. A name of the form `projects/{project_id}/datab
   * ases/{database_id}/collectionGroups/{collection_id}/indexes/{index_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_FirestoreEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Firestore_FirestoreEmpty");
  }
  /**
   * Gets a composite index. (indexes.get)
   *
   * @param string $name Required. A name of the form `projects/{project_id}/datab
   * ases/{database_id}/collectionGroups/{collection_id}/indexes/{index_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_GoogleFirestoreAdminV1Index
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Firestore_GoogleFirestoreAdminV1Index");
  }
  /**
   * Lists composite indexes.
   * (indexes.listProjectsDatabasesCollectionGroupsIndexes)
   *
   * @param string $parent Required. A parent name of the form `projects/{project_
   * id}/databases/{database_id}/collectionGroups/{collection_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The number of results to return.
   * @opt_param string filter The filter to apply to list results.
   * @opt_param string pageToken A page token, returned from a previous call to
   * FirestoreAdmin.ListIndexes, that may be used to get the next page of results.
   * @return Google_Service_Firestore_GoogleFirestoreAdminV1ListIndexesResponse
   */
  public function listProjectsDatabasesCollectionGroupsIndexes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Firestore_GoogleFirestoreAdminV1ListIndexesResponse");
  }
}
