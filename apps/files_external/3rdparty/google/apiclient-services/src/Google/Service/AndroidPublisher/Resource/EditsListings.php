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
 * The "listings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $listings = $androidpublisherService->listings;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsListings extends Google_Service_Resource
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
  public function delete($packageName, $editId, $language, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Deletes all store listings. (listings.deleteall)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   */
  public function deleteall($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('deleteall', array($params));
  }
  /**
   * Gets a localized store listing. (listings.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German).
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Listing
   */
  public function get($packageName, $editId, $language, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_Listing");
  }
  /**
   * Lists all localized store listings. (listings.listEditsListings)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ListingsListResponse
   */
  public function listEditsListings($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_ListingsListResponse");
  }
  /**
   * Patches a localized store listing. (listings.patch)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German).
   * @param Google_Service_AndroidPublisher_Listing $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Listing
   */
  public function patch($packageName, $editId, $language, Google_Service_AndroidPublisher_Listing $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidPublisher_Listing");
  }
  /**
   * Creates or updates a localized store listing. (listings.update)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German).
   * @param Google_Service_AndroidPublisher_Listing $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Listing
   */
  public function update($packageName, $editId, $language, Google_Service_AndroidPublisher_Listing $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidPublisher_Listing");
  }
}
