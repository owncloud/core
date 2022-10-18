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

class GeostoreIntersectionGroupProto extends \Google\Collection
{
  protected $collection_key = 'intersection';
  protected $childGroupType = GeostoreFeatureIdProto::class;
  protected $childGroupDataType = 'array';
  /**
   * @var string
   */
  public $groupType;
  protected $intersectionType = GeostoreFeatureIdProto::class;
  protected $intersectionDataType = 'array';
  protected $parentGroupType = GeostoreFeatureIdProto::class;
  protected $parentGroupDataType = '';

  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setChildGroup($childGroup)
  {
    $this->childGroup = $childGroup;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getChildGroup()
  {
    return $this->childGroup;
  }
  /**
   * @param string
   */
  public function setGroupType($groupType)
  {
    $this->groupType = $groupType;
  }
  /**
   * @return string
   */
  public function getGroupType()
  {
    return $this->groupType;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setIntersection($intersection)
  {
    $this->intersection = $intersection;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getIntersection()
  {
    return $this->intersection;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setParentGroup(GeostoreFeatureIdProto $parentGroup)
  {
    $this->parentGroup = $parentGroup;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getParentGroup()
  {
    return $this->parentGroup;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreIntersectionGroupProto::class, 'Google_Service_Contentwarehouse_GeostoreIntersectionGroupProto');
