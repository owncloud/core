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

class QualityQrewriteAccountProvenance extends \Google\Collection
{
  protected $collection_key = 'dataSources';
  /**
   * @var string[]
   */
  public $dataSources;
  protected $googleAccountType = QualityQrewriteAccountProvenanceGoogleAccount::class;
  protected $googleAccountDataType = '';
  protected $thirdPartyAccountType = QualityQrewriteAccountProvenanceThirdPartyAccount::class;
  protected $thirdPartyAccountDataType = '';

  /**
   * @param string[]
   */
  public function setDataSources($dataSources)
  {
    $this->dataSources = $dataSources;
  }
  /**
   * @return string[]
   */
  public function getDataSources()
  {
    return $this->dataSources;
  }
  /**
   * @param QualityQrewriteAccountProvenanceGoogleAccount
   */
  public function setGoogleAccount(QualityQrewriteAccountProvenanceGoogleAccount $googleAccount)
  {
    $this->googleAccount = $googleAccount;
  }
  /**
   * @return QualityQrewriteAccountProvenanceGoogleAccount
   */
  public function getGoogleAccount()
  {
    return $this->googleAccount;
  }
  /**
   * @param QualityQrewriteAccountProvenanceThirdPartyAccount
   */
  public function setThirdPartyAccount(QualityQrewriteAccountProvenanceThirdPartyAccount $thirdPartyAccount)
  {
    $this->thirdPartyAccount = $thirdPartyAccount;
  }
  /**
   * @return QualityQrewriteAccountProvenanceThirdPartyAccount
   */
  public function getThirdPartyAccount()
  {
    return $this->thirdPartyAccount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityQrewriteAccountProvenance::class, 'Google_Service_Contentwarehouse_QualityQrewriteAccountProvenance');
