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

namespace Google\Service\Contentwarehouse;

class GeostoreRouteAssociationProto extends \Google\Model
{
  /**
   * @var string
   */
  public $displayPreference;
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  protected $routeType = GeostoreFeatureIdProto::class;
  protected $routeDataType = '';
  /**
   * @var string
   */
  public $routeDirection;

  /**
   * @param string
   */
  public function setDisplayPreference($displayPreference)
  {
    $this->displayPreference = $displayPreference;
  }
  /**
   * @return string
   */
  public function getDisplayPreference()
  {
    return $this->displayPreference;
  }
  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setMetadata(GeostoreFieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setRoute(GeostoreFeatureIdProto $route)
  {
    $this->route = $route;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getRoute()
  {
    return $this->route;
  }
  /**
   * @param string
   */
  public function setRouteDirection($routeDirection)
  {
    $this->routeDirection = $routeDirection;
  }
  /**
   * @return string
   */
  public function getRouteDirection()
  {
    return $this->routeDirection;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreRouteAssociationProto::class, 'Google_Service_Contentwarehouse_GeostoreRouteAssociationProto');
