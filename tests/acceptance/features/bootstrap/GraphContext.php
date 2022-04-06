<?php declare(strict_types=1);

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use PHPUnit\Framework\Assert;

require_once 'bootstrap.php';

class GraphContext implements Context {
	/**
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @param string $user
	 * @param string|null $userName
	 * @param string|null $password
	 * @param string|null $email
	 * @param string|null $displayName
	 * @param string|null $requester
	 * @param string|null $requesterPassword
	 *
	 * @return array
	 * @throws JsonException
	 */
	public function userHasBeenEditedUsingTheGraphApi(
		string $user,
		?string $userName = null,
		?string $password = null,
		?string $email = null,
		?string $displayName = null,
		?string $requester = null,
		?string $requesterPassword = null
	): array {
		if (!$requester) {
			$requester = $this->featureContext->getAdminUsername();
			$requesterPassword = $this->featureContext->getAdminPassword();
		}
		$userId = $this->featureContext->getAttributeOfCreatedUser($user, 'id');
		$response = \TestHelpers\GraphHelper::editUser(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$requester,
			$requesterPassword,
			$userId,
			$userName,
			$password,
			$email,
			$displayName
		);
		$this->featureContext->setResponse($response);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
		$response = \TestHelpers\GraphHelper::getUser(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$requester,
			$requesterPassword,
			$userId
		);
		$this->featureContext->setResponse($response);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
		return $this->featureContext->getJsonDecodedResponse();
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function adminHasRetrievedUserUsingTheGraphApi(string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$userId = $this->featureContext->getAttributeOfCreatedUser($user, "id");
		$result = \TestHelpers\GraphHelper::getUser(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			($userId) ?: $user
		);
		$this->featureContext->setResponse($result);
		$this->featureContext->thenTheHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @param $requestingUser
	 * @param $targetUser
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userHasRetrievedUserUsingTheGraphApi(
		$requestingUser,
		$targetUser
	):void {
		$requester = $this->featureContext->getActualUsername($requestingUser);
		$requesterPassword = $this->featureContext->getPasswordForUser($requestingUser);
		$user = $this->featureContext->getActualUsername($targetUser);
		$userId = $this->featureContext->getAttributeOfCreatedUser($user, "id");
		$response = \TestHelpers\GraphHelper::getUser(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$requester,
			$requesterPassword,
			$userId
		);
		$this->featureContext->setResponse($response);
		$this->featureContext->thenTheHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminHasDeletedGroupUsingTheGraphApi(string $group):void {
		$groupId = $this->featureContext->getAttributeOfCreatedGroup($group, "id");
		if ($groupId) {
			$response = \TestHelpers\GraphHelper::deleteGroup(
				$this->featureContext->getBaseUrl(),
				$this->featureContext->getStepLineRef(),
				$this->featureContext->getAdminUsername(),
				$this->featureContext->getAdminPassword(),
				$groupId
			);
			$this->featureContext->setResponse($response);
			$this->featureContext->thenTheHTTPStatusCodeShouldBe(204);
		} else {
			throw new Exception(
				"Group id does not exist for '$group' in the created list."
				. " Cannot delete group without id when using the Graph API."
			);
		}
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 */
	public function adminDeletesUserUsingTheGraphApi(string $user) {
		$this->featureContext->setResponse(
			\TestHelpers\GraphHelper::deleteUser(
				$this->featureContext->getBaseUrl(),
				$this->featureContext->getStepLineRef(),
				$this->featureContext->getAdminUsername(),
				$this->featureContext->getAdminPassword(),
				$user
			)
		);
	}

	/**
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function adminHasRemovedUserFromGroupUsingTheGraphApi(string $user, string $group):void {
		$user = $this->featureContext->getActualUsername($user);
		$userId = $this->featureContext->getAttributeOfCreatedUser($user, "id");
		$groupId = $this->featureContext->getAttributeOfCreatedGroup($group, "id");
		$response = \TestHelpers\GraphHelper::removeUserFromGroup(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$userId,
			$groupId,
		);
		$this->featureContext->setResponse($response);
		$this->featureContext->thenTheHTTPStatusCodeShouldBe(204);
	}

	/**
	 * @param string $user
	 * @param string $group
	 *
	 * @return bool
	 * @throws JsonException
	 */
	public function getUserPresenceInGroupUsingTheGraphApi(string $user, string $group): bool {
		$user = $this->featureContext->getActualUsername($user);
		$userId = $this->featureContext->getAttributeOfCreatedUser($user, "id");
		$groupId = $this->featureContext->getAttributeOfCreatedGroup($group, "id");
		$response = \TestHelpers\GraphHelper::getMembersList(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$userId,
			$groupId
		);
		$this->featureContext->setResponse($response);
		$this->featureContext->thenTheHTTPStatusCodeShouldBe(200);
		$members = $this->featureContext->getJsonDecodedResponse();
		$found = false;
		foreach ($members as $member) {
			if ($member["id"] === $userId) {
				$found = true;
				break;
			}
		}
		return $found;
	}

	/**
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userShouldNotBeMemberInGroupUsingTheGraphApi(string $user, string $group):void {
		$found = $this->getUserPresenceInGroupUsingTheGraphApi($user, $group);
		Assert::assertFalse($found, "User $user is member of group $group");
	}

	/**
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userShouldBeMemberInGroupUsingTheGraphApi(string $user, string $group):void {
		$found = $this->getUserPresenceInGroupUsingTheGraphApi($user, $group);
		Assert::assertTrue($found, "User $user is not member of group $group");
	}

	/**
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function adminChangesPasswordOfUserToUsingTheGraphApi(
		string $user,
		string $password
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$userId = $this->featureContext->getAttributeOfCreatedUser($user, 'id');
		$response = \TestHelpers\GraphHelper::editUser(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$userId,
			null,
			$password
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @return array
	 * @throws Exception
	 */
	public function adminHasRetrievedGroupListUsingTheGraphApi():array {
		$response =  \TestHelpers\GraphHelper::getGroups(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
		if ($response->getStatusCode() === 200) {
			return $this->featureContext->getJsonDecodedResponse($response);
		} else {
			throw new Exception(
				"Could not retrieve groups list. "
				. "HTTP status code was " . $response->getStatusCode()
			);
		}
	}

	public function theAdminHasRetrievedMembersListOfGroupUsingTheGraphApi(string $group):array {

	}

	/**
	 * @param string $user
	 * @param string $password
	 * @param string $displayName
	 * @param string $email
	 *
	 * @return array
	 * @throws Exception
	 */
	public function theAdminHasCreatedUser(
		string $user,
		string $password,
		string $email,
		string $displayName
	): array {
		$response = \TestHelpers\GraphHelper::createUser(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$user,
			$password,
			$email,
			$displayName
		);
		$jsonBody = $this->featureContext->getJsonDecodedResponse($response);
		if ($response->getStatusCode() !== 200) {
			throw new Exception(
				__METHOD__
				. "\nError: Could not create user"
				. "\nError code: {$jsonBody['error']['code']}"
				. "\nError message: {$jsonBody['error']['message']}"
			);
		} else {
			return $jsonBody;
		}
	}

	/**
	 * @param string $group
	 * @param string $user
	 * @param bool $checkResult
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function adminHasAddedUserToGroupUsingTheGraphApi(
		string $group,
		string $user,
		bool $checkResult = true
	) {
		$groupId = $this->featureContext->getAttributeOfCreatedGroup($group, "id");
		$userId = $this->featureContext->getAttributeOfCreatedUser($user, "id");
		$result = \TestHelpers\GraphHelper::addUserToGroup(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$userId,
			$groupId
		);
		if ($checkResult && ($result->getStatusCode() !== 204)) {
			throw new Exception(
				"could not add user to group. "
				. $result->getStatusCode() . " " . $result->getBody()
			);
		}
	}

	/**
	 * @param string $group
	 *
	 * @return array
	 * @throws Exception
	 */
	public function adminHasCreatedGroupUsingTheGraphApi(string $group):array {
		$result = \TestHelpers\GraphHelper::createGroup(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$group,
		);
		$jsonBody = $this->featureContext->getJsonDecodedResponse($result);
		if ($result->getStatusCode() === 200) {
			return $jsonBody;
		} else {
			throw new Exception(
				__METHOD__
				. "\nError: failed creating group '$group'"
				. "\nStatus code: " . $jsonBody['error']['code']
				. "\nMessage: " . $jsonBody['error']['message']
			);
		}
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
