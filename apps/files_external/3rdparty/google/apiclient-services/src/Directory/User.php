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

namespace Google\Service\Directory;

class User extends \Google\Collection
{
  protected $collection_key = 'nonEditableAliases';
  /**
   * @var array
   */
  public $addresses;
  /**
   * @var bool
   */
  public $agreedToTerms;
  /**
   * @var string[]
   */
  public $aliases;
  /**
   * @var bool
   */
  public $archived;
  /**
   * @var bool
   */
  public $changePasswordAtNextLogin;
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var array[]
   */
  public $customSchemas;
  /**
   * @var string
   */
  public $customerId;
  /**
   * @var string
   */
  public $deletionTime;
  /**
   * @var array
   */
  public $emails;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var array
   */
  public $externalIds;
  /**
   * @var array
   */
  public $gender;
  /**
   * @var string
   */
  public $hashFunction;
  /**
   * @var string
   */
  public $id;
  /**
   * @var array
   */
  public $ims;
  /**
   * @var bool
   */
  public $includeInGlobalAddressList;
  /**
   * @var bool
   */
  public $ipWhitelisted;
  /**
   * @var bool
   */
  public $isAdmin;
  /**
   * @var bool
   */
  public $isDelegatedAdmin;
  /**
   * @var bool
   */
  public $isEnforcedIn2Sv;
  /**
   * @var bool
   */
  public $isEnrolledIn2Sv;
  /**
   * @var bool
   */
  public $isMailboxSetup;
  /**
   * @var array
   */
  public $keywords;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var array
   */
  public $languages;
  /**
   * @var string
   */
  public $lastLoginTime;
  /**
   * @var array
   */
  public $locations;
  protected $nameType = UserName::class;
  protected $nameDataType = '';
  /**
   * @var string[]
   */
  public $nonEditableAliases;
  /**
   * @var array
   */
  public $notes;
  /**
   * @var string
   */
  public $orgUnitPath;
  /**
   * @var array
   */
  public $organizations;
  /**
   * @var string
   */
  public $password;
  /**
   * @var array
   */
  public $phones;
  /**
   * @var array
   */
  public $posixAccounts;
  /**
   * @var string
   */
  public $primaryEmail;
  /**
   * @var string
   */
  public $recoveryEmail;
  /**
   * @var string
   */
  public $recoveryPhone;
  /**
   * @var array
   */
  public $relations;
  /**
   * @var array
   */
  public $sshPublicKeys;
  /**
   * @var bool
   */
  public $suspended;
  /**
   * @var string
   */
  public $suspensionReason;
  /**
   * @var string
   */
  public $thumbnailPhotoEtag;
  /**
   * @var string
   */
  public $thumbnailPhotoUrl;
  /**
   * @var array
   */
  public $websites;

  /**
   * @param array
   */
  public function setAddresses($addresses)
  {
    $this->addresses = $addresses;
  }
  /**
   * @return array
   */
  public function getAddresses()
  {
    return $this->addresses;
  }
  /**
   * @param bool
   */
  public function setAgreedToTerms($agreedToTerms)
  {
    $this->agreedToTerms = $agreedToTerms;
  }
  /**
   * @return bool
   */
  public function getAgreedToTerms()
  {
    return $this->agreedToTerms;
  }
  /**
   * @param string[]
   */
  public function setAliases($aliases)
  {
    $this->aliases = $aliases;
  }
  /**
   * @return string[]
   */
  public function getAliases()
  {
    return $this->aliases;
  }
  /**
   * @param bool
   */
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  /**
   * @return bool
   */
  public function getArchived()
  {
    return $this->archived;
  }
  /**
   * @param bool
   */
  public function setChangePasswordAtNextLogin($changePasswordAtNextLogin)
  {
    $this->changePasswordAtNextLogin = $changePasswordAtNextLogin;
  }
  /**
   * @return bool
   */
  public function getChangePasswordAtNextLogin()
  {
    return $this->changePasswordAtNextLogin;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param array[]
   */
  public function setCustomSchemas($customSchemas)
  {
    $this->customSchemas = $customSchemas;
  }
  /**
   * @return array[]
   */
  public function getCustomSchemas()
  {
    return $this->customSchemas;
  }
  /**
   * @param string
   */
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  /**
   * @return string
   */
  public function getCustomerId()
  {
    return $this->customerId;
  }
  /**
   * @param string
   */
  public function setDeletionTime($deletionTime)
  {
    $this->deletionTime = $deletionTime;
  }
  /**
   * @return string
   */
  public function getDeletionTime()
  {
    return $this->deletionTime;
  }
  /**
   * @param array
   */
  public function setEmails($emails)
  {
    $this->emails = $emails;
  }
  /**
   * @return array
   */
  public function getEmails()
  {
    return $this->emails;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param array
   */
  public function setExternalIds($externalIds)
  {
    $this->externalIds = $externalIds;
  }
  /**
   * @return array
   */
  public function getExternalIds()
  {
    return $this->externalIds;
  }
  /**
   * @param array
   */
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  /**
   * @return array
   */
  public function getGender()
  {
    return $this->gender;
  }
  /**
   * @param string
   */
  public function setHashFunction($hashFunction)
  {
    $this->hashFunction = $hashFunction;
  }
  /**
   * @return string
   */
  public function getHashFunction()
  {
    return $this->hashFunction;
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
   * @param array
   */
  public function setIms($ims)
  {
    $this->ims = $ims;
  }
  /**
   * @return array
   */
  public function getIms()
  {
    return $this->ims;
  }
  /**
   * @param bool
   */
  public function setIncludeInGlobalAddressList($includeInGlobalAddressList)
  {
    $this->includeInGlobalAddressList = $includeInGlobalAddressList;
  }
  /**
   * @return bool
   */
  public function getIncludeInGlobalAddressList()
  {
    return $this->includeInGlobalAddressList;
  }
  /**
   * @param bool
   */
  public function setIpWhitelisted($ipWhitelisted)
  {
    $this->ipWhitelisted = $ipWhitelisted;
  }
  /**
   * @return bool
   */
  public function getIpWhitelisted()
  {
    return $this->ipWhitelisted;
  }
  /**
   * @param bool
   */
  public function setIsAdmin($isAdmin)
  {
    $this->isAdmin = $isAdmin;
  }
  /**
   * @return bool
   */
  public function getIsAdmin()
  {
    return $this->isAdmin;
  }
  /**
   * @param bool
   */
  public function setIsDelegatedAdmin($isDelegatedAdmin)
  {
    $this->isDelegatedAdmin = $isDelegatedAdmin;
  }
  /**
   * @return bool
   */
  public function getIsDelegatedAdmin()
  {
    return $this->isDelegatedAdmin;
  }
  /**
   * @param bool
   */
  public function setIsEnforcedIn2Sv($isEnforcedIn2Sv)
  {
    $this->isEnforcedIn2Sv = $isEnforcedIn2Sv;
  }
  /**
   * @return bool
   */
  public function getIsEnforcedIn2Sv()
  {
    return $this->isEnforcedIn2Sv;
  }
  /**
   * @param bool
   */
  public function setIsEnrolledIn2Sv($isEnrolledIn2Sv)
  {
    $this->isEnrolledIn2Sv = $isEnrolledIn2Sv;
  }
  /**
   * @return bool
   */
  public function getIsEnrolledIn2Sv()
  {
    return $this->isEnrolledIn2Sv;
  }
  /**
   * @param bool
   */
  public function setIsMailboxSetup($isMailboxSetup)
  {
    $this->isMailboxSetup = $isMailboxSetup;
  }
  /**
   * @return bool
   */
  public function getIsMailboxSetup()
  {
    return $this->isMailboxSetup;
  }
  /**
   * @param array
   */
  public function setKeywords($keywords)
  {
    $this->keywords = $keywords;
  }
  /**
   * @return array
   */
  public function getKeywords()
  {
    return $this->keywords;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param array
   */
  public function setLanguages($languages)
  {
    $this->languages = $languages;
  }
  /**
   * @return array
   */
  public function getLanguages()
  {
    return $this->languages;
  }
  /**
   * @param string
   */
  public function setLastLoginTime($lastLoginTime)
  {
    $this->lastLoginTime = $lastLoginTime;
  }
  /**
   * @return string
   */
  public function getLastLoginTime()
  {
    return $this->lastLoginTime;
  }
  /**
   * @param array
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return array
   */
  public function getLocations()
  {
    return $this->locations;
  }
  /**
   * @param UserName
   */
  public function setName(UserName $name)
  {
    $this->name = $name;
  }
  /**
   * @return UserName
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setNonEditableAliases($nonEditableAliases)
  {
    $this->nonEditableAliases = $nonEditableAliases;
  }
  /**
   * @return string[]
   */
  public function getNonEditableAliases()
  {
    return $this->nonEditableAliases;
  }
  /**
   * @param array
   */
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return array
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param string
   */
  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }
  /**
   * @return string
   */
  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }
  /**
   * @param array
   */
  public function setOrganizations($organizations)
  {
    $this->organizations = $organizations;
  }
  /**
   * @return array
   */
  public function getOrganizations()
  {
    return $this->organizations;
  }
  /**
   * @param string
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }
  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param array
   */
  public function setPhones($phones)
  {
    $this->phones = $phones;
  }
  /**
   * @return array
   */
  public function getPhones()
  {
    return $this->phones;
  }
  /**
   * @param array
   */
  public function setPosixAccounts($posixAccounts)
  {
    $this->posixAccounts = $posixAccounts;
  }
  /**
   * @return array
   */
  public function getPosixAccounts()
  {
    return $this->posixAccounts;
  }
  /**
   * @param string
   */
  public function setPrimaryEmail($primaryEmail)
  {
    $this->primaryEmail = $primaryEmail;
  }
  /**
   * @return string
   */
  public function getPrimaryEmail()
  {
    return $this->primaryEmail;
  }
  /**
   * @param string
   */
  public function setRecoveryEmail($recoveryEmail)
  {
    $this->recoveryEmail = $recoveryEmail;
  }
  /**
   * @return string
   */
  public function getRecoveryEmail()
  {
    return $this->recoveryEmail;
  }
  /**
   * @param string
   */
  public function setRecoveryPhone($recoveryPhone)
  {
    $this->recoveryPhone = $recoveryPhone;
  }
  /**
   * @return string
   */
  public function getRecoveryPhone()
  {
    return $this->recoveryPhone;
  }
  /**
   * @param array
   */
  public function setRelations($relations)
  {
    $this->relations = $relations;
  }
  /**
   * @return array
   */
  public function getRelations()
  {
    return $this->relations;
  }
  /**
   * @param array
   */
  public function setSshPublicKeys($sshPublicKeys)
  {
    $this->sshPublicKeys = $sshPublicKeys;
  }
  /**
   * @return array
   */
  public function getSshPublicKeys()
  {
    return $this->sshPublicKeys;
  }
  /**
   * @param bool
   */
  public function setSuspended($suspended)
  {
    $this->suspended = $suspended;
  }
  /**
   * @return bool
   */
  public function getSuspended()
  {
    return $this->suspended;
  }
  /**
   * @param string
   */
  public function setSuspensionReason($suspensionReason)
  {
    $this->suspensionReason = $suspensionReason;
  }
  /**
   * @return string
   */
  public function getSuspensionReason()
  {
    return $this->suspensionReason;
  }
  /**
   * @param string
   */
  public function setThumbnailPhotoEtag($thumbnailPhotoEtag)
  {
    $this->thumbnailPhotoEtag = $thumbnailPhotoEtag;
  }
  /**
   * @return string
   */
  public function getThumbnailPhotoEtag()
  {
    return $this->thumbnailPhotoEtag;
  }
  /**
   * @param string
   */
  public function setThumbnailPhotoUrl($thumbnailPhotoUrl)
  {
    $this->thumbnailPhotoUrl = $thumbnailPhotoUrl;
  }
  /**
   * @return string
   */
  public function getThumbnailPhotoUrl()
  {
    return $this->thumbnailPhotoUrl;
  }
  /**
   * @param array
   */
  public function setWebsites($websites)
  {
    $this->websites = $websites;
  }
  /**
   * @return array
   */
  public function getWebsites()
  {
    return $this->websites;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(User::class, 'Google_Service_Directory_User');
