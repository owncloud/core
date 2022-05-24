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

namespace Google\Service\ShoppingContent;

class DatafeedStatus extends \Google\Collection
{
  protected $collection_key = 'warnings';
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $datafeedId;
  protected $errorsType = DatafeedStatusError::class;
  protected $errorsDataType = 'array';
  /**
   * @var string
   */
  public $itemsTotal;
  /**
   * @var string
   */
  public $itemsValid;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $lastUploadDate;
  /**
   * @var string
   */
  public $processingStatus;
  protected $warningsType = DatafeedStatusError::class;
  protected $warningsDataType = 'array';

  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setDatafeedId($datafeedId)
  {
    $this->datafeedId = $datafeedId;
  }
  /**
   * @return string
   */
  public function getDatafeedId()
  {
    return $this->datafeedId;
  }
  /**
   * @param DatafeedStatusError[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return DatafeedStatusError[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string
   */
  public function setItemsTotal($itemsTotal)
  {
    $this->itemsTotal = $itemsTotal;
  }
  /**
   * @return string
   */
  public function getItemsTotal()
  {
    return $this->itemsTotal;
  }
  /**
   * @param string
   */
  public function setItemsValid($itemsValid)
  {
    $this->itemsValid = $itemsValid;
  }
  /**
   * @return string
   */
  public function getItemsValid()
  {
    return $this->itemsValid;
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
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setLastUploadDate($lastUploadDate)
  {
    $this->lastUploadDate = $lastUploadDate;
  }
  /**
   * @return string
   */
  public function getLastUploadDate()
  {
    return $this->lastUploadDate;
  }
  /**
   * @param string
   */
  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }
  /**
   * @return string
   */
  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }
  /**
   * @param DatafeedStatusError[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return DatafeedStatusError[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DatafeedStatus::class, 'Google_Service_ShoppingContent_DatafeedStatus');
