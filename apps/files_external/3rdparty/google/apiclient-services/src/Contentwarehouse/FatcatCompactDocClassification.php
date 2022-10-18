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

class FatcatCompactDocClassification extends \Google\Collection
{
  protected $collection_key = 'taxonomic';
  protected $binaryType = FatcatCompactBinaryClassification::class;
  protected $binaryDataType = 'array';
  protected $clustersType = FatcatCompactRephilClusters::class;
  protected $clustersDataType = '';
  /**
   * @var string
   */
  public $epoch;
  /**
   * @var string
   */
  public $langCode;
  /**
   * @var int
   */
  public $rephilModelId;
  protected $taxonomicType = FatcatCompactTaxonomicClassification::class;
  protected $taxonomicDataType = 'array';
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $weight;

  /**
   * @param FatcatCompactBinaryClassification[]
   */
  public function setBinary($binary)
  {
    $this->binary = $binary;
  }
  /**
   * @return FatcatCompactBinaryClassification[]
   */
  public function getBinary()
  {
    return $this->binary;
  }
  /**
   * @param FatcatCompactRephilClusters
   */
  public function setClusters(FatcatCompactRephilClusters $clusters)
  {
    $this->clusters = $clusters;
  }
  /**
   * @return FatcatCompactRephilClusters
   */
  public function getClusters()
  {
    return $this->clusters;
  }
  /**
   * @param string
   */
  public function setEpoch($epoch)
  {
    $this->epoch = $epoch;
  }
  /**
   * @return string
   */
  public function getEpoch()
  {
    return $this->epoch;
  }
  /**
   * @param string
   */
  public function setLangCode($langCode)
  {
    $this->langCode = $langCode;
  }
  /**
   * @return string
   */
  public function getLangCode()
  {
    return $this->langCode;
  }
  /**
   * @param int
   */
  public function setRephilModelId($rephilModelId)
  {
    $this->rephilModelId = $rephilModelId;
  }
  /**
   * @return int
   */
  public function getRephilModelId()
  {
    return $this->rephilModelId;
  }
  /**
   * @param FatcatCompactTaxonomicClassification[]
   */
  public function setTaxonomic($taxonomic)
  {
    $this->taxonomic = $taxonomic;
  }
  /**
   * @return FatcatCompactTaxonomicClassification[]
   */
  public function getTaxonomic()
  {
    return $this->taxonomic;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param string
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return string
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FatcatCompactDocClassification::class, 'Google_Service_Contentwarehouse_FatcatCompactDocClassification');
