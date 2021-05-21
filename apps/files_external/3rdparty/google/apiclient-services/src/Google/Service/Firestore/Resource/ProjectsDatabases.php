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
 * The "databases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firestoreService = new Google_Service_Firestore(...);
 *   $databases = $firestoreService->databases;
 *  </code>
 */
class Google_Service_Firestore_Resource_ProjectsDatabases extends Google_Service_Resource
{
  /**
   * Exports a copy of all or a subset of documents from Google Cloud Firestore to
   * another storage system, such as Google Cloud Storage. Recent updates to
   * documents may not be reflected in the export. The export occurs in the
   * background and its progress can be monitored and managed via the Operation
   * resource that is created. The output of an export may only be used once the
   * associated operation is done. If an export operation is cancelled before
   * completion it may leave partial data behind in Google Cloud Storage. For more
   * details on export behavior and output format, refer to:
   * https://cloud.google.com/firestore/docs/manage-data/export-import
   * (databases.exportDocuments)
   *
   * @param string $name Required. Database to export. Should be of the form:
   * `projects/{project_id}/databases/{database_id}`.
   * @param Google_Service_Firestore_GoogleFirestoreAdminV1ExportDocumentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_GoogleLongrunningOperation
   */
  public function exportDocuments($name, Google_Service_Firestore_GoogleFirestoreAdminV1ExportDocumentsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('exportDocuments', array($params), "Google_Service_Firestore_GoogleLongrunningOperation");
  }
  /**
   * Imports documents into Google Cloud Firestore. Existing documents with the
   * same name are overwritten. The import occurs in the background and its
   * progress can be monitored and managed via the Operation resource that is
   * created. If an ImportDocuments operation is cancelled, it is possible that a
   * subset of the data has already been imported to Cloud Firestore.
   * (databases.importDocuments)
   *
   * @param string $name Required. Database to import into. Should be of the form:
   * `projects/{project_id}/databases/{database_id}`.
   * @param Google_Service_Firestore_GoogleFirestoreAdminV1ImportDocumentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_GoogleLongrunningOperation
   */
  public function importDocuments($name, Google_Service_Firestore_GoogleFirestoreAdminV1ImportDocumentsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('importDocuments', array($params), "Google_Service_Firestore_GoogleLongrunningOperation");
  }
}
