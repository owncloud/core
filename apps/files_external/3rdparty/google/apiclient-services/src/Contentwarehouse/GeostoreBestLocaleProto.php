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

class GeostoreBestLocaleProto extends \Google\Model
{
  protected $localeType = GeostoreFeatureIdProto::class;
  protected $localeDataType = '';
  /**
   * @var string
   */
  public $localizationPolicyId;
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';

  /**
   * @param GeostoreFeatureIdProto
   */
  public function setLocale(GeostoreFeatureIdProto $locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param string
   */
  public function setLocalizationPolicyId($localizationPolicyId)
  {
    $this->localizationPolicyId = $localizationPolicyId;
  }
  /**
   * @return string
   */
  public function getLocalizationPolicyId()
  {
    return $this->localizationPolicyId;
  }
  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setMetadata(GeostoreFieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreBestLocaleProto::class, 'Google_Service_Contentwarehouse_GeostoreBestLocaleProto');
