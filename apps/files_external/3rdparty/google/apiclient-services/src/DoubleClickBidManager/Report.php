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

namespace Google\Service\DoubleClickBidManager;

class Report extends \Google\Model
{
  protected $keyType = ReportKey::class;
  protected $keyDataType = '';
  protected $metadataType = ReportMetadata::class;
  protected $metadataDataType = '';
  protected $paramsType = Parameters::class;
  protected $paramsDataType = '';

  /**
   * @param ReportKey
   */
  public function setKey(ReportKey $key)
  {
    $this->key = $key;
  }
  /**
   * @return ReportKey
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param ReportMetadata
   */
  public function setMetadata(ReportMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return ReportMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Parameters
   */
  public function setParams(Parameters $params)
  {
    $this->params = $params;
  }
  /**
   * @return Parameters
   */
  public function getParams()
  {
    return $this->params;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Report::class, 'Google_Service_DoubleClickBidManager_Report');
