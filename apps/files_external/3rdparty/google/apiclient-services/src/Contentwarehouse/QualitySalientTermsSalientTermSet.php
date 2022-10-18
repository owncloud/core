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

class QualitySalientTermsSalientTermSet extends \Google\Collection
{
  protected $collection_key = 'salientTerm';
  protected $docDataType = QualitySalientTermsDocData::class;
  protected $docDataDataType = '';
  protected $salientTermType = QualitySalientTermsSalientTerm::class;
  protected $salientTermDataType = 'array';
  /**
   * @var string
   */
  public $version;

  /**
   * @param QualitySalientTermsDocData
   */
  public function setDocData(QualitySalientTermsDocData $docData)
  {
    $this->docData = $docData;
  }
  /**
   * @return QualitySalientTermsDocData
   */
  public function getDocData()
  {
    return $this->docData;
  }
  /**
   * @param QualitySalientTermsSalientTerm[]
   */
  public function setSalientTerm($salientTerm)
  {
    $this->salientTerm = $salientTerm;
  }
  /**
   * @return QualitySalientTermsSalientTerm[]
   */
  public function getSalientTerm()
  {
    return $this->salientTerm;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySalientTermsSalientTermSet::class, 'Google_Service_Contentwarehouse_QualitySalientTermsSalientTermSet');
