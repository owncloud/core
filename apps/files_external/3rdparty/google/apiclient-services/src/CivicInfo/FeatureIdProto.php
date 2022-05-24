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

namespace Google\Service\CivicInfo;

class FeatureIdProto extends \Google\Model
{
  /**
   * @var string
   */
  public $cellId;
  /**
   * @var string
   */
  public $fprint;
  protected $temporaryDataType = MessageSet::class;
  protected $temporaryDataDataType = '';

  /**
   * @param string
   */
  public function setCellId($cellId)
  {
    $this->cellId = $cellId;
  }
  /**
   * @return string
   */
  public function getCellId()
  {
    return $this->cellId;
  }
  /**
   * @param string
   */
  public function setFprint($fprint)
  {
    $this->fprint = $fprint;
  }
  /**
   * @return string
   */
  public function getFprint()
  {
    return $this->fprint;
  }
  /**
   * @param MessageSet
   */
  public function setTemporaryData(MessageSet $temporaryData)
  {
    $this->temporaryData = $temporaryData;
  }
  /**
   * @return MessageSet
   */
  public function getTemporaryData()
  {
    return $this->temporaryData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FeatureIdProto::class, 'Google_Service_CivicInfo_FeatureIdProto');
