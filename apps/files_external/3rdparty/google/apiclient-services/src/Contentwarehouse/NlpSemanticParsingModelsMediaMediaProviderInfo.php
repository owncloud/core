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

class NlpSemanticParsingModelsMediaMediaProviderInfo extends \Google\Collection
{
  protected $collection_key = 'deeplinkInfo';
  protected $deeplinkInfoType = NlpSemanticParsingModelsMediaDeeplinkInfo::class;
  protected $deeplinkInfoDataType = 'array';
  /**
   * @var string
   */
  public $kgProviderKey;
  /**
   * @var string
   */
  public $mediaId;
  /**
   * @var string
   */
  public $providerMid;
  /**
   * @var string
   */
  public $providerName;

  /**
   * @param NlpSemanticParsingModelsMediaDeeplinkInfo[]
   */
  public function setDeeplinkInfo($deeplinkInfo)
  {
    $this->deeplinkInfo = $deeplinkInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaDeeplinkInfo[]
   */
  public function getDeeplinkInfo()
  {
    return $this->deeplinkInfo;
  }
  /**
   * @param string
   */
  public function setKgProviderKey($kgProviderKey)
  {
    $this->kgProviderKey = $kgProviderKey;
  }
  /**
   * @return string
   */
  public function getKgProviderKey()
  {
    return $this->kgProviderKey;
  }
  /**
   * @param string
   */
  public function setMediaId($mediaId)
  {
    $this->mediaId = $mediaId;
  }
  /**
   * @return string
   */
  public function getMediaId()
  {
    return $this->mediaId;
  }
  /**
   * @param string
   */
  public function setProviderMid($providerMid)
  {
    $this->providerMid = $providerMid;
  }
  /**
   * @return string
   */
  public function getProviderMid()
  {
    return $this->providerMid;
  }
  /**
   * @param string
   */
  public function setProviderName($providerName)
  {
    $this->providerName = $providerName;
  }
  /**
   * @return string
   */
  public function getProviderName()
  {
    return $this->providerName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaMediaProviderInfo::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaMediaProviderInfo');
