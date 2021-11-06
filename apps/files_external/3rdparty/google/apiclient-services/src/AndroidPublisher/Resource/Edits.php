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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\AppEdit;

/**
 * The "edits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $edits = $androidpublisherService->edits;
 *  </code>
 */
class Edits extends \Google\Service\Resource
{
  /**
   * Commits an app edit. (edits.commit)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool changesNotSentForReview Indicates that the changes in this
   * edit will not be reviewed until they are explicitly sent for review from the
   * Google Play Console UI. These changes will be added to any other changes that
   * are not yet sent for review.
   * @return AppEdit
   */
  public function commit($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('commit', [$params], AppEdit::class);
  }
  /**
   * Deletes an app edit. (edits.delete)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets an app edit. (edits.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return AppEdit
   */
  public function get($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AppEdit::class);
  }
  /**
   * Creates a new edit for an app. (edits.insert)
   *
   * @param string $packageName Package name of the app.
   * @param AppEdit $postBody
   * @param array $optParams Optional parameters.
   * @return AppEdit
   */
  public function insert($packageName, AppEdit $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], AppEdit::class);
  }
  /**
   * Validates an app edit. (edits.validate)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return AppEdit
   */
  public function validate($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('validate', [$params], AppEdit::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Edits::class, 'Google_Service_AndroidPublisher_Resource_Edits');
