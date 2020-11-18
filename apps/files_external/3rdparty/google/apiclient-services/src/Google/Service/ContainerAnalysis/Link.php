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

class Google_Service_ContainerAnalysis_Link extends Google_Collection
{
  protected $collection_key = 'products';
  protected $byproductsType = 'Google_Service_ContainerAnalysis_ByProducts';
  protected $byproductsDataType = '';
  public $command;
  protected $environmentType = 'Google_Service_ContainerAnalysis_Environment';
  protected $environmentDataType = '';
  protected $materialsType = 'Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoArtifact';
  protected $materialsDataType = 'array';
  protected $productsType = 'Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoArtifact';
  protected $productsDataType = 'array';

  /**
   * @param Google_Service_ContainerAnalysis_ByProducts
   */
  public function setByproducts(Google_Service_ContainerAnalysis_ByProducts $byproducts)
  {
    $this->byproducts = $byproducts;
  }
  /**
   * @return Google_Service_ContainerAnalysis_ByProducts
   */
  public function getByproducts()
  {
    return $this->byproducts;
  }
  public function setCommand($command)
  {
    $this->command = $command;
  }
  public function getCommand()
  {
    return $this->command;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Environment
   */
  public function setEnvironment(Google_Service_ContainerAnalysis_Environment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Environment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoArtifact
   */
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoArtifact
   */
  public function getMaterials()
  {
    return $this->materials;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoArtifact
   */
  public function setProducts($products)
  {
    $this->products = $products;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoArtifact
   */
  public function getProducts()
  {
    return $this->products;
  }
}
