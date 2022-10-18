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

namespace Google\Service\CloudSearch;

class PrincipalProto extends \Google\Model
{
  protected $allAuthenticatedUsersType = AllAuthenticatedUsersProto::class;
  protected $allAuthenticatedUsersDataType = '';
  protected $capTokenHolderType = CapTokenHolderProto::class;
  protected $capTokenHolderDataType = '';
  protected $chatType = ChatProto::class;
  protected $chatDataType = '';
  protected $circleType = CircleProto::class;
  protected $circleDataType = '';
  protected $cloudPrincipalType = CloudPrincipalProto::class;
  protected $cloudPrincipalDataType = '';
  protected $contactGroupType = ContactGroupProto::class;
  protected $contactGroupDataType = '';
  protected $emailOwnerType = EmailOwnerProto::class;
  protected $emailOwnerDataType = '';
  protected $eventType = EventProto::class;
  protected $eventDataType = '';
  protected $gaiaGroupType = GaiaGroupProto::class;
  protected $gaiaGroupDataType = '';
  protected $gaiaUserType = GaiaUserProto::class;
  protected $gaiaUserDataType = '';
  protected $hostType = HostProto::class;
  protected $hostDataType = '';
  protected $ldapGroupType = LdapGroupProto::class;
  protected $ldapGroupDataType = '';
  protected $ldapUserType = LdapUserProto::class;
  protected $ldapUserDataType = '';
  protected $mdbGroupType = MdbGroupProto::class;
  protected $mdbGroupDataType = '';
  protected $mdbUserType = MdbUserProto::class;
  protected $mdbUserDataType = '';
  protected $oauthConsumerType = OAuthConsumerProto::class;
  protected $oauthConsumerDataType = '';
  protected $postiniUserType = PostiniUserProto::class;
  protected $postiniUserDataType = '';
  protected $rbacRoleType = RbacRoleProto::class;
  protected $rbacRoleDataType = '';
  protected $rbacSubjectType = RbacSubjectProto::class;
  protected $rbacSubjectDataType = '';
  protected $resourceRoleType = ResourceRoleProto::class;
  protected $resourceRoleDataType = '';
  /**
   * @var string
   */
  public $scope;
  protected $signingKeyPossessorType = SigningKeyPossessorProto::class;
  protected $signingKeyPossessorDataType = '';
  protected $simpleSecretHolderType = SimpleSecretHolderProto::class;
  protected $simpleSecretHolderDataType = '';
  protected $socialGraphNodeType = SocialGraphNodeProto::class;
  protected $socialGraphNodeDataType = '';
  protected $squareType = SquareProto::class;
  protected $squareDataType = '';
  protected $youtubeUserType = YoutubeUserProto::class;
  protected $youtubeUserDataType = '';
  protected $zwiebackSessionType = ZwiebackSessionProto::class;
  protected $zwiebackSessionDataType = '';

  /**
   * @param AllAuthenticatedUsersProto
   */
  public function setAllAuthenticatedUsers(AllAuthenticatedUsersProto $allAuthenticatedUsers)
  {
    $this->allAuthenticatedUsers = $allAuthenticatedUsers;
  }
  /**
   * @return AllAuthenticatedUsersProto
   */
  public function getAllAuthenticatedUsers()
  {
    return $this->allAuthenticatedUsers;
  }
  /**
   * @param CapTokenHolderProto
   */
  public function setCapTokenHolder(CapTokenHolderProto $capTokenHolder)
  {
    $this->capTokenHolder = $capTokenHolder;
  }
  /**
   * @return CapTokenHolderProto
   */
  public function getCapTokenHolder()
  {
    return $this->capTokenHolder;
  }
  /**
   * @param ChatProto
   */
  public function setChat(ChatProto $chat)
  {
    $this->chat = $chat;
  }
  /**
   * @return ChatProto
   */
  public function getChat()
  {
    return $this->chat;
  }
  /**
   * @param CircleProto
   */
  public function setCircle(CircleProto $circle)
  {
    $this->circle = $circle;
  }
  /**
   * @return CircleProto
   */
  public function getCircle()
  {
    return $this->circle;
  }
  /**
   * @param CloudPrincipalProto
   */
  public function setCloudPrincipal(CloudPrincipalProto $cloudPrincipal)
  {
    $this->cloudPrincipal = $cloudPrincipal;
  }
  /**
   * @return CloudPrincipalProto
   */
  public function getCloudPrincipal()
  {
    return $this->cloudPrincipal;
  }
  /**
   * @param ContactGroupProto
   */
  public function setContactGroup(ContactGroupProto $contactGroup)
  {
    $this->contactGroup = $contactGroup;
  }
  /**
   * @return ContactGroupProto
   */
  public function getContactGroup()
  {
    return $this->contactGroup;
  }
  /**
   * @param EmailOwnerProto
   */
  public function setEmailOwner(EmailOwnerProto $emailOwner)
  {
    $this->emailOwner = $emailOwner;
  }
  /**
   * @return EmailOwnerProto
   */
  public function getEmailOwner()
  {
    return $this->emailOwner;
  }
  /**
   * @param EventProto
   */
  public function setEvent(EventProto $event)
  {
    $this->event = $event;
  }
  /**
   * @return EventProto
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param GaiaGroupProto
   */
  public function setGaiaGroup(GaiaGroupProto $gaiaGroup)
  {
    $this->gaiaGroup = $gaiaGroup;
  }
  /**
   * @return GaiaGroupProto
   */
  public function getGaiaGroup()
  {
    return $this->gaiaGroup;
  }
  /**
   * @param GaiaUserProto
   */
  public function setGaiaUser(GaiaUserProto $gaiaUser)
  {
    $this->gaiaUser = $gaiaUser;
  }
  /**
   * @return GaiaUserProto
   */
  public function getGaiaUser()
  {
    return $this->gaiaUser;
  }
  /**
   * @param HostProto
   */
  public function setHost(HostProto $host)
  {
    $this->host = $host;
  }
  /**
   * @return HostProto
   */
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param LdapGroupProto
   */
  public function setLdapGroup(LdapGroupProto $ldapGroup)
  {
    $this->ldapGroup = $ldapGroup;
  }
  /**
   * @return LdapGroupProto
   */
  public function getLdapGroup()
  {
    return $this->ldapGroup;
  }
  /**
   * @param LdapUserProto
   */
  public function setLdapUser(LdapUserProto $ldapUser)
  {
    $this->ldapUser = $ldapUser;
  }
  /**
   * @return LdapUserProto
   */
  public function getLdapUser()
  {
    return $this->ldapUser;
  }
  /**
   * @param MdbGroupProto
   */
  public function setMdbGroup(MdbGroupProto $mdbGroup)
  {
    $this->mdbGroup = $mdbGroup;
  }
  /**
   * @return MdbGroupProto
   */
  public function getMdbGroup()
  {
    return $this->mdbGroup;
  }
  /**
   * @param MdbUserProto
   */
  public function setMdbUser(MdbUserProto $mdbUser)
  {
    $this->mdbUser = $mdbUser;
  }
  /**
   * @return MdbUserProto
   */
  public function getMdbUser()
  {
    return $this->mdbUser;
  }
  /**
   * @param OAuthConsumerProto
   */
  public function setOauthConsumer(OAuthConsumerProto $oauthConsumer)
  {
    $this->oauthConsumer = $oauthConsumer;
  }
  /**
   * @return OAuthConsumerProto
   */
  public function getOauthConsumer()
  {
    return $this->oauthConsumer;
  }
  /**
   * @param PostiniUserProto
   */
  public function setPostiniUser(PostiniUserProto $postiniUser)
  {
    $this->postiniUser = $postiniUser;
  }
  /**
   * @return PostiniUserProto
   */
  public function getPostiniUser()
  {
    return $this->postiniUser;
  }
  /**
   * @param RbacRoleProto
   */
  public function setRbacRole(RbacRoleProto $rbacRole)
  {
    $this->rbacRole = $rbacRole;
  }
  /**
   * @return RbacRoleProto
   */
  public function getRbacRole()
  {
    return $this->rbacRole;
  }
  /**
   * @param RbacSubjectProto
   */
  public function setRbacSubject(RbacSubjectProto $rbacSubject)
  {
    $this->rbacSubject = $rbacSubject;
  }
  /**
   * @return RbacSubjectProto
   */
  public function getRbacSubject()
  {
    return $this->rbacSubject;
  }
  /**
   * @param ResourceRoleProto
   */
  public function setResourceRole(ResourceRoleProto $resourceRole)
  {
    $this->resourceRole = $resourceRole;
  }
  /**
   * @return ResourceRoleProto
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
   * @param SigningKeyPossessorProto
   */
  public function setSigningKeyPossessor(SigningKeyPossessorProto $signingKeyPossessor)
  {
    $this->signingKeyPossessor = $signingKeyPossessor;
  }
  /**
   * @return SigningKeyPossessorProto
   */
  public function getSigningKeyPossessor()
  {
    return $this->signingKeyPossessor;
  }
  /**
   * @param SimpleSecretHolderProto
   */
  public function setSimpleSecretHolder(SimpleSecretHolderProto $simpleSecretHolder)
  {
    $this->simpleSecretHolder = $simpleSecretHolder;
  }
  /**
   * @return SimpleSecretHolderProto
   */
  public function getSimpleSecretHolder()
  {
    return $this->simpleSecretHolder;
  }
  /**
   * @param SocialGraphNodeProto
   */
  public function setSocialGraphNode(SocialGraphNodeProto $socialGraphNode)
  {
    $this->socialGraphNode = $socialGraphNode;
  }
  /**
   * @return SocialGraphNodeProto
   */
  public function getSocialGraphNode()
  {
    return $this->socialGraphNode;
  }
  /**
   * @param SquareProto
   */
  public function setSquare(SquareProto $square)
  {
    $this->square = $square;
  }
  /**
   * @return SquareProto
   */
  public function getSquare()
  {
    return $this->square;
  }
  /**
   * @param YoutubeUserProto
   */
  public function setYoutubeUser(YoutubeUserProto $youtubeUser)
  {
    $this->youtubeUser = $youtubeUser;
  }
  /**
   * @return YoutubeUserProto
   */
  public function getYoutubeUser()
  {
    return $this->youtubeUser;
  }
  /**
   * @param ZwiebackSessionProto
   */
  public function setZwiebackSession(ZwiebackSessionProto $zwiebackSession)
  {
    $this->zwiebackSession = $zwiebackSession;
  }
  /**
   * @return ZwiebackSessionProto
   */
  public function getZwiebackSession()
  {
    return $this->zwiebackSession;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrincipalProto::class, 'Google_Service_CloudSearch_PrincipalProto');
