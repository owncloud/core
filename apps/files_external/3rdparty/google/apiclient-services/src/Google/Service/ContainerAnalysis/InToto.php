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

class Google_Service_ContainerAnalysis_InToto extends Google_Collection
{
  protected $collection_key = 'signingKeys';
  public $expectedCommand;
  protected $expectedMaterialsType = 'Google_Service_ContainerAnalysis_ArtifactRule';
  protected $expectedMaterialsDataType = 'array';
  protected $expectedProductsType = 'Google_Service_ContainerAnalysis_ArtifactRule';
  protected $expectedProductsDataType = 'array';
  protected $signingKeysType = 'Google_Service_ContainerAnalysis_SigningKey';
  protected $signingKeysDataType = 'array';
  public $stepName;
  public $threshold;

  public function setExpectedCommand($expectedCommand)
  {
    $this->expectedCommand = $expectedCommand;
  }
  public function getExpectedCommand()
  {
    return $this->expectedCommand;
  }
  /**
   * @param Google_Service_ContainerAnalysis_ArtifactRule
   */
  public function setExpectedMaterials($expectedMaterials)
  {
    $this->expectedMaterials = $expectedMaterials;
  }
  /**
   * @return Google_Service_ContainerAnalysis_ArtifactRule
   */
  public function getExpectedMaterials()
  {
    return $this->expectedMaterials;
  }
  /**
   * @param Google_Service_ContainerAnalysis_ArtifactRule
   */
  public function setExpectedProducts($expectedProducts)
  {
    $this->expectedProducts = $expectedProducts;
  }
  /**
   * @return Google_Service_ContainerAnalysis_ArtifactRule
   */
  public function getExpectedProducts()
  {
    return $this->expectedProducts;
  }
  /**
   * @param Google_Service_ContainerAnalysis_SigningKey
   */
  public function setSigningKeys($signingKeys)
  {
    $this->signingKeys = $signingKeys;
  }
  /**
   * @return Google_Service_ContainerAnalysis_SigningKey
   */
  public function getSigningKeys()
  {
    return $this->signingKeys;
  }
  public function setStepName($stepName)
  {
    $this->stepName = $stepName;
  }
  public function getStepName()
  {
    return $this->stepName;
  }
  public function setThreshold($threshold)
  {
    $this->threshold = $threshold;
  }
  public function getThreshold()
  {
    return $this->threshold;
  }
}
