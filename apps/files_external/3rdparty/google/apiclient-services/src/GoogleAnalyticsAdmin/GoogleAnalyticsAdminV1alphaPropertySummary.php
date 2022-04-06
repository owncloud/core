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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaPropertySummary extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $parent;
  /**
   * @var string
   */
  public $property;
  /**
   * @var string
   */
  public $propertyType;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return string
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param string
   */
  public function setProperty($property)
  {
    $this->property = $property;
  }
  /**
   * @return string
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param string
   */
  public function setPropertyType($propertyType)
  {
    $this->propertyType = $propertyType;
  }
  /**
   * @return string
   */
  public function getPropertyType()
  {
    return $this->propertyType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaPropertySummary::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaPropertySummary');
