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

class AppsPeopleOzExternalMergedpeopleapiName extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $displayNameLastFirst;
  protected $displayNameSourceType = SocialGraphApiProtoDisplayNameSource::class;
  protected $displayNameSourceDataType = '';
  /**
   * @var string
   */
  public $familyName;
  /**
   * @var string
   */
  public $formattedName;
  /**
   * @var string
   */
  public $givenName;
  /**
   * @var string
   */
  public $honorificPrefix;
  /**
   * @var string
   */
  public $honorificSuffix;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $middleName;
  protected $pronunciationsType = SocialGraphApiProtoPronunciations::class;
  protected $pronunciationsDataType = '';
  /**
   * @var string
   */
  public $shortDisplayName;
  /**
   * @var string
   */
  public $unstructuredName;
  /**
   * @var string
   */
  public $yomiFamilyName;
  /**
   * @var string
   */
  public $yomiFullName;
  /**
   * @var string
   */
  public $yomiGivenName;
  /**
   * @var string
   */
  public $yomiHonorificPrefix;
  /**
   * @var string
   */
  public $yomiHonorificSuffix;
  /**
   * @var string
   */
  public $yomiMiddleName;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setDisplayNameLastFirst($displayNameLastFirst)
  {
    $this->displayNameLastFirst = $displayNameLastFirst;
  }
  /**
   * @return string
   */
  public function getDisplayNameLastFirst()
  {
    return $this->displayNameLastFirst;
  }
  /**
   * @param SocialGraphApiProtoDisplayNameSource
   */
  public function setDisplayNameSource(SocialGraphApiProtoDisplayNameSource $displayNameSource)
  {
    $this->displayNameSource = $displayNameSource;
  }
  /**
   * @return SocialGraphApiProtoDisplayNameSource
   */
  public function getDisplayNameSource()
  {
    return $this->displayNameSource;
  }
  /**
   * @param string
   */
  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;
  }
  /**
   * @return string
   */
  public function getFamilyName()
  {
    return $this->familyName;
  }
  /**
   * @param string
   */
  public function setFormattedName($formattedName)
  {
    $this->formattedName = $formattedName;
  }
  /**
   * @return string
   */
  public function getFormattedName()
  {
    return $this->formattedName;
  }
  /**
   * @param string
   */
  public function setGivenName($givenName)
  {
    $this->givenName = $givenName;
  }
  /**
   * @return string
   */
  public function getGivenName()
  {
    return $this->givenName;
  }
  /**
   * @param string
   */
  public function setHonorificPrefix($honorificPrefix)
  {
    $this->honorificPrefix = $honorificPrefix;
  }
  /**
   * @return string
   */
  public function getHonorificPrefix()
  {
    return $this->honorificPrefix;
  }
  /**
   * @param string
   */
  public function setHonorificSuffix($honorificSuffix)
  {
    $this->honorificSuffix = $honorificSuffix;
  }
  /**
   * @return string
   */
  public function getHonorificSuffix()
  {
    return $this->honorificSuffix;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setMiddleName($middleName)
  {
    $this->middleName = $middleName;
  }
  /**
   * @return string
   */
  public function getMiddleName()
  {
    return $this->middleName;
  }
  /**
   * @param SocialGraphApiProtoPronunciations
   */
  public function setPronunciations(SocialGraphApiProtoPronunciations $pronunciations)
  {
    $this->pronunciations = $pronunciations;
  }
  /**
   * @return SocialGraphApiProtoPronunciations
   */
  public function getPronunciations()
  {
    return $this->pronunciations;
  }
  /**
   * @param string
   */
  public function setShortDisplayName($shortDisplayName)
  {
    $this->shortDisplayName = $shortDisplayName;
  }
  /**
   * @return string
   */
  public function getShortDisplayName()
  {
    return $this->shortDisplayName;
  }
  /**
   * @param string
   */
  public function setUnstructuredName($unstructuredName)
  {
    $this->unstructuredName = $unstructuredName;
  }
  /**
   * @return string
   */
  public function getUnstructuredName()
  {
    return $this->unstructuredName;
  }
  /**
   * @param string
   */
  public function setYomiFamilyName($yomiFamilyName)
  {
    $this->yomiFamilyName = $yomiFamilyName;
  }
  /**
   * @return string
   */
  public function getYomiFamilyName()
  {
    return $this->yomiFamilyName;
  }
  /**
   * @param string
   */
  public function setYomiFullName($yomiFullName)
  {
    $this->yomiFullName = $yomiFullName;
  }
  /**
   * @return string
   */
  public function getYomiFullName()
  {
    return $this->yomiFullName;
  }
  /**
   * @param string
   */
  public function setYomiGivenName($yomiGivenName)
  {
    $this->yomiGivenName = $yomiGivenName;
  }
  /**
   * @return string
   */
  public function getYomiGivenName()
  {
    return $this->yomiGivenName;
  }
  /**
   * @param string
   */
  public function setYomiHonorificPrefix($yomiHonorificPrefix)
  {
    $this->yomiHonorificPrefix = $yomiHonorificPrefix;
  }
  /**
   * @return string
   */
  public function getYomiHonorificPrefix()
  {
    return $this->yomiHonorificPrefix;
  }
  /**
   * @param string
   */
  public function setYomiHonorificSuffix($yomiHonorificSuffix)
  {
    $this->yomiHonorificSuffix = $yomiHonorificSuffix;
  }
  /**
   * @return string
   */
  public function getYomiHonorificSuffix()
  {
    return $this->yomiHonorificSuffix;
  }
  /**
   * @param string
   */
  public function setYomiMiddleName($yomiMiddleName)
  {
    $this->yomiMiddleName = $yomiMiddleName;
  }
  /**
   * @return string
   */
  public function getYomiMiddleName()
  {
    return $this->yomiMiddleName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiName::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiName');
