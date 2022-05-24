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

namespace Google\Service\Keep\Resource;

use Google\Service\Keep\KeepEmpty;
use Google\Service\Keep\ListNotesResponse;
use Google\Service\Keep\Note;

/**
 * The "notes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $keepService = new Google\Service\Keep(...);
 *   $notes = $keepService->notes;
 *  </code>
 */
class Notes extends \Google\Service\Resource
{
  /**
   * Creates a new note. (notes.create)
   *
   * @param Note $postBody
   * @param array $optParams Optional parameters.
   * @return Note
   */
  public function create(Note $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Note::class);
  }
  /**
   * Deletes a note. Caller must have the `OWNER` role on the note to delete.
   * Deleting a note removes the resource immediately and cannot be undone. Any
   * collaborators will lose access to the note. (notes.delete)
   *
   * @param string $name Required. Name of the note to delete.
   * @param array $optParams Optional parameters.
   * @return KeepEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], KeepEmpty::class);
  }
  /**
   * Gets a note. (notes.get)
   *
   * @param string $name Required. Name of the resource.
   * @param array $optParams Optional parameters.
   * @return Note
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Note::class);
  }
  /**
   * Lists notes. Every list call returns a page of results with `page_size` as
   * the upper bound of returned items. A `page_size` of zero allows the server to
   * choose the upper bound. The ListNotesResponse contains at most `page_size`
   * entries. If there are more things left to list, it provides a
   * `next_page_token` value. (Page tokens are opaque values.) To get the next
   * page of results, copy the result's `next_page_token` into the next request's
   * `page_token`. Repeat until the `next_page_token` returned with a page of
   * results is empty. ListNotes return consistent results in the face of
   * concurrent changes, or signals that it cannot with an ABORTED error.
   * (notes.listNotes)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter for list results. If no filter is supplied,
   * the `trashed` filter is applied by default. Valid fields to filter by are:
   * `create_time`, `update_time`, `trash_time`, and `trashed`. Filter syntax
   * follows the [Google AIP filtering spec](https://aip.dev/160).
   * @opt_param int pageSize The maximum number of results to return.
   * @opt_param string pageToken The previous page's `next_page_token` field.
   * @return ListNotesResponse
   */
  public function listNotes($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNotesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Notes::class, 'Google_Service_Keep_Resource_Notes');
