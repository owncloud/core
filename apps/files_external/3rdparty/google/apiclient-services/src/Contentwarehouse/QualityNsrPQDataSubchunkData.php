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

class QualityNsrPQDataSubchunkData extends \Google\Model
{
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var float
   */
  public $deltaNsr;
  /**
   * @var float
   */
  public $pageWeight;
  /**
   * @var string
   */
  public $type;

  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param float
   */
  public function setDeltaNsr($deltaNsr)
  {
    $this->deltaNsr = $deltaNsr;
  }
  /**
   * @return float
   */
  public function getDeltaNsr()
  {
    return $this->deltaNsr;
  }
  /**
   * @param float
   */
  public function setPageWeight($pageWeight)
  {
    $this->pageWeight = $pageWeight;
  }
  /**
   * @return float
   */
  public function getPageWeight()
  {
    return $this->pageWeight;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNsrPQDataSubchunkData::class, 'Google_Service_Contentwarehouse_QualityNsrPQDataSubchunkData');
