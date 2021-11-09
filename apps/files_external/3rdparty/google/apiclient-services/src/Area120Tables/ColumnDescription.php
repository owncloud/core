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

namespace Google\Service\Area120Tables;

class ColumnDescription extends \Google\Collection
{
  protected $collection_key = 'labels';
  public $dataType;
  protected $dateDetailsType = DateDetails::class;
  protected $dateDetailsDataType = '';
  public $id;
  protected $labelsType = LabeledItem::class;
  protected $labelsDataType = 'array';
  protected $lookupDetailsType = LookupDetails::class;
  protected $lookupDetailsDataType = '';
  public $multipleValuesDisallowed;
  public $name;
  public $readonly;
  protected $relationshipDetailsType = RelationshipDetails::class;
  protected $relationshipDetailsDataType = '';

  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  public function getDataType()
  {
    return $this->dataType;
  }
  /**
   * @param DateDetails
   */
  public function setDateDetails(DateDetails $dateDetails)
  {
    $this->dateDetails = $dateDetails;
  }
  /**
   * @return DateDetails
   */
  public function getDateDetails()
  {
    return $this->dateDetails;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param LabeledItem[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return LabeledItem[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param LookupDetails
   */
  public function setLookupDetails(LookupDetails $lookupDetails)
  {
    $this->lookupDetails = $lookupDetails;
  }
  /**
   * @return LookupDetails
   */
  public function getLookupDetails()
  {
    return $this->lookupDetails;
  }
  public function setMultipleValuesDisallowed($multipleValuesDisallowed)
  {
    $this->multipleValuesDisallowed = $multipleValuesDisallowed;
  }
  public function getMultipleValuesDisallowed()
  {
    return $this->multipleValuesDisallowed;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReadonly($readonly)
  {
    $this->readonly = $readonly;
  }
  public function getReadonly()
  {
    return $this->readonly;
  }
  /**
   * @param RelationshipDetails
   */
  public function setRelationshipDetails(RelationshipDetails $relationshipDetails)
  {
    $this->relationshipDetails = $relationshipDetails;
  }
  /**
   * @return RelationshipDetails
   */
  public function getRelationshipDetails()
  {
    return $this->relationshipDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ColumnDescription::class, 'Google_Service_Area120Tables_ColumnDescription');
