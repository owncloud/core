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

class Google_Service_Vision_GoogleCloudVisionV1p4beta1Product extends Google_Collection
{
  protected $collection_key = 'productLabels';
  public $description;
  public $displayName;
  public $name;
  public $productCategory;
  protected $productLabelsType = 'Google_Service_Vision_GoogleCloudVisionV1p4beta1ProductKeyValue';
  protected $productLabelsDataType = 'array';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProductCategory($productCategory)
  {
    $this->productCategory = $productCategory;
  }
  public function getProductCategory()
  {
    return $this->productCategory;
  }
  /**
   * @param Google_Service_Vision_GoogleCloudVisionV1p4beta1ProductKeyValue
   */
  public function setProductLabels($productLabels)
  {
    $this->productLabels = $productLabels;
  }
  /**
   * @return Google_Service_Vision_GoogleCloudVisionV1p4beta1ProductKeyValue
   */
  public function getProductLabels()
  {
    return $this->productLabels;
  }
}
