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

class Google_Service_Apigee_GoogleCloudApigeeV1Zone extends Google_Collection
{
  protected $collection_key = 'portals';
  public $accountCreationEmail;
  public $active;
  protected $allowedDomainsType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneAllowedDomains';
  protected $allowedDomainsDataType = '';
  public $companyName;
  public $copyright;
  public $created;
  protected $customEmailTemplatesType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplates';
  protected $customEmailTemplatesDataType = '';
  protected $customRegistrationFieldsType = 'Google_Service_Apigee_GoogleCloudApigeeV1CustomRegistrationField';
  protected $customRegistrationFieldsDataType = 'array';
  public $description;
  public $footerLinks;
  public $hostWhitelistedDomains;
  public $id;
  protected $linksType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinks';
  protected $linksDataType = '';
  public $manualApproval;
  public $modified;
  public $name;
  public $organization;
  public $portals;
  public $productLogo;
  public $samlConfig;
  protected $smtpConfigType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneSmtpConfig';
  protected $smtpConfigDataType = '';
  public $squareLogo;
  protected $tokenPolicyType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneTokenPolicy';
  protected $tokenPolicyDataType = '';
  public $zoneId;

  public function setAccountCreationEmail($accountCreationEmail)
  {
    $this->accountCreationEmail = $accountCreationEmail;
  }
  public function getAccountCreationEmail()
  {
    return $this->accountCreationEmail;
  }
  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneAllowedDomains
   */
  public function setAllowedDomains(Google_Service_Apigee_GoogleCloudApigeeV1ZoneAllowedDomains $allowedDomains)
  {
    $this->allowedDomains = $allowedDomains;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneAllowedDomains
   */
  public function getAllowedDomains()
  {
    return $this->allowedDomains;
  }
  public function setCompanyName($companyName)
  {
    $this->companyName = $companyName;
  }
  public function getCompanyName()
  {
    return $this->companyName;
  }
  public function setCopyright($copyright)
  {
    $this->copyright = $copyright;
  }
  public function getCopyright()
  {
    return $this->copyright;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplates
   */
  public function setCustomEmailTemplates(Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplates $customEmailTemplates)
  {
    $this->customEmailTemplates = $customEmailTemplates;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplates
   */
  public function getCustomEmailTemplates()
  {
    return $this->customEmailTemplates;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CustomRegistrationField
   */
  public function setCustomRegistrationFields($customRegistrationFields)
  {
    $this->customRegistrationFields = $customRegistrationFields;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomRegistrationField
   */
  public function getCustomRegistrationFields()
  {
    return $this->customRegistrationFields;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFooterLinks($footerLinks)
  {
    $this->footerLinks = $footerLinks;
  }
  public function getFooterLinks()
  {
    return $this->footerLinks;
  }
  public function setHostWhitelistedDomains($hostWhitelistedDomains)
  {
    $this->hostWhitelistedDomains = $hostWhitelistedDomains;
  }
  public function getHostWhitelistedDomains()
  {
    return $this->hostWhitelistedDomains;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinks
   */
  public function setLinks(Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinks $links)
  {
    $this->links = $links;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinks
   */
  public function getLinks()
  {
    return $this->links;
  }
  public function setManualApproval($manualApproval)
  {
    $this->manualApproval = $manualApproval;
  }
  public function getManualApproval()
  {
    return $this->manualApproval;
  }
  public function setModified($modified)
  {
    $this->modified = $modified;
  }
  public function getModified()
  {
    return $this->modified;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  public function getOrganization()
  {
    return $this->organization;
  }
  public function setPortals($portals)
  {
    $this->portals = $portals;
  }
  public function getPortals()
  {
    return $this->portals;
  }
  public function setProductLogo($productLogo)
  {
    $this->productLogo = $productLogo;
  }
  public function getProductLogo()
  {
    return $this->productLogo;
  }
  public function setSamlConfig($samlConfig)
  {
    $this->samlConfig = $samlConfig;
  }
  public function getSamlConfig()
  {
    return $this->samlConfig;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneSmtpConfig
   */
  public function setSmtpConfig(Google_Service_Apigee_GoogleCloudApigeeV1ZoneSmtpConfig $smtpConfig)
  {
    $this->smtpConfig = $smtpConfig;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneSmtpConfig
   */
  public function getSmtpConfig()
  {
    return $this->smtpConfig;
  }
  public function setSquareLogo($squareLogo)
  {
    $this->squareLogo = $squareLogo;
  }
  public function getSquareLogo()
  {
    return $this->squareLogo;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneTokenPolicy
   */
  public function setTokenPolicy(Google_Service_Apigee_GoogleCloudApigeeV1ZoneTokenPolicy $tokenPolicy)
  {
    $this->tokenPolicy = $tokenPolicy;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneTokenPolicy
   */
  public function getTokenPolicy()
  {
    return $this->tokenPolicy;
  }
  public function setZoneId($zoneId)
  {
    $this->zoneId = $zoneId;
  }
  public function getZoneId()
  {
    return $this->zoneId;
  }
}
