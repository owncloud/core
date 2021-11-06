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
  public $authDomain;
  public $codeBucket;
  public $databaseType;
  public $defaultBucket;
  public $defaultCookieExpiration;
  public $defaultHostname;
  protected $dispatchRulesType = UrlDispatchRule::class;
  protected $dispatchRulesDataType = 'array';
  protected $featureSettingsType = FeatureSettings::class;
  protected $featureSettingsDataType = '';
  public $gcrDomain;
  protected $iapType = IdentityAwareProxy::class;
  protected $iapDataType = '';
  public $id;
  public $locationId;
  public $name;
  public $serviceAccount;
  public $servingStatus;

  public function setAuthDomain($authDomain)
  {
    $this->authDomain = $authDomain;
  }
  public function getAuthDomain()
  {
    return $this->authDomain;
  }
  public function setCodeBucket($codeBucket)
  {
    $this->codeBucket = $codeBucket;
  }
  public function getCodeBucket()
  {
    return $this->codeBucket;
  }
  public function setDatabaseType($databaseType)
  {
    $this->databaseType = $databaseType;
  }
  public function getDatabaseType()
  {
    return $this->databaseType;
  }
  public function setDefaultBucket($defaultBucket)
  {
    $this->defaultBucket = $defaultBucket;
  }
  public function getDefaultBucket()
  {
    return $this->defaultBucket;
  }
  public function setDefaultCookieExpiration($defaultCookieExpiration)
  {
    $this->defaultCookieExpiration = $defaultCookieExpiration;
  }
  public function getDefaultCookieExpiration()
  {
    return $this->defaultCookieExpiration;
  }
  public function setDefaultHostname($defaultHostname)
  {
    $this->defaultHostname = $defaultHostname;
  }
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
  public function setGcrDomain($gcrDomain)
  {
    $this->gcrDomain = $gcrDomain;
  }
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
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setServingStatus($servingStatus)
  {
    $this->servingStatus = $servingStatus;
  }
  public function getServingStatus()
  {
    return $this->servingStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Application::class, 'Google_Service_Appengine_Application');
