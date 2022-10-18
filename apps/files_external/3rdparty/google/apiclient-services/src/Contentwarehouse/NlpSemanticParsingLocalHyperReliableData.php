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

class NlpSemanticParsingLocalHyperReliableData extends \Google\Collection
{
  protected $collection_key = 'retrievalGcids';
  /**
   * @var float
   */
  public $commodityStrength;
  protected $gcidsynsOverrideType = NlpSemanticParsingLocalHyperReliableDataGCIDSynsOverride::class;
  protected $gcidsynsOverrideDataType = 'array';
  /**
   * @var bool
   */
  public $hyperReliable;
  /**
   * @var string[]
   */
  public $retrievalGcids;

  /**
   * @param float
   */
  public function setCommodityStrength($commodityStrength)
  {
    $this->commodityStrength = $commodityStrength;
  }
  /**
   * @return float
   */
  public function getCommodityStrength()
  {
    return $this->commodityStrength;
  }
  /**
   * @param NlpSemanticParsingLocalHyperReliableDataGCIDSynsOverride[]
   */
  public function setGcidsynsOverride($gcidsynsOverride)
  {
    $this->gcidsynsOverride = $gcidsynsOverride;
  }
  /**
   * @return NlpSemanticParsingLocalHyperReliableDataGCIDSynsOverride[]
   */
  public function getGcidsynsOverride()
  {
    return $this->gcidsynsOverride;
  }
  /**
   * @param bool
   */
  public function setHyperReliable($hyperReliable)
  {
    $this->hyperReliable = $hyperReliable;
  }
  /**
   * @return bool
   */
  public function getHyperReliable()
  {
    return $this->hyperReliable;
  }
  /**
   * @param string[]
   */
  public function setRetrievalGcids($retrievalGcids)
  {
    $this->retrievalGcids = $retrievalGcids;
  }
  /**
   * @return string[]
   */
  public function getRetrievalGcids()
  {
    return $this->retrievalGcids;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalHyperReliableData::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalHyperReliableData');
