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

class NlpLoggingQRewriteClientCallPathInfo extends \Google\Model
{
  protected $qrewriteCandidateIdType = QualityQrewriteCandidateId::class;
  protected $qrewriteCandidateIdDataType = '';
  protected $qusCandidateIdType = QualityQrewriteCandidateId::class;
  protected $qusCandidateIdDataType = '';
  protected $qusClientCallPathInfoType = NlpLoggingQusClientCallPathInfo::class;
  protected $qusClientCallPathInfoDataType = '';
  /**
   * @var string
   */
  public $qusPhase;

  /**
   * @param QualityQrewriteCandidateId
   */
  public function setQrewriteCandidateId(QualityQrewriteCandidateId $qrewriteCandidateId)
  {
    $this->qrewriteCandidateId = $qrewriteCandidateId;
  }
  /**
   * @return QualityQrewriteCandidateId
   */
  public function getQrewriteCandidateId()
  {
    return $this->qrewriteCandidateId;
  }
  /**
   * @param QualityQrewriteCandidateId
   */
  public function setQusCandidateId(QualityQrewriteCandidateId $qusCandidateId)
  {
    $this->qusCandidateId = $qusCandidateId;
  }
  /**
   * @return QualityQrewriteCandidateId
   */
  public function getQusCandidateId()
  {
    return $this->qusCandidateId;
  }
  /**
   * @param NlpLoggingQusClientCallPathInfo
   */
  public function setQusClientCallPathInfo(NlpLoggingQusClientCallPathInfo $qusClientCallPathInfo)
  {
    $this->qusClientCallPathInfo = $qusClientCallPathInfo;
  }
  /**
   * @return NlpLoggingQusClientCallPathInfo
   */
  public function getQusClientCallPathInfo()
  {
    return $this->qusClientCallPathInfo;
  }
  /**
   * @param string
   */
  public function setQusPhase($qusPhase)
  {
    $this->qusPhase = $qusPhase;
  }
  /**
   * @return string
   */
  public function getQusPhase()
  {
    return $this->qusPhase;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpLoggingQRewriteClientCallPathInfo::class, 'Google_Service_Contentwarehouse_NlpLoggingQRewriteClientCallPathInfo');
