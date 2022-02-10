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

namespace Google\Service\MyBusinessBusinessInformation\Resource;

use Google\Service\MyBusinessBusinessInformation\AssociateLocationRequest;
use Google\Service\MyBusinessBusinessInformation\Attributes as AttributesModel;
use Google\Service\MyBusinessBusinessInformation\ClearLocationAssociationRequest;
use Google\Service\MyBusinessBusinessInformation\GoogleUpdatedLocation;
use Google\Service\MyBusinessBusinessInformation\Location;
use Google\Service\MyBusinessBusinessInformation\MybusinessbusinessinformationEmpty;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessbusinessinformationService = new Google\Service\MyBusinessBusinessInformation(...);
 *   $locations = $mybusinessbusinessinformationService->locations;
 *  </code>
 */
class Locations extends \Google\Service\Resource
{
  /**
   * Associates a location to a place ID. Any previous association is overwritten.
   * This operation is only valid if the location is unverified. The association
   * must be valid, that is, it appears in the list of `SearchGoogleLocations`.
   * (locations.associate)
   *
   * @param string $name Required. The resource name of the location to associate.
   * @param AssociateLocationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return MybusinessbusinessinformationEmpty
   */
  public function associate($name, AssociateLocationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('associate', [$params], MybusinessbusinessinformationEmpty::class);
  }
  /**
   * Clears an association between a location and its place ID. This operation is
   * only valid if the location is unverified.
   * (locations.clearLocationAssociation)
   *
   * @param string $name Required. The resource name of the location to
   * disassociate.
   * @param ClearLocationAssociationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return MybusinessbusinessinformationEmpty
   */
  public function clearLocationAssociation($name, ClearLocationAssociationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('clearLocationAssociation', [$params], MybusinessbusinessinformationEmpty::class);
  }
  /**
   * Deletes a location. If this location cannot be deleted using the API and it
   * is marked so in the `google.mybusiness.businessinformation.v1.LocationState`,
   * use the [Google Business Profile](https://business.google.com/manage/)
   * website. (locations.delete)
   *
   * @param string $name Required. The name of the location to delete.
   * @param array $optParams Optional parameters.
   * @return MybusinessbusinessinformationEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], MybusinessbusinessinformationEmpty::class);
  }
  /**
   * Returns the specified location. (locations.get)
   *
   * @param string $name Required. The name of the location to fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string readMask Required. Read mask to specify what fields will be
   * returned in the response.
   * @return Location
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Location::class);
  }
  /**
   * Looks up all the attributes set for a given location.
   * (locations.getAttributes)
   *
   * @param string $name Required. Google identifier for this location in the form
   * of `locations/{location_id}/attributes`.
   * @param array $optParams Optional parameters.
   * @return Attributes
   */
  public function getAttributes($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getAttributes', [$params], AttributesModel::class);
  }
  /**
   * Gets the Google-updated version of the specified location.
   * (locations.getGoogleUpdated)
   *
   * @param string $name Required. The name of the location to fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string readMask Required. Read mask to specify what fields will be
   * returned in the response.
   * @return GoogleUpdatedLocation
   */
  public function getGoogleUpdated($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getGoogleUpdated', [$params], GoogleUpdatedLocation::class);
  }
  /**
   * Updates the specified location. (locations.patch)
   *
   * @param string $name Google identifier for this location in the form:
   * `locations/{location_id}`.
   * @param Location $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The specific fields to update.
   * @opt_param bool validateOnly Optional. If true, the request is validated
   * without actually updating the location. When this field is set, we will only
   * return validation errors if there were any. The response will be empty if no
   * errors were found.
   * @return Location
   */
  public function patch($name, Location $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Location::class);
  }
  /**
   * Update attributes for a given location. (locations.updateAttributes)
   *
   * @param string $name Required. Google identifier for this location in the form
   * of `locations/{location_id}/attributes`.
   * @param AttributesModel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string attributeMask Required. Attribute name of attributes that
   * you'd like to update. Represented by `attributes/{attribute}`. Updates: All
   * attributes provided in the attributes field that you would like to update
   * must be set in the `attribute_mask`. Attributes set in the above list but not
   * in the `attribute_mask` will be ignored. Deletes: If you'd like to delete
   * certain attributes, they must be specified in the `attribute_mask` with no
   * matching entry in the attributes list. If you'd like to delete all attributes
   * set on a location, you should look up all the applicable attributes for the
   * location and then add them to the `attribute_mask` with an empty attributes
   * field.
   * @return AttributesModel
   */
  public function updateAttributes($name, AttributesModel $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateAttributes', [$params], AttributesModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Locations::class, 'Google_Service_MyBusinessBusinessInformation_Resource_Locations');
