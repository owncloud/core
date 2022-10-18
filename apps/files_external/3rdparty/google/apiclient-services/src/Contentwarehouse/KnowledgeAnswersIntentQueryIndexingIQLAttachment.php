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

class KnowledgeAnswersIntentQueryIndexingIQLAttachment extends \Google\Collection
{
  protected $collection_key = 'piannoIqlBitmap';
  /**
   * @var string
   */
  public $iqlEncodingVersion;
  /**
   * @var string
   */
  public $iqlFuncalls;
  /**
   * @var string[]
   */
  public $piannoConfidenceScoreE2;
  /**
   * @var string[]
   */
  public $piannoIqlBitmap;

  /**
   * @param string
   */
  public function setIqlEncodingVersion($iqlEncodingVersion)
  {
    $this->iqlEncodingVersion = $iqlEncodingVersion;
  }
  /**
   * @return string
   */
  public function getIqlEncodingVersion()
  {
    return $this->iqlEncodingVersion;
  }
  /**
   * @param string
   */
  public function setIqlFuncalls($iqlFuncalls)
  {
    $this->iqlFuncalls = $iqlFuncalls;
  }
  /**
   * @return string
   */
  public function getIqlFuncalls()
  {
    return $this->iqlFuncalls;
  }
  /**
   * @param string[]
   */
  public function setPiannoConfidenceScoreE2($piannoConfidenceScoreE2)
  {
    $this->piannoConfidenceScoreE2 = $piannoConfidenceScoreE2;
  }
  /**
   * @return string[]
   */
  public function getPiannoConfidenceScoreE2()
  {
    return $this->piannoConfidenceScoreE2;
  }
  /**
   * @param string[]
   */
  public function setPiannoIqlBitmap($piannoIqlBitmap)
  {
    $this->piannoIqlBitmap = $piannoIqlBitmap;
  }
  /**
   * @return string[]
   */
  public function getPiannoIqlBitmap()
  {
    return $this->piannoIqlBitmap;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryIndexingIQLAttachment::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryIndexingIQLAttachment');
