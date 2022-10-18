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

class GeostorePointProto extends \Google\Model
{
  /**
   * @var string
   */
  public $latE7;
  /**
   * @var string
   */
  public $lngE7;
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';

  /**
   * @param string
   */
  public function setLatE7($latE7)
  {
    $this->latE7 = $latE7;
  }
  /**
   * @return string
   */
  public function getLatE7()
  {
    return $this->latE7;
  }
  /**
   * @param string
   */
  public function setLngE7($lngE7)
  {
    $this->lngE7 = $lngE7;
  }
  /**
   * @return string
   */
  public function getLngE7()
  {
    return $this->lngE7;
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
class_alias(GeostorePointProto::class, 'Google_Service_Contentwarehouse_GeostorePointProto');
