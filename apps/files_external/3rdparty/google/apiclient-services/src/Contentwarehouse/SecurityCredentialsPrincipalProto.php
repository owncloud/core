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

class SecurityCredentialsPrincipalProto extends \Google\Model
{
  protected $allAuthenticatedUsersType = SecurityCredentialsAllAuthenticatedUsersProto::class;
  protected $allAuthenticatedUsersDataType = '';
  protected $capTokenHolderType = SecurityCredentialsCapTokenHolderProto::class;
  protected $capTokenHolderDataType = '';
  protected $chatType = SecurityCredentialsChatProto::class;
  protected $chatDataType = '';
  protected $circleType = SecurityCredentialsCircleProto::class;
  protected $circleDataType = '';
  protected $cloudPrincipalType = SecurityCredentialsCloudPrincipalProto::class;
  protected $cloudPrincipalDataType = '';
  protected $contactGroupType = SecurityCredentialsContactGroupProto::class;
  protected $contactGroupDataType = '';
  protected $emailOwnerType = SecurityCredentialsEmailOwnerProto::class;
  protected $emailOwnerDataType = '';
  protected $eventType = SecurityCredentialsEventProto::class;
  protected $eventDataType = '';
  protected $gaiaGroupType = SecurityCredentialsGaiaGroupProto::class;
  protected $gaiaGroupDataType = '';
  protected $gaiaUserType = SecurityCredentialsGaiaUserProto::class;
  protected $gaiaUserDataType = '';
  protected $hostType = SecurityCredentialsHostProto::class;
  protected $hostDataType = '';
  protected $ldapGroupType = SecurityCredentialsLdapGroupProto::class;
  protected $ldapGroupDataType = '';
  protected $ldapUserType = SecurityCredentialsLdapUserProto::class;
  protected $ldapUserDataType = '';
  protected $mdbGroupType = SecurityCredentialsMdbGroupProto::class;
  protected $mdbGroupDataType = '';
  protected $mdbUserType = SecurityCredentialsMdbUserProto::class;
  protected $mdbUserDataType = '';
  protected $oauthConsumerType = SecurityCredentialsOAuthConsumerProto::class;
  protected $oauthConsumerDataType = '';
  protected $postiniUserType = SecurityCredentialsPostiniUserProto::class;
  protected $postiniUserDataType = '';
  protected $rbacRoleType = SecurityCredentialsRbacRoleProto::class;
  protected $rbacRoleDataType = '';
  protected $rbacSubjectType = SecurityCredentialsRbacSubjectProto::class;
  protected $rbacSubjectDataType = '';
  protected $resourceRoleType = SecurityCredentialsResourceRoleProto::class;
  protected $resourceRoleDataType = '';
  /**
   * @var string
   */
  public $scope;
  protected $signingKeyPossessorType = SecurityCredentialsSigningKeyPossessorProto::class;
  protected $signingKeyPossessorDataType = '';
  protected $simpleSecretHolderType = SecurityCredentialsSimpleSecretHolderProto::class;
  protected $simpleSecretHolderDataType = '';
  protected $socialGraphNodeType = SecurityCredentialsSocialGraphNodeProto::class;
  protected $socialGraphNodeDataType = '';
  protected $squareType = SecurityCredentialsSquareProto::class;
  protected $squareDataType = '';
  protected $youtubeUserType = SecurityCredentialsYoutubeUserProto::class;
  protected $youtubeUserDataType = '';
  protected $zwiebackSessionType = SecurityCredentialsZwiebackSessionProto::class;
  protected $zwiebackSessionDataType = '';

  /**
   * @param SecurityCredentialsAllAuthenticatedUsersProto
   */
  public function setAllAuthenticatedUsers(SecurityCredentialsAllAuthenticatedUsersProto $allAuthenticatedUsers)
  {
    $this->allAuthenticatedUsers = $allAuthenticatedUsers;
  }
  /**
   * @return SecurityCredentialsAllAuthenticatedUsersProto
   */
  public function getAllAuthenticatedUsers()
  {
    return $this->allAuthenticatedUsers;
  }
  /**
   * @param SecurityCredentialsCapTokenHolderProto
   */
  public function setCapTokenHolder(SecurityCredentialsCapTokenHolderProto $capTokenHolder)
  {
    $this->capTokenHolder = $capTokenHolder;
  }
  /**
   * @return SecurityCredentialsCapTokenHolderProto
   */
  public function getCapTokenHolder()
  {
    return $this->capTokenHolder;
  }
  /**
   * @param SecurityCredentialsChatProto
   */
  public function setChat(SecurityCredentialsChatProto $chat)
  {
    $this->chat = $chat;
  }
  /**
   * @return SecurityCredentialsChatProto
   */
  public function getChat()
  {
    return $this->chat;
  }
  /**
   * @param SecurityCredentialsCircleProto
   */
  public function setCircle(SecurityCredentialsCircleProto $circle)
  {
    $this->circle = $circle;
  }
  /**
   * @return SecurityCredentialsCircleProto
   */
  public function getCircle()
  {
    return $this->circle;
  }
  /**
   * @param SecurityCredentialsCloudPrincipalProto
   */
  public function setCloudPrincipal(SecurityCredentialsCloudPrincipalProto $cloudPrincipal)
  {
    $this->cloudPrincipal = $cloudPrincipal;
  }
  /**
   * @return SecurityCredentialsCloudPrincipalProto
   */
  public function getCloudPrincipal()
  {
    return $this->cloudPrincipal;
  }
  /**
   * @param SecurityCredentialsContactGroupProto
   */
  public function setContactGroup(SecurityCredentialsContactGroupProto $contactGroup)
  {
    $this->contactGroup = $contactGroup;
  }
  /**
   * @return SecurityCredentialsContactGroupProto
   */
  public function getContactGroup()
  {
    return $this->contactGroup;
  }
  /**
   * @param SecurityCredentialsEmailOwnerProto
   */
  public function setEmailOwner(SecurityCredentialsEmailOwnerProto $emailOwner)
  {
    $this->emailOwner = $emailOwner;
  }
  /**
   * @return SecurityCredentialsEmailOwnerProto
   */
  public function getEmailOwner()
  {
    return $this->emailOwner;
  }
  /**
   * @param SecurityCredentialsEventProto
   */
  public function setEvent(SecurityCredentialsEventProto $event)
  {
    $this->event = $event;
  }
  /**
   * @return SecurityCredentialsEventProto
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param SecurityCredentialsGaiaGroupProto
   */
  public function setGaiaGroup(SecurityCredentialsGaiaGroupProto $gaiaGroup)
  {
    $this->gaiaGroup = $gaiaGroup;
  }
  /**
   * @return SecurityCredentialsGaiaGroupProto
   */
  public function getGaiaGroup()
  {
    return $this->gaiaGroup;
  }
  /**
   * @param SecurityCredentialsGaiaUserProto
   */
  public function setGaiaUser(SecurityCredentialsGaiaUserProto $gaiaUser)
  {
    $this->gaiaUser = $gaiaUser;
  }
  /**
   * @return SecurityCredentialsGaiaUserProto
   */
  public function getGaiaUser()
  {
    return $this->gaiaUser;
  }
  /**
   * @param SecurityCredentialsHostProto
   */
  public function setHost(SecurityCredentialsHostProto $host)
  {
    $this->host = $host;
  }
  /**
   * @return SecurityCredentialsHostProto
   */
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param SecurityCredentialsLdapGroupProto
   */
  public function setLdapGroup(SecurityCredentialsLdapGroupProto $ldapGroup)
  {
    $this->ldapGroup = $ldapGroup;
  }
  /**
   * @return SecurityCredentialsLdapGroupProto
   */
  public function getLdapGroup()
  {
    return $this->ldapGroup;
  }
  /**
   * @param SecurityCredentialsLdapUserProto
   */
  public function setLdapUser(SecurityCredentialsLdapUserProto $ldapUser)
  {
    $this->ldapUser = $ldapUser;
  }
  /**
   * @return SecurityCredentialsLdapUserProto
   */
  public function getLdapUser()
  {
    return $this->ldapUser;
  }
  /**
   * @param SecurityCredentialsMdbGroupProto
   */
  public function setMdbGroup(SecurityCredentialsMdbGroupProto $mdbGroup)
  {
    $this->mdbGroup = $mdbGroup;
  }
  /**
   * @return SecurityCredentialsMdbGroupProto
   */
  public function getMdbGroup()
  {
    return $this->mdbGroup;
  }
  /**
   * @param SecurityCredentialsMdbUserProto
   */
  public function setMdbUser(SecurityCredentialsMdbUserProto $mdbUser)
  {
    $this->mdbUser = $mdbUser;
  }
  /**
   * @return SecurityCredentialsMdbUserProto
   */
  public function getMdbUser()
  {
    return $this->mdbUser;
  }
  /**
   * @param SecurityCredentialsOAuthConsumerProto
   */
  public function setOauthConsumer(SecurityCredentialsOAuthConsumerProto $oauthConsumer)
  {
    $this->oauthConsumer = $oauthConsumer;
  }
  /**
   * @return SecurityCredentialsOAuthConsumerProto
   */
  public function getOauthConsumer()
  {
    return $this->oauthConsumer;
  }
  /**
   * @param SecurityCredentialsPostiniUserProto
   */
  public function setPostiniUser(SecurityCredentialsPostiniUserProto $postiniUser)
  {
    $this->postiniUser = $postiniUser;
  }
  /**
   * @return SecurityCredentialsPostiniUserProto
   */
  public function getPostiniUser()
  {
    return $this->postiniUser;
  }
  /**
   * @param SecurityCredentialsRbacRoleProto
   */
  public function setRbacRole(SecurityCredentialsRbacRoleProto $rbacRole)
  {
    $this->rbacRole = $rbacRole;
  }
  /**
   * @return SecurityCredentialsRbacRoleProto
   */
  public function getRbacRole()
  {
    return $this->rbacRole;
  }
  /**
   * @param SecurityCredentialsRbacSubjectProto
   */
  public function setRbacSubject(SecurityCredentialsRbacSubjectProto $rbacSubject)
  {
    $this->rbacSubject = $rbacSubject;
  }
  /**
   * @return SecurityCredentialsRbacSubjectProto
   */
  public function getRbacSubject()
  {
    return $this->rbacSubject;
  }
  /**
   * @param SecurityCredentialsResourceRoleProto
   */
  public function setResourceRole(SecurityCredentialsResourceRoleProto $resourceRole)
  {
    $this->resourceRole = $resourceRole;
  }
  /**
   * @return SecurityCredentialsResourceRoleProto
   */
  public function getResourceRole()
  {
    return $this->resourceRole;
  }
  /**
   * @param string
   */
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  /**
   * @return string
   */
  public function getScope()
  {
    return $this->scope;
  }
  /**
   * @param SecurityCredentialsSigningKeyPossessorProto
   */
  public function setSigningKeyPossessor(SecurityCredentialsSigningKeyPossessorProto $signingKeyPossessor)
  {
    $this->signingKeyPossessor = $signingKeyPossessor;
  }
  /**
   * @return SecurityCredentialsSigningKeyPossessorProto
   */
  public function getSigningKeyPossessor()
  {
    return $this->signingKeyPossessor;
  }
  /**
   * @param SecurityCredentialsSimpleSecretHolderProto
   */
  public function setSimpleSecretHolder(SecurityCredentialsSimpleSecretHolderProto $simpleSecretHolder)
  {
    $this->simpleSecretHolder = $simpleSecretHolder;
  }
  /**
   * @return SecurityCredentialsSimpleSecretHolderProto
   */
  public function getSimpleSecretHolder()
  {
    return $this->simpleSecretHolder;
  }
  /**
   * @param SecurityCredentialsSocialGraphNodeProto
   */
  public function setSocialGraphNode(SecurityCredentialsSocialGraphNodeProto $socialGraphNode)
  {
    $this->socialGraphNode = $socialGraphNode;
  }
  /**
   * @return SecurityCredentialsSocialGraphNodeProto
   */
  public function getSocialGraphNode()
  {
    return $this->socialGraphNode;
  }
  /**
   * @param SecurityCredentialsSquareProto
   */
  public function setSquare(SecurityCredentialsSquareProto $square)
  {
    $this->square = $square;
  }
  /**
   * @return SecurityCredentialsSquareProto
   */
  public function getSquare()
  {
    return $this->square;
  }
  /**
   * @param SecurityCredentialsYoutubeUserProto
   */
  public function setYoutubeUser(SecurityCredentialsYoutubeUserProto $youtubeUser)
  {
    $this->youtubeUser = $youtubeUser;
  }
  /**
   * @return SecurityCredentialsYoutubeUserProto
   */
  public function getYoutubeUser()
  {
    return $this->youtubeUser;
  }
  /**
   * @param SecurityCredentialsZwiebackSessionProto
   */
  public function setZwiebackSession(SecurityCredentialsZwiebackSessionProto $zwiebackSession)
  {
    $this->zwiebackSession = $zwiebackSession;
  }
  /**
   * @return SecurityCredentialsZwiebackSessionProto
   */
  public function getZwiebackSession()
  {
    return $this->zwiebackSession;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityCredentialsPrincipalProto::class, 'Google_Service_Contentwarehouse_SecurityCredentialsPrincipalProto');
