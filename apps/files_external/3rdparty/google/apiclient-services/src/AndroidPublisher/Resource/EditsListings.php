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

use Google\Service\AndroidPublisher\Listing;
use Google\Service\AndroidPublisher\ListingsListResponse;

/**
 * The "listings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $listings = $androidpublisherService->listings;
 *  </code>
 */
class EditsListings extends \Google\Service\Resource
{
  /**
   * Deletes a localized store listing. (listings.delete)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German).
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $editId, $language, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'language' => $language];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Deletes all store listings. (listings.deleteall)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   */
  public function deleteall($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('deleteall', [$params]);
  }
  /**
   * Gets a localized store listing. (listings.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German).
   * @param array $optParams Optional parameters.
   * @return Listing
   */
  public function get($packageName, $editId, $language, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'language' => $language];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Listing::class);
  }
  /**
   * Lists all localized store listings. (listings.listEditsListings)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return ListingsListResponse
   */
  public function listEditsListings($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListingsListResponse::class);
  }
  /**
   * Patches a localized store listing. (listings.patch)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German).
   * @param Listing $postBody
   * @param array $optParams Optional parameters.
   * @return Listing
   */
  public function patch($packageName, $editId, $language, Listing $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Listing::class);
  }
  /**
   * Creates or updates a localized store listing. (listings.update)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German).
   * @param Listing $postBody
   * @param array $optParams Optional parameters.
   * @return Listing
   */
  public function update($packageName, $editId, $language, Listing $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Listing::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditsListings::class, 'Google_Service_AndroidPublisher_Resource_EditsListings');
