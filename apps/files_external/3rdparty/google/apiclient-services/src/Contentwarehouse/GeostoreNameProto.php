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

class GeostoreNameProto extends \Google\Collection
{
  protected $collection_key = 'flag';
  /**
   * @var string[]
   */
  public $flag;
  /**
   * @var string
   */
  public $language;
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $rawText;
  /**
   * @var string
   */
  public $shortText;
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';
  /**
   * @var string
   */
  public $text;

  /**
   * @param string[]
   */
  public function setFlag($flag)
  {
    $this->flag = $flag;
  }
  /**
   * @return string[]
   */
  public function getFlag()
  {
    return $this->flag;
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
   * @param GeostoreFieldMetadataProto
   */
  public function setMetadata(GeostoreFieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setRawText($rawText)
  {
    $this->rawText = $rawText;
  }
  /**
   * @return string
   */
  public function getRawText()
  {
    return $this->rawText;
  }
  /**
   * @param string
   */
  public function setShortText($shortText)
  {
    $this->shortText = $shortText;
  }
  /**
   * @return string
   */
  public function getShortText()
  {
    return $this->shortText;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setTemporaryData(Proto2BridgeMessageSet $temporaryData)
  {
    $this->temporaryData = $temporaryData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getTemporaryData()
  {
    return $this->temporaryData;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreNameProto::class, 'Google_Service_Contentwarehouse_GeostoreNameProto');
