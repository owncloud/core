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

namespace Google\Service\OnDemandScanning;

class SlsaProvenance extends \Google\Collection
{
  protected $collection_key = 'materials';
  protected $builderType = SlsaBuilder::class;
  protected $builderDataType = '';
  protected $materialsType = Material::class;
  protected $materialsDataType = 'array';
  protected $metadataType = SlsaMetadata::class;
  protected $metadataDataType = '';
  protected $recipeType = SlsaRecipe::class;
  protected $recipeDataType = '';

  /**
   * @param SlsaBuilder
   */
  public function setBuilder(SlsaBuilder $builder)
  {
    $this->builder = $builder;
  }
  /**
   * @return SlsaBuilder
   */
  public function getBuilder()
  {
    return $this->builder;
  }
  /**
   * @param Material[]
   */
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  /**
   * @return Material[]
   */
  public function getMaterials()
  {
    return $this->materials;
  }
  /**
   * @param SlsaMetadata
   */
  public function setMetadata(SlsaMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return SlsaMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param SlsaRecipe
   */
  public function setRecipe(SlsaRecipe $recipe)
  {
    $this->recipe = $recipe;
  }
  /**
   * @return SlsaRecipe
   */
  public function getRecipe()
  {
    return $this->recipe;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SlsaProvenance::class, 'Google_Service_OnDemandScanning_SlsaProvenance');
