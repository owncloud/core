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

namespace Google\Service\ContainerAnalysis;

class Link extends \Google\Collection
{
  protected $collection_key = 'products';
  protected $byproductsType = ByProducts::class;
  protected $byproductsDataType = '';
  public $command;
  protected $environmentType = Environment::class;
  protected $environmentDataType = '';
  protected $materialsType = GrafeasV1beta1IntotoArtifact::class;
  protected $materialsDataType = 'array';
  protected $productsType = GrafeasV1beta1IntotoArtifact::class;
  protected $productsDataType = 'array';

  /**
   * @param ByProducts
   */
  public function setByproducts(ByProducts $byproducts)
  {
    $this->byproducts = $byproducts;
  }
  /**
   * @return ByProducts
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
   * @param Environment
   */
  public function setEnvironment(Environment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return Environment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param GrafeasV1beta1IntotoArtifact[]
   */
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  /**
   * @return GrafeasV1beta1IntotoArtifact[]
   */
  public function getMaterials()
  {
    return $this->materials;
  }
  /**
   * @param GrafeasV1beta1IntotoArtifact[]
   */
  public function setProducts($products)
  {
    $this->products = $products;
  }
  /**
   * @return GrafeasV1beta1IntotoArtifact[]
   */
  public function getProducts()
  {
    return $this->products;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Link::class, 'Google_Service_ContainerAnalysis_Link');
