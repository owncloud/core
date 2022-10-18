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

class QualityLabelsGoogleLabelDataLabel extends \Google\Collection
{
  protected $collection_key = 'providerId';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var int
   */
  public $globalLabelBucket;
  /**
   * @var float
   */
  public $globalLabelValue;
  /**
   * @var int
   */
  public $labelId;
  /**
   * @var string
   */
  public $labelName;
  protected $providerType = QualityLabelsGoogleLabelDataLabelProvider::class;
  protected $providerDataType = 'array';
  /**
   * @var string[]
   */
  public $providerId;

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
   * @param int
   */
  public function setGlobalLabelBucket($globalLabelBucket)
  {
    $this->globalLabelBucket = $globalLabelBucket;
  }
  /**
   * @return int
   */
  public function getGlobalLabelBucket()
  {
    return $this->globalLabelBucket;
  }
  /**
   * @param float
   */
  public function setGlobalLabelValue($globalLabelValue)
  {
    $this->globalLabelValue = $globalLabelValue;
  }
  /**
   * @return float
   */
  public function getGlobalLabelValue()
  {
    return $this->globalLabelValue;
  }
  /**
   * @param int
   */
  public function setLabelId($labelId)
  {
    $this->labelId = $labelId;
  }
  /**
   * @return int
   */
  public function getLabelId()
  {
    return $this->labelId;
  }
  /**
   * @param string
   */
  public function setLabelName($labelName)
  {
    $this->labelName = $labelName;
  }
  /**
   * @return string
   */
  public function getLabelName()
  {
    return $this->labelName;
  }
  /**
   * @param QualityLabelsGoogleLabelDataLabelProvider[]
   */
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return QualityLabelsGoogleLabelDataLabelProvider[]
   */
  public function getProvider()
  {
    return $this->provider;
  }
  /**
   * @param string[]
   */
  public function setProviderId($providerId)
  {
    $this->providerId = $providerId;
  }
  /**
   * @return string[]
   */
  public function getProviderId()
  {
    return $this->providerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityLabelsGoogleLabelDataLabel::class, 'Google_Service_Contentwarehouse_QualityLabelsGoogleLabelDataLabel');
