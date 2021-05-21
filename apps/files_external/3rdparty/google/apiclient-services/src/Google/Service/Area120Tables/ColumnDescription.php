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

class Google_Service_Area120Tables_ColumnDescription extends Google_Collection
{
  protected $collection_key = 'labels';
  public $dataType;
  public $id;
  protected $labelsType = 'Google_Service_Area120Tables_LabeledItem';
  protected $labelsDataType = 'array';
  protected $lookupDetailsType = 'Google_Service_Area120Tables_LookupDetails';
  protected $lookupDetailsDataType = '';
  public $multipleValuesDisallowed;
  public $name;
  protected $relationshipDetailsType = 'Google_Service_Area120Tables_RelationshipDetails';
  protected $relationshipDetailsDataType = '';

  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  public function getDataType()
  {
    return $this->dataType;
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
   * @param Google_Service_Area120Tables_LabeledItem[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return Google_Service_Area120Tables_LabeledItem[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_Area120Tables_LookupDetails
   */
  public function setLookupDetails(Google_Service_Area120Tables_LookupDetails $lookupDetails)
  {
    $this->lookupDetails = $lookupDetails;
  }
  /**
   * @return Google_Service_Area120Tables_LookupDetails
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
  /**
   * @param Google_Service_Area120Tables_RelationshipDetails
   */
  public function setRelationshipDetails(Google_Service_Area120Tables_RelationshipDetails $relationshipDetails)
  {
    $this->relationshipDetails = $relationshipDetails;
  }
  /**
   * @return Google_Service_Area120Tables_RelationshipDetails
   */
  public function getRelationshipDetails()
  {
    return $this->relationshipDetails;
  }
}
