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

namespace Google\Service\Drive\Resource;

use Google\Service\Drive\Channel;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive\FileList;
use Google\Service\Drive\GeneratedIds;
use Google\Service\Drive\LabelList;
use Google\Service\Drive\ModifyLabelsRequest;
use Google\Service\Drive\ModifyLabelsResponse;

/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google\Service\Drive(...);
 *   $files = $driveService->files;
 *  </code>
 */
class Files extends \Google\Service\Resource
{
  /**
   * Creates a copy of a file and applies any requested updates with patch
   * semantics. (files.copy)
   *
   * @param string $fileId The ID of the file.
   * @param DriveFile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool enforceSingleParent Deprecated. Copying files into multiple
   * folders is no longer supported. Use shortcuts instead.
   * @opt_param bool ignoreDefaultVisibility Whether to ignore the domain's
   * default visibility settings for the created file. Domain administrators can
   * choose to make all uploaded files visible to the domain by default; this
   * parameter bypasses that behavior for the request. Permissions are still
   * inherited from parent folders.
   * @opt_param string includeLabels A comma-separated list of IDs of labels to
   * include in the `labelInfo` part of the response.
   * @opt_param string includePermissionsForView Specifies which additional view's
   * permissions to include in the response. Only 'published' is supported.
   * @opt_param bool keepRevisionForever Whether to set the 'keepForever' field in
   * the new head revision. This is only applicable to files with binary content
   * in Google Drive. Only 200 revisions for the file can be kept forever. If the
   * limit is reached, try deleting pinned revisions.
   * @opt_param string ocrLanguage A language hint for OCR processing during image
   * import (ISO 639-1 code).
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated: Use `supportsAllDrives`
   * instead.
   * @return DriveFile
   */
  public function copy($fileId, DriveFile $postBody, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('copy', [$params], DriveFile::class);
  }
  /**
   * Creates a new file. This method supports an upload* URI and accepts uploaded
   * media with the following characteristics: - *Maximum file size:* 5,120 GB -
   * *Accepted Media MIME types:*`*` Note: Specify a valid MIME type, rather than
   * the literal `*` value. The literal `*` is only used to indicate that any
   * valid MIME type can be uploaded. For more information on uploading files, see
   * [Upload file data](/drive/api/guides/manage-uploads). Apps creating shortcuts
   * with `files.create` must specify the MIME type `application/vnd.google-
   * apps.shortcut`. Apps should specify a file extension in the `name` property
   * when inserting files with the API. For example, an operation to insert a JPEG
   * file should specify something like `"name": "cat.jpg"` in the metadata.
   * Subsequent `GET` requests include the read-only `fileExtension` property
   * populated with the extension originally specified in the `title` property.
   * When a Google Drive user requests to download a file, or when the file is
   * downloaded through the sync client, Drive builds a full filename (with
   * extension) based on the title. In cases where the extension is missing, Drive
   * attempts to determine the extension based on the file's MIME type.
   * (files.create)
   *
   * @param DriveFile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool enforceSingleParent Deprecated. Creating files in multiple
   * folders is no longer supported.
   * @opt_param bool ignoreDefaultVisibility Whether to ignore the domain's
   * default visibility settings for the created file. Domain administrators can
   * choose to make all uploaded files visible to the domain by default; this
   * parameter bypasses that behavior for the request. Permissions are still
   * inherited from parent folders.
   * @opt_param string includeLabels A comma-separated list of IDs of labels to
   * include in the `labelInfo` part of the response.
   * @opt_param string includePermissionsForView Specifies which additional view's
   * permissions to include in the response. Only 'published' is supported.
   * @opt_param bool keepRevisionForever Whether to set the 'keepForever' field in
   * the new head revision. This is only applicable to files with binary content
   * in Google Drive. Only 200 revisions for the file can be kept forever. If the
   * limit is reached, try deleting pinned revisions.
   * @opt_param string ocrLanguage A language hint for OCR processing during image
   * import (ISO 639-1 code).
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated: Use `supportsAllDrives`
   * instead.
   * @opt_param bool useContentAsIndexableText Whether to use the uploaded content
   * as indexable text.
   * @return DriveFile
   */
  public function create(DriveFile $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], DriveFile::class);
  }
  /**
   * Permanently deletes a file owned by the user without moving it to the trash.
   * If the file belongs to a shared drive, the user must be an `organizer` on the
   * parent folder. If the target is a folder, all descendants owned by the user
   * are also deleted. (files.delete)
   *
   * @param string $fileId The ID of the file.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool enforceSingleParent Deprecated: If an item is not in a shared
   * drive and its last parent is deleted but the item itself is not, the item
   * will be placed under its owner's root.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated: Use `supportsAllDrives`
   * instead.
   */
  public function delete($fileId, $optParams = [])
  {
    $params = ['fileId' => $fileId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Permanently deletes all of the user's trashed files. (files.emptyTrash)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string driveId If set, empties the trash of the provided shared
   * drive.
   * @opt_param bool enforceSingleParent Deprecated: If an item is not in a shared
   * drive and its last parent is deleted but the item itself is not, the item
   * will be placed under its owner's root.
   */
  public function emptyTrash($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('emptyTrash', [$params]);
  }
  /**
   * Exports a Google Workspace document to the requested MIME type and returns
   * exported byte content. Note that the exported content is limited to 10MB.
   * (files.export)
   *
   * @param string $fileId The ID of the file.
   * @param string $mimeType Required. The MIME type of the format requested for
   * this export.
   * @param array $optParams Optional parameters.
   */
  public function export($fileId, $mimeType, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'mimeType' => $mimeType];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params]);
  }
  /**
   * Generates a set of file IDs which can be provided in create or copy requests.
   * (files.generateIds)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int count The number of IDs to return.
   * @opt_param string space The space in which the IDs can be used to create new
   * files. Supported values are 'drive' and 'appDataFolder'. (Default: 'drive')
   * @opt_param string type The type of items which the IDs can be used for.
   * Supported values are 'files' and 'shortcuts'. Note that 'shortcuts' are only
   * supported in the `drive` 'space'. (Default: 'files')
   * @return GeneratedIds
   */
  public function generateIds($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('generateIds', [$params], GeneratedIds::class);
  }
  /**
   * Gets a file's metadata or content by ID. If you provide the URL parameter
   * `alt=media`, then the response includes the file contents in the response
   * body. Downloading content with `alt=media` only works if the file is stored
   * in Drive. To download Google Docs, Sheets, and Slides use
   * [`files.export`](/drive/api/reference/rest/v3/files/export) instead. For more
   * information, see [Download & export files](/drive/api/guides/manage-
   * downloads). (files.get)
   *
   * @param string $fileId The ID of the file.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool acknowledgeAbuse Whether the user is acknowledging the risk
   * of downloading known malware or other abusive files. This is only applicable
   * when alt=media.
   * @opt_param string includeLabels A comma-separated list of IDs of labels to
   * include in the `labelInfo` part of the response.
   * @opt_param string includePermissionsForView Specifies which additional view's
   * permissions to include in the response. Only 'published' is supported.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated: Use `supportsAllDrives`
   * instead.
   * @return DriveFile
   */
  public function get($fileId, $optParams = [])
  {
    $params = ['fileId' => $fileId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DriveFile::class);
  }
  /**
   * Lists the user's files. This method accepts the `q` parameter, which is a
   * search query combining one or more search terms. For more information, see
   * the [Search for files & folders](/drive/api/guides/search-files) guide.
   * *Note:* This method returns *all* files by default, including trashed files.
   * If you don't want trashed files to appear in the list, use the
   * `trashed=false` query parameter to remove trashed files from the results.
   * (files.listFiles)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string corpora Bodies of items (files/documents) to which the
   * query applies. Supported bodies are 'user', 'domain', 'drive', and
   * 'allDrives'. Prefer 'user' or 'drive' to 'allDrives' for efficiency. By
   * default, corpora is set to 'user'. However, this can change depending on the
   * filter set through the 'q' parameter.
   * @opt_param string corpus Deprecated: The source of files to list. Use
   * 'corpora' instead.
   * @opt_param string driveId ID of the shared drive to search.
   * @opt_param bool includeItemsFromAllDrives Whether both My Drive and shared
   * drive items should be included in results.
   * @opt_param string includeLabels A comma-separated list of IDs of labels to
   * include in the `labelInfo` part of the response.
   * @opt_param string includePermissionsForView Specifies which additional view's
   * permissions to include in the response. Only 'published' is supported.
   * @opt_param bool includeTeamDriveItems Deprecated: Use
   * `includeItemsFromAllDrives` instead.
   * @opt_param string orderBy A comma-separated list of sort keys. Valid keys are
   * 'createdTime', 'folder', 'modifiedByMeTime', 'modifiedTime', 'name',
   * 'name_natural', 'quotaBytesUsed', 'recency', 'sharedWithMeTime', 'starred',
   * and 'viewedByMeTime'. Each key sorts ascending by default, but can be
   * reversed with the 'desc' modifier. Example usage:
   * ?orderBy=folder,modifiedTime desc,name.
   * @opt_param int pageSize The maximum number of files to return per page.
   * Partial or empty result pages are possible even before the end of the files
   * list has been reached.
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of 'nextPageToken' from the
   * previous response.
   * @opt_param string q A query for filtering the file results. See the "Search
   * for files & folders" guide for supported syntax.
   * @opt_param string spaces A comma-separated list of spaces to query within the
   * corpora. Supported values are 'drive' and 'appDataFolder'.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated: Use `supportsAllDrives`
   * instead.
   * @opt_param string teamDriveId Deprecated: Use `driveId` instead.
   * @return FileList
   */
  public function listFiles($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], FileList::class);
  }
  /**
   * Lists the labels on a file. (files.listLabels)
   *
   * @param string $fileId The ID for the file.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults The maximum number of labels to return per page.
   * When not set, defaults to 100.
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of 'nextPageToken' from the
   * previous response.
   * @return LabelList
   */
  public function listLabels($fileId, $optParams = [])
  {
    $params = ['fileId' => $fileId];
    $params = array_merge($params, $optParams);
    return $this->call('listLabels', [$params], LabelList::class);
  }
  /**
   * Modifies the set of labels applied to a file. Returns a list of the labels
   * that were added or modified. (files.modifyLabels)
   *
   * @param string $fileId The ID of the file to which the labels belong.
   * @param ModifyLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ModifyLabelsResponse
   */
  public function modifyLabels($fileId, ModifyLabelsRequest $postBody, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('modifyLabels', [$params], ModifyLabelsResponse::class);
  }
  /**
   * Updates a file's metadata and/or content. When calling this method, only
   * populate fields in the request that you want to modify. When updating fields,
   * some fields might be changed automatically, such as `modifiedDate`. This
   * method supports patch semantics. This method supports an upload* URI and
   * accepts uploaded media with the following characteristics: - *Maximum file
   * size:* 5,120 GB - *Accepted Media MIME types:*`*` Note: Specify a valid MIME
   * type, rather than the literal `*` value. The literal `*` is only used to
   * indicate that any valid MIME type can be uploaded. For more information on
   * uploading files, see [Upload file data](/drive/api/guides/manage-uploads).
   * (files.update)
   *
   * @param string $fileId The ID of the file.
   * @param DriveFile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string addParents A comma-separated list of parent IDs to add.
   * @opt_param bool enforceSingleParent Deprecated: Adding files to multiple
   * folders is no longer supported. Use shortcuts instead.
   * @opt_param string includeLabels A comma-separated list of IDs of labels to
   * include in the `labelInfo` part of the response.
   * @opt_param string includePermissionsForView Specifies which additional view's
   * permissions to include in the response. Only 'published' is supported.
   * @opt_param bool keepRevisionForever Whether to set the 'keepForever' field in
   * the new head revision. This is only applicable to files with binary content
   * in Google Drive. Only 200 revisions for the file can be kept forever. If the
   * limit is reached, try deleting pinned revisions.
   * @opt_param string ocrLanguage A language hint for OCR processing during image
   * import (ISO 639-1 code).
   * @opt_param string removeParents A comma-separated list of parent IDs to
   * remove.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated: Use `supportsAllDrives`
   * instead.
   * @opt_param bool useContentAsIndexableText Whether to use the uploaded content
   * as indexable text.
   * @return DriveFile
   */
  public function update($fileId, DriveFile $postBody, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], DriveFile::class);
  }
  /**
   * Subscribes to changes to a file. (files.watch)
   *
   * @param string $fileId The ID of the file.
   * @param Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool acknowledgeAbuse Whether the user is acknowledging the risk
   * of downloading known malware or other abusive files. This is only applicable
   * when alt=media.
   * @opt_param string includeLabels A comma-separated list of IDs of labels to
   * include in the `labelInfo` part of the response.
   * @opt_param string includePermissionsForView Specifies which additional view's
   * permissions to include in the response. Only 'published' is supported.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated: Use `supportsAllDrives`
   * instead.
   * @return Channel
   */
  public function watch($fileId, Channel $postBody, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('watch', [$params], Channel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Files::class, 'Google_Service_Drive_Resource_Files');
