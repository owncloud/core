<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Iam;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Identity and Access Management
 *
 * @method Model addClientIDToOpenIDConnectProvider(array $args = array()) {@command Iam AddClientIDToOpenIDConnectProvider}
 * @method Model addRoleToInstanceProfile(array $args = array()) {@command Iam AddRoleToInstanceProfile}
 * @method Model addUserToGroup(array $args = array()) {@command Iam AddUserToGroup}
 * @method Model changePassword(array $args = array()) {@command Iam ChangePassword}
 * @method Model createAccessKey(array $args = array()) {@command Iam CreateAccessKey}
 * @method Model createAccountAlias(array $args = array()) {@command Iam CreateAccountAlias}
 * @method Model createGroup(array $args = array()) {@command Iam CreateGroup}
 * @method Model createInstanceProfile(array $args = array()) {@command Iam CreateInstanceProfile}
 * @method Model createLoginProfile(array $args = array()) {@command Iam CreateLoginProfile}
 * @method Model createOpenIDConnectProvider(array $args = array()) {@command Iam CreateOpenIDConnectProvider}
 * @method Model createRole(array $args = array()) {@command Iam CreateRole}
 * @method Model createSAMLProvider(array $args = array()) {@command Iam CreateSAMLProvider}
 * @method Model createUser(array $args = array()) {@command Iam CreateUser}
 * @method Model createVirtualMFADevice(array $args = array()) {@command Iam CreateVirtualMFADevice}
 * @method Model deactivateMFADevice(array $args = array()) {@command Iam DeactivateMFADevice}
 * @method Model deleteAccessKey(array $args = array()) {@command Iam DeleteAccessKey}
 * @method Model deleteAccountAlias(array $args = array()) {@command Iam DeleteAccountAlias}
 * @method Model deleteAccountPasswordPolicy(array $args = array()) {@command Iam DeleteAccountPasswordPolicy}
 * @method Model deleteGroup(array $args = array()) {@command Iam DeleteGroup}
 * @method Model deleteGroupPolicy(array $args = array()) {@command Iam DeleteGroupPolicy}
 * @method Model deleteInstanceProfile(array $args = array()) {@command Iam DeleteInstanceProfile}
 * @method Model deleteLoginProfile(array $args = array()) {@command Iam DeleteLoginProfile}
 * @method Model deleteOpenIDConnectProvider(array $args = array()) {@command Iam DeleteOpenIDConnectProvider}
 * @method Model deleteRole(array $args = array()) {@command Iam DeleteRole}
 * @method Model deleteRolePolicy(array $args = array()) {@command Iam DeleteRolePolicy}
 * @method Model deleteSAMLProvider(array $args = array()) {@command Iam DeleteSAMLProvider}
 * @method Model deleteServerCertificate(array $args = array()) {@command Iam DeleteServerCertificate}
 * @method Model deleteSigningCertificate(array $args = array()) {@command Iam DeleteSigningCertificate}
 * @method Model deleteUser(array $args = array()) {@command Iam DeleteUser}
 * @method Model deleteUserPolicy(array $args = array()) {@command Iam DeleteUserPolicy}
 * @method Model deleteVirtualMFADevice(array $args = array()) {@command Iam DeleteVirtualMFADevice}
 * @method Model enableMFADevice(array $args = array()) {@command Iam EnableMFADevice}
 * @method Model generateCredentialReport(array $args = array()) {@command Iam GenerateCredentialReport}
 * @method Model getAccountPasswordPolicy(array $args = array()) {@command Iam GetAccountPasswordPolicy}
 * @method Model getAccountSummary(array $args = array()) {@command Iam GetAccountSummary}
 * @method Model getCredentialReport(array $args = array()) {@command Iam GetCredentialReport}
 * @method Model getGroup(array $args = array()) {@command Iam GetGroup}
 * @method Model getGroupPolicy(array $args = array()) {@command Iam GetGroupPolicy}
 * @method Model getInstanceProfile(array $args = array()) {@command Iam GetInstanceProfile}
 * @method Model getLoginProfile(array $args = array()) {@command Iam GetLoginProfile}
 * @method Model getOpenIDConnectProvider(array $args = array()) {@command Iam GetOpenIDConnectProvider}
 * @method Model getRole(array $args = array()) {@command Iam GetRole}
 * @method Model getRolePolicy(array $args = array()) {@command Iam GetRolePolicy}
 * @method Model getSAMLProvider(array $args = array()) {@command Iam GetSAMLProvider}
 * @method Model getServerCertificate(array $args = array()) {@command Iam GetServerCertificate}
 * @method Model getUser(array $args = array()) {@command Iam GetUser}
 * @method Model getUserPolicy(array $args = array()) {@command Iam GetUserPolicy}
 * @method Model listAccessKeys(array $args = array()) {@command Iam ListAccessKeys}
 * @method Model listAccountAliases(array $args = array()) {@command Iam ListAccountAliases}
 * @method Model listGroupPolicies(array $args = array()) {@command Iam ListGroupPolicies}
 * @method Model listGroups(array $args = array()) {@command Iam ListGroups}
 * @method Model listGroupsForUser(array $args = array()) {@command Iam ListGroupsForUser}
 * @method Model listInstanceProfiles(array $args = array()) {@command Iam ListInstanceProfiles}
 * @method Model listInstanceProfilesForRole(array $args = array()) {@command Iam ListInstanceProfilesForRole}
 * @method Model listMFADevices(array $args = array()) {@command Iam ListMFADevices}
 * @method Model listOpenIDConnectProviders(array $args = array()) {@command Iam ListOpenIDConnectProviders}
 * @method Model listRolePolicies(array $args = array()) {@command Iam ListRolePolicies}
 * @method Model listRoles(array $args = array()) {@command Iam ListRoles}
 * @method Model listSAMLProviders(array $args = array()) {@command Iam ListSAMLProviders}
 * @method Model listServerCertificates(array $args = array()) {@command Iam ListServerCertificates}
 * @method Model listSigningCertificates(array $args = array()) {@command Iam ListSigningCertificates}
 * @method Model listUserPolicies(array $args = array()) {@command Iam ListUserPolicies}
 * @method Model listUsers(array $args = array()) {@command Iam ListUsers}
 * @method Model listVirtualMFADevices(array $args = array()) {@command Iam ListVirtualMFADevices}
 * @method Model putGroupPolicy(array $args = array()) {@command Iam PutGroupPolicy}
 * @method Model putRolePolicy(array $args = array()) {@command Iam PutRolePolicy}
 * @method Model putUserPolicy(array $args = array()) {@command Iam PutUserPolicy}
 * @method Model removeClientIDFromOpenIDConnectProvider(array $args = array()) {@command Iam RemoveClientIDFromOpenIDConnectProvider}
 * @method Model removeRoleFromInstanceProfile(array $args = array()) {@command Iam RemoveRoleFromInstanceProfile}
 * @method Model removeUserFromGroup(array $args = array()) {@command Iam RemoveUserFromGroup}
 * @method Model resyncMFADevice(array $args = array()) {@command Iam ResyncMFADevice}
 * @method Model updateAccessKey(array $args = array()) {@command Iam UpdateAccessKey}
 * @method Model updateAccountPasswordPolicy(array $args = array()) {@command Iam UpdateAccountPasswordPolicy}
 * @method Model updateAssumeRolePolicy(array $args = array()) {@command Iam UpdateAssumeRolePolicy}
 * @method Model updateGroup(array $args = array()) {@command Iam UpdateGroup}
 * @method Model updateLoginProfile(array $args = array()) {@command Iam UpdateLoginProfile}
 * @method Model updateOpenIDConnectProviderThumbprint(array $args = array()) {@command Iam UpdateOpenIDConnectProviderThumbprint}
 * @method Model updateSAMLProvider(array $args = array()) {@command Iam UpdateSAMLProvider}
 * @method Model updateServerCertificate(array $args = array()) {@command Iam UpdateServerCertificate}
 * @method Model updateSigningCertificate(array $args = array()) {@command Iam UpdateSigningCertificate}
 * @method Model updateUser(array $args = array()) {@command Iam UpdateUser}
 * @method Model uploadServerCertificate(array $args = array()) {@command Iam UploadServerCertificate}
 * @method Model uploadSigningCertificate(array $args = array()) {@command Iam UploadSigningCertificate}
 * @method ResourceIteratorInterface getGetGroupIterator(array $args = array()) The input array uses the parameters of the GetGroup operation
 * @method ResourceIteratorInterface getListAccessKeysIterator(array $args = array()) The input array uses the parameters of the ListAccessKeys operation
 * @method ResourceIteratorInterface getListAccountAliasesIterator(array $args = array()) The input array uses the parameters of the ListAccountAliases operation
 * @method ResourceIteratorInterface getListGroupPoliciesIterator(array $args = array()) The input array uses the parameters of the ListGroupPolicies operation
 * @method ResourceIteratorInterface getListGroupsIterator(array $args = array()) The input array uses the parameters of the ListGroups operation
 * @method ResourceIteratorInterface getListGroupsForUserIterator(array $args = array()) The input array uses the parameters of the ListGroupsForUser operation
 * @method ResourceIteratorInterface getListInstanceProfilesIterator(array $args = array()) The input array uses the parameters of the ListInstanceProfiles operation
 * @method ResourceIteratorInterface getListInstanceProfilesForRoleIterator(array $args = array()) The input array uses the parameters of the ListInstanceProfilesForRole operation
 * @method ResourceIteratorInterface getListMFADevicesIterator(array $args = array()) The input array uses the parameters of the ListMFADevices operation
 * @method ResourceIteratorInterface getListRolePoliciesIterator(array $args = array()) The input array uses the parameters of the ListRolePolicies operation
 * @method ResourceIteratorInterface getListRolesIterator(array $args = array()) The input array uses the parameters of the ListRoles operation
 * @method ResourceIteratorInterface getListSAMLProvidersIterator(array $args = array()) The input array uses the parameters of the ListSAMLProviders operation
 * @method ResourceIteratorInterface getListServerCertificatesIterator(array $args = array()) The input array uses the parameters of the ListServerCertificates operation
 * @method ResourceIteratorInterface getListSigningCertificatesIterator(array $args = array()) The input array uses the parameters of the ListSigningCertificates operation
 * @method ResourceIteratorInterface getListUserPoliciesIterator(array $args = array()) The input array uses the parameters of the ListUserPolicies operation
 * @method ResourceIteratorInterface getListUsersIterator(array $args = array()) The input array uses the parameters of the ListUsers operation
 * @method ResourceIteratorInterface getListVirtualMFADevicesIterator(array $args = array()) The input array uses the parameters of the ListVirtualMFADevices operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-iam.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Iam.IamClient.html API docs
 */
class IamClient extends AbstractClient
{
    const LATEST_API_VERSION = '2010-05-08';

    /**
     * Factory method to create a new AWS Identity and Access Management client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/iam-%s.php'
            ))
            ->build();
    }
}
