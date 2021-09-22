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

namespace Google\Service\CloudKMS;

class CryptoKey extends \Google\Model
{
  public $createTime;
  public $destroyScheduledDuration;
  public $importOnly;
  public $labels;
  public $name;
  public $nextRotationTime;
  protected $primaryType = CryptoKeyVersion::class;
  protected $primaryDataType = '';
  public $purpose;
  public $rotationPeriod;
  protected $versionTemplateType = CryptoKeyVersionTemplate::class;
  protected $versionTemplateDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDestroyScheduledDuration($destroyScheduledDuration)
  {
    $this->destroyScheduledDuration = $destroyScheduledDuration;
  }
  public function getDestroyScheduledDuration()
  {
    return $this->destroyScheduledDuration;
  }
  public function setImportOnly($importOnly)
  {
    $this->importOnly = $importOnly;
  }
  public function getImportOnly()
  {
    return $this->importOnly;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNextRotationTime($nextRotationTime)
  {
    $this->nextRotationTime = $nextRotationTime;
  }
  public function getNextRotationTime()
  {
    return $this->nextRotationTime;
  }
  /**
   * @param CryptoKeyVersion
   */
  public function setPrimary(CryptoKeyVersion $primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return CryptoKeyVersion
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  public function setPurpose($purpose)
  {
    $this->purpose = $purpose;
  }
  public function getPurpose()
  {
    return $this->purpose;
  }
  public function setRotationPeriod($rotationPeriod)
  {
    $this->rotationPeriod = $rotationPeriod;
  }
  public function getRotationPeriod()
  {
    return $this->rotationPeriod;
  }
  /**
   * @param CryptoKeyVersionTemplate
   */
  public function setVersionTemplate(CryptoKeyVersionTemplate $versionTemplate)
  {
    $this->versionTemplate = $versionTemplate;
  }
  /**
   * @return CryptoKeyVersionTemplate
   */
  public function getVersionTemplate()
  {
    return $this->versionTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CryptoKey::class, 'Google_Service_CloudKMS_CryptoKey');
