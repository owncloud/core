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

class SlsaProvenanceZeroTwo extends \Google\Collection
{
  protected $collection_key = 'materials';
  /**
   * @var array[]
   */
  public $buildConfig;
  /**
   * @var string
   */
  public $buildType;
  protected $builderType = GrafeasV1SlsaProvenanceZeroTwoSlsaBuilder::class;
  protected $builderDataType = '';
  protected $invocationType = GrafeasV1SlsaProvenanceZeroTwoSlsaInvocation::class;
  protected $invocationDataType = '';
  protected $materialsType = GrafeasV1SlsaProvenanceZeroTwoSlsaMaterial::class;
  protected $materialsDataType = 'array';
  protected $metadataType = GrafeasV1SlsaProvenanceZeroTwoSlsaMetadata::class;
  protected $metadataDataType = '';

  /**
   * @param array[]
   */
  public function setBuildConfig($buildConfig)
  {
    $this->buildConfig = $buildConfig;
  }
  /**
   * @return array[]
   */
  public function getBuildConfig()
  {
    return $this->buildConfig;
  }
  /**
   * @param string
   */
  public function setBuildType($buildType)
  {
    $this->buildType = $buildType;
  }
  /**
   * @return string
   */
  public function getBuildType()
  {
    return $this->buildType;
  }
  /**
   * @param GrafeasV1SlsaProvenanceZeroTwoSlsaBuilder
   */
  public function setBuilder(GrafeasV1SlsaProvenanceZeroTwoSlsaBuilder $builder)
  {
    $this->builder = $builder;
  }
  /**
   * @return GrafeasV1SlsaProvenanceZeroTwoSlsaBuilder
   */
  public function getBuilder()
  {
    return $this->builder;
  }
  /**
   * @param GrafeasV1SlsaProvenanceZeroTwoSlsaInvocation
   */
  public function setInvocation(GrafeasV1SlsaProvenanceZeroTwoSlsaInvocation $invocation)
  {
    $this->invocation = $invocation;
  }
  /**
   * @return GrafeasV1SlsaProvenanceZeroTwoSlsaInvocation
   */
  public function getInvocation()
  {
    return $this->invocation;
  }
  /**
   * @param GrafeasV1SlsaProvenanceZeroTwoSlsaMaterial[]
   */
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  /**
   * @return GrafeasV1SlsaProvenanceZeroTwoSlsaMaterial[]
   */
  public function getMaterials()
  {
    return $this->materials;
  }
  /**
   * @param GrafeasV1SlsaProvenanceZeroTwoSlsaMetadata
   */
  public function setMetadata(GrafeasV1SlsaProvenanceZeroTwoSlsaMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GrafeasV1SlsaProvenanceZeroTwoSlsaMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SlsaProvenanceZeroTwo::class, 'Google_Service_ContainerAnalysis_SlsaProvenanceZeroTwo');
