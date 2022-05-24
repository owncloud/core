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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1beta1TagTemplateField extends \Google\Model
{
  public $description;
  public $displayName;
  public $isRequired;
  public $name;
  public $order;
  protected $typeType = GoogleCloudDatacatalogV1beta1FieldType::class;
  protected $typeDataType = '';

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
  public function setIsRequired($isRequired)
  {
    $this->isRequired = $isRequired;
  }
  public function getIsRequired()
  {
    return $this->isRequired;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrder($order)
  {
    $this->order = $order;
  }
  public function getOrder()
  {
    return $this->order;
  }
  /**
   * @param GoogleCloudDatacatalogV1beta1FieldType
   */
  public function setType(GoogleCloudDatacatalogV1beta1FieldType $type)
  {
    $this->type = $type;
  }
  /**
   * @return GoogleCloudDatacatalogV1beta1FieldType
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1beta1TagTemplateField::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField');
