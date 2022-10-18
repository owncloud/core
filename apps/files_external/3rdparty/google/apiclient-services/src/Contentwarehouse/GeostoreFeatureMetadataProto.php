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

class GeostoreFeatureMetadataProto extends \Google\Model
{
  /**
   * @var string
   */
  public $bulkUpdatable;
  /**
   * @var string
   */
  public $coreVersionToken;
  protected $fieldMetadataType = GeostoreFeatureFieldMetadataProto::class;
  protected $fieldMetadataDataType = '';
  protected $forwardingsType = GeostoreFeatureIdForwardingsProto::class;
  protected $forwardingsDataType = '';
  protected $historyType = GeostoreFeatureHistoryMetadataProto::class;
  protected $historyDataType = '';
  /**
   * @var string
   */
  public $versionToken;

  /**
   * @param string
   */
  public function setBulkUpdatable($bulkUpdatable)
  {
    $this->bulkUpdatable = $bulkUpdatable;
  }
  /**
   * @return string
   */
  public function getBulkUpdatable()
  {
    return $this->bulkUpdatable;
  }
  /**
   * @param string
   */
  public function setCoreVersionToken($coreVersionToken)
  {
    $this->coreVersionToken = $coreVersionToken;
  }
  /**
   * @return string
   */
  public function getCoreVersionToken()
  {
    return $this->coreVersionToken;
  }
  /**
   * @param GeostoreFeatureFieldMetadataProto
   */
  public function setFieldMetadata(GeostoreFeatureFieldMetadataProto $fieldMetadata)
  {
    $this->fieldMetadata = $fieldMetadata;
  }
  /**
   * @return GeostoreFeatureFieldMetadataProto
   */
  public function getFieldMetadata()
  {
    return $this->fieldMetadata;
  }
  /**
   * @param GeostoreFeatureIdForwardingsProto
   */
  public function setForwardings(GeostoreFeatureIdForwardingsProto $forwardings)
  {
    $this->forwardings = $forwardings;
  }
  /**
   * @return GeostoreFeatureIdForwardingsProto
   */
  public function getForwardings()
  {
    return $this->forwardings;
  }
  /**
   * @param GeostoreFeatureHistoryMetadataProto
   */
  public function setHistory(GeostoreFeatureHistoryMetadataProto $history)
  {
    $this->history = $history;
  }
  /**
   * @return GeostoreFeatureHistoryMetadataProto
   */
  public function getHistory()
  {
    return $this->history;
  }
  /**
   * @param string
   */
  public function setVersionToken($versionToken)
  {
    $this->versionToken = $versionToken;
  }
  /**
   * @return string
   */
  public function getVersionToken()
  {
    return $this->versionToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreFeatureMetadataProto::class, 'Google_Service_Contentwarehouse_GeostoreFeatureMetadataProto');
