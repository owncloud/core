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

class Google_Service_ContainerAnalysis_Build extends Google_Model
{
  public $builderVersion;
  protected $signatureType = 'Google_Service_ContainerAnalysis_BuildSignature';
  protected $signatureDataType = '';

  public function setBuilderVersion($builderVersion)
  {
    $this->builderVersion = $builderVersion;
  }
  public function getBuilderVersion()
  {
    return $this->builderVersion;
  }
  /**
   * @param Google_Service_ContainerAnalysis_BuildSignature
   */
  public function setSignature(Google_Service_ContainerAnalysis_BuildSignature $signature)
  {
    $this->signature = $signature;
  }
  /**
   * @return Google_Service_ContainerAnalysis_BuildSignature
   */
  public function getSignature()
  {
    return $this->signature;
  }
}
