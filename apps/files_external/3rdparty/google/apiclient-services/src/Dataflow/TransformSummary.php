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

namespace Google\Service\Dataflow;

class TransformSummary extends \Google\Collection
{
  protected $collection_key = 'outputCollectionName';
  protected $displayDataType = DisplayData::class;
  protected $displayDataDataType = 'array';
  public $id;
  public $inputCollectionName;
  public $kind;
  public $name;
  public $outputCollectionName;

  /**
   * @param DisplayData[]
   */
  public function setDisplayData($displayData)
  {
    $this->displayData = $displayData;
  }
  /**
   * @return DisplayData[]
   */
  public function getDisplayData()
  {
    return $this->displayData;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInputCollectionName($inputCollectionName)
  {
    $this->inputCollectionName = $inputCollectionName;
  }
  public function getInputCollectionName()
  {
    return $this->inputCollectionName;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOutputCollectionName($outputCollectionName)
  {
    $this->outputCollectionName = $outputCollectionName;
  }
  public function getOutputCollectionName()
  {
    return $this->outputCollectionName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransformSummary::class, 'Google_Service_Dataflow_TransformSummary');
