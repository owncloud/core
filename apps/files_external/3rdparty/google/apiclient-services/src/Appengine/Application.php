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

namespace Google\Service\Appengine;

class Application extends \Google\Collection
{
  protected $collection_key = 'dispatchRules';
  /**
   * @var string
   */
  public $authDomain;
  /**
   * @var string
   */
  public $codeBucket;
  /**
   * @var string
   */
  public $databaseType;
  /**
   * @var string
   */
  public $defaultBucket;
  /**
   * @var string
   */
  public $defaultCookieExpiration;
  /**
   * @var string
   */
  public $defaultHostname;
  protected $dispatchRulesType = UrlDispatchRule::class;
  protected $dispatchRulesDataType = 'array';
  protected $featureSettingsType = FeatureSettings::class;
  protected $featureSettingsDataType = '';
  /**
   * @var string
   */
  public $gcrDomain;
  protected $iapType = IdentityAwareProxy::class;
  protected $iapDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $locationId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $servingStatus;

  /**
   * @param string
   */
  public function setAuthDomain($authDomain)
  {
    $this->authDomain = $authDomain;
  }
  /**
   * @return string
   */
  public function getAuthDomain()
  {
    return $this->authDomain;
  }
  /**
   * @param string
   */
  public function setCodeBucket($codeBucket)
  {
    $this->codeBucket = $codeBucket;
  }
  /**
   * @return string
   */
  public function getCodeBucket()
  {
    return $this->codeBucket;
  }
  /**
   * @param string
   */
  public function setDatabaseType($databaseType)
  {
    $this->databaseType = $databaseType;
  }
  /**
   * @return string
   */
  public function getDatabaseType()
  {
    return $this->databaseType;
  }
  /**
   * @param string
   */
  public function setDefaultBucket($defaultBucket)
  {
    $this->defaultBucket = $defaultBucket;
  }
  /**
   * @return string
   */
  public function getDefaultBucket()
  {
    return $this->defaultBucket;
  }
  /**
   * @param string
   */
  public function setDefaultCookieExpiration($defaultCookieExpiration)
  {
    $this->defaultCookieExpiration = $defaultCookieExpiration;
  }
  /**
   * @return string
   */
  public function getDefaultCookieExpiration()
  {
    return $this->defaultCookieExpiration;
  }
  /**
   * @param string
   */
  public function setDefaultHostname($defaultHostname)
  {
    $this->defaultHostname = $defaultHostname;
  }
  /**
   * @return string
   */
  public function getDefaultHostname()
  {
    return $this->defaultHostname;
  }
  /**
   * @param UrlDispatchRule[]
   */
  public function setDispatchRules($dispatchRules)
  {
    $this->dispatchRules = $dispatchRules;
  }
  /**
   * @return UrlDispatchRule[]
   */
  public function getDispatchRules()
  {
    return $this->dispatchRules;
  }
  /**
   * @param FeatureSettings
   */
  public function setFeatureSettings(FeatureSettings $featureSettings)
  {
    $this->featureSettings = $featureSettings;
  }
  /**
   * @return FeatureSettings
   */
  public function getFeatureSettings()
  {
    return $this->featureSettings;
  }
  /**
   * @param string
   */
  public function setGcrDomain($gcrDomain)
  {
    $this->gcrDomain = $gcrDomain;
  }
  /**
   * @return string
   */
  public function getGcrDomain()
  {
    return $this->gcrDomain;
  }
  /**
   * @param IdentityAwareProxy
   */
  public function setIap(IdentityAwareProxy $iap)
  {
    $this->iap = $iap;
  }
  /**
   * @return IdentityAwareProxy
   */
  public function getIap()
  {
    return $this->iap;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  /**
   * @return string
   */
  public function getLocationId()
  {
    return $this->locationId;
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
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string
   */
  public function setServingStatus($servingStatus)
  {
    $this->servingStatus = $servingStatus;
  }
  /**
   * @return string
   */
  public function getServingStatus()
  {
    return $this->servingStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Application::class, 'Google_Service_Appengine_Application');
