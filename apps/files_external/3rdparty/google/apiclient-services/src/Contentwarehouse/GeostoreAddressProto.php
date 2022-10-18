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

class GeostoreAddressProto extends \Google\Collection
{
  protected $collection_key = 'crossStreet';
  protected $addressLinesType = GeostoreAddressLinesProto::class;
  protected $addressLinesDataType = 'array';
  protected $componentType = GeostoreAddressComponentProto::class;
  protected $componentDataType = 'array';
  protected $crossStreetType = GeostoreAddressComponentProto::class;
  protected $crossStreetDataType = 'array';
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  protected $partialDenormalizationType = GeostoreAddressProto::class;
  protected $partialDenormalizationDataType = '';
  /**
   * @var string
   */
  public $templateId;
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';

  /**
   * @param GeostoreAddressLinesProto[]
   */
  public function setAddressLines($addressLines)
  {
    $this->addressLines = $addressLines;
  }
  /**
   * @return GeostoreAddressLinesProto[]
   */
  public function getAddressLines()
  {
    return $this->addressLines;
  }
  /**
   * @param GeostoreAddressComponentProto[]
   */
  public function setComponent($component)
  {
    $this->component = $component;
  }
  /**
   * @return GeostoreAddressComponentProto[]
   */
  public function getComponent()
  {
    return $this->component;
  }
  /**
   * @param GeostoreAddressComponentProto[]
   */
  public function setCrossStreet($crossStreet)
  {
    $this->crossStreet = $crossStreet;
  }
  /**
   * @return GeostoreAddressComponentProto[]
   */
  public function getCrossStreet()
  {
    return $this->crossStreet;
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
   * @param GeostoreAddressProto
   */
  public function setPartialDenormalization(GeostoreAddressProto $partialDenormalization)
  {
    $this->partialDenormalization = $partialDenormalization;
  }
  /**
   * @return GeostoreAddressProto
   */
  public function getPartialDenormalization()
  {
    return $this->partialDenormalization;
  }
  /**
   * @param string
   */
  public function setTemplateId($templateId)
  {
    $this->templateId = $templateId;
  }
  /**
   * @return string
   */
  public function getTemplateId()
  {
    return $this->templateId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreAddressProto::class, 'Google_Service_Contentwarehouse_GeostoreAddressProto');
