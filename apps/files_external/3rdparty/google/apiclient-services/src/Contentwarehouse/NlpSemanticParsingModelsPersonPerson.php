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

class NlpSemanticParsingModelsPersonPerson extends \Google\Collection
{
  protected $collection_key = 'contactData';
  protected $alternativeNameInfoType = QualityQrewriteAlternativeNameInfo::class;
  protected $alternativeNameInfoDataType = 'array';
  /**
   * @var string[]
   */
  public $alternativeNames;
  /**
   * @var string[]
   */
  public $annotationSource;
  protected $contactDataType = QualityQrewritePersonalContactData::class;
  protected $contactDataDataType = 'array';
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var bool
   */
  public $isPersonGroupReference;
  /**
   * @var bool
   */
  public $isPersonalContact;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $normalizedText;
  protected $pkgSemanticsType = NlpSemanticParsingQRefAnnotation::class;
  protected $pkgSemanticsDataType = '';
  /**
   * @var string
   */
  public $rawText;

  /**
   * @param QualityQrewriteAlternativeNameInfo[]
   */
  public function setAlternativeNameInfo($alternativeNameInfo)
  {
    $this->alternativeNameInfo = $alternativeNameInfo;
  }
  /**
   * @return QualityQrewriteAlternativeNameInfo[]
   */
  public function getAlternativeNameInfo()
  {
    return $this->alternativeNameInfo;
  }
  /**
   * @param string[]
   */
  public function setAlternativeNames($alternativeNames)
  {
    $this->alternativeNames = $alternativeNames;
  }
  /**
   * @return string[]
   */
  public function getAlternativeNames()
  {
    return $this->alternativeNames;
  }
  /**
   * @param string[]
   */
  public function setAnnotationSource($annotationSource)
  {
    $this->annotationSource = $annotationSource;
  }
  /**
   * @return string[]
   */
  public function getAnnotationSource()
  {
    return $this->annotationSource;
  }
  /**
   * @param QualityQrewritePersonalContactData[]
   */
  public function setContactData($contactData)
  {
    $this->contactData = $contactData;
  }
  /**
   * @return QualityQrewritePersonalContactData[]
   */
  public function getContactData()
  {
    return $this->contactData;
  }
  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setEvalData(NlpSemanticParsingAnnotationEvalData $evalData)
  {
    $this->evalData = $evalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getEvalData()
  {
    return $this->evalData;
  }
  /**
   * @param bool
   */
  public function setIsPersonGroupReference($isPersonGroupReference)
  {
    $this->isPersonGroupReference = $isPersonGroupReference;
  }
  /**
   * @return bool
   */
  public function getIsPersonGroupReference()
  {
    return $this->isPersonGroupReference;
  }
  /**
   * @param bool
   */
  public function setIsPersonalContact($isPersonalContact)
  {
    $this->isPersonalContact = $isPersonalContact;
  }
  /**
   * @return bool
   */
  public function getIsPersonalContact()
  {
    return $this->isPersonalContact;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setNormalizedText($normalizedText)
  {
    $this->normalizedText = $normalizedText;
  }
  /**
   * @return string
   */
  public function getNormalizedText()
  {
    return $this->normalizedText;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotation
   */
  public function setPkgSemantics(NlpSemanticParsingQRefAnnotation $pkgSemantics)
  {
    $this->pkgSemantics = $pkgSemantics;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotation
   */
  public function getPkgSemantics()
  {
    return $this->pkgSemantics;
  }
  /**
   * @param string
   */
  public function setRawText($rawText)
  {
    $this->rawText = $rawText;
  }
  /**
   * @return string
   */
  public function getRawText()
  {
    return $this->rawText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsPersonPerson::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsPersonPerson');
