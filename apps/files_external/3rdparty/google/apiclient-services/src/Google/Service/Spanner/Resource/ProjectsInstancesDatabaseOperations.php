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
 * The "databaseOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $spannerService = new Google_Service_Spanner(...);
 *   $databaseOperations = $spannerService->databaseOperations;
 *  </code>
 */
class Google_Service_Spanner_Resource_ProjectsInstancesDatabaseOperations extends Google_Service_Resource
{
  /**
   * Lists database longrunning-operations. A database operation has a name of the
   * form `projects//instances//databases//operations/`. The long-running
   * operation metadata field type `metadata.type_url` describes the type of the
   * metadata. Operations returned include those that have
   * completed/failed/canceled within the last 7 days, and pending operations.
   * (databaseOperations.listProjectsInstancesDatabaseOperations)
   *
   * @param string $parent Required. The instance of the database operations.
   * Values are of the form `projects//instances/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken If non-empty, `page_token` should contain a
   * next_page_token from a previous ListDatabaseOperationsResponse to the same
   * `parent` and with the same `filter`.
   * @opt_param int pageSize Number of operations to be returned in the response.
   * If 0 or less, defaults to the server's maximum allowed page size.
   * @opt_param string filter An expression that filters the list of returned
   * operations.
   *
   * A filter expression consists of a field name, a comparison operator, and a
   * value for filtering. The value must be a string, a number, or a boolean. The
   * comparison operator must be one of: `<`, `>`, `<=`, `>=`, `!=`, `=`, or `:`.
   * Colon `:` is the contains operator. Filter rules are not case sensitive.
   *
   * The following fields in the Operation are eligible for filtering:
   *
   *   * `name` - The name of the long-running operation   * `done` - False if the
   * operation is in progress, else true.   * `metadata.@type` - the type of
   * metadata. For example, the type string      for RestoreDatabaseMetadata is
   * `type.googleapis.com/google.spanner.admin.database.v1.RestoreDatabaseMetadata
   * `.   * `metadata.` - any field in metadata.value.   * `error` - Error
   * associated with the long-running operation.   * `response.@type` - the type
   * of response.   * `response.` - any field in response.value.
   *
   * You can combine multiple expressions by enclosing each expression in
   * parentheses. By default, expressions are combined with AND logic. However,
   * you can specify AND, OR, and NOT logic explicitly.
   *
   * Here are a few examples:
   *
   *   * `done:true` - The operation is complete.   * `(metadata.@type=type.google
   * apis.com/google.spanner.admin.database.v1.RestoreDatabaseMetadata) AND`
   * `(metadata.source_type:BACKUP) AND`
   * `(metadata.backup_info.backup:backup_howl) AND`
   * `(metadata.name:restored_howl) AND`      `(metadata.progress.start_time <
   * \"2018-03-28T14:50:00Z\") AND`      `(error:*)` - Return operations where:
   * * The operation's metadata type is RestoreDatabaseMetadata.     * The
   * database is restored from a backup.     * The backup name contains
   * "backup_howl".     * The restored database's name contains "restored_howl".
   * * The operation started before 2018-03-28T14:50:00Z.     * The operation
   * resulted in an error.
   * @return Google_Service_Spanner_ListDatabaseOperationsResponse
   */
  public function listProjectsInstancesDatabaseOperations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Spanner_ListDatabaseOperationsResponse");
  }
}
