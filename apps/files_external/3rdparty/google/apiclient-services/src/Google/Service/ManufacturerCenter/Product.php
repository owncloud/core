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

class Google_Service_ManufacturerCenter_Product extends Google_Collection
{
  protected $collection_key = 'issues';
  protected $attributesType = 'Google_Service_ManufacturerCenter_Attributes';
  protected $attributesDataType = '';
  public $contentLanguage;
  protected $destinationStatusesType = 'Google_Service_ManufacturerCenter_DestinationStatus';
  protected $destinationStatusesDataType = 'array';
  protected $issuesType = 'Google_Service_ManufacturerCenter_Issue';
  protected $issuesDataType = 'array';
  public $name;
  public $parent;
  public $productId;
  public $targetCountry;

  /**
   * @param Google_Service_ManufacturerCenter_Attributes
   */
  public function setAttributes(Google_Service_ManufacturerCenter_Attributes $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Attributes
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param Google_Service_ManufacturerCenter_DestinationStatus[]
   */
  public function setDestinationStatuses($destinationStatuses)
  {
    $this->destinationStatuses = $destinationStatuses;
  }
  /**
   * @return Google_Service_ManufacturerCenter_DestinationStatus[]
   */
  public function getDestinationStatuses()
  {
    return $this->destinationStatuses;
  }
  /**
   * @param Google_Service_ManufacturerCenter_Issue[]
   */
  public function setIssues($issues)
  {
    $this->issues = $issues;
  }
  /**
   * @return Google_Service_ManufacturerCenter_Issue[]
   */
  public function getIssues()
  {
    return $this->issues;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setTargetCountry($targetCountry)
  {
    $this->targetCountry = $targetCountry;
  }
  public function getTargetCountry()
  {
    return $this->targetCountry;
  }
}
