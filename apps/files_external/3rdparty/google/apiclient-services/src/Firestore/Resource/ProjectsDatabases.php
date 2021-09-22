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

namespace Google\Service\Firestore\Resource;

use Google\Service\Firestore\GoogleFirestoreAdminV1ExportDocumentsRequest;
use Google\Service\Firestore\GoogleFirestoreAdminV1ImportDocumentsRequest;
use Google\Service\Firestore\GoogleLongrunningOperation;

/**
 * The "databases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firestoreService = new Google\Service\Firestore(...);
 *   $databases = $firestoreService->databases;
 *  </code>
 */
class ProjectsDatabases extends \Google\Service\Resource
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
   * @param GoogleFirestoreAdminV1ExportDocumentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function exportDocuments($name, GoogleFirestoreAdminV1ExportDocumentsRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exportDocuments', [$params], GoogleLongrunningOperation::class);
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
   * @param GoogleFirestoreAdminV1ImportDocumentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function importDocuments($name, GoogleFirestoreAdminV1ImportDocumentsRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('importDocuments', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsDatabases::class, 'Google_Service_Firestore_Resource_ProjectsDatabases');
