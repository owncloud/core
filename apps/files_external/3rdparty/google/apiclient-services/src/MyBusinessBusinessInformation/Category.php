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

namespace Google\Service\MyBusinessBusinessInformation;

class Category extends \Google\Collection
{
  protected $collection_key = 'serviceTypes';
  /**
   * @var string
   */
  public $displayName;
  protected $moreHoursTypesType = MoreHoursType::class;
  protected $moreHoursTypesDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $serviceTypesType = ServiceType::class;
  protected $serviceTypesDataType = 'array';

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
   * @param MoreHoursType[]
   */
  public function setMoreHoursTypes($moreHoursTypes)
  {
    $this->moreHoursTypes = $moreHoursTypes;
  }
  /**
   * @return MoreHoursType[]
   */
  public function getMoreHoursTypes()
  {
    return $this->moreHoursTypes;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param ServiceType[]
   */
  public function setServiceTypes($serviceTypes)
  {
    $this->serviceTypes = $serviceTypes;
  }
  /**
   * @return ServiceType[]
   */
  public function getServiceTypes()
  {
    return $this->serviceTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Category::class, 'Google_Service_MyBusinessBusinessInformation_Category');
