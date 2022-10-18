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

class QualityRankembedMustangMustangRankEmbedInfo extends \Google\Model
{
  protected $compressedDocumentEmbeddingType = QualityRankembedMustangMustangRankEmbedInfoCompressedEmbedding::class;
  protected $compressedDocumentEmbeddingDataType = '';
  /**
   * @var string
   */
  public $fixedPointEncoding;
  /**
   * @var string
   */
  public $scaledFixedPoint4Encoding;
  /**
   * @var string
   */
  public $scaledFixedPoint8Encoding;
  /**
   * @var string
   */
  public $scaledShiftedFixedPoint4Encoding;
  /**
   * @var string
   */
  public $versionAndImprovInfo;

  /**
   * @param QualityRankembedMustangMustangRankEmbedInfoCompressedEmbedding
   */
  public function setCompressedDocumentEmbedding(QualityRankembedMustangMustangRankEmbedInfoCompressedEmbedding $compressedDocumentEmbedding)
  {
    $this->compressedDocumentEmbedding = $compressedDocumentEmbedding;
  }
  /**
   * @return QualityRankembedMustangMustangRankEmbedInfoCompressedEmbedding
   */
  public function getCompressedDocumentEmbedding()
  {
    return $this->compressedDocumentEmbedding;
  }
  /**
   * @param string
   */
  public function setFixedPointEncoding($fixedPointEncoding)
  {
    $this->fixedPointEncoding = $fixedPointEncoding;
  }
  /**
   * @return string
   */
  public function getFixedPointEncoding()
  {
    return $this->fixedPointEncoding;
  }
  /**
   * @param string
   */
  public function setScaledFixedPoint4Encoding($scaledFixedPoint4Encoding)
  {
    $this->scaledFixedPoint4Encoding = $scaledFixedPoint4Encoding;
  }
  /**
   * @return string
   */
  public function getScaledFixedPoint4Encoding()
  {
    return $this->scaledFixedPoint4Encoding;
  }
  /**
   * @param string
   */
  public function setScaledFixedPoint8Encoding($scaledFixedPoint8Encoding)
  {
    $this->scaledFixedPoint8Encoding = $scaledFixedPoint8Encoding;
  }
  /**
   * @return string
   */
  public function getScaledFixedPoint8Encoding()
  {
    return $this->scaledFixedPoint8Encoding;
  }
  /**
   * @param string
   */
  public function setScaledShiftedFixedPoint4Encoding($scaledShiftedFixedPoint4Encoding)
  {
    $this->scaledShiftedFixedPoint4Encoding = $scaledShiftedFixedPoint4Encoding;
  }
  /**
   * @return string
   */
  public function getScaledShiftedFixedPoint4Encoding()
  {
    return $this->scaledShiftedFixedPoint4Encoding;
  }
  /**
   * @param string
   */
  public function setVersionAndImprovInfo($versionAndImprovInfo)
  {
    $this->versionAndImprovInfo = $versionAndImprovInfo;
  }
  /**
   * @return string
   */
  public function getVersionAndImprovInfo()
  {
    return $this->versionAndImprovInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityRankembedMustangMustangRankEmbedInfo::class, 'Google_Service_Contentwarehouse_QualityRankembedMustangMustangRankEmbedInfo');
