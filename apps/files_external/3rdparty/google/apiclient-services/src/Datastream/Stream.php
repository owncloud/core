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

namespace Google\Service\Datastream;

class Stream extends \Google\Collection
{
  protected $collection_key = 'errors';
  protected $backfillAllType = BackfillAllStrategy::class;
  protected $backfillAllDataType = '';
  protected $backfillNoneType = BackfillNoneStrategy::class;
  protected $backfillNoneDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $customerManagedEncryptionKey;
  protected $destinationConfigType = DestinationConfig::class;
  protected $destinationConfigDataType = '';
  /**
   * @var string
   */
  public $displayName;
  protected $errorsType = Error::class;
  protected $errorsDataType = 'array';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $sourceConfigType = SourceConfig::class;
  protected $sourceConfigDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param BackfillAllStrategy
   */
  public function setBackfillAll(BackfillAllStrategy $backfillAll)
  {
    $this->backfillAll = $backfillAll;
  }
  /**
   * @return BackfillAllStrategy
   */
  public function getBackfillAll()
  {
    return $this->backfillAll;
  }
  /**
   * @param BackfillNoneStrategy
   */
  public function setBackfillNone(BackfillNoneStrategy $backfillNone)
  {
    $this->backfillNone = $backfillNone;
  }
  /**
   * @return BackfillNoneStrategy
   */
  public function getBackfillNone()
  {
    return $this->backfillNone;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setCustomerManagedEncryptionKey($customerManagedEncryptionKey)
  {
    $this->customerManagedEncryptionKey = $customerManagedEncryptionKey;
  }
  /**
   * @return string
   */
  public function getCustomerManagedEncryptionKey()
  {
    return $this->customerManagedEncryptionKey;
  }
  /**
   * @param DestinationConfig
   */
  public function setDestinationConfig(DestinationConfig $destinationConfig)
  {
    $this->destinationConfig = $destinationConfig;
  }
  /**
   * @return DestinationConfig
   */
  public function getDestinationConfig()
  {
    return $this->destinationConfig;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Error[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Error[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
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
   * @param SourceConfig
   */
  public function setSourceConfig(SourceConfig $sourceConfig)
  {
    $this->sourceConfig = $sourceConfig;
  }
  /**
   * @return SourceConfig
   */
  public function getSourceConfig()
  {
    return $this->sourceConfig;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Stream::class, 'Google_Service_Datastream_Stream');
