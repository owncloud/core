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
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $inputCollectionName;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
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
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string[]
   */
  public function setInputCollectionName($inputCollectionName)
  {
    $this->inputCollectionName = $inputCollectionName;
  }
  /**
   * @return string[]
   */
  public function getInputCollectionName()
  {
    return $this->inputCollectionName;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
   * @param string[]
   */
  public function setOutputCollectionName($outputCollectionName)
  {
    $this->outputCollectionName = $outputCollectionName;
  }
  /**
   * @return string[]
   */
  public function getOutputCollectionName()
  {
    return $this->outputCollectionName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransformSummary::class, 'Google_Service_Dataflow_TransformSummary');
